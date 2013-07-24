<?php
session_start();
$id=$_SESSION['id'];
include "dbconfig.php";
?>
<center>
<table width="55%">
    <tr>
        <td><h2><a href="home.php">Home</a></h2></td>
        <td><h2><a href="profile.php">Profile</a></h2></td>
        <td><h2><a href="changepwd.php">Change Passoword</a></h2></td>
        <td><h2><a href="logout.php">Logout</a></h2></td>
    </tr>
</table>
<br>
<form action="changepwd.php" method="post">
<table>
    <tr><td colspan=2><h3>Change Your Password</h3></td></tr>
    <tr><td>New Password</td><td><input type="text" name="npwd"/></td></tr>
    <tr><td><input type="submit" value="Change Password"/></td><td><input type="button" value="Cancel"></td></tr>
</table>
</form>
<?php
if(isset($_POST['npwd']))
{
    $npwd=$_POST['npwd'];
    mysql_query("UPDATE  `test`.`user_reg` SET  `password` =  '$npwd' WHERE  `user_reg`.`id` ='$id'");
    echo "<script>alert('Your Password Has Been Changed');</script>";
}

?>
</center>