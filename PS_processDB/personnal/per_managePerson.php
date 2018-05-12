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
        case "EPSM":edit_profile_main();
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

if (!empty($_FILES['filePerson'])) {
    $file_array = explode(".", $_FILES["filePerson"]["name"]);
    if ($file_array[1] == "xlsx") {
        $tmpFolder = "../../doc/import_person/";
        move_uploaded_file($_FILES['filePerson']['tmp_name'], $tmpFolder . $_FILES['filePerson']['name']);
        $person_update = $_SESSION['name'];
        $date = date('Y-m-d H:i:s');
        include("../../PHPExcel/Classes/PHPExcel/IOFactory.php");
        $object = PHPExcel_IOFactory::load($tmpFolder . $_FILES["filePerson"]["name"]);
        $cn = new management;
        $cn->con_db();
        $pos_id = '';
        $class_id = '';
        $dep_id = '';
        foreach ($object->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $card_id = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $pro_idpos = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $pro_sex = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $pro_prefix = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                $pro_fname = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                $pro_lname = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                $pro_status = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                $pos_code = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                $sql_pos_id = "SELECT pos_id FROM ps_position WHERE pos_code = '$pos_code'";
                $query_pos_id = $cn->Connect->query($sql_pos_id);
                while ($rs_pos_id = mysqli_fetch_array($query_pos_id)) {
                    $pos_id = $rs_pos_id['pos_id'];
                }
                $type_id = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                $lvb_id = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
                $lv_id = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
                $class_code = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
                $sql_class_id = "SELECT class_id FROM ps_class WHERE class_code = '$class_code'";
                $query_class_id = $cn->Connect->query($sql_class_id);
                while ($rs_class_id = mysqli_fetch_array($query_class_id)) {
                    $class_id = $rs_class_id['class_id'];
                }
                $dep_code = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
                $sql_dep_id = "SELECT dep_id FROM ps_department WHERE dep_code = '$dep_code'";
                $query_dep_id = $cn->Connect->query($sql_dep_id);
                while ($rs_dep_id = mysqli_fetch_array($query_dep_id)) {
                    $dep_id = $rs_dep_id['dep_id'];
                }
                $pro_salary = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
                $salary_array = explode(",", $pro_salary);
                $pro_salary = $salary_array[0] . $salary_array[1];
                $pro_dateIn = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
                $pro_picture = mysqli_real_escape_string($cn->Connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());

                $sql = "INSERT INTO ps_profile (card_id, pro_idpos, pro_sex, pro_prefix, pro_fname, pro_lname, pro_status, pos_id, type_id, lvb_id, lv_id, class_id, dep_id, pro_salary, pro_dateIn, pro_picture, pro_person_create, pro_date_create, pro_person_update, pro_date_update)"
                        . "VALUES('$card_id', '$pro_idpos', '$pro_sex', '$pro_prefix', '$pro_fname', '$pro_lname', '$pro_status', '$pos_id', '$type_id', '$lvb_id', '$lv_id', '$class_id', '$dep_id', '$pro_salary', '$pro_dateIn', '$pro_picture', '$person_update', '', '$person_update', '')";
                $stmt = $cn->Connect->prepare($sql);
                $ret = $stmt->execute();
            }
        }
        echo '1'; // Success
    } else {
        echo '2'; // Filename Error
    }
    exit();
} else if (!empty($_FILES['Improfile'])) {
    $file_array = explode(".", $_FILES["Improfile"]["name"]);
    if ($file_array[1] == ('png' || "jpg")) {
        $cn = new management;
        $cn->con_db();
        $rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'), 0, 15);
        $new_images = $rand . '-' . $_FILES["Improfile"]["name"];
        $tmpFolder = "../../images/img-profile/" . $new_images;
        move_uploaded_file($_FILES['Improfile']['tmp_name'], $tmpFolder);
        echo $tmpFolder;
        exit();
    }
} else {
    echo '0'; // No Input File
    exit();
}

function sl_data_profile() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $id = $get_data[0];
        if ($id == '') {
            $sql = "SELECT * from ps_profile LEFT JOIN ps_class ON ps_profile.class_id = ps_class.class_id";
        } else {
            $sql = "SELECT * from ps_profile LEFT JOIN ps_class ON ps_profile.class_id = ps_class.class_id WHERE ps_profile.pro_id ='$id'";
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
        if ($get_data[18] == '0') {
            $path = '../../noImg.png';
        } else {
            $path = $get_data[18];
        }
        $sql = "INSERT INTO ps_profile (card_id, pro_idpos, pro_sex, pro_prefix, pro_fname, pro_lname, pro_nickname, pro_birthday, pro_status, pos_id, type_id, lvb_id, lv_id, class_id, dep_id, pro_salary, pro_dateIn, pro_dateOut, pro_picture, pro_person_create, pro_date_create, pro_person_update, pro_date_update)"
                . "VALUES('$get_data[0]', '$get_data[1]', '$get_data[2]', '$get_data[3]', '$get_data[4]', '$get_data[5]', '$get_data[6]', '$get_data[7]', '$get_data[8]', '$get_data[9]', '$get_data[10]', '$get_data[11]', '$get_data[12]', '$get_data[13]', '$get_data[14]', '$get_data[15]', '$get_data[16]', '$get_data[17]'"
                . ", '$path', '$get_data[19]', '$get_data[20]', '$get_data[21]', '$get_data[22]')";
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
        $path = '';
        $sql_img = "SELECT pro_picture FROM ps_profile WHERE pro_id = '$get_data[0]'";
        $Query = $cn->Connect->query($sql_img);
        while ($Row = mysqli_fetch_array($Query)) {
            $path = $Row['pro_picture'];
        }
        if ($path != '') {
            $files = glob($path);
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
        }
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
//        print_r($get_data);
//        exit();
        $path = '';
        $sql_img = "SELECT pro_picture FROM ps_profile WHERE pro_id = '$get_data[21]'";
        $Query = $cn->Connect->query($sql_img);
        while ($Row = mysqli_fetch_array($Query)) {
            $path = $Row['pro_picture'];
        }
        if ($path != $get_data[22]) {
            $files = glob($path);
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
        }else if ($path != $get_data[18]) {
            $files = glob($get_data[18]);
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
            $get_data[18] = $path;
        }

        $sql_sl_geninfo = "SELECT * FROM ps_geninformation WHERE pro_id = '$get_data[43]'";
        $Query_geninfo = $cn->Connect->query($sql_sl_geninfo);
        if (mysqli_num_rows($Query_geninfo) == '0') {
            $sql_add_geninfo = "INSERT INTO ps_geninformation (gen_card_id, gen_prefix, gen_old, PROVINCE_ID, nationality_id, nationality_id_race, religion_id, gen_blood, gen_soldier, gen_tax, gen_passport, bank_id, gen_account_number, gen_email, gen_facebook, gen_twitter"
                    . ", gen_line, gen_talent, gen_interest, expert_name, expert_ex, pro_id)"
                    . " VALUES ('$get_data[0]', '$get_data[23]', '$get_data[24]', '$get_data[25]', '$get_data[26]', '$get_data[27]', '$get_data[28]', '$get_data[29]', '$get_data[30]', '$get_data[31]', '$get_data[32]', '$get_data[33]', '$get_data[34]', '$get_data[35]'"
                    . ", '$get_data[36]', '$get_data[37]', '$get_data[38]', '$get_data[39]', '$get_data[40]', '$get_data[41]', '$get_data[42]', '$get_data[43]')";
            $cn->exec($sql_add_geninfo);
        } else {
            $sql_edit_geninfo = "UPDATE ps_geninformation SET gen_card_id = '$get_data[0]', gen_prefix = '$get_data[23]', gen_old = '$get_data[24]', PROVINCE_ID = '$get_data[25]', nationality_id = '$get_data[26]', nationality_id_race = '$get_data[27]', religion_id = '$get_data[28]'"
                    . ", gen_blood = '$get_data[29]', gen_soldier = '$get_data[30]', gen_tax = '$get_data[31]', gen_passport = '$get_data[32]', bank_id = '$get_data[33]', gen_account_number = '$get_data[34]', gen_email = '$get_data[35]', gen_facebook = '$get_data[36]', gen_twitter = '$get_data[37]'"
                    . ", gen_line = '$get_data[38]', gen_talent = '$get_data[39]', gen_interest = '$get_data[40]', expert_name = '$get_data[41]', expert_ex = '$get_data[42]'"
                    . " WHERE pro_id = '$get_data[43]'";
            $cn->exec($sql_edit_geninfo);
        }

        $sql_address = "SELECT * FROM ps_address WHERE pro_id = '$get_data[43]'";
        $Query_address = $cn->Connect->query($sql_address);
        if (mysqli_num_rows($Query_address) == '0') {
            $sql_add_address = "INSERT INTO ps_address(address_number, address_swine, address_soi, address_road, address_village, address_province, address_amphur, address_district, address_zip_code, address_call, address_fhone, pro_id)"
                    . " VALUES ('$get_data[44]', '$get_data[45]', '$get_data[46]', '$get_data[47]', '$get_data[48]', '$get_data[49]', '$get_data[50]', '$get_data[51]', '$get_data[52]', '$get_data[53]', '$get_data[54]', '$get_data[43]')";
            $cn->exec($sql_add_address);
        } else {
            $sql_edit_address = " UPDATE ps_address SET address_number = '$get_data[44]', address_swine = '$get_data[45]', address_soi = '$get_data[46]', address_road= '$get_data[47]', address_village= '$get_data[48]', address_province= '$get_data[49]'"
                    . ", address_amphur = '$get_data[50]', address_district = '$get_data[51]', address_zip_code = '$get_data[52]', address_call = '$get_data[53]', address_fhone = '$get_data[54]'"
                    . " WHERE pro_id = '$get_data[43]'";
            $cn->exec($sql_edit_address);
        }

        $sql_pread = "SELECT * FROM ps_preaddress WHERE pro_id = '$get_data[43]'";
        $Query_pread = $cn->Connect->query($sql_pread);
        if (mysqli_num_rows($Query_pread) == '0') {
            $sql_add_pread = "INSERT INTO ps_preaddress(pread_number, pread_swine, pread_soi, pread_road, pread_village, pread_province, pread_amphur, pread_district, pread_zip_code, pread_call, pread_fhone, pro_id)"
                    . " VALUES ('$get_data[44]', '$get_data[45]', '$get_data[46]', '$get_data[47]', '$get_data[48]', '$get_data[49]', '$get_data[50]', '$get_data[51]', '$get_data[52]', '$get_data[53]', '$get_data[54]', '$get_data[43]')";
            $cn->exec($sql_add_pread);
        } else {
            $sql_edit_pread = " UPDATE ps_preaddress SET pread_number = '$get_data[55]', pread_swine = '$get_data[56]', pread_soi = '$get_data[57]', pread_road= '$get_data[58]', pread_village= '$get_data[59]', pread_province= '$get_data[60]'"
                    . ", pread_amphur = '$get_data[61]', pread_district = '$get_data[62]', pread_zip_code = '$get_data[63]', pread_call = '$get_data[64]', pread_fhone = '$get_data[65]'"
                    . " WHERE pro_id = '$get_data[43]'";
            $cn->exec($sql_edit_pread);
        }

        $sql = "UPDATE ps_profile
        SET card_id = '$get_data[0]', pro_idpos = '$get_data[1]', pro_sex = '$get_data[2]', pro_prefix = '$get_data[3]', pro_fname = '$get_data[4]', pro_lname = '$get_data[5]', pro_nickname = '$get_data[6]', pro_birthday = '$get_data[7]', pro_status = '$get_data[8]', pos_id = '$get_data[9]', type_id = '$get_data[10]', lvb_id = '$get_data[11]'
            , lv_id = '$get_data[12]', class_id = '$get_data[13]', dep_id = '$get_data[14]', pro_salary = '$get_data[15]', pro_dateIn = '$get_data[16]', pro_dateOut = '$get_data[17]', pro_picture = '$get_data[18]', pro_person_update = '$get_data[19]', pro_date_update = '$get_data[20]'
        WHERE pro_id = '$get_data[21]'";
        $rs = $cn->execute($sql);
        echo $rs;
    }
    exit();
}

function edit_profile_main() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
//        print_r($get_data);
//        exit();
        $path = '';
        $sql_img = "SELECT pro_picture FROM ps_profile WHERE pro_id = '$get_data[21]'";
        $Query = $cn->Connect->query($sql_img);
        while ($Row = mysqli_fetch_array($Query)) {
            $path = $Row['pro_picture'];
        }
        if ($path != $get_data[22]) {
            $files = glob($path);
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
        }else if ($path != $get_data[18]) {
            $files = glob($get_data[18]);
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
            $get_data[18] = $path;
        }

        $sql = "UPDATE ps_profile
        SET card_id = '$get_data[0]', pro_idpos = '$get_data[1]', pro_sex = '$get_data[2]', pro_prefix = '$get_data[3]', pro_fname = '$get_data[4]', pro_lname = '$get_data[5]', pro_nickname = '$get_data[6]', pro_birthday = '$get_data[7]', pro_status = '$get_data[8]', pos_id = '$get_data[9]', type_id = '$get_data[10]', lvb_id = '$get_data[11]'
            , lv_id = '$get_data[12]', class_id = '$get_data[13]', dep_id = '$get_data[14]', pro_salary = '$get_data[15]', pro_dateIn = '$get_data[16]', pro_dateOut = '$get_data[17]', pro_picture = '$get_data[18]', pro_person_update = '$get_data[19]', pro_date_update = '$get_data[20]'
        WHERE pro_id = '$get_data[21]'";
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

