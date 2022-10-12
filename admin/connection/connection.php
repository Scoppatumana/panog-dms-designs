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
    $firstname=trim($_POST['firstname']);  
    $middlename=trim($_POST['middlename']);
    $lastname=trim($_POST['lastname']); 
    $owners_lga=trim($_POST['owners_lga']);
    $gender=trim($_POST['gender']);
    $title=trim($_POST['title']);
    $email_address=trim($_POST['email_address']);
    $home_address=trim($_POST['home_address']);
    $role=trim($_POST['role']);
    $farm_name=trim($_POST['farm_name']);
    $farm_address =trim($_POST['farm_address']);
    $farm_lga=trim($_POST['farm_lga']);
    $types_of_birds=trim($_POST['types_of_birds']);
    $farm_capacity=trim($_POST['farm_capacity']);
    $dueheading=trim($_POST['dueheading']);
    $summary=trim($_POST['summary']);
    $numofbags = trim($_POST['numofbags']);
?>