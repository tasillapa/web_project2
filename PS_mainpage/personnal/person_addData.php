<?php include 'main_personnal.php'; ?>
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
                        <li><a href="main_personnal.php"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="main_personnal.php"><i class="material-icons">assessment</i> จัดการบุคลากร</a></li>
                        <li  class="active font-bold col-cyan font-14"><i class="material-icons">library_books</i> จัดการข้อมูลบุคลากร</li>
                    </ol>
                </div>
                <!-- Input -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    จัดการข้อมูลบุคคลากร
                                </h2>
                            </div>
                            <div class="body">
                                <button type="button" data-toggle="modal" data-target="#addPerson" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add DataPerson -->
            <div class="modal fade" id="addPerson" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="addPersonLabel">เพิ่มข้อมูลบุคลากร</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="body">
                                            <div class="demo-masked-input">
                                                <form class="form-horizontal">
                                                    <div class="row clearfix">
                                                        <div class="image">
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 form-control-label" style="margin-bottom: 0px">
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-control-label">
                                                                        <label >เลขที่ตำแหน่ง</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="code_profile" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-control-label">
                                                                        <label >เลขบัตรประชาชน</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="g" class="form-control" placeholder="กรอกเลขบัตรประชาชน">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-control-label">
                                                                        <label >คำนำหน้า</label>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                                                        <label >ชื่อ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="f" class="form-control" placeholder="กรอกชื่อ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                                                        <label >สกุล</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="d" class="form-control" placeholder="กรอกนามสกุล">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-control-label">
                                                                        <label >ชื่อเล่น</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="nickname" class="form-control" placeholder="กรอกชื่อเล่น">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                                                        <label >เพศ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 align-left">
                                                                        <input name="group4" type="radio" id="sex_men" class="radio-col-pink" />
                                                                        <label for="sex_men">ชาย</label>
                                                                        <input name="group4" type="radio" id="sex_feman" class="radio-col-pink" />
                                                                        <label for="sex_feman">หญิง</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 align-center" >
                                                                <div id="aniimated-thumbnials" class="list-unstyled">
                                                                    <a href="../../images/moon.jpg" id="zoom-img" data-sub-html="รูปประจำตัว">
                                                                        <img class="img-responsive" id="imgS" src="../../images/moon.jpg" style="max-height: 150px; max-width: 150px;"alt="User">
                                                                    </a>
                                                                </div>
                                                                <label class="btn-file-upload align-center">
                                                                    <input type='file' id="upload-img" />
                                                                    อัพโหลดรูปภาพ
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 form-control-label">
                                                            <label >วันเดือนปีเกิด</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-bottom: 0px">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">date_range</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control date" placeholder="Ex: 30/07/2561">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                                            <label >สถานะ</label>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 align-left">
                                                            <input name="group4" type="radio" id="status-alone" class="radio-col-pink" />
                                                            <label for="status-alone">โสด</label>
                                                            <input name="group4" type="radio" id="status-marry" class="radio-col-pink" />
                                                            <label for="status-marry">สมรส</label>
                                                            <input name="group4" type="radio" id="status-halt" class="radio-col-pink" />
                                                            <label for="status-halt">หย่า</label>
                                                            <input name="group4" type="radio" id="status-widow" class="radio-col-pink" />
                                                            <label for="status-widow">หม้าย</label>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-control-label">
                                                            <label >คำนำหน้า</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary waves-effect">บันทึก</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Modal Add DataPerson -->
        </section>
        <?php include ("../../PS_script/personnal/per_addData.php"); ?>
    </body>
</html>