<?php
session_start();
$id=$_SESSION['id'];
include "dbconfig.php";
if(isset($_GET['id']))
{
    $postID=$_GET['id'];
    $query=mysql_query("select * from likes where uid='$id' and postID='$postID'");
    $result=mysql_num_rows($query);
    if($result>0)
    {
        echo "<script>alert('you already like this post');</script>";
        print("<script type='text/javascript'>window.location.href='post.php?id=$postID';</script>");
    }
    else
    {
        mysql_query("insert into likes values(NULL,'$id','$postID',now())");
        print("<script type='text/javascript'>window.location.href='post.php?id=$postID';</script>");
    }
}
?>