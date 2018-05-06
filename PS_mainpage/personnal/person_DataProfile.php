<?php include 'main_personnal.php'; ?>
<?php
if (!isset($_GET['id'])) {
    $_GET['id'] = '';
}
?>
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
                        <li  class="active font-bold col-cyan font-14"><i class="material-icons">picture_in_picture</i> DashBoard</li>
                    </ol>
                </div>
                <!-- Tabs With Icon Title -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation">
                                        <a href="#personal-information" data-toggle="tab">
                                            <img class="logo-btn-personIn"/> 
                                            <span>ข้อมูลส่วนตัว</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="#general-information" data-toggle="tab">
                                            <img class="logo-btn-general"/> 
                                            <span>ข้อมูลทั่วไป</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#career-history" data-toggle="tab">
                                            <img class="logo-btn-address"/>
                                            <span>ข้อมูลที่อยู่</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#career-history" data-toggle="tab">
                                            <img class="logo-btn-education"/>
                                            <span>ประวัติการศึกษา</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#career-history" data-toggle="tab">
                                            <img class="logo-btn-hiswork"/>
                                            <span>ประวัติการทำงาน</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#portfolio" data-toggle="tab">
                                            <img class="logo-btn-trophy"/>
                                            <span>ผลงาน</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade" id="personal-information">
                                        <!-- ข้อมูลส่วนตัว -->
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
                                                                                <a href="../../images/moon.jpg" id="person_imgE" data-sub-html="รูปประจำตัว">
                                                                                    <center><img class="img-responsive img-css" id="imgSE" src="../../images/moon.jpg"></center>
                                                                                </a>
                                                                            </div>
                                                                            <label class="btn-file-upload ">
                                                                                <input type='file' id="pro_pictureE" />
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
                                                                                        <input type="text" id="pro_idposE" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                                        <input type="hidden" id="pro_id" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >คำนำหน้า</label>
                                                                            </div>
                                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 ">
                                                                                <select style="width: 100%"  id="pro_prefixE"></select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ชื่อ</label>
                                                                            </div>
                                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="pro_fnameE" class="form-control" placeholder="กรอกชื่อ" onkeydown="javascript: keydownFname();">
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
                                                                                        <input type="text" id="pro_lnameE" class="form-control" placeholder="กรอกนามสกุล" onkeydown="javascript: keydownLname();">
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
                                                                                <input type="text" id="card_idE" class="form-control" placeholder="กรอกเลขบัตรประชาชน" onkeydown="javascript: keydownCardId();">
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
                                                                                <input type="text" id="pro_nicknameE" class="form-control" placeholder="กรอกชื่อเล่น" onkeydown="javascript: keydownNickname();">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 form-control-label-l">
                                                                        <label >เพศ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 align-left form-control-radio" id="pro_sexE" onchange="javascript: changeSex()">
                                                                        <input name="group1E" type="radio" value="1" id="sex_menE" class="with-gap radio-col-purple" />
                                                                        <label for="sex_menE">ชาย</label>
                                                                        <input name="group1E" type="radio" value="2" id="sex_femanE" class="with-gap radio-col-purple" />
                                                                        <label for="sex_femanE">หญิง</label>
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
                                                                                <input type="text" id="pro_birthdayE" class="form-control" placeholder="Ex: 30/07/2561" onchange="javascript: changeBirthday()">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >สถานะ</label>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5 col-sm-9 col-xs-12 form-control-radio" id="pro_statusE" onchange="javascript: changeStatus()">
                                                                        <input name="group2E" type="radio" value="โสด" id="status-aloneE" class="with-gap radio-col-purple" />
                                                                        <label for="status-aloneE">โสด</label>
                                                                        <input name="group2E" type="radio" value="สมรส" id="status-marryE" class="with-gap radio-col-purple" />
                                                                        <label for="status-marryE">สมรส</label>
                                                                        <input name="group2E" type="radio" value="หย่า" id="status-haltE" class="with-gap radio-col-purple" />
                                                                        <label for="status-haltE">หย่า</label>
                                                                        <input name="group2E" type="radio" value="หม้าย" id="status-widowE" class="with-gap radio-col-purple" />
                                                                        <label for="status-widowE">หม้าย</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >ประเภท</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="type_idE"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >ตำแหน่ง</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="pos_idE"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >ระดับ</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="lv_idE"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >ตำแหน่งบริหาร</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="lvb_idE"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >กลุ่มงาน</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="class_idE"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                                        <label >สังกัด</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10t col-sm-9 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%"data-live-search="true" id="dep_idE"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >วันเข้ารับราชการ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="pro_dateInE" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >วันเกษียณอายุ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="pro_dateOutE" class="form-control">
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
                                                                                <input type="number" id="pro_salaryE" class="form-control" placeholder="กรุณาระบุจำนวนเงิน">
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
                                                <div class="footer">
                                                    <div class="row clearfix">
                                                        <?php if ($_GET['id'] != '') { ?>
                                                            <div class="align-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <button type="button" class="btn btn-warning waves-effect" onclick="javascript: back()">ย้อนกลับ</button>
                                                            </div>
                                                            <div class="align-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editPerson('EPS')">บันทึก</button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="align-right col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editPerson('EPS')">บันทึก</button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# ข้อมูลส่วนตัว -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in active" id="general-information">
                                        <!-- ข้อมูลสทั่วไป -->
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <!--                                                <div class="card">
                                                                                                <div class="body">-->
                                                <div class="demo-masked-input">
                                                    <form class="form-horizontal">
                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ข้อมูลเฉพาะ</h2>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เลขบัตรประชาชน</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_card_id" class="form-control" placeholder="กรอกเลขบัตรประชาชน" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >คำนำหน้าเพศ</label>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-7 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_prefix">
                                                                            <option  value="">เลือก</opition>
                                                                            <option  value="นาย">นาย</opition>
                                                                            <option  value="นาง">นาง</opition>
                                                                            <option  value="นางสาว">นางสาว</opition>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12 form-control-label-l">
                                                                        <label >ชื่อ</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_fname" class="form-control" placeholder="กรอกชื่อ" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12 form-control-label-l">
                                                                        <label >สกุล</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_lname" class="form-control" placeholder="กรอกสกุล" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เพศ</label>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_sex" disabled>
                                                                            <option  value="">เลือก</opition>
                                                                            <option  value="1">ชาย</opition>
                                                                            <option  value="2">หญิง</opition>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >ชื่อเล่น</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_nickname" class="form-control" placeholder="กรอกชื่อเล่น" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >วันเกิด</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_birthday" class="form-control" placeholder="กรอกวัน/เดือน/ปีเกิด" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >อายุ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_old" class="form-control" placeholder="กรอกอายุ (ปี)">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >จังหวัดที่เกิด</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_province">
                                                                            <?php
                                                                            $cn = new management;
                                                                            $cn->con_db();
                                                                            echo '<option  value="">เลือก</opition>';
                                                                            $sql = "select * from ps_province ORDER BY PROVINCE_NAME ASC";
                                                                            $query = $cn->Connect->query($sql);
                                                                            while ($rs = mysqli_fetch_array($query)) {
                                                                                echo '<option  value="' . $rs['PROVINCE_ID'] . '">' . $rs['PROVINCE_NAME'] . '</opition>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >สัญชาติ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_nationality">
                                                                            <?php
                                                                            $cn = new management;
                                                                            $cn->con_db();
                                                                            echo '<option  value="">เลือก</opition>';
                                                                            $sql = "SELECT * FROM ps_nationality ORDER BY nationality_name ASC";
                                                                            $query = $cn->Connect->query($sql);
                                                                            while ($rs = mysqli_fetch_array($query)) {
                                                                                echo '<option  value="' . $rs['nationality_id'] . '">' . $rs['nationality_name'] . '</opition>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เชื้อชาติ</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_race">
                                                                            <?php
                                                                            $cn = new management;
                                                                            $cn->con_db();
                                                                            echo '<option  value="">เลือก</opition>';
                                                                            $sql = "SELECT * FROM ps_nationality ORDER BY nationality_name ASC";
                                                                            $query = $cn->Connect->query($sql);
                                                                            while ($rs = mysqli_fetch_array($query)) {
                                                                                echo '<option  value="' . $rs['nationality_id'] . '">' . $rs['nationality_name'] . '</opition>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >ศาสนา</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_religion">
                                                                            <?php
                                                                            $cn = new management;
                                                                            $cn->con_db();
                                                                            echo '<option  value="">เลือก</opition>';
                                                                            $sql = "SELECT * FROM ps_religion ORDER BY religio_name ASC";
                                                                            $query = $cn->Connect->query($sql);
                                                                            while ($rs = mysqli_fetch_array($query)) {
                                                                                echo '<option  value="' . $rs['religion_id'] . '">' . $rs['religio_name'] . '</opition>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >กรุ๊ปเลือด</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_blood">
                                                                            <option  value="">เลือก</opition>
                                                                            <option  value="A">A</opition>
                                                                            <option  value="B">B</opition>
                                                                            <option  value="O">O</opition>
                                                                            <option  value="AB">AB</opition>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >สถานะภาพสมรส</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_status" disabled>
                                                                            <option  value="">เลือก</opition>
                                                                            <option  value="โสด">โสด</opition>
                                                                            <option  value="สมรส">สมรส</opition>
                                                                            <option  value="หย่า">หย่า</opition>
                                                                            <option  value="หม้าย">หม้าย</opition>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >สถานะภาพทหาร</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_soldier">
                                                                            <option  value="">เลือก</opition>
                                                                            <option  value="ได้รับการยกเว้น">ได้รับการยกเว้น</opition>
                                                                            <option  value="รับการเกณฑ์ทหารเเล้ว">รับการเกณฑ์ทหารเเล้ว</opition>
                                                                            <option  value="ยังไม่ได้รับการเกณฑ์ทหาร">ยังไม่ได้รับการเกณฑ์ทหาร</opition>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เลขประจำตัวผู้เสียภาษี</label>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_tax" class="form-control" placeholder="กรอกเลขประจำตัวผู้เสียภาษี">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เลขที่หนังสือเดินทาง (Passport)</label>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_passport" class="form-control" placeholder="กรอกเลขที่หนังสือเดินทาง">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >บัญชีธนาคาร</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="gen_bank">
                                                                            <?php
                                                                            $cn = new management;
                                                                            $cn->con_db();
                                                                            echo '<option  value="">เลือก</opition>';
                                                                            $sql = "SELECT * FROM ps_bank ORDER BY bank_name ASC";
                                                                            $query = $cn->Connect->query($sql);
                                                                            while ($rs = mysqli_fetch_array($query)) {
                                                                                echo '<option  value="' . $rs['bank_id'] . '">' . $rs['bank_name'] . '</opition>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เลขที่บัญชี</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_account_number" class="form-control" placeholder="กรอกเลขที่หนังสือเดินทาง">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >อีเมล</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_email" class="form-control email" placeholder="กรอกอีเมล">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >Facebook</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_facebook" class="form-control" placeholder="กรอกชื่อ Facebook">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >Twitter</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_twitter" class="form-control" placeholder="กรอกชื่อ Twitter">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >LINE ID</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" id="gen_line" class="form-control" placeholder="กรอก LINE ID">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ความสามารถพิเศษ</h2>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >ความสามารถพิเศษ</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea type="text" id="gen_talent" class="form-control" placeholder="ระบุความสามารถพิเศษ"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >ความสนใจ</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea type="text" id="gen_interest" class="form-control" placeholder="ระบุความสนใจ"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ความชำนาญพิเศษ</h2>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >ด้านความชำนาญ</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea type="text" id="expert_name" class="form-control" placeholder="ระบุด้านความชำนาญ"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                        <label >เช่นทาง</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <textarea type="text" id="expert_ex" class="form-control" placeholder="ระบุตัวอย่างด้านความชำนาญ"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ประวัติการเปลี่ยนชื่อ-สกุล</h2>
                                                                <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float" data-toggle="collapse" data-target="#add_chName" aria-expanded="false" aria-controls="collapseExample">
                                                                    <div class=""> <i class="material-icons">add</i></div>
                                                                </button>
                                                                <div class="collapse" id="add_chName">
                                                                    <from>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >วันที่เปลี่ยน</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="chName_date" class="form-control" placeholder="--/--/----">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ชื่อ-สกุลเดิม</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="chName_old" class="form-control" placeholder="กรอกชื่อ - สกุลเดิม">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ชื่อ-สกุลใหม่</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="chName_new" class="form-control" placeholder="กรอกชื่อ - สกุลใหม่">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="align-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="reset" class="btn btn-danger waves-effect">ยกเลิก</button>
                                                                            </div>
                                                                            <div class="align-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="button" class="btn btn-success waves-effect" onclick="javascript: addChName('ACN')">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                    </from>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <div id="table_chName_show"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ประวัติการสมรส</h2>
                                                                <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float" data-toggle="collapse" data-target="#add_marry" aria-expanded="false" aria-controls="collapseExample">
                                                                    <div class=""> <i class="material-icons">add</i></div>
                                                                </button>
                                                                <div class="collapse" id="add_marry">
                                                                    <from>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ชื่อ-สกุล</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="marry_name" class="form-control" placeholder="กรอกชื่อ - สกุล">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >สถานะปัจจุบัน</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="marry_relationship" class="form-control" placeholder="ระบุสถานะปัจจุบัน">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="align-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="reset" class="btn btn-danger waves-effect">ยกเลิก</button>
                                                                            </div>
                                                                            <div class="align-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="button" class="btn btn-success waves-effect" onclick="javascript: addMarry('AMR')">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                    </from>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <div id="table_marry_show"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ข้อมูลทายาท</h2>
                                                                <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float" data-toggle="collapse" data-target="#add_heir" aria-expanded="false" aria-controls="collapseExample">
                                                                    <div class=""> <i class="material-icons">add</i></div>
                                                                </button>
                                                                <div class="collapse" id="add_heir">
                                                                    <from>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ชื่อ-สกุล</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="heir_name" class="form-control" placeholder="กรอกชื่อ - สกุล">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ความสัมพันธ์</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="heir_relationship" class="form-control" placeholder="ระบุความสัมพันธ์">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="align-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="reset" class="btn btn-danger waves-effect">ยกเลิก</button>
                                                                            </div>
                                                                            <div class="align-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="button" class="btn btn-success waves-effect" onclick="javascript: addHeir('AH')">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                    </from>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <div id="table_heir_show"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="body">
                                                                <h2 class="card-inside-title">ประวัติทางวินัย</h2>
                                                                <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float" data-toggle="collapse" data-target="#add_blame" aria-expanded="false" aria-controls="collapseExample">
                                                                    <div class=""> <i class="material-icons">add</i></div>
                                                                </button>
                                                                <div class="collapse" id="add_blame">
                                                                    <from>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >วันที่รับโทษ</label>
                                                                            </div>
                                                                            <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <input type="text" id="blame_date" class="form-control" placeholder="--/--/----">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >ความผิด</label>
                                                                            </div>
                                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <textarea type="text" id="blame_mistake" class="form-control" placeholder="กรอกความผิด"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 form-control-label-l">
                                                                                <label >กรณีความผิด</label>
                                                                            </div>
                                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <textarea type="text" id="blame_mistakeCase" class="form-control" placeholder="กรอกกรณีความผิด"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row clearfix">
                                                                            <div class="align-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="reset" class="btn btn-danger waves-effect">ยกเลิก</button>
                                                                            </div>
                                                                            <div class="align-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                <button type="button" class="btn btn-success waves-effect" onclick="javascript: addBlame('AB')">บันทึก</button>
                                                                            </div>
                                                                        </div>
                                                                    </from>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <div id="table_blame_show"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="footer">
                                                    <div class="row clearfix">
                                                        <?php if ($_GET['id'] != '') { ?>
                                                            <div class="align-left col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <button type="button" class="btn btn-warning waves-effect" onclick="javascript: back()">ย้อนกลับ</button>
                                                            </div>
                                                            <div class="align-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editPerson('EPS')">บันทึก</button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="align-right col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editPerson('EPS')">บันทึก</button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <!--</div>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                        <!-- #END# ข้อมูลทั่วไป -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
        </section>
        <!-- Script -->
        <?php include ("../../PS_script/personnal/per_dataProfile.php"); ?>
    </body>
</html>
