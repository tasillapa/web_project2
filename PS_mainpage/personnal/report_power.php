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
                            <!-- Exportable Table -->
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                อัตรากำลังองค์กร
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" rowspan="2" width="100%"><label>หน่วยงาน</label></th>
                                                            <th colspan="8">จำนวนบุคลากร</th>
                                                            <th rowspan="2">รวม</th>
                                                        </tr>
                                                        <tr>
                                                            <th>ข้าราชการ</th>
                                                            <th>พนักงานราชการ</th>
                                                            <th>ลูกจ้างประจำ</th>
                                                            <th>พนักงานกระทรวง สธ</th>
                                                            <th>ลูกจ้างเงิน ปตท.</th>
                                                            <th>ลูกจ้างเหมาบริการ</th>
                                                            <th>ชาย</th>
                                                            <th>หญิง</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $cn = new management;
                                                        $cn->con_db();
                                                        $sql = "SELECT * FROM `ps_class` ORDER BY class_id ASC;";
                                                        $query = $cn->Connect->query($sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo "<tr>";
                                                            echo "<th colspan='2'>" . $row['class_name'] . "</th>";
                                                            $f = 0;
                                                            $m = 0;
                                                            $check_data = [12, 2, 6, 11, 10, 9];
                                                            $arr_type_id = array();
                                                            for ($i = 0; $i < 6; $i++) {
                                                                $sql_m = "SELECT ps.pro_id AS sex_m FROM ps_profile AS ps LEFT JOIN ps_type AS pt ON ps.type_id = pt.type_id LEFT JOIN ps_class AS pc ON ps.class_id = pc.class_id WHERE ps.class_id = '" . $row['class_id'] . "' AND ps.type_id = '" . $check_data[$i] . "' AND ps.pro_sex = 1";
                                                                $query_m = $cn->Connect->query($sql_m);
                                                                $m += mysqli_num_rows($query_m);

                                                                $sql_f = "SELECT ps.pro_id AS sex_m FROM ps_profile AS ps LEFT JOIN ps_type AS pt ON ps.type_id = pt.type_id LEFT JOIN ps_class AS pc ON ps.class_id = pc.class_id WHERE ps.class_id = '" . $row['class_id'] . "' AND ps.type_id = '" . $check_data[$i] . "' AND ps.pro_sex = 2";
                                                                $query_f = $cn->Connect->query($sql_f);
                                                                $f += mysqli_num_rows($query_f);
                                                                $sql2 = "SELECT ps.pro_sex ,COUNT(ps.pro_id) AS num FROM ps_profile AS ps LEFT JOIN ps_type AS pt ON ps.type_id = pt.type_id LEFT JOIN ps_class AS pc ON ps.class_id = pc.class_id WHERE ps.class_id = '" . $row['class_id'] . "' AND ps.type_id = '" . $check_data[$i] . "'";
                                                                $query2 = $cn->Connect->query($sql2);
                                                                if (mysqli_num_rows($query2) >= 1) {
                                                                    while ($row2 = mysqli_fetch_array($query2)) {
                                                                        array_push($arr_type_id, $row2['pro_sex']);

                                                                        if ($row2['pro_sex'] != '') {
                                                                            echo "<td>" . $row2['num'] . "</td>";
                                                                        } else {
                                                                            echo "<td>-</td>";
                                                                        }
                                                                    }
                                                                } else {
                                                                    echo "<td>-</td>";
                                                                }
                                                            }
                                                            echo "<td>" . $m . "</td>";
                                                            echo "<td>" . $f . "</td>";
                                                            echo "<td>" . ($m + $f) . "</td>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Exportable Table -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Script -->
        <?php include ("../../PS_script/personnal/report_Scpower.php"); ?>
    </body>
</html>