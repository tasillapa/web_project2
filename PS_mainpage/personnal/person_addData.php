<?php include 'main_personnal.php'; ?>
<?php include ("../../PS_script/personnal/per_addData.php"); ?>
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
                                                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 align-center">
                                                                <div id="aniimated-thumbnials" class="list-unstyled">
                                                                    <a href="../../images/moon.jpg" id="zoom-img" data-sub-html="รูปประจำตัว">
                                                                        <center><img class="img-responsive" id="imgS" src="../../images/moon.jpg" style="max-height: 150px; max-width: 150px;"alt="User"></center>
                                                                    </a>
                                                                </div>
                                                                <label class="btn-file-upload ">
                                                                    <input type='file' id="upload-img" />
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
                                                                            <input type="text" id="code_profile" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                                    <label >คำนำหน้า</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 ">
                                                                    <select class="form-control show-tick" data-live-search="true" id="p_prefix">
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
                                                                            <input type="text" id="p_name" class="form-control" placeholder="กรอกชื่อ">
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
                                                                            <input type="text" id="p_lastname" class="form-control" placeholder="กรอกนามสกุล">
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
                                                                    <input type="text" id="p_nickname" class="form-control" placeholder="กรอกชื่อเล่น">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4 form-control-label-l">
                                                            <label >เพศ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 align-left form-control-radio" id="p_sax">
                                                            <input name="group4" type="radio" value="1" id="sex_men" class="radio-col-amber" />
                                                            <label for="sex_men">ชาย</label>
                                                            <input name="group4" type="radio" value="2" id="sex_feman" class="radio-col-amber" />
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
                                                                    <input type="text" id="p_birthday" class="form-control date" placeholder="Ex: 30/07/2561">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >สถานะ</label>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-sm-9 col-xs-12 form-control-radio" id="p_status">
                                                            <input name="group4" type="radio" id="status-alone" class="radio-col-amber" />
                                                            <label for="status-alone">โสด</label>
                                                            <input name="group4" type="radio" id="status-marry" class="radio-col-amber" />
                                                            <label for="status-marry">สมรส</label>
                                                            <input name="group4" type="radio" id="status-halt" class="radio-col-amber" />
                                                            <label for="status-halt">หย่า</label>
                                                            <input name="group4" type="radio" id="status-widow" class="radio-col-amber" />
                                                            <label for="status-widow">หม้าย</label>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ประเภท</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true">
                                                                <option>Hot Dog, Fries and a Sodaasdasdsasafsd</option>
                                                                <option>Burger, Shake and a Smile</option>
                                                                <option>Sugar, Spice and all things nice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ตำแหน่ง</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true">
                                                                <option>Hot Dog, Fries and a Soda</option>
                                                                <option>Burger, Shake and a Smile</option>
                                                                <option>Sugar, Spice and all things nice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >ระดับ</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true">
                                                                <option>Hot Dog, Fries and a Soda</option>
                                                                <option>Burger, Shake and a Smile</option>
                                                                <option>Sugar, Spice and all things nice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >สายงาน</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true">
                                                                <option>Hot Dog, Fries and a Soda</option>
                                                                <option>Burger, Shake and a Smile</option>
                                                                <option>Sugar, Spice and all things nice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >กลุ่มงาน</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true">
                                                                <option>Hot Dog, Fries and a Soda</option>
                                                                <option>Burger, Shake and a Smile</option>
                                                                <option>Sugar, Spice and all things nice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >สังกัด</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10t col-sm-9 col-xs-12">
                                                            <select class="form-control show-tick" data-live-search="true">
                                                                <option>Hot Dog, Fries and a Soda</option>
                                                                <option>Burger, Shake and a Smile</option>
                                                                <option>Sugar, Spice and all things nice</option>
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
                                                                    <input type="text" id="p_dateIn" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 form-control-label-l">
                                                            <label >วันเกษียณอายุ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-9 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="p_dateOut" class="form-control" placeholder="กรอกรหัสตำแหน่ง">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 form-control-label-l">
                                                            <label >เงินเดือน</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-9 col-xs-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">monetization_on</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="number" id="p_salary" class="form-control" placeholder="กรุณาระบุจำนวนเงิน">
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
    </body>
</html>