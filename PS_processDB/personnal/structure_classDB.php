<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "get_tructure_class":get_tructure_class();
            break;
    }
}

function get_tructure_class() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);

        $sql = "SELECT * FROM `ps_class` LEFT JOIN ps_profile ON ps_class.class_id = ps_profile.class_id 
                    LEFT JOIN ps_position ON ps_position.pos_id = ps_profile.pos_id
                    LEFT JOIN ps_type ON ps_type.type_id = ps_profile.type_id
                    LEFT JOIN ps_levelboss ON ps_levelboss.lvb_id = ps_profile.lvb_id
                    LEFT JOIN ps_level ON ps_level.lv_id = ps_profile.lv_id
                    LEFT JOIN ps_department ON ps_department.dep_id = ps_profile.dep_id
                    WHERE ( ps_class.class_id = '$get_data[0]' OR ps_profile.lvb_id = 0001 )
                    AND ps_profile.pro_fname != 'NULL'
                    ORDER BY ps_levelboss.lvb_claim IS NULL, ps_levelboss.lvb_claim ASC";
        $rs = $cn->select($sql);
        $json = json_encode($rs);
        echo $json;
    }
    exit();
}

?>