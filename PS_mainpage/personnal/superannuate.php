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
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 text-center>
                                    จัดการข้อมูลเกษียณอายุราชการ
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <select id="datein" class="form-control show-tick" style="width: 100%" data-live-search="true" onchange="secdatein()">
                                            <option value ="">เลือก</option>
                                            <?php
                                            $cn = new management;
                                            $cn->con_db();
                                            $sql = "SELECT * ,YEAR(pro_dateOut)+543 AS year FROM `ps_profile` GROUP BY year(pro_dateOut)";
                                            $query = $cn->Connect->query($sql);

                                            while ($row = mysqli_fetch_array($query)) {
                                                if ($row["year"] != '543') {
                                                    echo '<option value ="' . $row["year"] . '">' . $row["year"] . '</option>';
                                                }
                                            };
                                            ?>
                                        </select> 
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <select id="dateout" class="form-control show-tick" style="width: 100%" data-live-search="true" onchange="secdateout()">
                                            <option value ="">เลือก</option>
                                            <?php
                                            $cn = new management;
                                            $cn->con_db();
                                            $sql = "SELECT * ,YEAR(pro_dateOut)+543 AS year FROM `ps_profile` GROUP BY year(pro_dateOut)";
                                            $query = $cn->Connect->query($sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                if ($row["year"] != '543') {
                                                    echo '<option value ="' . $row["year"] . '">' . $row["year"] . '</option>';
                                                }
                                            };
                                            ?>
                                        </select>                                                          
                                    </div>
                                </div>
                                <div class="body" style="center" >
                                    <div class="row clearfix align-center"> 
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <div class="card align-center">
                                                <div class="header">
                                                    <h2>BAR CHART</h2>  
                                                </div>
                                                <div class="body">
                                                    <div id="bar_chart" class="graph"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix"> 
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>DONUT CHART</h2>
                                                </div>
                                                <div class="body">
                                                    <div id="donut_chart" class="graph"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix"> 
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                                        <label>Show 
                                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                        <label>Search:
                                                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">

                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 32px;">ลำดับ</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">คำนำหน้า</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 145px;">ชื่อ</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 145px;">นามสกุล</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 180px;">ตำแหน่ง</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 90px;">วันเริ่มทำงาน</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 90px;">วันเกษณียรอายุ</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody> 
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">1</td>
                                                                <td>นาย</td>
                                                                <td>สุริยะ</td>
                                                                <td>เต่าทองคำ</td>
                                                                <td>ผู้อำนวยการ</td>
                                                                <td>1พ.ค.2561</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="even">
                                                                <td class="sorting_1">2</td>
                                                                <td>นาย</td>
                                                                <td>ศิลปะ</td>
                                                                <td>พรมจินดา</td>
                                                                <td>รองอำนวยการ</td>
                                                                <td>1พ.ค.2561</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="odd">
                                                                <td class="sorting_1">Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="even">
                                                                <td class="sorting_1">Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="odd">
                                                                <td class="sorting_1">Brenden Wagner</td>
                                                                <td>Software Engineer</td>
                                                                <td>San Francisco</td>
                                                                <td>28</td>
                                                                <td>2011/06/07</td>
                                                                <td>$206,850</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="even">
                                                                <td class="sorting_1">Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="odd">
                                                                <td class="sorting_1">Bruno Nash</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>38</td>
                                                                <td>2011/05/03</td>
                                                                <td>$163,500</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="even">
                                                                <td class="sorting_1">Caesar Vance</td>
                                                                <td>Pre-Sales Support</td>
                                                                <td>New York</td>
                                                                <td>21</td>
                                                                <td>2011/12/12</td>
                                                                <td>$106,450</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="odd">
                                                                <td class="sorting_1">Cara Stevens</td>
                                                                <td>Sales Assistant</td>
                                                                <td>New York</td>
                                                                <td>46</td>
                                                                <td>2011/12/06</td>
                                                                <td>$145,600</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr><tr role="row" class="even">
                                                                <td class="sorting_1">Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                                <td>1ต.ค.2578</td>
                                                            </tr></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button previous disabled" id="DataTables_Table_0_previous">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button active">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button ">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button ">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0">3
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button ">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0">4
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button ">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0">5
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button ">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0">6
                                                                </a>
                                                            </li>
                                                            <li class="paginate_button next" id="DataTables_Table_0_next">
                                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="7" tabindex="0">Next
                                                                </a>
                                                            </li>
                                                        </ul>
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
        </section>
        <?php include_once("../../PS_script/personnal/getchart.php"); ?>
    </body>
</html>