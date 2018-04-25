<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var name = '<?= $_SESSION["name"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_table_setting", "", true, table_setting);
        $('#pos_id').select2();
        $('#class_id').select2();
        $('#level').select2();

    });
    function show_setting() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_table_setting", "", true, table_setting);
    }

    function table_setting(data) {
        $(".table_setting").html('');
        var dataSet = [];
        var tag = [];
        var a = 0;
        $.each(data, function (i, k) {
            if (data[i].status == '0') {
                tag = '<button style="border-radius: 12px; width: 5em; padding: 2px" type="button" class="btn bg-grey waves-effect">ปิด</button>'
            } else {
                tag = '<button style="border-radius: 12px; width: 5em; padding: 2px" type="button" class="btn btn-success waves-effect">เปิดใช้</button>';
            }
            a++;
//            , data[i].tel, data[i].email, data[i].username, data[i].password
            dataSet.push([a, data[i].card_id, data[i].nameuser + ' ' + data[i].lastname, data[i].pos_name, data[i].name_class, tag, '<img class="btn-detail" id="' + data[i].member_id + '" onclick="javascript: detailUser(this)"/><img class="btn-edit" id="' + data[i].member_id + '" data-toggle="modal" data-target="#editUser" onclick="javascript: slUserEdit(this)"/><img class="btn-delete" id="' + data[i].member_id + '" onclick="javascript: delUser(this)"/>']);
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
//                {title: "เบอร์โทรศัพท์"},
//                {title: "E-mail"},
//                {title: "Username"},
//                {title: "Password"},
                {title: "สถานะ"},
                {title: "..."},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('id'));
                $(nRow).css('cursor', 'pointer');
            }
        });
    }
    function addUser(AUSER) {
        var array = [];
        var status = 0;
        if ($('#status').is(':checked')) {
            status = 1;
        }
        array.push($('#card_id').val(), $('#nameuser').val(), $('#lastname').val(), $('#tel').val(), $('#email').val()
                , $('#pos_id').val(), $('#class_id').val(), $('#username').val(), $('#password').val()
                , $('#level').val(), status, name, formatDateToday(), name, formatDateToday());
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", AUSER, array, true, function (data) {
            show_setting();
            swal("บันทึกสำเร็จ!", "บันทึกข้อมูลผู้ใช้งานเเล้ว", "success");
            $('#addUser').modal('hide');
        });
    }

    function slUserEdit(data) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", 'SLUSER', [$(data).attr("id")], true, function (data) {
            $('#card_idE').val(data[0].card_id);
            $('#nameuserE').val(data[0].nameuser);
            $('#lastnameE').val(data[0].lastname);
            $('#telE').val(data[0].tel);
            $('#emailE').val(data[0].email);
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_position", "", true, function (data2) {
                $('#pos_idE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i) {
                    if (data[0].pos_id == data2[i].pos_id) {
                        $("#pos_idE").append('<option selected="selected" value="' + data2[i].pos_id + '">' + data2[i].pos_name + '</opition>');
                    } else {
                        $("#pos_idE").append('<option value="' + data2[i].pos_id + '">' + data2[i].pos_name + '</opition>');
                    }
                });
                $('#pos_idE').select2();
            });
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_class", "", true, function (data2) {
                $('#class_idE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i) {
                    if (data[0].class_id == data2[i].class_id) {
                        $("#class_idE").append('<option selected="selected" value="' + data2[i].class_id + '">' + data2[i].name_class + '</opition>');
                    } else {
                        $("#class_idE").append('<option value="' + data2[i].class_id + '">' + data2[i].name_class + '</opition>');
                    }
                });
                $('#class_idE').select2();
            });
            $('#usernameE').val(data[0].username);
            $('#passwordE').val(data[0].password);
            $('#ch_passwordE').val(data[0].password);
            $('#levelE').html('<option value="">เลือก</opition>');
            $('#levelE').append('<option value="0">ผู้ใช้ทั่วไป</opition>');
            $('#levelE').append('<option value="1">แอดมิน</opition>');
            $('#levelE option[value=' + data[0].level + ']').attr('selected', 'selected');
            $('#levelE').select2();
            if (data[0].status == '1') {
                $('#statusE').prop('checked', true);
            } else {
                $('#statusE').prop('checked', false);
            }
            $('#member_id').val(data[0].member_id);
        });
    }

    function editUser(EUSER) {
        var array = [];
        var status = 0;
        if ($('#statusE').is(':checked')) {
            status = 1;
        }
        array.push($('#card_idE').val(), $('#nameuserE').val(), $('#lastnameE').val(), $('#telE').val(), $('#emailE').val()
                , $('#pos_idE').val(), $('#class_idE').val(), $('#usernameE').val(), $('#passwordE').val()
                , $('#levelE').val(), status, name, formatDateToday(), $('#member_id').val());
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", EUSER, array, true, function (data) {
            show_setting();
            swal("แก้ไขสำเร็จ!", "ข้อมูลผู้ใช้งาน อัพเดทเเล้ว", "success");
            $('#editUser').modal('hide');
        });
    }
    function delUser(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "DUSER", [$(data).attr("id")], true, function (data) {
                show_setting();
                swal("ลบสำเร็จ!", "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว", "success");
            });
        });
    }

</script>