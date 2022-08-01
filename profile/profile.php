<?php 
// to start session 
session_start();
// including mysqli database connection 
include("config.php");
// to checking is session not expired 
if(isset($_SESSION["username"])){
    //to get current username
    $user=$_SESSION["username"];
    //query for selection all information about current username
    $query="SELECT * FROM `login_data` WHERE `Username`='$user'";
    $result=mysqli_query($conn,$query) or die("result error");
    //to checking is data available or not
    if(mysqli_num_rows($result)==0){
        header("location:../logout.php");
    }
    
    $data=mysqli_fetch_assoc($result);
    $id=$data["Id"];
 //Delete Processing Code  

    if($_GET["delete"] =="yes"){
       
      
       $delete_query="DELETE FROM `login_data` WHERE `Id`='$id'";
       $delete_result=mysqli_query($conn,$delete_query);
       if($delete_result){
           header("location: ../logout.php");
       }
    }
    
/* Edit Processing Code 

    if($_GET["edit"] =="yes"){
       
      
       $edit_query="DELETE FROM `login_data` WHERE `Id`='$id'";
       $edit_result=mysqli_query($conn,$edit_query);
       if($edit_result){
           header("location:profile.php");
       }
    }
    

*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="profile.css">
        
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <meta charset="UTF-8">
         <meta name="description" content="LearnWithAP - Easy Way To Learn.">
        <meta name="keywords" content="ap,,LEARNWITHAP,learnwithap,LearnWithAP,LearnWithap">
        <meta name="author" content="Atul Dubal">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=neon">
        <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rancho&effect=fire">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
      <center>
      <header><h1 class="font-effect-fire">मी खुटबावकर</h1></header>
      <br>
 </center>
 
         <div id="menu">
                <div class="menu"></div>
                <div class="menu"></div>
                <div class="menu"></div>
         </div>

    
            
     <div id="container" >
      <i id="cross" class='fa fa-close' style='color: red;font-size:35px'></i>


       <div id="nav-bar" >
         <ul>
             <br>
           <a href="../home.php"><li>Dashboard</li></a>
           <a href="../contactus.php"> <li>Contact Us</li></a>
           <a href="../aboutus.php"> <li>About Us</li></a>
           <a href="../logout.php"> <li>Logout</li></a>

         </ul> 
       </div>
     </div>    
   <br>
      
      <div id="data-table" >
          
          <label>Full Name    :-</label>
          <br>
          <input id="fname" type="text" value="<?php echo $data['Full Name'];?>">
          <br>
          <label>Email</label>
          <br>
          <input id="email" type="email" value="<?php echo $data['Email'];?>">
          <br>
          <label>Phone Number</label>
          <br>
          <input id="phone_number" type="Number" value="<?php echo $data['Phone_number'];?>">
          <br>
          <label>Username</label>
          <br>
          <input id="username" type="text"value="<?php echo $data['Username'];?>">
          <br>
          <center>
         <a href="../home.php"> <button id="back_btn" class="back">Back</button></a>
          <button id="delete_btn" class="delete" name="delete_submit" >Delete Account</button>

          <button class="edit" id="edit_profile_btn" name="edit_submit">Save Profile</button>
</center>

      </div> 
      
    <br>
    <center>
    <div id="admin">
       <img  id="admin_img" src="/assest/system_img/admin.jpg"/>
       <h6 class="font-effect-neon">Admin</h6>
       <h3 class="font-effect-neon"> Atul D. Dubal </h3>
       </div>
       <br>
    </center>
      <footer>
          <div  id="footer-area">
          <p>Powered by AP Developer.</p>
          <p>Made in India 🇮🇳</p>
          </div>
      </footer>
     
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
    // Deletions Process-->      
var delete_btn=document.getElementById("delete_btn");
delete_btn.addEventListener("click", delete_function);
function delete_function(){
   var c= confirm ("You Are Sure To Delete This Account");
    if(c == true){
       location.replace("profile.php?delete=yes");
   
    }
    else{
        alert("You Are Stop Deleting Process ");
    }
}

// Editing Process
      
var edit_profile_btn=document.getElementById("edit_profile_btn");
edit_profile_btn.addEventListener("click", edit_function);

var Id="<?php echo $Id;?>";
var fname=$("#fname").val();
var email=$("#email").val();
var phone_number=$("#phone_number").val();
var username=$("#username").val();

var formdata={Id:Id,fname:fname,email:email,phone_number:phone_number,username:username};
function edit_function(){
   var c= confirm (" Do You Want To Save Account Information.");
    if(c == true){
      
       $.ajax({
          url:"profile_edit.php",
          type:"post",
          data:formdata,
          success: function (data){
              alert(data);
          }
       });
    }
    else{
        alert("You Are Stoped Account Information Editing Process. ");
    }
}


 </script>      
        
    <body>
</html>

<?php 
}
else{
  header("location:../login.php?error= Session Expired. Plz Login With Your Username & Password");  
}
?>