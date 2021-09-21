<?php
$uname=$_POST['name'];//username
$password=$_POST['password'];//password 
session_start();

$con=mysqli_connect("localhost","root","","admission");//mysqli("localhost","username of database","password of database","database name")
$result=mysqli_query($con,"SELECT * FROM `signup` WHERE `name`='$uname' && `password`='$password'");
$count=mysqli_num_rows($result);

if($count==1)
{
	$_SESSION["name"]= $uname;
	header("refresh:0.2;url=login.html");
	$_SESSION['log']=1;
	//header("refresh:2;url=welcome.php");
	$error1 = "<center><font size='2px' color='#FF0000'>Success</font></center>";
        include "new.php";

}
else
{$error2 = "<center><font size='2px' color='#FF0000'>Invalid Login</font></center>";
        include "new.php"; 	
 
	header("refresh:1.0;url=home.html");// it takes 2 sec to go index page
}
?>