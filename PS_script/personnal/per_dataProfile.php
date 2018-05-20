<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var name = '<?= $_SESSION["name"]; ?>';
    var pro_id = '<?= $_SESSION["pro_id"]; ?>';
    var get_id = '<?= $_GET['id']; ?>';
    var dataID = '';
    var i = 1;
    $(function () {
        if (get_id == '') {
            dataID = pro_id;
        } else {
            dataID = get_id;
        }
        $.datetimepicker.setLocale('th');
        $("#blame_date").datetimepicker({
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

        $("#chName_date").datetimepicker({
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

        $("#hissv_date").datetimepicker({
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

        $("#hissvp_date").datetimepicker({
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

        $("#hisas_date_start").datetimepicker({
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

        $("#hisas_date_end").datetimepicker({
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
        var setDateFuncE = function (ct, obj) {
            var minDateSet = formatDatePK($("#pro_dateInE").val());
            var maxDateSet = formatDatePK($("#pro_dateOutE").val());

            if ($(obj).attr("id") == "pro_dateInE") {
                this.setOptions({
                    minDate: false,
                    maxDate: maxDateSet ? maxDateSet : false
                })
            }
            if ($(obj).attr("id") == "pro_dateOutE") {
                this.setOptions({
                    maxDate: false,
                    minDate: minDateSet ? minDateSet : false
                })
            }
        }
        $("#pro_dateInE,#pro_dateOutE").datetimepicker($.extend(optsDate, {
            yearOffset: 543,
            lang: 'th',
            onShow: setDateFuncE,
            onSelectDate: setDateFuncE,
        }));

        show_chName();
        show_marry();
        show_heir();
        show_blame();
        show_education();
        show_hisService();
        show_hisSerSpecial();
        show_assignment();
        $('#hised_level').select2();
        $('#hised_year').select2();

        $('#address_province').change(function () {
            if ($('#address_province').val() != '') {
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", [$('#address_province').val()], true, function (data) {
                    $('#address_amphur').html('');
                    $('#address_amphur').html('<option value="">เลือก</opition>');
                    $.each(data, function (i) {
                        $("#address_amphur").append('<option value="' + data[i].AMPHUR_ID + '">' + data[i].AMPHUR_NAME + '</opition>');
                    });
                    $('#address_amphur').select2();
                });
            } else {
                $('#address_amphur').html('');
                $('#address_amphur').html('<option  value="">กรุณาเลือกจังหวัด</opition>');
                $('#address_district').html('');
                $('#address_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
                $('#address_zip_code').val('');
            }
        });
        $('#address_amphur').change(function () {
            if ($('#address_amphur').val() != '') {
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_district", [$('#address_amphur').val()], true, function (data) {
                    $('#address_district').html('');
                    $('#address_district').html('<option value="">เลือก</opition>');
                    $.each(data, function (i) {
                        $("#address_district").append('<option value="' + data[i].DISTRICT_ID + '">' + data[i].DISTRICT_NAME + '</opition>');
                    });
                    $('#address_district').select2();
                });
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", ['get_code', $('#address_amphur').val()], true, function (data) {
                    if (data.length != '0') {
                        $('#address_zip_code').val(data[0].POSTCODE);
                    } else {
                        $('#address_zip_code').val('');
                    }
                });
            } else {
                $('#address_district').html('');
                $('#address_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
                $('#address_zip_code').val('');
            }
        });

        $('#pread_province').change(function () {
            if ($('#pread_province').val() != '') {
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", [$('#pread_province').val()], true, function (data) {
                    $('#pread_amphur').html('');
                    $('#pread_amphur').html('<option value="">เลือก</opition>');
                    $.each(data, function (i) {
                        $("#pread_amphur").append('<option value="' + data[i].AMPHUR_ID + '">' + data[i].AMPHUR_NAME + '</opition>');
                    });
                    $('#pread_amphur').select2();
                });
            } else {
                $('#pread_amphur').html('');
                $('#pread_amphur').html('<option  value="">กรุณาเลือกจังหวัด</opition>');
                $('#pread_district').html('');
                $('#pread_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
                $('#pread_zip_code').val('');
            }
        });
        $('#pread_amphur').change(function () {
            if ($('#pread_amphur').val() != '') {
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_district", [$('#pread_amphur').val()], true, function (data) {
                    $('#pread_district').html('');
                    $('#pread_district').html('<option value="">เลือก</opition>');
                    $.each(data, function (i) {
                        $("#pread_district").append('<option value="' + data[i].DISTRICT_ID + '">' + data[i].DISTRICT_NAME + '</opition>');
                    });
                    $('#pread_district').select2();
                });
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", ['get_code', $('#pread_amphur').val()], true, function (data) {
                    if (data.length != '0') {
                        $('#pread_zip_code').val(data[0].POSTCODE);
                    } else {
                        $('#pread_zip_code').val('');
                    }
                });
            } else {
                $('#pread_district').html('');
                $('#pread_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
                $('#pread_zip_code').val('');
            }
        });

        $('#check_addr').click(function () {
            if (document.getElementById('check_addr').checked) {
//                if ($('#address_number').val() != '') {
                $('#pread_number').val($('#address_number').val());
                $('#pread_swine').val($('#address_swine').val());
                $('#pread_soi').val($('#address_soi').val());
                $('#pread_road').val($('#address_road').val());
                $('#pread_village').val($('#address_village').val());
                $('#pread_province option[value="' + $('#address_province').val() + '"]').prop('selected', true);
                $('#pread_province').select2();
                $('#pread_zip_code').val($('#address_zip_code').val());
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", [$('#address_province').val()], true, function (data) {
                    $('#pread_amphur').html('');
                    $('#pread_amphur').html('<option value="">เลือก</opition>');
                    $.each(data, function (i) {
                        $("#pread_amphur").append('<option value="' + data[i].AMPHUR_ID + '">' + data[i].AMPHUR_NAME + '</opition>');
                    });
                    $('#pread_amphur option[value="' + $('#address_amphur').val() + '"]').prop('selected', true);
                    $('#pread_amphur').select2();
                });
                if ($('#address_amphur').val() != '') {
                    cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_district", [$('#address_amphur').val()], true, function (data) {
                        $('#pread_district').html('');
                        $('#pread_district').html('<option value="">เลือก</opition>');
                        $.each(data, function (i) {
                            $("#pread_district").append('<option value="' + data[i].DISTRICT_ID + '">' + data[i].DISTRICT_NAME + '</opition>');
                        });
                        $('#pread_district option[value="' + $('#address_district').val() + '"]').prop('selected', true);
                        $('#pread_district').select2();
                    });
                } else {
                    $('#pread_district').html('');
                    $('#pread_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
                }
                $('#pread_call').val($('#address_call').val());
                $('#pread_fhone').val($('#address_fhone').val());
//                } else {
//                    $('#pread_amphur').html('');
//                    $('#pread_amphur').html('<option  value="">กรุณาเลือกจังหวัด</opition>');
//                    $('#pread_district').html('');
//                    $('#pread_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
//                }
            } else {
                $('#pread_number').val('');
                $('#pread_swine').val('');
                $('#pread_soi').val('');
                $('#pread_road').val('');
                $('#pread_village').val('');
                $('#pread_province option[value=""]').prop('selected', true);
                $('#pread_province').select2();
                $('#pread_amphur').html('');
                $('#pread_amphur').html('<option  value="">กรุณาเลือกจังหวัด</opition>');
                $('#pread_district').html('');
                $('#pread_district').html('<option  value="">กรุณาเลือกอำเภอ</opition>');
                $('#pread_zip_code').val('');
                $('#pread_call').val('');
                $('#pread_fhone').val('');
            }
        });

        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_address", [dataID], true, function (data) {
//            console.log(data);
            if (data != 0) {
                $('#address_number').val(data[0].address_number);
                $('#address_swine').val(data[0].address_swine);
                $('#address_soi').val(data[0].address_soi);
                $('#address_road').val(data[0].address_road);
                $('#address_village').val(data[0].address_village);
                $('#address_province option[value="' + data[0].address_province + '"]').prop('selected', true);
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", [data[0].address_province], true, function (data2) {
                    $('#address_amphur').html('');
                    $('#address_amphur').html('<option value="">เลือก</opition>');
                    $.each(data2, function (i) {
                        $("#address_amphur").append('<option value="' + data2[i].AMPHUR_ID + '">' + data2[i].AMPHUR_NAME + '</opition>');
                    });
                    $('#address_amphur option[value="' + data[0].address_amphur + '"]').prop('selected', true);
                    $('#address_amphur').select2();
                });
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_district", [data[0].address_amphur], true, function (data2) {
                    $('#address_district').html('');
                    $('#address_district').html('<option value="">เลือก</opition>');
                    $.each(data2, function (i) {
                        $("#address_district").append('<option value="' + data2[i].DISTRICT_ID + '">' + data2[i].DISTRICT_NAME + '</opition>');
                    });
                    $('#address_district option[value="' + data[0].address_district + '"]').prop('selected', true);
                    $('#address_district').select2();
                });
                $('#address_zip_code').val(data[0].address_zip_code);
                $('#address_call').val(data[0].address_call);
                $('#address_fhone').val(data[0].address_fhone);

                $('#pread_number').val(data[0].pread_number);
                $('#pread_swine').val(data[0].pread_swine);
                $('#pread_soi').val(data[0].pread_soi);
                $('#pread_road').val(data[0].pread_road);
                $('#pread_village').val(data[0].pread_village);
                $('#pread_province option[value="' + data[0].pread_province + '"]').prop('selected', true);
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_amphur", [data[0].pread_province], true, function (data2) {
                    $('#pread_amphur').html('');
                    $('#pread_amphur').html('<option value="">เลือก</opition>');
                    $.each(data2, function (i) {
                        $("#pread_amphur").append('<option value="' + data2[i].AMPHUR_ID + '">' + data2[i].AMPHUR_NAME + '</opition>');
                    });
                    $('#pread_amphur option[value="' + data[0].pread_amphur + '"]').prop('selected', true);
                    $('#pread_amphur').select2();
                });
                cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_district", [data[0].pread_amphur], true, function (data2) {
                    $('#pread_district').html('');
                    $('#pread_district').html('<option value="">เลือก</opition>');
                    $.each(data2, function (i) {
                        $("#pread_district").append('<option value="' + data2[i].DISTRICT_ID + '">' + data2[i].DISTRICT_NAME + '</opition>');
                    });
                    $('#pread_district option[value="' + data[0].pread_district + '"]').prop('selected', true);
                    $('#pread_district').select2();
                });
                $('#pread_zip_code').val(data[0].pread_zip_code);
                $('#pread_call').val(data[0].pread_call);
                $('#pread_fhone').val(data[0].pread_fhone);
            }
            $('#address_province').select2();
            $('#address_amphur').select2();
            $('#address_district').select2();
            $('#pread_province').select2();
        });

        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_data_geninfo", [dataID], true, function (data) {
            if (data != 0) {
                $('#gen_prefix option[value="' + data[0].gen_prefix + '"]').prop('selected', true);
                $('#gen_old').val(data[0].gen_old);
                $('#PROVINCE_ID option[value="' + data[0].PROVINCE_ID + '"]').prop('selected', true);
                $('#nationality_id option[value="' + data[0].nationality_id + '"]').prop('selected', true);
                $('#nationality_id_race option[value="' + data[0].nationality_id_race + '"]').prop('selected', true);
                $('#religion_id option[value="' + data[0].religion_id + '"]').prop('selected', true);
                $('#gen_blood option[value="' + data[0].gen_blood + '"]').prop('selected', true);
                $('#gen_soldier option[value="' + data[0].gen_soldier + '"]').prop('selected', true);
                $('#gen_tax').val(data[0].gen_tax);
                $('#gen_passport').val(data[0].gen_passport);
                $('#bank_id option[value="' + data[0].bank_id + '"]').prop('selected', true);
                $('#gen_account_number').val(data[0].gen_account_number);
                $('#gen_email').val(data[0].gen_email);
                $('#gen_facebook').val(data[0].gen_facebook);
                $('#gen_twitter').val(data[0].gen_twitter);
                $('#gen_line').val(data[0].gen_line);
                $('#gen_talent').val(data[0].gen_talent);
                $('#gen_interest').val(data[0].gen_interest);
                $('#expert_name').val(data[0].expert_name);
                $('#expert_ex').val(data[0].expert_ex);
            }
            $('#gen_prefix').select2();
            $('#PROVINCE_ID').select2();
            $('#nationality_id').select2();
            $('#nationality_id_race').select2();
            $('#religion_id').select2();
            $('#gen_blood').select2();
            $('#gen_soldier').select2();
            $('#bank_id').select2();
        });

        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "SLEPS", [dataID], true, function (data) {
            $('#imgSE').attr('src', data[0].pro_picture);
            $('#person_imgE').attr('href', data[0].pro_picture);
            $('#pro_id').val(data[0].pro_id);
            $('#card_idE').val(data[0].card_id);
            $('#gen_card_id').val(data[0].card_id);
            $('#pro_idposE').val(data[0].pro_idpos);
            $('#pro_fnameE').val(data[0].pro_fname);
            $('#gen_fname').val(data[0].pro_fname);
            $('#pro_lnameE').val(data[0].pro_lname);
            $('#gen_lname').val(data[0].pro_lname);
            $('#pro_nicknameE').val(data[0].pro_nickname);
            $('#gen_nickname').val(data[0].pro_nickname);
            $("#pro_sexE input[name=group1E][value='" + data[0].pro_sex + "']").prop("checked", true);
            $('#gen_sex option[value="' + data[0].pro_sex + '"]').prop('selected', true);
            $('#gen_sex').select2();
            $("#pro_statusE input[name=group2E][value='" + data[0].pro_status + "']").prop("checked", true);
            $('#gen_status option[value="' + data[0].pro_status + '"]').prop('selected', true);
            $('#gen_status').select2();
            $('#pro_salaryE').val(parseInt(data[0].pro_salary));
            $('#pro_birthdayE').val(formatDateShow(data[0].pro_birthday));
            $('#gen_birthday').val(formatDateShow(data[0].pro_birthday));
            $('#pro_dateInE').val(formatDateShow(data[0].pro_dateIn));
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
    );
    $(document).find("#pro_pictureE").change(function () {
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
    function back() {
        window.location.href = '../../PS_mainpage/personnal/person_addData.php';
//        window.history.back();
    }

    function keyupCardId() {
        $('#gen_card_id').val($('#card_idE').val());
    }
    function keyupFname() {
        $('#gen_fname').val($('#pro_fnameE').val());
    }
    function keyupLname() {
        $('#gen_lname').val($('#pro_lnameE').val());
    }
    function keyupNickname() {
        $('#gen_nickname').val($('#pro_nicknameE').val());
    }
    function changeSex() {
        $('#gen_sex option[value=' + $('input[name=group1E]:checked', '#pro_sexE').val() + ']').prop('selected', true);
        $('#gen_sex').select2();
    }
    function changeStatus() {
        $('#gen_status option[value=' + $('input[name=group2E]:checked', '#pro_statusE').val() + ']').prop('selected', true);
        $('#gen_status').select2();
    }
    function changeBirthday() {
        $('#gen_birthday').val($('#pro_birthdayE').val());
    }
    function show_chName() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_chName", [dataID], true, table_chName);
    }
    function show_marry() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_marry", [dataID], true, table_marry);
    }
    function show_heir() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_heir", [dataID], true, table_heir);
    }
    function show_blame() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_blame", [dataID], true, table_blame);
    }
    function show_education() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_edu", [dataID], true, table_education);
    }
    function show_hisService() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_hisService", [dataID], true, table_hisService);
    }
    function show_hisSerSpecial() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_hisSerSpecial", [dataID], true, table_hisSerSpecial);
    }
    function show_assignment() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "sl_table_assignment", [dataID], true, table_assignment);
    }

    function table_chName(data) {
        $(".table_chName").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].chang_nameold, data[i].chang_namenew, DateThai(data[i].chang_date), '<center><img class="btn-delete" id="' + data[i].chang_id + '" onclick="javascript: delChName(this)"/></center>']);
        });
        $('#table_chName_show').html('<table class="table table-bordered table-striped table-hover table_chName dataTable" width="100%"></table>');
        $('.table_chName').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ชื่อ-สกุลเดิม"},
                {title: "ชื่อ-สกุลใหม่"},
                {title: "วันที่เปลี่ยน"},
                {title: "..."},
            ]
        });
    }
    function addChName(ACN) {
        var array = [];
        array.push($('#chName_old').val(), $('#chName_new').val(), formatDateDB($('#chName_date').val()), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", ACN, array, true, function (data) {
            $('#add_chName').removeClass('in');
            $('#add_chName').find('.btn-danger').trigger('click');
            show_chName();
            swal("บันทึกสำเร็จ!", "บันทึกประวัติการเปลี่ยนแปลงชื่อเรียบร้อยเเล้ว", "success");
        });
    }
    function delChName(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DCN", [$(data).attr("id")], true, function (data) {
                show_chName();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }

    function table_marry(data) {
        $(".table_marry").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].marry_name, data[i].marry_status, '<center><img class="btn-delete" id="' + data[i].marry_id + '" onclick="javascript: delMarry(this)"/></center>']);
        });
        $('#table_marry_show').html('<table class="table table-bordered table-striped table-hover table_marry dataTable" width="100%"></table>');
        $('.table_marry').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ชื่อ-สกุล"},
                {title: "ความสัมพันธ์"},
                {title: "..."},
            ]
        });
    }
    function addMarry(AMR) {
        var array = [];
        array.push($('#marry_name').val(), $('#marry_relationship').val(), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AMR, array, true, function (data) {
            $('#add_marry').removeClass('in');
            $('#add_marry').find('.btn-danger').trigger('click');
            show_marry();
            swal("บันทึกสำเร็จ!", "บันทึกประวัติการสมรสเรียบร้อยเเล้ว", "success");
        });
    }
    function delMarry(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DMR", [$(data).attr("id")], true, function (data) {
                show_marry();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }

    function table_heir(data) {
        $(".table_heir").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].heir_name, data[i].heir_relationship, '<center><img class="btn-delete" id="' + data[i].id_heir + '" onclick="javascript: delHeir(this)"/></center>']);
        });
        $('#table_heir_show').html('<table class="table table-bordered table-striped table-hover table_heir dataTable" width="100%"></table>');
        $('.table_heir').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ชื่อ-สกุล"},
                {title: "ความสัมพันธ์"},
                {title: "..."},
            ]
        });
    }
    function addHeir(AH) {
        var array = [];
        array.push($('#heir_name').val(), $('#heir_relationship').val(), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AH, array, true, function (data) {
            $('#add_heir').removeClass('in');
            $('#add_heir').find('.btn-danger').trigger('click');
            show_heir();
            swal("บันทึกสำเร็จ!", "บันทึกข้อมูลทายาทเรียบร้อยเเล้ว", "success");
        });
    }
    function delHeir(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DH", [$(data).attr("id")], true, function (data) {
                show_heir();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }

    function table_blame(data) {
        $(".table_blame").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].blame_name, data[i].blame_somename, DateThai(data[i].blame_date), '<center><img class="btn-delete" id="' + data[i].blame_id + '" onclick="javascript: delBlame(this)"/></center>']);
        });
        $('#table_blame_show').html('<table class="table table-bordered table-striped table-hover table_blame dataTable" width="100%"></table>');
        $('.table_blame').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ความผิด"},
                {title: "กรณีความผิด"},
                {title: "วันที่รับโทษ"},
                {title: "..."},
            ]
        });
    }
    function addBlame(AB) {
        var array = [];
        array.push($('#blame_mistake').val(), $('#blame_mistakeCase').val(), formatDateDB($('#blame_date').val()), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AB, array, true, function (data) {
            $('#add_blame').removeClass('in');
            $('#add_blame').find('.btn-danger').trigger('click');
            show_blame();
            swal("บันทึกสำเร็จ!", "บันทึกประวัติทางวินัยเรียบร้อยเเล้ว", "success");
        });
    }
    function delBlame(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DB", [$(data).attr("id")], true, function (data) {
                show_blame();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }
    function editPerson(EPS) {
//        var array = [];
//        array.push();
//        console.log(array);
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
                        , $('#class_idE').val(), $('#dep_idE').val(), $('#pro_salaryE').val(), formatDateDB($('#pro_dateInE').val()), formatDateDB($('#pro_dateOutE').val()), data, name, formatDateToday(), $('#pro_id').val(), $('#imgSE').attr('src')
                        , $('#gen_prefix').val(), $('#gen_old').val(), $('#PROVINCE_ID').val(), $('#nationality_id').val(), $('#nationality_id_race').val(), $('#religion_id').val(), $('#gen_blood').val()
                        , $('#gen_soldier').val(), $('#gen_tax').val(), $('#gen_passport').val(), $('#bank_id').val(), $('#gen_account_number').val(), $('#gen_email').val()
                        , $('#gen_facebook').val(), $('#gen_twitter').val(), $('#gen_line').val(), $('#gen_talent').val(), $('#gen_interest').val(), $('#expert_name').val(), $('#expert_ex').val(), dataID
                        , $('#address_number').val(), $('#address_swine').val(), $('#address_soi').val(), $('#address_road').val(), $('#address_village').val(), $('#address_province').val(), $('#address_amphur').val()
                        , $('#address_district').val(), $('#address_zip_code').val(), $('#address_call').val(), $('#address_fhone').val(), $('#pread_number').val(), $('#pread_swine').val(), $('#pread_soi').val(), $('#pread_road').val(), $('#pread_village').val(), $('#pread_province').val(), $('#pread_amphur').val()
                        , $('#pread_district').val(), $('#pread_zip_code').val(), $('#pread_call').val(), $('#pread_fhone').val());
                cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", EPS, array, true, function (result) {
                    swal({
                        title: "บันทึกข้อมูลสำเร็จ!",
                        text: "ข้อมูลของคุณ ถูกบันทึกลงระบบเเล้ว",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false,
                    }, function () {
                        if ((pro_id == get_id) || (get_id == '')) {
                            var name = $('#pro_fnameE').val() + ' ' + $('#pro_lnameE').val();
                            var card_id = $('#card_idE').val();
                            $.post("../../PS_mainpage/personnal/main_personnal.php", {ch_new: 'new', img: data, name: name, card_id: card_id}, function (result) {
                                window.location.reload(true);
                            });
                        } else {
                            window.location.reload(true);
                        }
                    });
                });
            }
        });
    }

    function table_education(data) {
        $(".table_education").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].edu_name, data[i].hised_background, data[i].hised_major, data[i].hised_address, data[i].hised_country, data[i].hised_year, '<center><img class="btn-delete" id="' + data[i].hised_id + '" onclick="javascript: delEdu(this)"/></center>']);
        });
        $('#table_education_show').html('<table class="table table-bordered table-striped table-hover table_education dataTable" width="100%"></table>');
        $('.table_education').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ระดับการศึกษา"},
                {title: "วุฒิการศึกษา"},
                {title: "วิชาเอก"},
                {title: "สถานศึกษา"},
                {title: "ประเทศ"},
                {title: "ปีจบ"},
                {title: "..."},
            ]
        });
    }
    $(".btn-aedu").click(function () {
        if (i < 10) {
            $('<div id="clone_edu' + i + '"><div class="row clearfix"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-control-label-l">\n\
                   <label >ระดับการศึกษา</label></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">\n\
                        <select class="form-control show-tick hised_level" style="width: 100%" data-live-search="true" id="hised_level' + i + '"></select>\n\
                </div>\n\
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-control-label-l">\n\
                    <label >ปีที่จบ</label></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">\n\
                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="hised_year' + i + '"></select>\n\
                </div></div>\n\
                \n\<div class="row clearfix"><div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l"><label >วุฒิการศึกษา</label></div><div class="col-lg-4 col-md-4 col-sm-8 col-xs-12"><div class="form-group"><div class="form-line"><input type="text" id="hised_background' + i + '" class="form-control" placeholder="กรอกวุฒิการศึกษา"></div></div></div><div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l"><label >วิชาเอก</label></div><div class="col-lg-4 col-md-4 col-sm-8 col-xs-12"><div class="form-group"><div class="form-line"><input type="text" id="hised_major' + i + '" class="form-control" placeholder="กรอกวิชาเอก"></div></div></div></div>\n\
                <div class="row clearfix"><div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l"><label >สถานศึกษา</label></div><div class="col-lg-4 col-md-4 col-sm-8 col-xs-12"><div class="form-group"><div class="form-line"><input type="text" id="hised_address' + i + '" class="form-control" placeholder="กรอกสถานศึกษา"></div></div></div><div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l"><label >ประเทศ</label></div><div class="col-lg-4 col-md-4 col-sm-8 col-xs-12"><div class="form-group"><div class="form-line"><input type="text" id="hised_country' + i + '" class="form-control" placeholder="กรอกประเทศ"></div></div></div></div>\n\
            </div>').appendTo($('.insert-edu')).slideDown("slow");

            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", 'sl_lv_edu', '', true, function (data) {
                $('#hised_level' + i).html('<option selected="selected" value="">เลือก</opition>');
                $.each(data, function (a) {
                    $('#hised_level' + i).append('<option value="' + data[a].edu_id + '">' + data[a].edu_name + '</opition>');
                });
                $('#hised_year' + i).html('<option selected="selected" value="">เลือก</opition>');
                for (var y = 2450; y <= 2600; y++) {
                    $('#hised_year' + i).append('<option value="' + y + '">' + y + '</opition>');
                }
                $('#hised_level' + i).select2();
                $('#hised_year' + i).select2();
                i++;
            });
        }

    });
    $(".btn-dedu").click(function () {
        if (i > 1) {
            i--;
        }
        $("#clone_edu" + i + "").remove();

    });
    function addEdu(AED) {
        var array = [];
        array.push($('#hised_level').val(), $('#hised_year').val(), $('#hised_background').val(), $('#hised_major').val(), $('#hised_address').val(), $('#hised_country').val(), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AED, array, true, function (data) {
            if (i > 1) {
                for (i; i > 1; i--) {
                    var p = i - 1;
                    var array2 = [];
                    array2.push($('#hised_level' + p).val(), $('#hised_year' + p).val(), $('#hised_background' + p).val(), $('#hised_major' + p).val(), $('#hised_address' + p).val(), $('#hised_country' + p).val(), dataID);
                    cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AED, array2, true, function (data) {
                        if (p == 1) {
                            show_education();
                            swal("บันทึกสำเร็จ!", "บันทึกประวัติการศึกษาเรียบร้อยเเล้ว", "success");
                        }
                    });
                    $("#clone_edu" + p + "").remove();
                }
            } else {
                show_education();
                swal("บันทึกสำเร็จ!", "บันทึกประวัติการศึกษาเรียบร้อยเเล้ว", "success");
            }
        });
    }
    function delEdu(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DED", [$(data).attr("id")], true, function (data) {
                show_education();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }

    function table_hisService(data) {
        $(".table_hisService").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].hissv_office, data[i].hissv_department, data[i].hissv_position, data[i].his_idpos, DateThai(data[i].hissv_date), data[i].hissv_salary, data[i].hissv_type, '<center><img class="btn-delete" id="' + data[i].hissv_id + '" onclick="javascript: delHisv(this)"/></center>']);
        });
        $('#table_hisService_show').html('<table class="table table-bordered table-striped table-hover table_hisService dataTable" width="100%"></table>');
        $('.table_hisService').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "กรม"},
                {title: "สังกัด"},
                {title: "ตำแหน่ง"},
                {title: "เลขที่ตำแหน่ง"},
                {title: "วันที่รับราชการ"},
                {title: "เงินเดือน"},
                {title: "ประเภท"},
                {title: "..."},
            ]
        });
    }

    function addHisv(AHISV) {
        var array = [];
        array.push($('#hissv_office').val(), $('#hissv_department').val(), $('#hissv_position').val(), $('#hissv_poscod').val(), formatDateDB($('#hissv_date').val()), $('#hissv_salary').val(), $('#hissv_type').val(), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AHISV, array, true, function (data) {
            $('#add_hisser').removeClass('in');
            $('#add_hisser').find('.btn-danger').trigger('click');
            show_hisService();
            swal("บันทึกสำเร็จ!", "บันทึกประวัติการรับราชการเรียบร้อยเเล้ว", "success");
        });
    }

    function delHisv(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DHISV", [$(data).attr("id")], true, function (data) {
                show_hisService();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }

    function table_hisSerSpecial(data) {
        $(".table_hisSerSpecial").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].hissvp_special, data[i].hissvp_topic, data[i].hissvp_code, DateThai(data[i].hissvp_date), data[i].hissvp_place, data[i].hissvp_note, '<center><img class="btn-delete" id="' + data[i].hissvp_id + '" onclick="javascript: delHisvp(this)"/></center>']);
        });
        $('#table_hisSerSpecial_show').html('<table class="table table-bordered table-striped table-hover table_hisSerSpecial dataTable" width="100%"></table>');
        $('.table_hisSerSpecial').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ราชการพิเศษ"},
                {title: "หัวข้อโครงการ"},
                {title: "เลขที่คำสั่ง"},
                {title: "วันที่รับคำสั่ง"},
                {title: "สถานที่"},
                {title: "หมายเหตุ"},
                {title: "..."},
            ]
        });
    }

    function addHisvp(AHISVP) {
        var array = [];
        array.push($('#hissvp_special').val(), $('#hissvp_topic').val(), $('#hissvp_code').val(), formatDateDB($('#hissvp_date').val()), $('#hissvp_place').val(), $('#hissvp_note').val(), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AHISVP, array, true, function (data) {
            $('#add_serSpecial').removeClass('in');
            $('#add_serSpecial').find('.btn-danger').trigger('click');
            show_hisSerSpecial();
            swal("บันทึกสำเร็จ!", "บันทึกประวัติการรับราชการพิเศษเรียบร้อยเเล้ว", "success");
        });
    }

    function delHisvp(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DHISVP", [$(data).attr("id")], true, function (data) {
                show_hisSerSpecial();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }

    function table_assignment(data) {
        $(".table_assignment").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].hisas_code, data[i].hisas_poscode, DateThai(data[i].hisas_date_start), DateThai(data[i].hisas_date_end), data[i].hisas_position, data[i].hisas_office, data[i].hisas_pile, data[i].hisas_type, '<center><img class="btn-delete" id="' + data[i].hisas_id + '" onclick="javascript: delHisas(this)"/></center>']);
        });
        $('#table_assignment_show').html('<table class="table table-bordered table-striped table-hover table_assignment dataTable" width="100%"></table>');
        $('.table_assignment').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", width: "1%"},
                {title: "เลขที่คำสั่ง", width: "13%"},
                {title: "เลขที่ตำแหน่ง", width: "13%"},
                {title: "วันที่เริ่ม", width: "15%"},
                {title: "วันที่สิ้นสุด", width: "18%"},
                {title: "ตำแหน่งสายงาน"},
                {title: "กรม"},
                {title: "สำนัก/กอง"},
                {title: "ประเภทการเคลื่อนไหว", width: "15%"},
                {title: "..."},
            ]
        });
    }

    function addHisas(AHISAS) {
        var array = [];
        array.push($('#hisas_code').val(), $('#hisas_poscode').val(), formatDateDB($('#hisas_date_start').val()), formatDateDB($('#hisas_date_end').val()), $('#hisas_position').val(), $('#hisas_office').val(), $('#hisas_pile').val(), $('#hisas_type').val(), dataID);
        cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", AHISAS, array, true, function (data) {
            $('#add_assignment').removeClass('in');
            $('#add_assignment').find('.btn-danger').trigger('click');
            show_assignment();
            swal("บันทึกสำเร็จ!", "บันทึกประวัติการรักษาราชการ มอบหมายงานเรียบร้อยเเล้ว", "success");
        });
    }

    function delHisas(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageDataProfile.php", "DHISAS", [$(data).attr("id")], true, function (data) {
                show_assignment();
                swal({
                    title: "ลบสำเร็จ!",
                    text: "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว",
                    timer: 1000,
                    imageUrl: "../../images/thumbs-up.png",
                    showConfirmButton: false
                });
            });
        });
    }
</script>