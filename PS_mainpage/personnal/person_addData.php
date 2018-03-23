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
                                    จัดการข้อมูลบุคลากร
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-xs-6">
                                        <button type="button" data-toggle="modal" data-target="#addPerson" class="btn btn-success waves-effect">
                                            <i class="material-icons">person_add</i>
                                            <span>เพิ่มข้อมูลบุคลากร</span>
                                        </button>
                                    </div>
                                    <div class="col-xs-6 align-right">
                                        <button type="button" data-toggle="modal" data-target="#" class="btn btn-primary waves-effect">
                                            <i class="material-icons">group_add</i>
                                            <span>นำเข้าข้อมูลบุคลากร</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <div id="table_profile_show"></div>
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
                                                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 align-center">
                                                                <div id="aniimated-thumbnials" class="list-unstyled">
                                                                    <a href="../../images/moon.jpg" id="zoom-img" data-sub-html="รูปประจำตัว">
                                                                        <center><img class="img-responsive" id="imgS" src="../../images/moon.jpg" style="max-height: 150px; max-width: 150px;"alt="User"></center>
                                                                    </a>
                                                                </div>
                                                                <label class="btn-file-upload ">
                                                                    <input type='file' id="pro_picture" />
                                                                    อัพโหลดรูปภาพ
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-7 col-xs-12" style="margin-bottom: 0px">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                    <label >เลขที่ตำแหน่ง</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="pro_idpos" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                    <label >คำนำหน้า</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 ">
                                                                    <select class="form-control show-tick" data-live-search="true" id="pro_prefix">
                                                                        <?php
                                                                        $cn = new management;
                                                                        $cn->con_db();
                                                                        echo '<option  value="">เลือก</opition>';
                                                                        $sql = "select * from ps_prefix ";
                                                                        $query = $cn->Connect->query($sql);
                                                                        while ($rs = mysqli_fetch_array($query)) {
                                                                            echo '<option  value="' . $rs['pf_name'] . '">' . $rs['pf_name'] . '</opition>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                    <label >ชื่อ</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="pro_fname" class="form-control" placeholder="กรอกชื่อ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                    <label >สกุล</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 form-control-label-l">
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input type="text" id="pro_lname" class="form-control" placeholder="กรอกนามสกุล">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >เลขบัตรประชาชน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="card_id" class="form-control" placeholder="กรอกเลขบัตรประชาชน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 form-control-label-l">
                                                            <label >ชื่อเล่น</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="pro_nickname" class="form-control" placeholder="กรอกชื่อเล่น">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 form-control-label-l">
                                                            <label >เพศ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 align-left form-control-radio" id="pro_sax">
                                                            <input name="group4" type="radio" value="1" id="sex_men" class="with-gap radio-col-purple" />
                                                            <label for="sex_men">ชาย</label>
                                                            <input name="group4" type="radio" value="2" id="sex_feman" class="with-gap radio-col-purple" />
                                                            <label for="sex_feman">หญิง</label>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 form-control-label-l">
                                                            <label >วันเดือนปีเกิด</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-9 col-xs-8" style="margin-bottom: 0px">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">date_range</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" id="pro_birthday" class="form-control date" placeholder="Ex: 30/07/2561">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >สถานะ</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-sm-9 col-xs-12 form-control-radio" id="pro_status">
                                                            <input name="group4" type="radio" id="status-alone" class="with-gap radio-col-purple" />
                                                            <label for="status-alone">โสด</label>
                                                            <input name="group4" type="radio" id="status-marry" class="with-gap radio-col-purple" />
                                                            <label for="status-marry">สมรส</label>
                                                            <input name="group4" type="radio" id="status-halt" class="with-gap radio-col-purple" />
                                                            <label for="status-halt">หย่า</label>
                                                            <input name="group4" type="radio" id="status-widow" class="with-gap radio-col-purple" />
                                                            <label for="status-widow">หม้าย</label>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ประเภท</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true" id="pro_type">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_type ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['type_id'] . '">' . $rs['type_name'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ตำแหน่ง</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true" id="pro_position">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_position ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['pos_code'] . '">' . $rs['pos_name'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ระดับ</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true" id="pro_level">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_level ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['lv_id'] . '">' . $rs['lv_name'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ตำแหน่งบริหาร</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true" id="pro_levelBoss">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_leveboss ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['lvb_id'] . '">' . $rs['lvb_name'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >กลุ่มงาน</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true" id="pro_class">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_class ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['code_class'] . '">' . $rs['name_class'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >สังกัด</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10t col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true" id="pro_depart">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_department ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['dep_code'] . '">' . $rs['dep_name'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >วันเข้ารับราชการ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-3 col-sm-9 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="pro_dateIn" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >วันเกษียณอายุ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-9 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="pro_dateOut" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-control-label-l">
                                                            <label >เงินเดือน</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">monetization_on</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="number" id="pro_salary" class="form-control" placeholder="กรุณาระบุจำนวนเงิน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 form-control-label-l">
                                                            <label class="font-bold col-red">*บาท</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addPerson('APS')">บันทึก</button>
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