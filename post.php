<?php
session_start();
include "dbconfig.php";
$uid=$_SESSION['id'];
?>
<center>
<table width="55%">
    <tr>
        <td><h2><a href="home.php">Home</a></h2></td>
        <td><h2><a href="profile.php">Profile</a></h2></td>
        <td><h2><a href="changepwd.php">Change Passoword</a></h2></td>
        <td> <?php echo "hello,".$_SESSION['fname'];?><h2><a href="logout.php">Logout</a></h2></td>
    </tr>
</table>
<br>
<?php
if(isset($_GET['postID']))
{
    $postID=$_GET['postID'];
    $comment=$_POST['comment'];
    mysql_query("insert into comments values(NULL,'$uid','$postID','$comment',now())");
    print("<script type='text/javascript'>window.location.href='post.php?id=$postID';</script>");
}
if(isset($_GET['id']))
{
    $postID=$_GET['id'];
    $query=mysql_query("select * from user_post where id='$postID'");
    while($row=mysql_fetch_object($query))
    {
        $user=mysql_query("select fname,lname from user_reg where id='$row->userID'");    
        echo "<table width='55%'>";
        while($user1=mysql_fetch_object($user))
        {
            echo "<tr><td>$user1->fname $user1->lname</td><td><h1>$row->post</h1></td><tr>";    
        }
        
        
            $like_result=mysql_query("select * from likes where postID='$postID'");
            $comm_result1=mysql_query("select * from comments where postID='$postID'");
            $likes=mysql_num_rows($like_result);
            $comments=mysql_num_rows($comm_result1);
            
        echo "<tr><td>$likes <a href='likes.php?id=$postID'>likes</a> | $comments comments</td><td><form action='post.php?postID=". $postID ."' method='post'><input type='text' name='comment'/><input type='submit' value='Comment'/></form></td></tr>";
        
        $result=mysql_query("select * from comments where comments.postID='$postID'");
        while($row1=mysql_fetch_object($result))
        {
            $query=mysql_query("select fname,lname from user_reg where id='$row1->uid'");
            echo "<tr><td></td><td>";
            while($comm_user=mysql_fetch_object($query))
            {
                echo "$comm_user->fname $comm_user->lname<br>";
            }
            echo "$row1->comment</td></tr>";
            echo "<tr><td></td><td><hr></td></tr>";
        }
        echo "</table>";
    }
    
}
?>
</center>