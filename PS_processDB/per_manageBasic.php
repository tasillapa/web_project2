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
        case "ADDEP":add_department();
            break;
        case "DELDEP":del_department();
            break;
    }
}

function sl_table_inside() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "SELECT * from tb_class";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function add_department() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $cod = $get_data[0];
        $cod = (int) $cod;
        $name = $get_data[1];
        $sql = "INSERT INTO tb_class (code_class, name_class)"
                . "VALUES('$cod','$name')";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function del_department() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
//        print_r($get_data);exit();
        $id = $get_data[0];
        $sql = "DELETE FROM tb_class WHERE id_class = '$id'";
//        echo $sql; exit();
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

?>
  