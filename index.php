<?php 
session_start();
if(isset($_SESSION["username"])){
    header("location:home.php");
}
else{

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="css/style.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="description" content="LearnWithAP - Easy Way To Learn.">
        <meta name="keywords" content="ap,,LEARNWITHAP,learnwithap,LearnWithAP,LearnWithap">
        <meta name="author" content="Atul Dubal">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=fire">
        <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=fire-animation">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel="stylesheet">
       

    </head>
    
    <body>
        <br>
<center><h1 style="font-size:40px;color:white;font-family:Rancho;"class="font-effect-fire-animation"> मी खुटबावकर . .</h1></center> 
<br>
 <!--     <table>
           <th><a href="index.php">HOME</a></th>
           <th><a href="contactus.php">CONTACT US</a></th>
           <th><a href="aboutus.php">ABOUT US</a></th>
           <th><a href="more_info.php">MORE INFO</a> </th>
       </table>
       <hr>
  -->      
    <center> <img src="assest/system_img/admin.jpg"></center>
   
<br><br>
      <!-- Button Creditional-->
      <div id="cre-btn">
    
      <!-- Login Button-->
     <button id="login" class="btn"><a href="/login.php" >Login</a></button>
     
      <!-- registration Button -->
      <button id="registration" class="btn"><a href="/registration.php">Registration</a></button>
      </div>
 <br><br>
      <!-- Footer Area Design -->
      <footer>
          <div id="footer-area">
        
          <p id="p1">Powered by AP Developer</p>
         
          <p id="p2">Made In India🇮🇳</p>
          <br>
          <br>
          </div>
      </footer>
        
  
    <body>
</html>
<?php 
}
?>