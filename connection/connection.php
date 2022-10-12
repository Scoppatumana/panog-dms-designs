<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Acces-Contorl-Allow-Origin");/// to call API and clear the error from web-page
   

    // Database Configuration //
    $main_server = "localhost";
    $server_username = "root";
    $server_password = "";

    // Create Connection //
    $conn = mysqli_connect($main_server, $server_username, $server_password) or die("connection error");
    mysqli_select_db($conn, "panog-database");
?>


<?php 

    // variable declaration  //

   
     $email_address=trim($_POST['email_address']);
     $createpassword=trim($_POST['createpassword']);
     $confirmpassword=trim($_POST['confirmpassword']);
     $OTP=trim($_POST['OTP']);
     $loginemail=trim($_POST['loginemail']);
     $loginpassword=trim($_POST['loginpassword']);
    
?>