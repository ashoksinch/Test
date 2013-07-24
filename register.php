<?php
include "dbconfig.php";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("INSERT INTO `test`.`user_reg` (`id`, `fname`, `lname`, `email`, `username`, `password`) VALUES (NULL, '$fname', '$lname', '$email', '$username', '$password')");
echo "<script>alert('successfully register');</script>";
header(Location,"index.php");
?>