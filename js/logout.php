<?php

session_start();
session_unset($_SESSION['card_id']);
session_unset($_SESSION['username']);
session_unset($_SESSION['password']);

unset($_SESSION['card_id']);
unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();
header("Location:../index.php");
?>
