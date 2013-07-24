<?php
session_start();
include "dbconfig.php";
?>
<center>
<table width="55%">
    <tr>
        <td><h2><a href="home.php">Home</a></h2></td>
        <td><h2><a href="profile.php">Profile</a></h2></td>
        <td><h2><a href="changepwd.php">Change Passoword</a></h2></td>
        <td><h2><a href="addpost.php">Add New Post</a></h2></td>
        <td><h2><a href="logout.php">Logout</a></h2></td>
    </tr>
</table>
<br>
<form action="home.php" method="post">
<table>
    <tr><td>
        <textarea rows="4" cols="50" name="post" style="resize: none" autofocus></textarea>
        </td>
        <td>
            <input type="submit" value="post"/>
        </td>
    </tr>
</table>
</form>
<br>
<?php
if(isset($_POST['post']))
{
    $id=$_SESSION['id'];
    $post=$_POST['post'];
    mysql_query("INSERT INTO `test`.`user_post` (`id`, `userID`, `post`) VALUES (NULL, '$id', '$post')");
}
//fetching all user posts
$query=mysql_query("select * from user_post");
while($row=mysql_fetch_object($query))
{
    //fetching firstname and last name who is post this post
    $user=mysql_query("select fname,lname from user_reg where id='$row->userID'");    
    echo "<table width='55%'>";
    while($user1=mysql_fetch_object($user))
    {
        echo "<tr><td>$user1->fname $user1->lname</td><td><a href='post.php?id=$row->id'>$row->post</a></td><tr>";    
    }
   
    //total likes counting
    $result=mysql_query("select * from likes where postID='$row->id'");
    $result1=mysql_query("select * from comments where postID='$row->id'");
    $likes=mysql_num_rows($result);
    $comments=mysql_num_rows($result1);
    
    //$query1=mysql_query("select * from likes where uid='$id' and postID='$row->id'");
    //$result1=mysql_num_rows($query1);
    //if($result>0)
   // {
    //    echo "<tr><td></td><td>Unlike $likes | Comment $comments</td></tr>";
    //}
    //else
    //{
        //echo "<tr><td></td><td><a href='likes.php?id=$row->id'>Like</a> $likes | Comment $comments</td></tr>";
        echo "<tr><td></td><td>Like $likes | Comment $comments</td></tr>";
    //}
    echo "<tr><td colspan=2><hr></td></tr>";
    echo "</table>";
}
?>
</center>