<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "sl_table_inside":sl_table_inside();
            break;
        case "CHK_USER":check_user();
            break;
        case "CHK_PASS":check_pass();
            break;
    }
}

function sl_table_inside() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from tb_class";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

?>
  