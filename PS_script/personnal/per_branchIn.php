<script type="text/javascript">
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_table_inside", "", true, table_inside);
        $(document).on("click", ".table_inside tbody tr td:not(:last-child)", function () {
            var clickedBtnID = $(this).parent().attr('id'); // or var clickedBtnID = this.id
//                $('#addBnOut').parent().find('#off_number').addClass('off_number');
            cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_dataEdit_BnIn", [clickedBtnID], true, function (data) {
                $.each(data, function (i, k) {
                    $("#code_classE").val(data[i].code_class);
                    $("#name_classE").val(data[i].name_class);
                    $("#class_idE").val(data[i].class_id);
                });
                $("#editBnIn").modal("show");
            });
        });
    });
    function show_inside() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_table_inside", "", true, table_inside);
    }

    function table_inside(data) {
        $(".table_inside").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push([a, data[i].code_class, data[i].name_class, '<img class="btn-delete" id="' + data[i].class_id + '" onclick="javascript: delBnIn(this)"/>']);
        });
        $('#table_inside_show').html('<table class="table table-bordered table-striped table-hover table_inside dataTable" width="100%"></table>');
        $('.table_inside').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "รหัส"},
                {title: "ชื่อหน่วยงาน"},
                {title: "..."},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('id'));
                $(nRow).css('cursor', 'pointer');
            }
        });
    }
    function addBnIn(ADDBNIN) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", ADDBNIN, [$('#code_class').val(), $('#name_class').val()], true, function (data) {
            show_inside();
            swal("บันทึกสำเร็จ!", "ตำแหน่งใหม่พร้อมใช้งาน", "success");
            $('#addBnIn').modal('hide');
        });
    }
    function editBnIn(EBNIN) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", EBNIN, [$('#class_idE').val(), $('#code_classE').val(), $('#name_classE').val()], true, function (data) {
            show_inside();
            swal("แก้ไขสำเร็จ!", "ตำแหน่งของคุณ อัพเดทเเล้ว", "success");
            $('#editBnIn').modal('hide');
        });
    }
    function delBnIn(data) {
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "DELBNIN", [$(data).attr("id")], true, function (data) {
                show_inside();
                swal("ลบสำเร็จ!", "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว", "success");
            });
        });
    }
</script>