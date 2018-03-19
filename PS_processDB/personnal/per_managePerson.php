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
        case "get_type":get_type();
            break;
        case "get_position":get_position();
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

function get_type() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_type";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function get_position() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_position";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}
?>

