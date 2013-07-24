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
<?php
//if($_POST)
//{
//    echo "Update Your Profile";
//}
$query=mysql_query("select * from user_reg where id='$id'");
while($row=mysql_fetch_object($query))
{
    echo "<table>";
    echo "<tr><td><b>First Name</b></td><td><i>$row->fname</i></td></tr>";
    echo "<tr><td><b>Last Name</b></td><td><i>$row->lname</i></td></tr>";
    echo "<tr><td><b>E-Mail ID</b></td><td><i>$row->email</i></td></tr>";
    echo "<tr><td><b>User Name</b></td><td><i>$row->username</i></td></tr>";
    echo "<tr><td><input type='submit' value='Edit Profile'/></td></tr>";
    echo "</table>";
}
?>
</center>