<?php 
session_start();
include ("config.php");
if(isset($_SESSION["username"])){
    header("location: home.php");
}else{
$err=" ";
if(isset($_POST["submit"])){
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
        $err=" ";
        $username=$_POST["username"];
        $password=$_POST["password"];
       // echo $username;
       // echo $password;
       $query="SELECT * FROM `login_data` WHERE `Username`='$username'" or die("query error");
       $result=mysqli_query($conn,$query) or die("result error");
       $rows=mysqli_num_rows($result);
       if($rows<1){
           $err="Account Not Found Plz Register As Member.";
       }
     
       while($data=mysqli_fetch_assoc($result)){
             if(password_verify($password,$data["Password"])){
                            if($data["Status"]=="Verify"){
         $_SESSION["username"]=$data["Username"];
           }
           else{
             
               $err="Your Account Is Not Verify By Admin. Plz ! Wait And If Account Not Verify Contact Admin -Atul Dubal ( 8928333079 ).";
       }
             }
       else{
               $err="Password Not Match";
           }
 
       }  
        
    }
    else{
        $err="Please  All Feilds.";
    }

    header ("location: login.php?error=$err");
}

    
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login </title>
        <link href="css/login_style.css" rel="stylesheet">
        
        <meta charset="UTF-8">
       <meta name="description" content="LearnWithAP - Easy Way To Learn.">
       <meta name="keywords" content="ap,,LEARNWITHAP,learnwithap,LearnWithAP,LearnWithap">
      <meta name="author" content="Atul Dubal">
      <meta name="viewport"  content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=fire-animation">
       <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=neon">
       <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=fire">
       

    </head>
    <body>
<br>
<center><h1 style="font-size:40px;color:white;font-family:Rancho;"class="font-effect-fire-animation"> मी खुटबावकर . .</h1></center> 
      <br>
      
     <table>
           <th><a href="index.php">HOME</a></th>
           <th><a href="contactus.php">CONTACT US</a></th>
           <th><a href="aboutus.php">ABOUT US</a></th>
           <th><a href="more_info.php">MORE INFO</a> </th>
       </table>
       <hr>


    <!-- Login Form -->
 <br><br>
  
   
    <form id="form" action="login.php" method="post">
        <?php if($_GET["error"]){ ?>
        <center>
        <div id="error">
        <p class="error"><?php echo $_GET["error"];?> 
        </p>
        </div>
        </center>
      <?php } ?>
        
    <center><h3 class="font-effect-fire">Login</h3>
       </center> <br>

        <label>Username</label>
        <br>
        <input type="text" id="username" name="username" />
        <br>
        <label>Password</label>
        <br>
        <input type="password" id="password" name="password" />
        <br><br>
        <center><p> I don't have an account <a href="/registration.php"style="color:blue">Registeration</a></p></center>
        <br>
        
       <center> <input type="submit" id="submit" name="submit" /></center>
        
    </form>
   
   <br><br>
    <center>
    <div id="admin">
        <br>
       <img  id="admin_img" src="/assest/system_img/admin.jpg"/>
       <h6 class="font-effect-neon">Admin</h6>
       <h3 class="font-effect-neon"> Atul D. Dubal </h3>
      
  
  <br>
      <footer>
          <div  id="footer-area">
          <p>Powered by AP Developer.</p>
          <p>Made in India 🇮🇳</p>
          </div>
      </footer>
      <br>
      </div>
</center>
    <body>
</html>
<?php 

}
?>