<script type="text/javascript">
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../PS_processDB/per_manageBasic.php", "sl_table_inside", "", true, table_inside);
    });
    function show() {
        cls.GetJSON("../PS_processDB/per_manageBasic.php", "sl_table_inside", "", true, table_inside);
    }
    ;
    function table_inside(data) {
        $(".table_inside").html('');
        var dataSet = [];
        var a = 0;
        var dd= [];
        console.log(data);
        
        $.each(data, function (i, k) {
            a++;
            dd.push(data[i].code_class);
            dataSet.push([a, data[i].code_class, data[i].name_class, '<img class="btn-delete" onclick="javascript: delDepart(' + dd[i] + ')"/>']);
        });
        $('#table_inside_show').html('<table class="table table-bordered table-striped table-hover table_inside dataTable"></table>');
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
    function addDepart(ADDEP) {
        cls.GetJSON("../PS_processDB/per_manageBasic.php", ADDEP, [$('#code_class').val(), $('#name_class').val()], true, function (data) {
            show();
            swal("บันทึกสำเร็จ!", "ตำแหน่งใหม่พร้อมใช้งาน", "success");
            $('#addDepart').modal('hide');
        });
    }
    function delDepart(id) {
        var num = id.toString();
        if (num.length == '1') {
            num = '000' + num;
        }
        if (num.length == '2') {
            num = '00' + num;
        }
        if (num.length == '3') {
            num = '0' + num;
        }
        alert(id);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            cls.GetJSON("../PS_processDB/per_manageBasic.php", "DELDEP", [num], true, function (data) {
                show();
            });
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });

    }
</script>