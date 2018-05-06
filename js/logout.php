<?php

session_start();
session_unset($_SESSION['card_id']);
session_unset($_SESSION['username']);
session_unset($_SESSION['password']);
session_unset($_SESSION['name_class']);
session_unset($_SESSION['pos_name']);
session_unset($_SESSION['dep_name']);
session_unset($_SESSION['lv_name']);
session_unset($_SESSION['lvb_name']);
session_unset($_SESSION['pro_id']);
session_unset($_SESSION['name']);
session_unset($_SESSION['pro_picture']);
session_unset($_SESSION['tel']);

unset($_SESSION['card_id']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['name_class']);
unset($_SESSION['pos_name']);
unset($_SESSION['dep_name']);
unset($_SESSION['lv_name']);
unset($_SESSION['lvb_name']);
unset($_SESSION['pro_id']);
unset($_SESSION['pro_picture']);
unset($_SESSION['tel']);
unset($_SESSION['name']);

session_destroy();
header("Location:../index.php");
?>
