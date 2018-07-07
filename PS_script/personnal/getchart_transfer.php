
<script>

    $(function () {

        cls.GetJSON("../../PS_processDB/personnal/re_transfer.php", "getre_tran", '', true, function (data) {
            getMorris('donut', 'donut_chart', 'all', data);
            getMorris('bar', 'bar_chart', 'all', data);

            table_chart_all(data);
        });
        $('#idchoose').select2();
    });
//graph
    function getMorris(type, element, value, data) {

        var dataDonut = [];
        var dataBar = [];
        var In = 0;
        var Out = 0;
        var Lev = 0;
        $.each(data, function (i) {
            if (data[i].tran_status == '1') {
                Out++;
            } else if (data[i].tran_status == '2') {
                Lev++;
            } else {
                In++;
            }
        });
        if (value == 'all') {
            dataDonut.push({label: 'โอนย้านเข้า', value: In});
            dataDonut.push({label: 'โอนย้านออก', value: Out});
            dataDonut.push({label: 'ลาออก', value: Lev});
            dataBar.push({x: 'โอนย้านเข้า', y: In});
            dataBar.push({x: 'โอนย้านออก', y: Out});
            dataBar.push({x: 'ลาออก', y: Lev});
        } else if (value == '0') {
            dataDonut.push({label: 'โอนย้านเข้า', value: In});
            dataBar.push({x: 'โอนย้านเข้า', y: In});
        } else if (value == '1') {
            dataDonut.push({label: 'โอนย้านออก', value: Out});
            dataBar.push({x: 'โอนย้านออก', y: Out});
        } else if (value == '2') {
            dataDonut.push({label: 'ลาออก', value: Lev});
            dataBar.push({x: 'ลาออก', y: Lev});
        }

        if (type === 'bar') {
            Morris.Bar({
                element: element,
                data: dataBar,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['จำนวนคน'],
                barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
            });
        } else if (type === 'donut') {
            Morris.Donut({
                element: element,
                data: dataDonut,
                colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
                formatter: function (y) {
                    return y + 'คน'
                }
            });
        }
    }

    function choose(p) {
        cls.GetJSON("../../PS_processDB/personnal/re_transfer.php", "getre_tran", [$(p).val()], true, function (data) {
            $('#bar_chart').html('');
            $('#donut_chart').html('');
            if ($(p).val() == '0') {
                getMorris('donut', 'donut_chart', '0', data);
                getMorris('bar', 'bar_chart', '0', data);
                table_chart_income(data);
            } else if ($(p).val() == '1') {
                getMorris('donut', 'donut_chart', '1', data);
                getMorris('bar', 'bar_chart', '1', data);
                table_chart_outside(data);
            } else if ($(p).val() == '2') {
                getMorris('donut', 'donut_chart', '2', data);
                getMorris('bar', 'bar_chart', '2', data);
                table_chart_leave(data);
            } else {
                getMorris('donut', 'donut_chart', 'all', data);
                getMorris('bar', 'bar_chart', 'all', data);
                table_chart_all(data);
            }
        });
    }
    //ตาราง chart // 

    function table_chart_all(data) {

        $(".table_chart_show").html('');
        var dataSet = [];
        var a = 0;
        var type = '';
        var date = '';
        $.each(data, function (i, k) {
            a++;
            if (data[i].tran_status == '1') {
                type = 'โอนย้านออก';
                date = data[i].tran_date;
            } else if (data[i].tran_status == '2') {
                type = 'ลาออก';
                date = data[i].tran_date;
            } else {
                type = 'โอนย้ายเข้า';
                date = data[i].pro_date_create;
            }
            dataSet.push(['<center>' + a + '</center>', data[i].card_id, data[i].pro_prefix + data[i].pro_fname + ' ' + data[i].pro_lname, data[i].pos_name, data[i].class_name, type, DateThai(date)]);
        });
        $('#table_chart').html('<table class="table table-bordered table-striped table-hover table_chart_show dataTable" width="100%"></table>');
        $('.table_chart_show').DataTable({
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            },
            dom: 'Bfrtip',
            paging: true,
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", width: "1%"},
                {title: "เลขบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "ตำแหน่ง"},
                {title: "กลุ่มงาน"},
                {title: "ประเภท"},
                {title: "วันที่ทำเรื่อง"},
            ]
        });
    }
    function table_chart_income(data) {

        $(".table_chart_show").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].card_id, data[i].pro_prefix + '  ' + data[i].pro_fname + ' ' + data[i].pro_lname, data[i].pos_name, data[i].class_name, data[i].pro_transfer, DateThai(data[i].pro_date_create), ]);
        });
        $('#table_chart').html('<table class="table table-bordered table-striped table-hover table_chart_show dataTable" width="100%"></table>');
        $('.table_chart_show').DataTable({
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            },
            dom: 'Bfrtip',
            paging: true,
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", width: "1%"},
                {title: "เลขบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "ตำแหน่ง"},
                {title: "กลุ่มงาน"},
                {title: "ย้ายมาจาก"},
                {title: "วันที่ย้ายมา"},
            ]
        });
    }

    function table_chart_outside(data) {

        $(".table_chart_show").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].card_id, data[i].pro_prefix + '  ' + data[i].pro_fname + ' ' + data[i].pro_lname, data[i].pos_name, data[i].class_name, data[i].tran_note, data[i].tran_name, DateThai(data[i].tran_date), ]);
        });
        $('#table_chart').html('<table class="table table-bordered table-striped table-hover table_chart_show dataTable" width="100%"></table>');
        $('.table_chart_show').DataTable({
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            },
            dom: 'Bfrtip',
            paging: true,
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", width: "1%"},
                {title: "เลขบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "ตำแหน่ง"},
                {title: "กลุ่มงาน"},
                {title: "สาเหตุที่ย้าย"},
                {title: "ย้ายไปที่"},
                {title: "วันที่ย้าย"},
            ]
        });
    }

    function table_chart_leave(data) {
        $(".table_chart_show2").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            console.log(data[i].tran_date);
            a++;
            dataSet.push(['<center>' + a + '</center>', data[i].card_id, data[i].pro_prefix + '  ' + data[i].pro_fname + ' ' + data[i].pro_lname, data[i].pos_name, data[i].class_name, data[i].tran_note, DateThai(data[i].tran_date)]);
        });
        $('#table_chart').html('<table class="table table-bordered table-striped table-hover table_chart_show2 dataTable" width="100%"></table>');
        $('.table_chart_show2').DataTable({
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            },
            dom: 'Bfrtip',
            paging: true,
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ", width: "1%"},
                {title: "เลขบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "ตำแหน่ง"},
                {title: "กลุ่มงาน"},
                {title: "สาเหตุการลา"},
                {title: "วันที่ลา"},
            ]
        });
    }

</script>







