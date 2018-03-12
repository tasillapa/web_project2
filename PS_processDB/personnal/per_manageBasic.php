<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "sl_table_inside":sl_table_inside();
            break;
        case "ADDBNIN":add_BnIn();
            break;
        case "DELBNIN":del_BnIn();
            break;
        case "EBNIN":edit_BnIn();
            break;
        case "sl_dataEdit_BnIn":sl_dataEdit_BnIn();
            break;
        case "sl_table_outside":sl_table_outside();
            break;
        case "ADDBNOUT":add_BnOut();
            break;
        case "DELBNOUT":del_BnOut();
            break;
        case "EBNOUT":edit_BnOut();
            break;
        case "sl_dataEdit_BnOut":sl_dataEdit_BnOut();
            break;
        case "sl_table_position":sl_data_position();
            break;
        case "APOSI":add_position();
            break;
        case "DPOSI":del_Posi();
            break;
        case "EPOSI":edit_Posi();
            break;
        case "sl_dataEdit_Posi":sl_data_position();
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

function add_BnIn() {
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

function del_BnIn() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "DELETE FROM tb_class WHERE id_class = '$id'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function sl_dataEdit_BnIn() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "SELECT * from tb_class WHERE id_class ='$id'";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function edit_BnIn() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "UPDATE tb_class SET code_class = '$get_data[1]', name_class = '$get_data[2]' WHERE id_class = '$id'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function sl_table_outside() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $sql = "SELECT * from tb_officeout";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function add_BnOut() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $cod = $get_data[0];
        $cod = (int) $cod;
        $name = $get_data[1];
        $sql = "INSERT INTO tb_officeout (off_number, off_name)"
                . "VALUES('$cod','$name')";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function del_BnOut() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "DELETE FROM tb_officeout WHERE id_off = '$id'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function sl_dataEdit_BnOut() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "SELECT * from tb_officeout WHERE id_off ='$id'";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function edit_BnOut() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "UPDATE tb_officeout SET off_number = '$get_data[1]', off_name = '$get_data[2]' WHERE id_off = '$id'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function sl_data_position() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        if ($id == '') {
            $sql = "SELECT * from tb_position";
        } else {
            $sql = "SELECT * from tb_position WHERE pos_id ='$id'";
        }
        
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

function add_position() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $cod = $get_data[0];
        $cod = (int) $cod;
        $name = $get_data[1];
        $sql = "INSERT INTO tb_position  (pos_code, pos_name)"
                . "VALUES('$cod','$name')";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function del_Posi() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "DELETE FROM tb_position WHERE pos_id = '$id'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function edit_Posi() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        $sql = "UPDATE tb_position SET pos_code = '$get_data[1]', pos_name = '$get_data[2]' WHERE pos_id = '$id'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}
?>
  