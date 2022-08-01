<?php 
session_start();
include("config.php");

if(isset($_SESSION["username"])){
    header("location:home.php");
}
else{
    $err="";
    if(isset($_POST["submit"])){
      
       $fname=$_POST["fname"];
       $email=$_POST["email"];
       $phone_number=$_POST["phone_number"];
       $username=$_POST["username"];
       $password=$_POST["password"];
       if(!empty($fname) && !empty($email) && !empty($phone_number) && !empty($username) && !empty($password)){
           $new_password=password_hash($password, PASSWORD_BCRYPT);
         
          
          $query="INSERT INTO `login_data` (`Full Name`,`Role`,`Status`,`Email`,`Phone_number`,`Username`,`Password`) VALUES ('$fname','user','Not Verify','$email','$phone_number','$username','$new_password')";
                               $result=mysqli_query($conn,$query) ;
              // echo$result;             
                if($result){
             // echo("alert('hii')");
             header("location:login.php?error=Account Is Not Verify By Admin. Plz ! Wait And If Account Not Verify Contact Admin -Atul Dubal ( 8928333079 ).");
              }
             
              else{
                 if(mysqli_error($conn)=="Duplicate entry '$email' for key 'Email'"){
                   $err="Email Is Registered With Other Account";  
                 }
                 elseif(mysqli_error($conn) == "Duplicate entry '$username' for key 'Username'"){
                   $err="Username Is Already In Use";  
                 }
                  elseif(mysqli_error($conn) == "Duplicate entry '$phone_number' for key 'Phone_number'"){
                   $err="Phone Number Is Already Registered With Other Account";  
                 }
                 else{
                  $err="Database Connection Error. Try Sometime Later Or Contact Admin." ;  
    
                 }
                  }
           
       
       }
           else{
          $err="Please Fill All Fileds.";
       }
       if($err!=""){
       header("location: registration.php?error=$err");
       }
      
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
  
   
    <form id="form" action="registration.php" method="post">
        <?php if($_GET["error"]){ ?>
        <center>
        <div id="error">
        <p class="error"><?php echo $_GET["error"];?> 
        </p>
        </div>
        </center>
      <?php } ?>
        
    <center><h3 class="font-effect-fire">Registration</h3>
       </center> <br>

        <label>Full Name</label>
        <br>
        <input type="text" id="fname" name="fname" />
        <br>
        <label>Email</label>
        <br>
        <input type="email" id="email" name="email" />
        <br>
         <label>Phone Number</label>
        <br>
        <input type="number" id="phone_number" name="phone_number" />
        <br>
        
        <label>Username</label>
        <br>
        <input type="text" id="username" name="username" />
        <br>
        <label>Password</label>
        <br>
        <input type="password" id="password" name="password" />
        <br>
       <br>
        <center><p> I have an account <a href="/login.php"style="color:blue">Login</a></p></center>
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