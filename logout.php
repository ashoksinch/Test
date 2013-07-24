<?php
session_start();
session_destroy();
$_SESSION['id']='';
$_SESSION['fname']='';
$_SESSION['lname']='';
print("<script type='text/javascript'>window.location.href='index.php';</script>");
?>