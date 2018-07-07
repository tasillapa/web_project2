<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "getre_tran":getre_tran();
            break;
        case "getre_onetran":getre_onetran();
            break;
    }
}

function getre_onetran() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "SELECT *  ,YEAR(pro_dateOut)+543 AS year   COUNT(YEAR(pro_dateOut)) AS num  FROM `ps_profile`  INNER JOIN ps_transferout ON ps_profile.pro_id = ps_transferout.pro_id WHERE YEAR(pro_dateOut) ASC";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function getre_tran() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        if ($get_data[0] == '1') {
            $sql = "SELECT * FROM `ps_profile` INNER JOIN ps_transferout ON ps_profile.pro_id = ps_transferout.pro_id LEFT JOIN ps_position ON ps_profile.pos_id = ps_position.pos_id LEFT JOIN ps_class ON  ps_profile.class_id = ps_class.class_id where tran_status = 1";
        } else if ($get_data[0] == '2') {
            $sql = "SELECT * FROM `ps_profile` INNER JOIN ps_transferout ON ps_profile.pro_id = ps_transferout.pro_id LEFT JOIN ps_position ON ps_profile.pos_id = ps_position.pos_id LEFT JOIN ps_class ON  ps_profile.class_id = ps_class.class_id where tran_status = 2";
        } else if ($get_data[0] == '0') {
            $sql = "SELECT * FROM `ps_profile` LEFT JOIN ps_position ON ps_profile.pos_id = ps_position.pos_id LEFT JOIN ps_class ON  ps_profile.class_id = ps_class.class_id WHERE pro_transfer != ''";
        } else {
            $sql = "SELECT * FROM `ps_profile` LEFT JOIN ps_transferout ON ps_profile.pro_id = ps_transferout.pro_id LEFT JOIN ps_position ON ps_profile.pos_id = ps_position.pos_id LEFT JOIN ps_class ON  ps_profile.class_id = ps_class.class_id WHERE tran_status = 1 OR tran_status = 2 OR pro_transfer != ''";
        }
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

?>