<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "get_year":get_data_year();
            break;
        case "getYear":getYear();
            break;
        case "get_year_between":get_year_between();
            break;
    }
}

function get_data_year() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $year = $get_data[0];
        $sql = "SELECT * ,YEAR(pro_dateOut)+543 AS year, COUNT(YEAR(pro_dateOut)) AS num FROM `ps_profile` WHERE YEAR(pro_dateOut) = '$year' GROUP BY year(pro_dateOut) ORDER BY year ASC";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function getYear() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "SELECT * ,YEAR(pro_dateOut)+543 AS year, COUNT(YEAR(pro_dateOut)) AS num FROM `ps_profile` GROUP BY year(pro_dateOut) ORDER BY year ASC";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function get_year_between() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $yearMaX = $get_data[0];
        $yearMin = $get_data[1];
        $sql = "SELECT * ,YEAR(pro_dateOut)+543 AS year, COUNT(YEAR(pro_dateOut)) AS num FROM `ps_profile` WHERE YEAR(pro_dateOut) <= '$yearMaX' AND YEAR(pro_dateOut) >= '$yearMin' GROUP BY year(pro_dateOut) ORDER BY year ASC";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

?>