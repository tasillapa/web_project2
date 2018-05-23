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
        case "IMUSER": import_user();
            break;
    }
}

if (!empty($_FILES['fileUser'])) {
    $file_array = explode(".", $_FILES["fileUser"]["name"]);
    if ($file_array[1] == "xlsx") {
        $tmpFolder = "../../doc/import-user/";
        move_uploaded_file($_FILES['fileUser']['tmp_name'], $tmpFolder . $_FILES['fileUser']['name']);
        $person_update = $_SESSION['name'];
        $date = date('Y-m-d H:i:s');
        include("../../PHPExcel/Classes/PHPExcel/IOFactory.php");
        $object = PHPExcel_IOFactory::load($tmpFolder . $_FILES["fileUser"]["name"]);
        $cn = new management;
        $cn->con_db();
        $pos_id = '';
        $class_id = '';
        foreach ($object->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $card_id = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $nameuser = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $lastname = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $pos_code = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                $sql_pos_id = "SELECT pos_id FROM ps_position WHERE pos_code = '$pos_code'";
                $query_pos_id = $cn->Connect->query($sql_pos_id);
                while ($rs_pos_id = mysqli_fetch_array($query_pos_id)) {
                    $pos_id = $rs_pos_id['pos_id'];
                }
                $class_code = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                $sql_class_id = "SELECT class_id FROM ps_class WHERE class_code = '111'";
                $query_class_id = $cn->Connect->query($sql_class_id);
                while ($rs_class_id = mysqli_fetch_array($query_class_id)) {
                    $class_id = $rs_class_id['class_id'];
                }
                $tel = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                $email = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                $username = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                $password = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                $level = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
                $status = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                $person_create = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
                $sql = "INSERT INTO ps_personnal (card_id, nameuser, lastname, pos_id, class_id, tel, email, username, password, level, status, person_create, date_create, person_update, date_update)"
                        . "VALUES('$card_id', '$nameuser', '$lastname', '$pos_id', '$class_id', '$tel', '$email', '$username', '$password', '$level', '$status', '$person_create', '$date', '$person_update', '$date')";
                $stmt = $cn->Connect->prepare($sql);
                $ret = $stmt->execute();
            }
        }
        echo '1'; // Success
    } else {
        echo '2'; // Filename Error
    }
    exit();
} else {
    echo '0'; // No Input File
    exit();
}

function sl_data_setting() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        if ($id == '') {
            $sql = "SELECT * from ps_personnal AS ps LEFT JOIN ps_class AS pc ON ps.class_id = pc.class_id LEFT JOIN ps_position AS pp ON ps.pos_id = pp.pos_id ORDER BY ps.status DESC";
        } else {
            $sql = "SELECT * from ps_personnal AS ps LEFT JOIN ps_class AS pc ON ps.class_id = pc.class_id LEFT JOIN ps_position AS pp ON ps.pos_id = pp.pos_id WHERE ps.member_id ='$id' ORDER BY ps.status DESC";
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

function del_user() {
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

function import_user() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        print_r($get_data);
        exit();
        $sql = "DELETE FROM ps_personnal WHERE member_id = '$get_data[0]'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}
?>

