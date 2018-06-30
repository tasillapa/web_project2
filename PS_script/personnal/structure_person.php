<script>
    var class_id = '<?= $_GET["id"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/structure_classDB.php", "get_tructure_class", [class_id], true, function (data) {
//            console.log(data);
            var addd = [];
            var datascource = {
                'name': '<img class="logo-btn-trophy"/>',
                'title': '<b>' + data[0].pro_fname + '</b><br><span>adasdasdasdsadsad</span><br><span>adasdasdasdsadsad</span>'
//                'children': [
//                    {'name': 'Bo Miao', 'title': 'department manager', 'className': 'middle-level',
//                        'children': [
//                            {'name': 'Li Jing', 'title': 'senior engineer', 'className': 'product-dept'},
//                            {'name': 'Li Xin', 'title': 'senior engineer', 'className': 'product-dept',
//                                'children': [
//                                    {'name': 'To To', 'title': 'engineer', 'className': 'pipeline1'},
//                                    {'name': 'Fei Fei', 'title': 'engineer', 'className': 'pipeline1'},
//                                    {'name': 'Xuan Xuan', 'title': 'engineer', 'className': 'pipeline1'}
//                                ]
//                            }
//                        ]
//                    },
//                    {'name': 'Su Miao', 'title': 'department manager', 'className': 'middle-level',
//                        'children': [
//                            {'name': 'Pang Pang', 'title': 'senior engineer', 'className': 'rd-dept'},
//                            {'name': 'Hei Hei', 'title': 'senior engineer', 'className': 'rd-dept',
//                                'children': [
//                                    {'name': 'Xiang Xiang', 'title': 'UE engineer', 'className': 'frontend1'},
//                                    {'name': 'Dan Dan', 'title': 'engineer', 'className': 'frontend1'},
//                                    {'name': 'Zai Zai', 'title': 'engineer', 'className': 'frontend1'}
//                                ]
//                            }
//                        ]
//                    }
//                ]

            };
            $.each(datascource, function (key, value) {
                console.log(this, value, datascource[key]);
            });
            $('#chart-container').orgchart({
                'data': datascource,
                'nodeContent': 'title'
            });
        });
    });
</script>