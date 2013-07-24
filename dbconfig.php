<?php
session_start();
if(isset($_SESSION['id']))
{
    mysql_connect("localhost","root","");   
    mysql_select_db("test");
}
else
{
    print("<script type='text/javascript'>window.location.href='index.php';</script>");
}
?>