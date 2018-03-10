<?php include 'main_personnal.php'; ?>
<html>
    <head>
    </head>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <ol class="breadcrumb breadcrumb-col-orange">
                        <li><a href="main_personnal.php"><i class="material-icons">home</i> Home</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> จัดการข้อมูลพื้นฐาน</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
                        <li class="active"><i class="material-icons">attachment</i> File</li>
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
                                        <a href="#home_with_icon_title" data-toggle="tab">
                                            <img src="../images/ph_inside.png" width="25" height="25" /> 
                                            <span>หน่วยงานภายใน</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile_with_icon_title" data-toggle="tab">
                                            <img src="../images/ph_outside.png" width="25" height="25" /> 
                                            <span>หน่วยงานภายนอก</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#messages_with_icon_title" data-toggle="tab">
                                            <img src="../images/ph_position.png" width="25" height="25" /> 
                                            <span>ตำแหน่ง</span>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#settings_with_icon_title" data-toggle="tab">
                                            <i class="material-icons">settings</i> SETTINGS
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                        <button type="button" class="btn bg-green waves-effect">เพิ่มหน่วยงาน</button>
                                        <!--<br>-->


                                        <!-- Basic Examples -->
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover table_inside dataTable">

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# Basic Examples -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                        <b>Profile Content</b>
                                        <p>
                                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                            sadipscing mel.
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                        <b>Message Content</b>
                                        <p>
                                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                            sadipscing mel.
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                        <b>Settings Content</b>
                                        <p>
                                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                            sadipscing mel.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->

            <?php include ("../PS_script/per_hierarchy.php"); ?>
        </section>
    </body>
</html>
