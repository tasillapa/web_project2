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
        $sql = "select * from tb_personnel where username='" . $_POST["username"] . "' and password='" . $_POST["password"] . "' and status = '1'";
        $query = $cn->Connect->query($sql);
        if (mysqli_num_rows($query) >= 1) {
            while ($rs = mysqli_fetch_array($query)) {
                $_SESSION['card_id'] = $rs['card_id'];
                $_SESSION['username'] = $rs['username'];
                $_SESSION['password'] = $rs['password'];
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
        $sql = "select * from tb_personnel where username='" . $user . "' and status = '1'";
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
        $sql = "select * from tb_personnel where username='" . $user . "' and password='" . $pass . "' and status = '1'";
        $nq = $cn->mysqli_num_rows($sql);
        echo $nq;
    }
    exit();
}
?>

