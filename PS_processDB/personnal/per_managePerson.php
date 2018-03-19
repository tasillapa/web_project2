<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "get_prefix":get_prefix();
            break;
        case "CHK_USER":check_user();
            break;
        case "CHK_PASS":check_pass();
            break;
    }
}

function get_prefix() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_prefix ";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function check_user() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode(",", $_POST["PARM"]);
        $user = $get_data[0];
        $sql = "select * from ps_personnel where username='" . $user . "' and status = '1'";
        $nq = $cn->mysqli_num_rows($sql);
        echo $nq;
    }
    exit();
}

function check_pass() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $user = $get_data[0];
        $pass = $get_data[1];
        $sql = "select * from ps_personnel where username='" . $user . "' and password='" . $pass . "' and status = '1'";
        $nq = $cn->mysqli_num_rows($sql);
        echo $nq;
    }
    exit();
}
?>

