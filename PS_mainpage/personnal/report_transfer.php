
<?php include 'main_personnal.php'; ?>
<?php require_once '../../connect/connect_DB_personal.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 text-center>
                                    รายงานการโอนย้าย
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <select id="idchoose" class="form-control show-tick" style="width: 100%" data-live-search="true" onchange="choose(this)">

                                            <option value ="">เลือก</option>
                                            <option value ="0">การโอนย้ายเข้า</option>
                                            <option value ="1">การโอนย้ายออก</option>
                                            <option value ="2">ลาออก</option>

                                        </select> 
                                    </div>
                                </div>
                                <div class="body" style="center" >
                                    <div class="row clearfix align-center"> 
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="card align-center">
                                                <div class="header">
                                                    <h2>BAR CHART</h2>  
                                                </div>
                                                <div class="body">
                                                    <div id="bar_chart" class="graph"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="header align-center">
                                                    <h2>DONUT CHART</h2>
                                                </div>
                                                <div class="body">
                                                    <div id="donut_chart" class="graph"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <div id="table_chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <?php include_once("../../PS_script/personnal/getchart_transfer.php"); ?>

    </body>
</html>