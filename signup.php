<?php

session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'admission');
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$s="select * from signup where name='$name'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1)
{
	 $error = "<center><font size='2px' color='#FF0000'>User Already Exists you can SignIn</font></center>";
        include "new.php";
        header("refresh:1.0;url=home.html");// it takes 2 sec to go index page
}
else
{
	$reg="insert into signup(name,email,password) values ('$name','$email','$password')";
	mysqli_query($con,$reg);
	header("refresh:0.2;url=home.html");
}

?>
