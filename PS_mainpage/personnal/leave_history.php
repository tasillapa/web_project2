<?php include 'main_personnal.php'; ?>
<html>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2></h2>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    การลา
                                </h2>

                            </div>
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="">
                                        <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">home</i> แบบฟอร์มลาพักผ่อนประจำปี

                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">face</i> แบบฟอร์มลาป่วย ลาคลอดบุตร ลากิจส่วนตัว
                                        </a>
                                    </li>


                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade fade active in" id="home_with_icon_title">
                                       
                                        <div style="margin-left: 45%;" class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                            <label>เขียนที่</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control show-tick" data-live-search="true">
                                                            <option>Hot Dog, Fries and a Soda</option>
                                                            <option>Burger, Shake and a Smile</option>
                                                            <option>Sugar, Spice and all things nice</option>
                                            </select>
                                        </div>
                                        <div style="margin-left: 45%;" class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                            <label> วันที่</label>
                                        
                                        </div>
                                         <div class="col-sm-3">
                                             <input type="text" class="datepicker form-control" placeholder="Please choose a date..." data-dtp="dtp_cuCzv">
                                         </div>
                                        
                                        <div  class="col-lg-2 col-md-1 col-sm-2 col-xs-4 form-control-label">
                                            <label>ขอลา</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control show-tick" data-live-search="true">
                                                            <option>ลากิจ</option>
                                                            <option>ลาป่วย</option>
                                                            <option>ลาพักผ่อน</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                        <b>Profile Content</b>
                                        <p>
                                            HAAAAAAAAA
                                        </p>
                                    </div>

                                </div>
                                <!-- Advanced Select -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    ADVANCED SELECT
                                                    <small>Taken from <a href="https://silviomoreto.github.io/bootstrap-select/" target="_blank">silviomoreto.github.io/bootstrap-select</a></small>
                                                </h2>
                                                <ul class="header-dropdown m-r--5">
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li><a href="javascript:void(0);">Action</a></li>
                                                            <li><a href="javascript:void(0);">Another action</a></li>
                                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Basic</b>
                                                        </p>
                                                        <select class="form-control show-tick">
                                                            <option>Mustard</option>
                                                            <option>Ketchup</option>
                                                            <option>Relish</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>With OptGroups</b>
                                                        </p>
                                                        <select class="form-control show-tick">
                                                            <optgroup label="Picnic">
                                                                <option>Mustard</option>
                                                                <option>Ketchup</option>
                                                                <option>Relish</option>
                                                            </optgroup>
                                                            <optgroup label="Camping">
                                                                <option>Tent</option>
                                                                <option>Flashlight</option>
                                                                <option>Toilet Paper</option>
                                                            </optgroup>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Multiple Select</b>
                                                        </p>
                                                        <select class="form-control show-tick" multiple>
                                                            <option>Mustard</option>
                                                            <option>Ketchup</option>
                                                            <option>Relish</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>With Search Bar</b>
                                                        </p>
                                                        <select class="form-control show-tick" data-live-search="true">
                                                            <option>Hot Dog, Fries and a Soda</option>
                                                            <option>Burger, Shake and a Smile</option>
                                                            <option>Sugar, Spice and all things nice</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Max Selection Limit: 2</b>
                                                        </p>
                                                        <select class="form-control show-tick" multiple>
                                                            <optgroup label="Condiments" data-max-options="2">
                                                                <option>Mustard</option>
                                                                <option>Ketchup</option>
                                                                <option>Relish</option>
                                                            </optgroup>
                                                            <optgroup label="Breads" data-max-options="2">
                                                                <option>Plain</option>
                                                                <option>Steamed</option>
                                                                <option>Toasted</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Display Count</b>
                                                        </p>
                                                        <select class="form-control show-tick" multiple data-selected-text-format="count">
                                                            <option>Mustard</option>
                                                            <option>Ketchup</option>
                                                            <option>Relish</option>
                                                            <option>Onions</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>With SubText</b>
                                                        </p>
                                                        <select class="form-control show-tick" data-show-subtext="true">
                                                            <option data-subtext="French's">Mustard</option>
                                                            <option data-subtext="Heinz">Ketchup</option>
                                                            <option data-subtext="Sweet">Relish</option>
                                                            <option data-subtext="Miracle Whip">Mayonnaise</option>
                                                            <option data-divider="true"></option>
                                                            <option data-subtext="Honey">Barbecue Sauce</option>
                                                            <option data-subtext="Ranch">Salad Dressing</option>
                                                            <option data-subtext="Sweet &amp; Spicy">Tabasco</option>
                                                            <option data-subtext="Chunky">Salsa</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <b>Disabled Option</b>
                                                        </p>
                                                        <select class="form-control show-tick">
                                                            <option>Mustard</option>
                                                            <option disabled>Ketchup</option>
                                                            <option>Relish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Advanced Select -->


                            </div>
                        </div>
                    </div>
                </div>


        </section>

    </body>
</html>>

