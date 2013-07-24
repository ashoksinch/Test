<?php
session_start();
    mysql_connect("localhost","root","");   
    mysql_select_db("test");
?>
<center>
<table width="60%">
    <tr>
        <td>
<form action="register.php" method="post">
<table>
<tr><h3>Register Your Account</h3></tr>
<tr><td>First Name</td><td><input type="text" name="fname"/></td></tr>
<tr><td>Last Name</td><td><input type="text" name="lname"/></td></tr>
<tr><td>E-Mail ID</td><td><input type="text" name="email"/></td></tr>
<tr><td>User Name</td><td><input type="text" name="username"/></td></tr>
<tr><td>Password</td><td><input type="text" name="password"/></td></tr>
<tr><td><input type="submit" value="Register"/></td></tr>
</table>
</form>
        </td>
    <td>
<h2>Or</h2>
    </td>
<td>
<h3>Login your Accout here</h3>
<form action="index.php" method="post">
    <table>
        <tr><td>Username</td><td><input type="text" name="username"/></td></tr>
        <tr><td>Password</td><td><input type="text" name="password"/></td></tr>
        <tr><td><input type="submit" value="Login"/></td></tr>
    </table>
</form>

<?php
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysql_query("select * from user_reg where username='$username' and password='$password' LIMIT 1");
if(mysql_num_rows($query) > 0)
{
    while($row=mysql_fetch_object($query))
    {
        $_SESSION['id']=$row->id;
        $_SESSION['fname']=$row->fname;
        $_SESSION['lname']=$row->lname;
    }
    print("<script type='text/javascript'>window.location.href='home.php';</script>");
}
else
{
    echo "<font color='red'>Username and Password combination is wrong</red>";
}
?>
</td>
    </tr>
</table>
</center>