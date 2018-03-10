<script type="text/javascript">
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../PS_processDB/per_manageBasic.php", "sl_table_inside", "", true, table_inside);
    });
    
    function table_inside(data) {
        $(".table_inside").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
          a++;
            dataSet.push([a, data[i].code_class, data[i].name_class, '<img src="../images/delete.png" width="25" height="25" />']);
        });
        $(function () {
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
        });
    }
</script>
