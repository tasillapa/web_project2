<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "sl_table_setting":sl_data_setting();
            break;
        case "APS":add_profile();
            break;
        case "DPS":del_profile();
            break;
    }
}

function sl_data_setting() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        if ($id == '') {
            $sql = "SELECT * from ps_personnel AS ps LEFT JOIN ps_class AS pc ON ps.class_id = pc.code_class LEFT JOIN ps_position AS pp ON ps.pos_id = pp.pos_code";
        } else {
            $sql = "SELECT * from ps_personnel WHERE member_id ='$id'";
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
?>

