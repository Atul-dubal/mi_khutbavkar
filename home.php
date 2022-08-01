<?php 
session_start();
include("config.php");
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
   // echo($user);
    $query="SELECT * FROM `login_data` WHERE `Username`='$user'";
    $result=mysqli_query($conn,$query) or die("query error");
    if(mysqli_num_rows($result)==0){
            
        header("location:logout.php");
}else{
    $data=mysqli_fetch_assoc($result) or die("result error");
   
    
    
   $query1="SELECT * FROM `login_data` WHERE `Status`='Not Verify'";
    $result1=mysqli_query($conn,$query1) or die("query error");
    $no_of_requests= mysqli_num_rows($result1);


?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/home.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
      <meta charset="UTF-8">
      <meta name="description" content="LearnWithAP - Easy Way To Learn.">
      <meta name="keywords" content="ap,,LEARNWITHAP,learnwithap,LearnWithAP,LearnWithap">
      <meta name="author" content="Atul Dubal">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=fire">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
   
    <body>
     <center>
            <header><h1 class="font-effect-fire">मी खुटबावकर</h1></header>
            </center>
            <div id="menu">
                <div class="menu"></div>
                <div class="menu"></div>
                <div class="menu"></div>
            </div>
      
            
 
     <div id="container" >
                 <i id="cross" class='fa fa-close' style='color: red;font-size:35px;float:right'></i>
   <br>
       <div id="nav-bar" >

         <ul>
           <a href=".\profile/profile.php"> <li>Profile</li></a>
         <?php 
         if($data["Role"]=="admin"){
             
         ?>
            <a href=".\profile/profile.php"> <li>Joining Requests <span style="width:15px; height:15px; background:red;text-align: center"><?php echo $no_of_requests;?></span></li></a>
       <?php  } ?>
           <a href=".\contactus.php"> <li>Contact Us</li></a>
           <a href=".\aboutus.php"> <li>About Us</li></a>
           <a href=".\logout.php"> <li>Logout</li></a>
         </ul> 
       </div>
     </div>    
   <br>

<h1>Welcome <?php echo$data["Full Name"]?></h1>
     
 <script>
      
$("i").hide();
$("#container").hide();
        $(document).ready(function(){
             $("#menu").click(function (){
                 $("#menu").hide(10);
                 $("i").show(500);
                 $("#container").show(500);
             
             });
          $("i").click(function (){
              $("i").hide(500);
              $("#menu").show(500);
              $("#container").hide(500);
              //closepopup();
          });
            
        });
          

 </script>      


    <body>
</html>

<?php 
}
}
else{
  header("location:login.php?error=Plz firstly Login With Your Account");  
}
?>