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
                        <li  class="active font-bold col-cyan font-14"><i class="material-icons">library_books</i> จัดการข้อมูลพื้นฐาน</li>
                    </ol>
                </div>
                <!-- Tabs With Icon Title -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#branch-in" data-toggle="tab">
                                            <img class="logo-bn-in"/> 
                                            <span>หน่วยงานภายใน</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#branch-out" data-toggle="tab">
                                            <img class="logo-bn-out"/>
                                            <span>หน่วยงานภายนอก</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab-position" data-toggle="tab">
                                            <img class="logo-position"/> 
                                            <span>ตำแหน่ง</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab-level" data-toggle="tab">
                                            <img class="logo-bn-lv"/> 
                                            <span>ระดับ</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab-type" data-toggle="tab">
                                           <img class="logo-bn-type"/> 
                                            <span>ประเภท</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab-manager" data-toggle="tab">
                                            <img class="logo-bn-mnm"/> 
                                            <span>กลุ่มบริหาร</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="branch-in">
                                        <!-- หน่วยงานภายใน -->
                                        <button type="button" data-toggle="modal" data-target="#addBnIn" class="btn bg-green waves-effect">เพิ่มกลุ่มงาน</button><br><br>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <div id="table_inside_show"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# หน่วยงานภายใน -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="branch-out">
                                        <!-- หน่วยงานภายนอก -->
                                        <button type="button" data-toggle="modal" data-target="#addBnOut" class="btn bg-green waves-effect">เพิ่มกลุ่มงาน</button><br><br>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <div id="table_outside_show"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# หน่วยงานภายนอก -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-position">
                                        <!-- ตำแหน่ง -->
                                        <button type="button" data-toggle="modal" data-target="#addPosi" class="btn bg-green waves-effect">เพิ่มตำแหน่ง</button><br><br>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <div id="table_position_show"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# ตำแหน่ง -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-level">
                                        <!-- ระดับ -->
                                        <button type="button" data-toggle="modal" data-target="#addLevel" class="btn bg-green waves-effect">เพิ่มระดับ</button><br><br>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <div id="table_level_show"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# ระดับ -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-type">
                                        <!-- ประเภท -->
                                        <button type="button" data-toggle="modal" data-target="#addType" class="btn bg-green waves-effect">เพิ่มประเภท</button><br><br>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <div id="table_type_show"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# ประเภท -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab-manager">
                                        <!-- กลุ่มบริหาร -->
                                        <button type="button" data-toggle="modal" data-target="#addLVB" class="btn bg-green waves-effect">เพิ่มกลุ่มบริหาร</button><br><br>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <div id="table_lvboss_show"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# กลุ่มบริหาร -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->

        </section>

        <!-- Modal Add BnIN -->
        <div class="modal fade" id="addBnIn" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title " >หน่วยงานภายใน</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_addBnIn" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                    <label>รหัส</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="code_class" maxlength="4" class="form-control" placeholder="กรอกรหัส">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อหน่วยงาน</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name_class" class="form-control" placeholder="กรอกชื่อหน่อวยงาน">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addBnIn('ADDBNIN')">เพิ่ม</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add BnIN -->

        <!-- Modal Edit BnIN -->
        <div class="modal fade" id="editBnIn" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title " >หน่วยงานภายใน</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_editBnIn" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                    <label>รหัส</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="code_classE" maxlength="4" class="form-control" placeholder="กรอกรหัส">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อหน่วยงาน</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name_classE" class="form-control" placeholder="กรอกชื่อหน่อวยงาน">
                                            <input type="hidden" id="id_classE" class="form-control" placeholder="กรอกชื่อหน่วยงาน">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editBnIn('EBNIN')">อัพเดท</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Edit BnIN -->

        <!-- Modal Add BnOut -->
        <div class="modal fade" id="addBnOut" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">หน่วยงานภายนอก</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_addBnOut" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                    <label>รหัส</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="off_number" maxlength="4" class="form-control" placeholder="กรอกรหัส">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อหน่วยงาน</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="off_name" class="form-control" placeholder="กรอกชื่อหน่อวยงาน">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addBnOut('ADDBNOUT')">เพิ่ม</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add BnOut -->

        <!-- Modal Edit BnOut -->
        <div class="modal fade" id="editBnOut" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title " >หน่วยงานภายนอก</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_editBnOut" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                    <label>รหัส</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="off_numberE" maxlength="4" class="form-control" placeholder="กรอกรหัส">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อหน่วยงาน</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="off_nameE" class="form-control" placeholder="กรอกชื่อหน่อวยงาน">
                                            <input type="hidden" id="id_offE" class="form-control" placeholder="กรอกชื่อหน่อวยงาน">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editBnOut('EBNOUT')">อัพเดท</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal BnOut -->

        <!-- Modal Add BnPosi -->
        <div class="modal fade" id="addPosi" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">ตำแหน่ง</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_addPosi" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                    <label>รหัส</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="pos_code" maxlength="4" class="form-control" placeholder="กรอกรหัส">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อตำแหน่ง</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="pos_name" class="form-control" placeholder="กรอกชื่อหน่อวยงาน">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addPosi('APOSI')">เพิ่ม</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add Posi -->

        <!-- Modal Edit Posi -->
        <div class="modal fade" id="editPosi" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">ตำแหน่ง</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_editPosi" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 form-control-label">
                                    <label>รหัส</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="pos_codeE" maxlength="4" class="form-control" placeholder="กรอกรหัส">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อตำแหน่ง</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="pos_nameE" class="form-control" placeholder="กรอกชื่อตำแหน่ง">
                                            <input type="hidden" id="pos_idE" class="form-control" placeholder="กรอกชื่อตำแหน่ง">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editPosi('EPOSI')">อัพเดท</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Edit Posi -->

         <!-- Modal Add Level -->
        <div class="modal fade" id="addLevel" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">ระดับ</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_addLevel" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อระดับ</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="lv_name" class="form-control" placeholder="กรอกชื่อระดับ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addLevel('ALV')">เพิ่ม</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add Level -->

        <!-- Modal Edit Level -->
        <div class="modal fade" id="editLevel" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">ระดับ</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_editLevel" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อระดับ</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="lv_nameE" class="form-control" placeholder="กรอกชื่อระดับ">
                                            <input type="hidden" id="lv_idE" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editLevel('ELV')">อัพเดท</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Edit Level -->
        
         <!-- Modal Add Type -->
        <div class="modal fade" id="addType" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">ประเภท</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_addType" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อประเภท</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="type_name" class="form-control" placeholder="กรอกชื่อประเภท">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addType('ATYPE')">เพิ่ม</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add Level -->

        <!-- Modal Edit Level -->
        <div class="modal fade" id="editType" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">ประเภท</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_editType" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อประเภท</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="type_nameE" class="form-control" placeholder="กรอกชื่อประเภท">
                                            <input type="hidden" id="type_idE" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editType('ETYPE')">อัพเดท</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Edit Level -->
        
         <!-- Modal Add LVB -->
        <div class="modal fade" id="addLVB" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">กลุ่มบริหาร</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_addLVB" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อกลุ่มบริหาร</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="lvb_name" class="form-control" placeholder="กรอกชื่อกลุ่มบริหาร">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: addLVB('ALVB')">เพิ่ม</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Add Level -->

        <!-- Modal Edit Level -->
        <div class="modal fade" id="editLVB" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h4 class="modal-title ">กลุ่มบริหาร</h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="card">-->
                        <form id="fm_editLVB" method="POST">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 form-control-label">
                                    <label>ชื่อกลุ่มบริหาร</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="lvb_nameE" class="form-control" placeholder="กรอกชื่อกลุ่มบริหาร">
                                            <input type="hidden" id="lvb_idE" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--</div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect" onclick="javascript: editLVB('ELVB')">อัพเดท</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal Edit Level -->
        
        <!-- Manage Personnal Script -->
        <?php include ("../../PS_script/personnal/per_branchIn.php"); ?>
        <?php include ("../../PS_script/personnal/per_branchOut.php"); ?>
        <?php include ("../../PS_script/personnal/per_position.php"); ?>
        <?php include ("../../PS_script/personnal/per_level.php"); ?>
        <?php include ("../../PS_script/personnal/per_type.php"); ?>
        <?php include ("../../PS_script/personnal/per_levelBoss.php"); ?>
    </body>
</html>
