<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var name = '<?= $_SESSION["name"]; ?>';
    $(function () {
        $('#show_filePerson').html('ยังไม่ได้เลือกไฟล์');
        $('#filePerson').change(function () {
            var myFile = $('#filePerson').prop('files')[0];
            $('#show_filePerson').html(myFile.name).css("color", "#777");
        });

        $(document).on("click", ".table_profile tbody tr td:not(:last-child)", function () {
            var clickedBtnID = $(this).parent().attr('id'); // or var clickedBtnID = this.id
//            alert(clickedBtnID);
            window.location.href = '../../PS_mainpage/personnal/person_DataProfile.php?id=' + clickedBtnID + '';
        });
        $.datetimepicker.setLocale('th');
        $("#pro_birthday").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            lang: 'th',
            yearOffset: 543,
            onSelectDate: function (dp, $input) {
                var yearT = new Date(dp).getFullYear() - 0;
                var yearTH = yearT + 543;
                var fulldate = $input.val();
                var fulldateTH = fulldate.replace(yearT, yearTH);
                $input.val(fulldateTH);
            },
        });

         var optsDate = {  
                    format: 'd/m/Y', // รูปแบบวันที่ 
                    formatDate: 'd/m/Y',
                    timepicker: false,   
                    closeOnDateSelect: true,
            }
        var setDateFunc = function (ct, obj) {
            var minDateSet = formatDatePK($("#pro_dateIn").val());
            var maxDateSet = formatDatePK($("#pro_dateOut").val());

            if ($(obj).attr("id") == "pro_dateIn") {
                this.setOptions({
                    minDate: false,
                    maxDate: maxDateSet ? maxDateSet : false
                })
            }
            if ($(obj).attr("id") == "pro_dateOut") {
                this.setOptions({
                    maxDate: false,
                    minDate: minDateSet ? minDateSet : false
                })
            }
        }
        $("#pro_dateIn,#pro_dateOut").datetimepicker($.extend(optsDate, {
            yearOffset: 543,
            onShow: setDateFunc,
            onSelectDate: setDateFunc,
        }));

        $("#pro_birthdayE").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            lang: 'th',
            yearOffset: 543,
            onSelectDate: function (dp, $input) {
                var yearT = new Date(dp).getFullYear() - 0;
                var yearTH = yearT + 543;
                var fulldate = $input.val();
                var fulldateTH = fulldate.replace(yearT, yearTH);
                $input.val(fulldateTH);
            },
        });
        $("#pro_dateInE").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            lang: 'th',
            yearOffset: 543,
            onSelectDate: function (dp, $input) {
                var yearT = new Date(dp).getFullYear() - 0;
                var yearTH = yearT + 543;
                var fulldate = $input.val();
                var fulldateTH = fulldate.replace(yearT, yearTH);
                $input.val(fulldateTH);
            },
        });
        $("#pro_dateOutE").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            lang: 'th',
            yearOffset: 543,
            onSelectDate: function (dp, $input) {
                var yearT = new Date(dp).getFullYear() - 0;
                var yearTH = yearT + 543;
                var fulldate = $input.val();
                var fulldateTH = fulldate.replace(yearT, yearTH);
                $input.val(fulldateTH);
            },
        });
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "sl_table_profile", "", true, table_profile);
        $('#pro_prefix').select2();
        $('#type_id').select2();
        $('#pos_id').select2();
        $('#lv_id').select2();
        $('#lvb_id').select2();
        $('#class_id').select2();
        $('#dep_id').select2();
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
            dataSet.push(['<center>' + a + '</center>', '<center>' + data[i].pro_idpos + '</center>', cardID(data[i].card_id), data[i].pro_prefix + data[i].pro_fname + ' ' + data[i].pro_lname, data[i].class_name, DateThai(data[i].pro_dateIn), '<img class="btn-detail" id="' + data[i].pro_id + '"/>' + ' ' + '<img class="btn-edit" id="' + data[i].pro_id + '" data-toggle="modal" data-target="#editPerson" onclick="javascript: slEdit(this)"/>' + ' ' + '<img class="btn-delete" id="' + data[i].pro_id + '" onclick="javascript: delProfile(this)"/>']);
        });
        $('#table_profile_show').html('<table class="table table-bordered table-striped table-hover table_profile dataTable" width="100%"></table>');
        $('.table_profile').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", "width": "1%"},
                {title: "เลขตำแหน่ง", "width": "1%"},
                {title: "รหัสบัตรประชาชน", "width": "16%"},
                {title: "ชื่อ-สกุล"},
                {title: "กลุ่มงาน"},
                {title: "วันเข้ารับราชการ", "width": "15%"},
                {title: "...", "width": "12%"},
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
                $('#person_img').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#editPerson').find("#pro_pictureE").change(function () {
        readURLProfileE(this);
    });
    function readURLProfileE(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgSE').attr('src', e.target.result);
                $('#person_imgE').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function addPerson(APS) {
        var Improfile = $('#pro_picture').prop('files')[0];
        var form_data_img = new FormData();
        form_data_img.append('Improfile', Improfile);
        $.ajax({
            url: '../../PS_processDB/personnal/per_managePerson.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data_img,
            type: 'post',
            success: function (data) {
                var array = [];
                array.push(split($('#card_id').val()), $('#pro_idpos').val(), $('input[name=group1]:checked', '#pro_sex').val(), $('#pro_prefix').val(), $('#pro_fname').val(), $('#pro_lname').val(), $('#pro_nickname').val()
                        , formatDateDB($('#pro_birthday').val()), $('input[name=group2]:checked', '#pro_status').val(), $('#pos_id').val(), $('#type_id').val(), $('#lvb_id').val(), $('#lv_id').val()
                        , $('#class_id').val(), $('#dep_id').val(), $('#pro_salary').val(), formatDateDB($('#pro_dateIn').val()), formatDateDB($('#pro_dateOut').val()), data, name, formatDateToday(), name, formatDateToday());
                cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", APS, array, true, function (data) {
                    show_profile()
                    swal("บันทึกสำเร็จ!", "บันทึกข้อมูลบุคลากรลงในระบบเเล้ว", "success");
                    $('#addPerson').modal('hide');
                });
            }
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
            $('#imgSE').attr('src', data[0].pro_picture);
            $('#person_imgE').attr('href', data[0].pro_picture);
            $('#pro_id').val(data[0].pro_id);
            $('#card_idE').val(data[0].card_id);
            $('#pro_idposE').val(data[0].pro_idpos);
            $('#pro_fnameE').val(data[0].pro_fname);
            $('#pro_lnameE').val(data[0].pro_lname);
            $('#pro_nicknameE').val(data[0].pro_nickname);
            $("#pro_sexE input[name=group1E][value='" + data[0].pro_sex + "']").prop("checked", true);
            $("#pro_statusE input[name=group2E][value='" + data[0].pro_status + "']").prop("checked", true);
            $('#pro_salaryE').val(parseInt(data[0].pro_salary));
//            $('#pro_birthdayE').val(formatDateShow(data[0].pro_birthday));
//            $('#pro_dateInE').val(formatDateShow(data[0].pro_dateIn));
            $('#pro_dateOutE').val(formatDateShow(data[0].pro_dateOut));
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "SLPF", [$(data).pro_prefix], true, function (data2) {
                $('#pro_prefixE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i, k) {
                    if (data[0].pro_prefix == data2[i].pf_name) {
                        $("#pro_prefixE").append('<option selected="selected" value="' + data2[i].pf_name + '">' + data2[i].pf_name + '</opition>');
                    } else {
                        $("#pro_prefixE").append('<option value="' + data2[i].pf_name + '">' + data2[i].pf_name + '</opition>');
                    }
                });
                $('#pro_prefixE').select2();
            });
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_type", "", true, function (data2) {
                $('#type_idE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i) {
                    if (data[0].type_id == data2[i].type_id) {
                        $("#type_idE").append('<option selected="selected" value="' + data2[i].type_id + '">' + data2[i].type_name + '</opition>');
                    } else {
                        $("#type_idE").append('<option value="' + data2[i].type_id + '">' + data2[i].type_name + '</opition>');
                    }
                });
                $('#type_idE').select2();
            });
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
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_level", "", true, function (data2) {
                $('#lv_idE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i) {
                    if (data[0].lv_id == data2[i].lv_id) {
                        $("#lv_idE").append('<option selected="selected" value="' + data2[i].lv_id + '">' + data2[i].lv_name + '</opition>');
                    } else {
                        $("#lv_idE").append('<option value="' + data2[i].lv_id + '">' + data2[i].lv_name + '</opition>');
                    }
                });
                $('#lv_idE').select2();
            });
            cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_levelBoss", "", true, function (data2) {
                $('#lvb_idE').html('<option  value="">เลือก</opition>');
                $.each(data2, function (i) {
                    if (data[0].lvb_id == data2[i].lvb_id) {
                        $("#lvb_idE").append('<option selected="selected" value="' + data2[i].lvb_id + '">' + data2[i].lvb_name + '</opition>');
                    } else {
                        $("#lvb_idE").append('<option value="' + data2[i].lvb_id + '">' + data2[i].lvb_name + '</opition>');
                    }
                });
                $('#lvb_idE').select2();
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
        });
    }
    function editPerson(EPSM) {
        var Improfile = $('#pro_pictureE').prop('files')[0];
        var form_data_img = new FormData();
        form_data_img.append('Improfile', Improfile);
        $.ajax({
            url: '../../PS_processDB/personnal/per_managePerson.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data_img,
            type: 'post',
            success: function (data) {
                var array = [];
                array.push(split($('#card_idE').val()), $('#pro_idposE').val(), $('input[name=group1E]:checked', '#pro_sexE').val(), $('#pro_prefixE').val(), $('#pro_fnameE').val(), $('#pro_lnameE').val(), $('#pro_nicknameE').val()
                        , formatDateDB($('#pro_birthdayE').val()), $('input[name=group2E]:checked', '#pro_statusE').val(), $('#pos_idE').val(), $('#type_idE').val(), $('#lvb_idE').val(), $('#lv_idE').val()
                        , $('#class_idE').val(), $('#dep_idE').val(), $('#pro_salaryE').val(), formatDateDB($('#pro_dateInE').val()), formatDateDB($('#pro_dateOutE').val()), data, name, formatDateToday(), $('#pro_id').val(), $('#imgSE').attr('src'));
                cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", EPSM, array, true, function (result) {
                    show_profile()
                    swal("แก้ไขสำเร็จ!", "ข้อมูลของคุณ อัพเดทเเล้ว", "success");
                    $('#editPerson').modal('hide');
//                    $.post("../../PS_mainpage/personnal/main_personnal.php", {ch_new: data}, function (result) {
////                         alert(result);
//                    });
                });
            }
        });

    }
    function importPerson(IMUSER) {
        var myFile = $('#filePerson').prop('files')[0];
        var form_data = new FormData();
        form_data.append('filePerson', myFile);
        $.ajax({
            url: '../../PS_processDB/personnal/per_managePerson.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                if (data == '1') {
                    show_profile();
                    swal("บันทึกสำเร็จ!", "ข้อมูลบุคลากร บันทึกในระบบเเล้ว", "success");
                    $('#importPerson').modal('hide');
                    $('#show_filePerson').html('ยังไม่ได้เลือกไฟล์');
                }
                if (data == '2') {
                    $('#show_filePerson').html('รูปแบบไฟล์ผิดพลาด *').css("color", "red");
                }
                if (data == '0') {
                    $('#show_filePerson').html('ยังไม่ได้เลือกไฟล์ *').css("color", "red");
                }
            }
        });
    }
</script>