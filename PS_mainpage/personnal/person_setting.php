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

            <!-- Modal Add User -->
            <div class="modal fade" id="addUser" role="dialog">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content modal-md">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="addUserLabel">เพิ่มผู้ใช้งานระบบ</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="body">
                                            <div class="demo-masked-input">
                                                <form class="form-horizontal">
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
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >ชื่อ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="nameuser" class="form-control" placeholder="กรอกชื่อ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >สกุล</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="lastname" class="form-control" placeholder="กรอกสกุล">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >เบอร์โทร</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="tel" class="form-control" placeholder="กรอกเบอร์โทร">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >E-mail</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="email" class="form-control email" placeholder="Ex: example@example.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >ตำแหน่ง</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="pos_id">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_position ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['pos_id'] . '">' . $rs['pos_name'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label>กลุ่มงาน</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="class_id">
                                                                <?php
                                                                $cn = new management;
                                                                $cn->con_db();
                                                                echo '<option  value="">เลือก</opition>';
                                                                $sql = "select * from ps_class ";
                                                                $query = $cn->Connect->query($sql);
                                                                while ($rs = mysqli_fetch_array($query)) {
                                                                    echo '<option  value="' . $rs['class_id'] . '">' . $rs['name_class'] . '</opition>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> ชื่อผู้ใช้งาน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="username" class="form-control" placeholder="กรอกชื่อผู้ใช้งาน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> รหัสผ่าน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="password" id="password" class="form-control" placeholder="กรอกรหัสผ่าน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> ยืนยันรหัสผ่าน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="password" id="ch_password" class="form-control" placeholder="กรอกรหัสยืนยัน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> ระดับผู้ใช้</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="level">
                                                                <option value="">เลือก</opition>
                                                                <option value="0">ผู้ใช้ทั่วไป</opition>
                                                                <option value="1">แอดมิน</opition>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> การเปิดใช้</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="demo-switch p-t-5">
                                                                <div class="switch">
                                                                    <label><input type="checkbox" name="status" id="status" checked><span class="lever switch-col-green"></span></label>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addUser('AUSER')">บันทึก</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add User -->
        
        <!-- Modal edit User -->
            <div class="modal fade" id="editUser" role="dialog">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content modal-md">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="editUserLabel">เพิ่มผู้ใช้งานระบบ</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="body">
                                            <div class="demo-masked-input">
                                                <form class="form-horizontal">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >เลขบัตรประชาชน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="card_idE" class="form-control" placeholder="กรอกเลขบัตรประชาชน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >ชื่อ</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="nameuserE" class="form-control" placeholder="กรอกชื่อ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >สกุล</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="lastnameE" class="form-control" placeholder="กรอกสกุล">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >เบอร์โทร</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="telE" class="form-control" placeholder="กรอกเบอร์โทร">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >E-mail</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="emailE" class="form-control email" placeholder="Ex: example@example.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label >ตำแหน่ง</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="pos_idE"></select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label>กลุ่มงาน</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="class_idE"></select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> ชื่อผู้ใช้งาน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="usernameE" class="form-control" placeholder="กรอกชื่อผู้ใช้งาน">
                                                                    <input type="hidden" id="member_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> รหัสผ่าน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="passwordE" class="form-control" placeholder="กรอกรหัสผ่าน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> ยืนยันรหัสผ่าน</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="password" id="ch_passwordE" class="form-control" placeholder="กรอกรหัสยืนยัน">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> ระดับผู้ใช้</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <select class="form-control show-tick" style="width: 100%" data-live-search="true" id="levelE"></select>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 form-control-label-l">
                                                            <label> การเปิดใช้</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                                                            <div class="demo-switch p-t-5">
                                                                <div class="switch">
                                                                    <label><input type="checkbox" id="statusE" checked><span class="lever switch-col-green"></span></label>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editUser('EUSER')">บันทึก</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Edit User -->
    </section>
    <!-- Script -->
    <?php include ("../../PS_script/personnal/per_setting.php"); ?>
</body>
</html>