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
                <div class="block-header">
                    <ol class="breadcrumb breadcrumb-col-orange">
                        <li><a href="../../PS_mainpage/personnal/person_DataProfile.php"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="../../PS_mainpage/personnal/person_DataProfile.php"><i class="material-icons">assessment</i> จัดการบุคลากร</a></li>
                        <li  class="active font-bold col-cyan font-14"><i class="material-icons">settings</i> ตั้งค่าสิทธิ์เข้าใช้งาน</li>
                    </ol>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ตั้งค่าสิทธิ์เข้าใช้งาน
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-xs-6">
                                        <button type="button" data-toggle="modal" data-target="#addUser" class="btn bg-deep-purple waves-effect">
                                            <i class="material-icons">person_add</i>
                                            <span>เพิ่มผู้ใช้งานระบบ</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <div id="table_setting_show"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
             <!-- Modal edit DataPerson -->
            <div class="modal fade" id="addUser" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="editPersonLabel">เพิ่มผู้ใช้งานระบบ</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="body">
                                            <div class="demo-masked-input">
                                                <form class="form-horizontal">
                                                    <div class="row clearfix">
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editPerson('EPS')">บันทึก</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Modal Edit DataPerson -->
        </section>
        <!-- Script -->
        <?php include ("../../PS_script/personnal/per_setting.php"); ?>
    </body>
</html>