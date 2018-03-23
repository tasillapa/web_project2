<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "sl_table_profile":sl_data_profile();
            break;
    }
}

function sl_data_profile() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        if ($id == '') {
            $sql = "SELECT * from ps_profile";
        } else {
            $sql = "SELECT * from ps_profile WHERE pro_id ='$id'";
        }
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}
?>

