<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ob_start();
@session_start();
require_once '../../connect/connect_DB_personal.php';
header("Content-type: application/json;charset=utf-8");
if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
    switch ($_POST["FN"]) {
        case "LOGIN":chklogin();
            break;
        case "CHK_USER":check_user();
            break;
        case "CHK_PASS":check_pass();
            break;
    }
}

function chklogin() {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $cn = new management;
        $cn->con_db();
        $sql = "select * from ps_personnel as ps left join ps_profile as pp on ps.card_id = pp.card_id left join ps_class as pc on pc.class_id = pp.class_id"
                . " left join ps_position as ppo on pp.pos_id = ppo.pos_id left join ps_department as pd on pp.dep_id = pd.dep_id left join ps_level as pl on pp.lv_id = pl.lv_id left join ps_leveboss as lvb on pp.lvb_id = lvb.lvb_id where ps.username='" . $_POST["username"] . "' and ps.password='" . $_POST["password"] . "' and ps.status = '1'";
        $query = $cn->Connect->query($sql);
        if (mysqli_num_rows($query) >= 1) {
            while ($rs = mysqli_fetch_array($query)) {
                $_SESSION['card_id'] = $rs['card_id'];
                $_SESSION['username'] = $rs['username'];
                $_SESSION['password'] = $rs['password'];
                $_SESSION['password'] = $rs['name_class'];
                $_SESSION['password'] = $rs['pos_name'];
                $_SESSION['password'] = $rs['dep_name'];
                $_SESSION['password'] = $rs['lv_name'];
                $_SESSION['password'] = $rs['lvb_name'];
                $_SESSION['name'] = $rs['nameuser'] . ' ' . $rs['lastname'];
            }
            echo "ok";
        } else {
            echo "no";
        }
    } else {
        echo "empty";
    }
    exit();
}

function check_user() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode(",", $_POST["PARM"]);
        $user = $get_data[0];
        $sql = "select * from ps_personnel where username='" . $user . "' and status = '1'";
        $nq = $cn->mysqli_num_rows($sql);
        echo $nq;
    }
    exit();
}

function check_pass() {
    $cn = new management;
    $cn->con_db();
    if ($cn->Connect) {
        $get_data = explode("|", $_POST["PARM"]);
        $user = $get_data[0];
        $pass = $get_data[1];
        $sql = "select * from ps_personnel where username='" . $user . "' and password='" . $pass . "' and status = '1'";
        $nq = $cn->mysqli_num_rows($sql);
        echo $nq;
    }
    exit();
}
?>

