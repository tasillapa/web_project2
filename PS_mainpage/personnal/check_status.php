<?php include 'main_personnal.php'; ?>
<?php require_once '../../connect/connect_DB_personal.php'; ?>
<html>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        การลาพักผ่อนประจำปี
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <div id="table_leaves_show"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </section>
        <?php include ("../../PS_script/personnal/leave_relax.php"); ?>
    </body>
</html>