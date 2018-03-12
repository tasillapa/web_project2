<script type="text/javascript">
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "sl_table_inside", "", true, table_inside);
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
            dataSet.push([a, data[i].code_class, data[i].name_class, '<img class="btn-delete" id="' + data[i].id_class + '" onclick="javascript: delBnIn(this)"/>']);
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
            ]
        });
    }
    function addBnIn(ADDBNIN) {
        cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", ADDBNIN, [$('#code_class').val(), $('#name_class').val()], true, function (data) {
            show_inside();
            swal("บันทึกสำเร็จ!", "ตำแหน่งใหม่พร้อมใช้งาน", "success");
            $('#addBnIn').modal('hide');
        });
    }
    function delBnIn(data) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            cls.GetJSON("../../PS_processDB/personnal/per_manageBasic.php", "DELBNIN", [$(data).attr("id")], true, function (data) {
                show_inside();
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });
    }
</script>