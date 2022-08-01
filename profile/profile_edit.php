<?php
session_start;
include("config.php");
if(isset($_SESSION["Username"])){

$Id=$_POST["Id"];
$fname=$_POST["fname"];
$email=$_POST["email"];
$phone_number=$_POST["phone_number"];
$username=$_POST["username"];
/*
echo $Id;
echo $fname;
echo $email;
echo $phone_number;
echo $username;
*/
$query="UPDATE `login_data` SET `Full Name`='$fname',`Role`='user',`Status`='Verify',`Email`='$email',`Phone_number`='$phone_number',`Username`='$username' WHERE `Id`='$Id'";
$result=mysqli_query($conn,$query) or die("error");

if($result){
    echo 1;
    
}
else{
    echo 0;
   
}
exit;
}
else{
    header("location:../login.php?error= ");
}

?>