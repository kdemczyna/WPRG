<?php
session_start();
$_SESSION["is_logged"]=0;
session_destroy();
header('Location: home_page.php');
?>