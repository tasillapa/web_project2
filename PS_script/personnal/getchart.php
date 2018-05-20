<script>
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/sup_db.php", "getYear", '', true, function (data) {
            var array = [];
            var array2 = [];
            $.each(data, function (i) {
                if (data[i].year != '543') {
                    array.push({label: data[i].year, value: data[i].num});
                    array2.push({x: data[i].year, y: data[i].num});
                }
            });
            getMorris('donut', 'donut_chart', array, array2);
            getMorris('bar', 'bar_chart', array, array2);
        });
        $('#datein').select2();
        $('#dateout').select2();
    });

    function getMorris(type, element, data, data2) {
        if (type === 'bar') {
            Morris.Bar({
                element: element,
                data: data2,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['จำนวนคน'],
                barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
            });
        } else if (type === 'donut') {
            Morris.Donut({
                element: element,
                data: data,
                colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
                formatter: function (y) {
                    return y + 'คน'
                }
            });
        }
    }
    function secdatein() {
        var e = document.getElementById("datein");
        var secdatein = e.options[e.selectedIndex].value;
        secdatein = secdatein - 543;
        if ($('#dateout').val() != '') {
            var max = '';
            var min = '';
            var secdateout = $('#dateout').val() - 543;
            if (secdateout > secdatein) {
                max = secdateout;
                min = secdatein;
            } else {
                max = secdatein;
                min = secdateout;
            }
            cls.GetJSON("../../PS_processDB/personnal/sup_db.php", "get_year_between", [max, min], true, function (data) {
                var array = [];
                var array2 = [];
                $.each(data, function (i) {
                    if (data[i].year != '543') {
                        array.push({label: data[i].year, value: data[i].num});
                        array2.push({x: data[i].year, y: data[i].num});
                    }
                });
                $('#donut_chart').html('');
                $('#bar_chart').html('');
                getMorris('donut', 'donut_chart', array, array2);
                getMorris('bar', 'bar_chart', array, array2);
            });
        } else {
            cls.GetJSON("../../PS_processDB/personnal/sup_db.php", "get_year", [secdatein], true, function (data) {
                var array = [];
                var array2 = [];
                $.each(data, function (i) {
                    if (data[i].year != '543') {
                        array.push({label: data[i].year, value: data[i].num});
                        array2.push({x: data[i].year, y: data[i].num});
                    }
                });
                $('#donut_chart').html('');
                $('#bar_chart').html('');
                getMorris('donut', 'donut_chart', array, array2);
                getMorris('bar', 'bar_chart', array, array2);
            });
        }
    }
    function secdateout() {
        var e = document.getElementById("dateout");
        var secdateout = e.options[e.selectedIndex].value;
        secdateout = secdateout - 543;
        if ($('#datein').val() != '') {
            var max = '';
            var min = '';
            var secdatein = $('#datein').val() - 543;
            if (secdateout > secdatein) {
                max = secdateout;
                min = secdatein;
            } else {
                max = secdatein;
                min = secdateout;
            }
            cls.GetJSON("../../PS_processDB/personnal/sup_db.php", "get_year_between", [max, min], true, function (data) {
                var array = [];
                var array2 = [];
                $.each(data, function (i) {
                    if (data[i].year != '543') {
                        array.push({label: data[i].year, value: data[i].num});
                        array2.push({x: data[i].year, y: data[i].num});
                    }
                });
                $('#donut_chart').html('');
                $('#bar_chart').html('');
                getMorris('donut', 'donut_chart', array, array2);
                getMorris('bar', 'bar_chart', array, array2);
            });
        } else {
            cls.GetJSON("../../PS_processDB/personnal/sup_db.php", "get_year", [secdateout], true, function (data) {
                var array = [];
                var array2 = [];
                $.each(data, function (i) {
                    if (data[i].year != '543') {
                        array.push({label: data[i].year, value: data[i].num});
                        array2.push({x: data[i].year, y: data[i].num});
                    }
                });
                $('#donut_chart').html('');
                $('#bar_chart').html('');
                getMorris('donut', 'donut_chart', array, array2);
                getMorris('bar', 'bar_chart', array, array2);
            });
        }
    }
</script>








