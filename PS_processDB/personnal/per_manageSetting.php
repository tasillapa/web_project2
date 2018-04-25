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
        case "AUSER":add_user();
            break;
        case "SLUSER":sl_data_setting();
            break;
        case "EUSER": edit_user();
            break;
        case "DUSER": del_user();
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
            $sql = "SELECT * from ps_personnal AS ps LEFT JOIN ps_class AS pc ON ps.class_id = pc.code_class LEFT JOIN ps_position AS pp ON ps.pos_id = pp.pos_code ORDER BY ps.status DESC";
        } else {
            $sql = "SELECT * from ps_personnal AS ps LEFT JOIN ps_class AS pc ON ps.class_id = pc.code_class LEFT JOIN ps_position AS pp ON ps.pos_id = pp.pos_code WHERE ps.member_id ='$id' ORDER BY ps.status DESC";
        }
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function add_user() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "INSERT INTO ps_personnal (card_id, nameuser, lastname, tel, email, pos_id, class_id, username, password, level, status, person_create, date_create, person_update, date_update)"
                . "VALUES('$get_data[0]', '$get_data[1]', '$get_data[2]', '$get_data[3]', '$get_data[4]', '$get_data[5]', '$get_data[6]', '$get_data[7]', '$get_data[8]', '$get_data[9]', '$get_data[10]', '$get_data[11]', '$get_data[12]', '$get_data[13]', '$get_data[14]')";
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

function edit_user() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "UPDATE ps_personnal SET card_id = '$get_data[0]', nameuser = '$get_data[1]', lastname = '$get_data[2]', tel = '$get_data[3]', email = '$get_data[4]', pos_id= '$get_data[5]', class_id = '$get_data[6]', username = '$get_data[7]', password= '$get_data[8]', level = '$get_data[9]', status ='$get_data[10]', person_update = '$get_data[11]', date_update = '$get_data[12]'"
                . " WHERE member_id = '$get_data[13]'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}
function del_user(){
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $sql = "DELETE FROM ps_personnal WHERE member_id = '$get_data[0]'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}
?>

