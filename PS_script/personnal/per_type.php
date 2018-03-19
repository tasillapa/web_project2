<script type="text/javascript">
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_table_type", "", true, table_type);
        $(document).on("click", ".table_type tbody tr td:not(:last-child)", function () {
            var clickedBtnID = $(this).parent().attr('id'); // or var clickedBtnID = this.id
            cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_dataEdit_type", [clickedBtnID], true, function (data) {
                $.each(data, function (i, k) {
                    $("#type_nameE").val(data[i].type_name);
                    $("#type_idE").val(data[i].type_id)
                });
                $("#editType").modal("show");
            });
        });
    });
    function show_type() {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_table_type", "", true, table_type);
    }

    function table_type(data) {
        $(".table_type").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push([a, data[i].type_name, '<img class="btn-delete" id="' + data[i].type_id + '" onclick="javascript: delType(this)"/>']);
        });
        $('#table_type_show').html('<table class="table table-bordered table-striped table-hover table_type dataTable" width="100%"></table>');
        $('.table_type').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "ประเภท"},
                {title: "..."},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('id'));
                $(nRow).css('cursor', 'pointer');
            }
        });
    }
    function addType(ALV) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", ALV,[$('#type_name').val()], true, function (data) {
            show_type();
            swal("บันทึกสำเร็จ!", "ประเภทใหม่พร้อมใช้งาน", "success");
            $('#addType').modal('hide');
        });
    }
    function editType(ETYPE) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", ETYPE, [$('#type_idE').val(), $('#type_nameE').val()], true, function (data) {
            show_type();
            swal("แก้ไขสำเร็จ!", "ประเภทของคุณ อัพเดทเเล้ว", "success");
            $('#editType').modal('hide');
        });
    }
    function delType(data) { 
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
            cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "DTYPE", [$(data).attr("id")], true, function (data) {
                show_type();
                swal("ลบสำเร็จ!", "ข้อมูลของคุณถูกลบเรียบร้อยเเล้ว", "success");
            });
        });
    }
</script>