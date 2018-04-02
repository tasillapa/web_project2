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
        case "APS":add_profile();
            break;
        case "DPS":del_profile();
            break;
        case "EPS":edit_profile();
            break;
        case "SLEPS":sl_data_profile();
            break;
        case "SLPF":sl_prefix();
            break;
        case "get_type":get_type();
            break;
        case "get_position":get_position();
            break;
        case "get_level":get_level();
            break;
        case "get_levelBoss":get_levelBoss();
            break;
        case "get_class":get_classG();
            break;
        case "get_department":get_department();
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

function add_profile() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "INSERT INTO ps_profile (card_id, pro_idpos, pro_sex, pro_prefix, pro_fname, pro_lname, pro_birthday, pro_status, pos_id, type_id, lvb_id, lv_id, class_id, dep_id, pro_salary, pro_dateIn, pro_dateOut, pro_picture, pro_person_create, pro_person_update, pro_date_update, status_admin)"
                . "VALUES('$get_data[0]', '$get_data[1]', '$get_data[2]', '$get_data[3]', '$get_data[4]', '$get_data[5]', '$get_data[6]', '$get_data[7]', '$get_data[8]', '$get_data[9]', '$get_data[10]', '$get_data[11]', '$get_data[12]', '$get_data[13]', '$get_data[14]', '$get_data[15]', '$get_data[16]', '$get_data[17]'"
                . ", '$get_data[18]', '$get_data[19]', '$get_data[20]', '$get_data[21]')";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function del_profile() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "DELETE FROM ps_profile WHERE pro_id = '$get_data[0]'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function edit_profile() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "UPDATE ps_profile
        SET card_id = '$get_data[0]', pro_idpos = '$get_data[1]', pro_sex = '$get_data[2]', pro_prefix = '$get_data[3]', pro_fname = '$get_data[4]', pro_lname = '$get_data[5]', pro_birthday = '$get_data[6]', pro_status = '$get_data[7]', pos_id = '$get_data[8]', type_id = '$get_data[9]', lvb_id = '$get_data[10]'
            , lv_id = '$get_data[11]', class_id = '$get_data[12]', dep_id = '$get_data[13]', pro_salary = '$get_data[14]', pro_dateIn = '$get_data[15]', pro_dateOut = '$get_data[16]', pro_picture = '$get_data[17]', pro_person_update = '$get_data[18]', pro_date_update = '$get_data[19]'
        WHERE pro_id = '$get_data[20]'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function sl_prefix() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "SELECT * FROM ps_prefix";
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

function get_level() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_level";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function get_levelBoss() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_leveboss";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function get_classG() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_class";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function get_department() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "select * from ps_department ";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}
?>

