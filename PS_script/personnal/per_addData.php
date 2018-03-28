<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var name = '<?= $_SESSION["name"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "sl_table_profile", "", true, table_profile);
    });
    function show_profile() {
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "sl_table_profile", "", true, table_profile);
    }

    function table_profile(data) {
        $(".table_profile").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push([a, data[i].pro_idpos, data[i].card_id, data[i].pro_prefix + data[i].pro_fname + ' ' + data[i].pro_lname, DateThai(data[i].pro_dateIn), '<img class="btn-detail" id="' + data[i].pro_id + '"/><img class="btn-edit" id="' + data[i].pro_id + '" data-toggle="modal" data-target="#editPerson" onclick="javascript: slEdit(this)"/><img class="btn-delete" id="' + data[i].pro_id + '" onclick="javascript: delProfile(this)"/>']);
        });
        $('#table_profile_show').html('<table class="table table-bordered table-striped table-hover table_profile dataTable" width="100%"></table>');
        $('.table_profile').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "เลขตำแหน่ง"},
                {title: "รหัสบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "วันเข้ารับราชการ"},
                {title: "..."},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('id'));
                $(nRow).css('cursor', 'pointer');
            }
        });
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

    function addPerson(APS) {
        var array = [];
        array.push($('#card_id').val(), $('#pro_idpos').val(), $('input[name=group1]:checked', '#pro_sax').val(), $('#pro_prefix').val(), $('#pro_fname').val(), $('#pro_lname').val()
                , formatDateDB($('#pro_birthday').val()), $('input[name=group2]:checked', '#pro_status').val(), $('#pos_id').val(), $('#type_id').val(), $('#lvb_id').val(), $('#lv_id').val()
                , $('#class_id').val(), $('#dep_id').val(), $('#pro_salary').val(), $('#pro_dateIn').val(), $('#pro_dateOut').val(), $('#pro_picture').val(), name, name, formatDate(), '0');
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", APS, array, true, function (data) {
            show_profile()
            swal("บันทึกสำเร็จ!", "บันทึกข้อมูลบุคลากรลงในระบบเเล้ว", "success");
            $('#addPerson').modal('hide');
        });
    }
    function delProfile(data) {
        swal({
            title: "คุณต้องการลบหรือไม่?",
            text: "หากลบจะไม่สามารถกู้คืนข้อมูลที่ลบได้อีก!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ใช่, ต้องการลบ!",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false
        }, function () {
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "DPS", [$(data).attr("id")], true, function (data) {
                show_profile();
                swal("ลบสำเร็จ!", "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว", "success");
            });
        });
    }
    function slEdit(data) {
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "SLEPS", [$(data).attr("id")], true, function (data) {
            $('#pro_id').val(data[0].pro_id);
            $('#pro_idposE').val(data[0].pro_idpos);
            $('#pro_fnameE').val(data[0].pro_fname);
            $('#pro_lnameE').val(data[0].pro_lname);
            $('#card_idE').val(data[0].card_id);
            $('#pro_nicknameE').val(data[0].pro_nickname);
            $("#pro_sexE input[name=group1E][value=" + data[0].pro_sex + "]").prop("checked", true);
            $("#pro_statusE input[name=group2E][value=" + data[0].pro_status + "]").prop("checked", true);
            $('#pro_salaryE').val(parseInt(data[0].pro_salary));
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "SLPF", [$(data).pro_prefix], true, function (data) {
                $('#pro_prefixE').html('<option  value="">เลือก</opition>');
                $.each(data, function (i, k) {
                    $("#pro_prefixE").append('<option  value="' + data[i].pf_name + '">' + data[i].pf_name + '</opition>');
                });
                $('#pro_prefixE').select2();
            });
        });
    }

</script>