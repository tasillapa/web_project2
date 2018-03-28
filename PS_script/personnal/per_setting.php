<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var name = '<?= $_SESSION["name"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_table_setting", "", true, table_setting);
    });
    function show_setting() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSitting.php", "sl_table_setting", "", true, table_setting);
    }

    function table_setting(data) {
        $(".table_setting").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push([a, data[i].card_id, data[i].nameuser + ' ' + data[i].lastname, data[i].pos_name, data[i].name_class, data[i].tel, data[i].email, '<img class="btn-detail" id="' + data[i].pro_id + '" onclick="javascript: delProfile(this)"/><img class="btn-edit" id="' + data[i].pro_id + '" onclick="javascript: delProfile(this)"/><img class="btn-delete" id="' + data[i].pro_id + '" onclick="javascript: delProfile(this)"/>']);
        });
        $('#table_setting_show').html('<table class="table table-bordered table-striped table-hover table_setting dataTable" width="100%"></table>');
        $('.table_setting').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "รหัสบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "ตำแหน่ง"},
                {title: "กลุ่ม"},
                {title: "เบอร์โทรศัพท์"},
                {title: "E-mail"},
                {title: "..."},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('id'));
                $(nRow).css('cursor', 'pointer');
            }
        });
    }
    
    function formatDateDB(date) {
        var newdate = date.split("/").reverse().join("-");
        return newdate;
    }

    function DateThai(date) {
        var strDate = new Date(date);
        var dd = strDate.getDate();
        var mm = strDate.getMonth() + 1; //January is 0!
        var yyyy = strDate.getFullYear() + 543;
        var strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษภาคม", "ธันวาคม");
        var strMonthThai = strMonthCut[mm];
        return dd + " " + strMonthThai + " พ.ศ. " + yyyy;
    }

     $('#addPerson').find("#pro_picture").change(function () {
        readURLProfile(this);
    });

    function readURLProfile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgS').attr('src', e.target.result);
                $('#zoom-img').attr('href', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            console.log(reader);
        }
    }

    function formatDate() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        var curr_hour = today.getHours();
        var curr_min = today.getMinutes();
        var curr_sec = today.getSeconds();
        var strTime = curr_hour + ':' + curr_min + ':' + curr_sec;
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        return today + ' ' + strTime;
    }

    function addPersong(APS) {
        var array = [];
        array.push($('#card_id').val(), $('#pro_idpos').val(), $('input[name=group1]:checked', '#pro_sax').val(), $('#pro_prefix').val(), $('#pro_fname').val(), $('#pro_lname').val()
                , formatDateDB($('#pro_birthday').val()), $('input[name=group2]:checked', '#pro_status').val(), $('#pos_id').val(), $('#type_id').val(), $('#lvb_id').val(), $('#lv_id').val()
                , $('#class_id').val(), $('#dep_id').val(), $('#pro_salary').val(), $('#pro_dateIn').val(), $('#pro_dateOut').val(), $('#pro_picture').val(), name, name, formatDate(), '0');
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", APS, array, true, function (data) {
            show_setting()
            swal("บันทึกสำเร็จ!", "บันทึกข้อมูลบุคลากรลงในระบบเเล้ว", "success");
            $('#addPerson').modal('hide');
        });
    }
    
</script>