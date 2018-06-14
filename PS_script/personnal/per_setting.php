<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var name = '<?= $_SESSION["name"]; ?>';
    var proID = '<?= $_SESSION["pro_id"]; ?>';
    var lvb_id = '<?= $_SESSION["lvb_id"]; ?>';
    var pass, ch_pass;
    $(function () {
        $('#show_fileUser').html('ยังไม่ได้เลือกไฟล์');
        $('#fileUser').change(function () {
            var myFile = $('#fileUser').prop('files')[0];
            $('#show_fileUser').html(myFile.name).css("color", "#777");
        });

        $("#password").keydown(function (data) {
            pass = $("#password").val();
            if (pass == ch_pass) {
                $('#password-error').fadeIn(100);
                $('#ch-password-error').fadeIn(100);
                $('#password-error, #ch-password-error').html('<span style="color: green;" class="success">รหัสผ่านตรงกันแล้ว</span>').removeClass('form-line focused error');
                $('#password-error, #ch-password-error').addClass('form-line focused success');
            } else {
                $('#password-error, #ch-password-error').removeClass('form-line focused success');
                $('#password-error, #ch-password-error').fadeOut(100);
            }
        });
        $("#ch_password").keydown(function (data) {
            ch_pass = $("#ch_password").val();
            if (pass == ch_pass) {
                $('#ch-password-error').fadeIn(100);
                $('#password-error').fadeIn(100);
                $('#password-error, #ch-password-error').html('<span style="color: green;" class="success">รหัสผ่านตรงกันแล้ว</span>').removeClass('form-line focused error');
                $('#password-error, #ch-password-error').addClass('form-line focused success');
            } else {
                $('#password-error, #ch-password-error').removeClass('form-line focused success');
                $('#password-error, #ch-password-error').fadeOut(100);
            }
        });
        $("#password").focus(function () {
            $('#password-error').fadeOut(100);
        });
        $("#ch_password").focus(function () {
            $('#ch-password-error').fadeOut(100);
        });

        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_table_setting", "", true, table_setting);
        $('#pos_id').select2();
        $('#class_id').select2();
        $('#dep_id').select2();
        $('#level').select2();

    });
    function show_setting() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_table_setting", "", true, table_setting);
    }
    $(document).on("click", ".table_setting tbody tr td:not(:last-child)", function () {
        var clickedBtnID = $(this).parent().attr('id'); // or var clickedBtnID = this.id
        window.location.href = '../../PS_mainpage/personnal/person_DataProfile.php?id=' + clickedBtnID + '';
    });
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
            dataSet.push(['<center>' + a + '</center>', cardID(data[i].card_id), data[i].pro_prefix + data[i].nameuser + ' ' + data[i].lastname, data[i].pos_name, data[i].class_name, tag, '<img class="btn-detail" link="' + data[i].pro_id + '" id="' + data[i].member_id + '" data-toggle="modal" data-target="#detailUser" onclick="javascript: slUserDetail(this)"/>' + ' ' + '<img class="btn-edit" id="' + data[i].member_id + '" data-toggle="modal" data-target="#editUser" onclick="javascript: slUserEdit(this)"/>' + ' ' + '<img class="btn-delete" id="' + data[i].member_id + '" onclick="javascript: delUser(this)"/>']);
        });
        $('#table_setting_show').html('<table class="table table-bordered table-striped table-hover table_setting dataTable" width="100%"></table>');
        $('.table_setting').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", "width": "1%"},
                {title: "รหัสบัตรประชาชน", "width": "16%"},
                {title: "ชื่อ-สกุล"},
                {title: "ตำแหน่ง"},
                {title: "กลุ่ม"},
                {title: "สถานะ"},
                {title: "...", "width": "12%"},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('link'));
                $(nRow).css('cursor', 'pointer');
            }
        });
    }
    function addUser(AUSER) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "check_user_personnal", [split($('#card_id').val())], true, function (result) {
            if (result == '0') {
                $('#error-cardId').fadeOut();
                cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_data_profile", [split($('#card_id').val())], true, function (data) {
                    if (data != '') {
                        if ($('#password').val() == $('#ch_password').val()) {
                            var array = [];
                            var status = 0;
                            if ($('#status').is(':checked')) {
                                status = 1;
                            }
                            array.push(data[0].pro_id, split($('#card_id').val()), $('#nameuser').val(), $('#lastname').val(), split($('#tel').val()), $('#email').val()
                                    , $('#pos_id').val(), $('#class_id').val(), $('#dep_id').val(), $('#username').val(), $('#password').val()
                                    , $('#level').val(), status, name, formatDateToday(), name, formatDateToday());
                            cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", AUSER, array, true, function (data) {
                                show_setting();
                                swal("บันทึกสำเร็จ!", "บันทึกข้อมูลผู้ใช้งานเเล้ว", "success");
                                $('#addUser').modal('hide');
                            });
                        } else {
                            $('#password-error').html('<label  class="error">รหัสผ่านไม่ตรงกัน</label>').addClass('form-line focused error');
                            $('#password-error').fadeIn(100);
                            $('#ch-password-error').html('<label class="error">รหัสผ่านไม่ตรงกัน</label>').addClass('form-line focused error');
                            $('#ch-password-error').fadeIn(100);
                        }
                    } else {
                        $('#nameuser').val('');
                        $('#lastname').val('');
                        $("#pos_id  option[value='']").prop("selected", true);
                        $("#pos_id").select2();
                        $("#class_id  option[value='']").prop("selected", true);
                        $("#class_id").select2();
                        $('#error-cardId').fadeIn();
                        $('#error-cardId').html('<label class="error">ไม่มีข้อมูลในระบบ</label>').addClass('form-line focused error');
                    }
                });
            } else {
                alert('55555');
                $('#nameuser').val('');
                $('#lastname').val('');
                $("#pos_id  option[value='']").prop("selected", true);
                $("#pos_id").select2();
                $("#class_id  option[value='']").prop("selected", true);
                $("#class_id").select2();
                $('#error-cardId').fadeIn();
                $('#error-cardId').html('<label class="error">มีข้อมูลอยู่ในระบบเเล้ว</label>').addClass('form-line focused error');
            }
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
                        $("#class_idE").append('<option selected="selected" value="' + data2[i].class_id + '">' + data2[i].class_name + '</opition>');
                    } else {
                        $("#class_idE").append('<option value="' + data2[i].class_id + '">' + data2[i].class_name + '</opition>');
                    }
                });
                $('#class_idE').select2();
            });
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_department", "", true, function (data2) {
                $('#dep_idE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i) {
                    if (data[0].dep_id == data2[i].dep_id) {
                        $("#dep_idE").append('<option selected="selected" value="' + data2[i].dep_id + '">' + data2[i].dep_name + '</opition>');
                    } else {
                        $("#dep_idE").append('<option value="' + data2[i].dep_id + '">' + data2[i].dep_name + '</opition>');
                    }
                });
                $('#dep_idE').select2();
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
            $('#pro_id').val(data[0].pro_id);
        });
    }

    function slUserDetail(data) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", 'SLUSER', [$(data).attr("id")], true, function (data) {
            $('#card_idD').html(cardID(data[0].card_id));
            $('#nameuserD').html(data[0].nameuser);
            $('#lastnameD').html(data[0].lastname);
            $('#telD').html(mobileNum(data[0].tel));
            $('#emailD').html(data[0].email);
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_position", "", true, function (data2) {
                $.each(data2, function (i) {
                    if (data[0].pos_id == data2[i].pos_id) {
                        $('#pos_idD').html(data2[i].pos_name);
                    }
                });
            });
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_class", "", true, function (data2) {
                $.each(data2, function (i) {
                    if (data[0].class_id == data2[i].class_id) {
                        $('#class_idD').html(data2[i].class_name);
                    }
                });
            });
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_department", "", true, function (data2) {
                $.each(data2, function (i) {
                    if (data[0].dep_id == data2[i].dep_id) {
                        $('#dep_idD').html(data2[i].dep_name);
                    }
                });
            });
            $('#usernameD').html(data[0].username);
            $('#passwordD').html(data[0].password);
            $('#person_create').html(data[0].person_create);
            $('#date_create').html(data[0].date_create);
            $('#person_update').html(data[0].person_update);
            $('#date_update').html(data[0].date_update);

            if (data[0].level == '0') {
                $('#levelD').html('ผู้ใช้ทั่วไป');
                if (data[0].status == '1') {
                    $('#statusD').prop('checked', true);
                } else {
                    $('#statusD').prop('checked', false);
                }
            } else {
                $('#levelD').html('แอดมิน');
                if (data[0].status == '1') {
                    $('#statusD').prop('checked', true);
                } else {
                    $('#statusD').prop('checked', false);
                }
            }
        });
    }

    function editUser(EUSER) {
        var array = [];
        var status = 0;
        if ($('#statusE').is(':checked')) {
            status = 1;
        }
        array.push(split($('#card_idE').val()), $('#nameuserE').val(), $('#lastnameE').val(), split($('#telE').val()), $('#emailE').val()
                , $('#pos_idE').val(), $('#class_idE').val(), $('#dep_idE').val(), $('#usernameE').val(), $('#passwordE').val()
                , $('#levelE').val(), status, name, formatDateToday(), $('#member_id').val(), $('#pro_id').val());
        cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", EUSER, array, true, function (data) {
            if (proID == $('#pro_id').val()) {
                var name = $('#nameuserE').val() + ' ' + $('#lastnameE').val();
                var card_id = $('#card_idE').val();
                var class_id = $('#class_idE').val();
                var pos_id = $('#pos_idE').val();
                var dep_id = $('#dep_idE').val();
                $.post("../../PS_mainpage/personnal/main_personnal.php", {ch_new: 'new', name: name, card_id: card_id, class_id: class_id, pos_id: pos_id, dep_id: dep_id, lvb_id: lvb_id}, function (result) {
                    show_setting();
                    swal("แก้ไขสำเร็จ!", "ข้อมูลผู้ใช้งาน อัพเดทเเล้ว", "success");
                    $('#editUser').modal('hide');
                });
            } else {
                show_setting();
                swal("แก้ไขสำเร็จ!", "ข้อมูลผู้ใช้งาน อัพเดทเเล้ว", "success");
                $('#editUser').modal('hide');
            }
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

    function importUser(IMUSER) {
        var myFile = $('#fileUser').prop('files')[0];
        var form_data = new FormData();
        form_data.append('fileUser', myFile);
        $.ajax({
            url: '../../PS_processDB/personnal/per_manageSetting.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data == '1') {
                    show_setting();
                    swal("บันทึกสำเร็จ!", "ข้อมูลผู้ใช้งาน บันทึกในระบบเเล้ว", "success");
                    $('#importUser').modal('hide');
                    $('#show_fileUser').html('ยังไม่ได้เลือกไฟล์');
                }
                if (data == '2') {
                    $('#show_fileUser').html('รูปแบบไฟล์ผิดพลาด *').css("color", "red");
                }
                if (data == '0') {
                    $('#show_fileUser').html('ยังไม่ได้เลือกไฟล์ *').css("color", "red");
                }
            }
        });
    }

    function check_cardId() {
        if ($('#card_id').val().replace(/\D/g, "").length == 13) {
            cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "check_user_personnal", [split($('#card_id').val())], true, function (result) {
                if (result == '0') {
                    cls.GetJSON("../../PS_processDB/personnal/per_manageSetting.php", "sl_data_profile", [split($('#card_id').val())], true, function (data) {
                        if (data != '') {
                            $('#error-cardId').fadeOut();
                            $('#nameuser').val(data[0].pro_fname);
                            $('#lastname').val(data[0].pro_lname);
                            $("#pos_id  option[value=" + data[0].pos_id + "]").prop("selected", true);
                            $("#pos_id").select2();
                            $("#class_id  option[value=" + data[0].class_id + "]").prop("selected", true);
                            $("#class_id").select2();
                            $("#dep_id  option[value=" + data[0].dep_id + "]").prop("selected", true);
                            $("#dep_id").select2();
                        } else {
                            $('#nameuser').val('');
                            $('#lastname').val('');
                            $("#pos_id  option[value='']").prop("selected", true);
                            $("#pos_id").select2();
                            $("#class_id  option[value='']").prop("selected", true);
                            $("#class_id").select2();
                            $("#dep_id  option[value='']").prop("selected", true);
                            $("#dep_id").select2();
                            $('#error-cardId').fadeIn();
                            $('#error-cardId').html('<label class="error">ไม่มีข้อมูลในระบบ</label>').addClass('form-line focused error');
                        }
                    });
                } else {
                    $('#nameuser').val('');
                    $('#lastname').val('');
                    $("#pos_id  option[value='']").prop("selected", true);
                    $("#pos_id").select2();
                    $("#class_id  option[value='']").prop("selected", true);
                    $("#class_id").select2();
                    $("#dep_id  option[value='']").prop("selected", true);
                    $("#dep_id").select2();
                    $('#error-cardId').fadeIn();
                    $('#error-cardId').html('<label class="error">มีข้อมูลอยู่ในระบบแล้ว</label>').addClass('form-line focused error');
                }
            });
        } else {
            $('#nameuser').val('');
            $('#lastname').val('');
            $("#pos_id  option[value='']").prop("selected", true);
            $("#pos_id").select2();
            $("#class_id  option[value='']").prop("selected", true);
            $("#class_id").select2();
            $("#dep_id  option[value='']").prop("selected", true);
            $("#dep_id").select2();
            $('#error-cardId').fadeOut(100);
        }
    }
</script>