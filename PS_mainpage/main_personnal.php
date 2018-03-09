<?php
@ob_start();
@session_start();
include_once("../connect/connect_DB_personal.php");
include '../common/header.php';
?>

<html>
    <style>
    </style>
    <body class="theme-green">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>

                    <a class="navbar-brand" href="../index.php">
                        <span>
                            <img src="../images/logo2.png" width="40" height="35"  />
                            สำนักงานกรมป้องกันควบคุมโรคที่ 6 จังหวัดชลบุรี
                        </span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->
                        <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                        <!-- #END# Call Search -->
                        <!-- Login -->
                        <li class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">view_list</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">System option</li>
                                <li  data-toggle="modal" data-target="#change_pass"><a href="javascript:void(0);"><i class="material-icons link_log">assignment_ind</i>Change Password</a></li>
                                <li><a href="../js/logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a></li>
                            </ul>
                        </li>
                        <!-- #END# Login -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="../images/user.png" width="60" height="60" alt="User" /> 
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ศิลปะ พรมจินดา</div>
                        <div class="email">se57160333@gmail.com</div>

                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="../index.php">
                                <i class="material-icons">home</i>
                                <span>DashBoard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <div class="image">
                                    <img src="../images/personnal.png" width="40" height="40" alt="User" /> 
                                </div>
                                <span>จัดการบุคลากร</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="personnal_hierarchy.php"><img src="../images/hierarchy.png" width="30" height="30" alt="User" /> 
                                        <span>จัดการข้อมูลพื้นฐาน</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../images/add_personnal.png" width="30" height="30" alt="User" /> 
                                        <span>จัดการข้อมูลบุคคลากร</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../images/promotion.png" width="30" height="30" alt="User" /> 
                                        <span>ขั้นตำแหน่งงาน</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../images/salary.png" width="30" height="30" alt="User" /> 
                                        <span>ขั้นเงินเดือน</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="../images/setting_personnal.png" width="30" height="30" alt="User" /> 
                                        <span>ตั้งค่าสิทธ์เข้าใช้งาน</span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <div class="image">
                                    <img src="../images/calculation.png" width="40" height="40" alt="User" /> 
                                </div>
                                <span>กรอบอัตรากำลัง</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                </li>
                            </ul>	
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <div class="image">
                                    <img src="../images/writing.png" width="40" height="40" alt="User" /> 
                                </div>
                                <span>รายงาน</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>รายงานบุคลากร</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="pages/widgets/cards/basic.html">Basic</a>
                                        </li>
                                        <li>
                                            <a href="pages/widgets/cards/colored.html">Colored</a>
                                        </li>
                                        <li>
                                            <a href="pages/widgets/cards/no-header.html">No Header</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>รายงานตำเเหน่ง</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                        </li>
                                        <li>
                                            <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                        </li>
                                        <li>
                                            <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                        </li>
                                        <li>
                                            <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                        </li>
                                        <li>
                                            <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <div class="image">
                                    <img src="../images/leaves.png" width="40" height="40" alt="User" /> 
                                </div>
                                <span>การลา</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <div class="image">
                                        <a href="leave_history.php"><img src="../images/leave.png" width="25" height="25" alt="User" /> 
                                            <span>ประวัติการลา</span></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <a class="ddd"><img src="../images/printer.png" width="25" height="25" alt="User" /> 
                                            <span>ตรวจสอบสถานะเเละพิมพ์ฟอร์ม</span></a>
                                    </div>
                                </li>
                                <li>

                                    <div class="image">
                                        <a><img src="../images/doleave.png" width="25" height="25" alt="User" /> 
                                            <span>ทำเรื่องการลา</span></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <div class="image">
                                    <img src="../images/lecture.png" width="40" height="40" alt="User" /> 
                                </div>
                                <span>อบรม สัมนา ดูงาน</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <div class="image">
                                        <a><img src="../images/notes.png" width="30" height="30" alt="User" /> 
                                            <span>หลักสูตรการอบรม</span></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <a><img src="../images/ereader.png" width="30" height="30" alt="User" /> 
                                            <span>ทำเรื่องไปอบรม</span></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <a><img src="../images/printer.png" width="30" height="30" alt="User" /> 
                                            <span>ตรวจสอบสถานะเเละพิมพ์ฟอร์ม</span></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="image">
                                        <a><img src="../images/report.png" width="30" height="30" alt="User" /> 
                                            <span>รายงานการอบรม</span></a>
                                    </div>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Tables</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/tables/normal-tables.html">Normal Tables</a>
                                </li>
                                <li>
                                    <a href="pages/tables/jquery-datatable.html">Jquery Datatables</a>
                                </li>
                                <li>
                                    <a href="pages/tables/editable-table.html">Editable Tables</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">perm_media</i>
                                <span>Medias</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/medias/image-gallery.html">Image Gallery</a>
                                </li>
                                <li>
                                    <a href="pages/medias/carousel.html">Carousel</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">pie_chart</i>
                                <span>Charts</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/charts/morris.html">Morris</a>
                                </li>
                                <li>
                                    <a href="pages/charts/flot.html">Flot</a>
                                </li>
                                <li>
                                    <a href="pages/charts/chartjs.html">ChartJS</a>
                                </li>
                                <li>
                                    <a href="pages/charts/sparkline.html">Sparkline</a>
                                </li>
                                <li>
                                    <a href="pages/charts/jquery-knob.html">Jquery Knob</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">content_copy</i>
                                <span>Example Pages</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/examples/sign-in.html">Sign In</a>
                                </li>
                                <li>
                                    <a href="pages/examples/sign-up.html">Sign Up</a>
                                </li>
                                <li>
                                    <a href="pages/examples/forgot-password.html">Forgot Password</a>
                                </li>
                                <li>
                                    <a href="pages/examples/blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="pages/examples/404.html">404 - Not Found</a>
                                </li>
                                <li>
                                    <a href="pages/examples/500.html">500 - Server Error</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">map</i>
                                <span>Maps</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/maps/google.html">Google Map</a>
                                </li>
                                <li>
                                    <a href="pages/maps/yandex.html">YandexMap</a>
                                </li>
                                <li>
                                    <a href="pages/maps/jvectormap.html">jVectorMap</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">trending_down</i>
                                <span>Multi Level Menu</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Menu Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Menu Item - 2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <span>Level - 2</span>
                                    </a>
                                    <ul class="ml-menu">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span>Menu Item</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="menu-toggle">
                                                <span>Level - 3</span>
                                            </a>
                                            <ul class="ml-menu">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span>Level - 4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="pages/changelogs.html">
                                <i class="material-icons">update</i>
                                <span>Changelogs</span>
                            </a>
                        </li>
                        <li class="header">LABELS</li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons col-red">donut_large</i>
                                <span>Important</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons col-amber">donut_large</i>
                                <span>Warning</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons col-light-blue">donut_large</i>
                                <span>Information</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.5
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
            <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <ul class="demo-choose-skin">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                        <div class="demo-settings">
                            <p>GENERAL SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Report Panel Usage</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Email Redirect</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>SYSTEM SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Notifications</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Auto Updates</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>ACCOUNT SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Offline</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Location Permission</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- #END# Right Sidebar -->
        </section>
        <!--Change Pass-->
        <div class="modal fade" id="change_pass" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-bold col-pink font-18 align-center" id="defaultModalLabel">เปลี่ยนรหัสผ่าน</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="body">

                                <form id="ch_pass" method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="cp_username" placeholder="Acount ผู้ใช้งาน" required autofocus>
                                            <label style="display:none" id="error-username-cp" class="error">รหัสผู้ใช้งานไม่ถูกต้อง</label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control" id="old_pass" placeholder="รหัสผ่านเก่า" required>
                                            <label style="display:none" id="error-old-pass" class="error">รหัสผ่านไม่ถูกต้อง</label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control" id="cp_password" minlength="6" placeholder="รหัสผ่านใหม่" required>
                                            <label style="display:none" id="error-new-pass" class="error">รหัสผ่านไม่ตรงกัน</label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="password" class="form-control" id="confirm" minlength="6" placeholder="ยืนยันรหัสผ่านใหม่" required>
                                            <label style="display:none" id="error-confirm-pass" class="error">รหัสผ่านไม่ตรงกัน</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="button" onclick ="javascript: btn_chPass('CHPASS')">บันทึก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--#End# Change Pass-->
        <?php include ("../common/headerScript.php"); ?>
        <?php include ("../js/script.php"); ?>
    </body>

</html>