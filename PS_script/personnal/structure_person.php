<script>
    var class_id = '<?= $_GET["id"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/structure_classDB.php", "get_tructure_class", [class_id], true, function (data) {
//            console.log(data);
            var boss = {};
            var j = 0;
            var ch_claim = 0;
            $.each(data, function (i, value) {
                if (data[i].lvb_claim == '0') {
                    boss = {
                        'name': '<center><div class="image m-t--15"><img class="img-responsive" src="' + data[0].pro_picture + '" style="height: 81px; width: 110px;"></div></center>',
                        'title': '<h5>' + data[0].pro_fname + ' ' + data[0].pro_lname + '</h5><span>' + data[0].lvb_name + '</span>',
                    };
                } else if (data[i].lvb_claim != '0') {
                    if (ch_claim < data[i].lvb_claim) {
                        ch_claim = data[i].lvb_claim;
                    }
                }
            });
            var dara = [
                {'name': '<center><div class="image m-t--15"><img class="img-responsive" src="' + data[1].pro_picture + '" style="height: 71px; width: 110px;"></div></center>', 'title': '<h5>' + data[1].pro_fname + ' ' + data[1].pro_lname + '</h5><span>' + data[1].type_name + '</span>'},
                {'name': '<center><div class="image m-t--15"><img class="img-responsive" src="' + data[2].pro_picture + '" style="height: 71px; width: 110px;"></div></center>', 'title': '<h5>' + data[2].pro_fname + ' ' + data[2].pro_lname + '</h5><span>' + data[2].type_name + '</span>'}
            ];
            var din = {
                'children': dara
            }

            let merged = {...boss, ...din};

            $('#chart-container').orgchart({
                'data': merged,
                'nodeContent': 'title'
            });
        });
    }
    );
</script>