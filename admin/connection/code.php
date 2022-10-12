<?php include '../connection/connection.php' ?>
<?php include '../connection/session.php' ?>

<?php
    $action = $_GET['action']; //$_GET perform function on the url //
?>


        <!-- MEMBERS REGISTRATION -->
<?php 
    if ($action== 'registermember'){

        $checkemailquery = mysqli_query($conn, "SELECT * FROM `members_tab` WHERE `email_address`='$email_address'");
        $checkemail = mysqli_num_rows($checkemailquery);
        

        if($checkemail >0){
?>
                <script>
                    alert('Email already exists');
                </script>

<?php
        }else{
            if(isset($_FILES['ImageSelector'])){
                print_r($_FILES);

                $ext_error = false;

                $phpFileUploadErrors = array(
                    0 => 'There is no error, File uploaded with success',
                    1 => 'The Uploaded file exceeds the upload_max_file_size directive in php.ini',
                    2 =>'The Uploaded file exceeds the MAX_FILE_SIZE directive in that was specified in the html form',
                    3 => 'The uploaded file was only partially upoaded',
                    4 => 'No file was uploaded',
                    6 => 'Missing a temporary folder',
                    8 => 'A PHP extension stopped the file upload',
                );

              


                
                $extensions = array('jpg', 'jpeg', 'gif', 'png');
                $file_ext = explode('.', $_FILES['ImageSelector']['name']);
                $file_ext = end($file_ext);


                if(!in_array($file_ext, $extensions)){
                    $ext_error = true;
?>
                    <script>
                        alert('File extension is not allowed');
                    </script>
<?php
                }


                if($_FILES['ImageSelector']['error']){
?>
                <script>
                    alert('<?php echo $phpFileUploadErrors[$_FILES['ImageSelector']['error']] ?>');
                    window.parent(location="../members_list.php");
                </script>

<?php
                }
                elseif ($ext_error){
?>
                    <script>
                        alert('Invalid Extension');
                        window.parent(location="../members_list.php");
                    </script>
<?php
                }else{

                    $uploadfile=$_FILES['ImageSelector']['name'];
                    $datetime=date("Ymdhis");
                    $uploadfile = $datetime.'_'.$uploadfile;
                move_uploaded_file($_FILES['ImageSelector']['tmp_name'], "uploadedImages/".$uploadfile);

            
        $counterid="MEMBER";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $member_id=$counterid."-"."00".$countervalue;



        // UPDATE THE COUNTER TAB //
        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");



        // INSERT INTO MEMBER TAB //

        mysqli_query($conn, "INSERT INTO `members_tab`
        (`member_id`, `title`, `firstname`, `middlename`, `lastname`, `passport`, `owners_lga`, `gender`, `email_address`, `home_address`, `role`, `farm_name`, `farm_address`, `farm_lga`, `types_of_birds`, `farm_capacity`, `date`)
         VALUES ('$member_id','$title','$firstname','$middlename','$lastname', '$uploadfile', '$owners_lga','$gender','$email_address','$home_address','$role','$farm_name','$farm_address','$farm_lga','$types_of_birds','$farm_capacity', NOW())")
        or die('cannot insert into members-tab');
    
?>

            <script>
                window.parent(location="../registration-successful.php");
            </script>
<?php
}
}

    }
}
?>

            <!-- UPDATE THE MEMBERS TAB -->

<?php
    if($action == 'update-profile'){
        $member_id = $_GET['member_id'];

        



        if(isset($_FILES['ImageSelector'])){

            $ext_error = false;

            $phpFileUploadErrors = array(
                0 => 'There is no error, File uploaded with success',
                1 => 'The Uploaded file exceeds the upload_max_file_size directive in php.ini',
                2 =>'The Uploaded file exceeds the MAX_FILE_SIZE directive in that was specified in the html form',
                3 => 'The uploaded file was only partially upoaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                8 => 'A PHP extension stopped the file upload',
            );

          


            
            $extensions = array('jpg', 'jpeg', 'gif', 'png');
            $file_ext = explode('.', $_FILES['ImageSelector']['name']);
            $file_ext = end($file_ext);




            if(!in_array($file_ext, $extensions)){
                $ext_error = true;
?>
                <script>
                    alert('File extension is not allowed');
                </script>
<?php
            }


            if($_FILES['ImageSelector']['error']){
?>
            <script>
                alert('<?php echo $phpFileUploadErrors[$_FILES['ImageSelector']['error']] ?>');
                window.parent(location="../members_list.php");
            </script>

<?php
            }
            elseif ($ext_error){
?>
                <script>
                    alert('Invalid Extension');
                    window.parent(location="../members_list.php");
                </script>
<?php
            }else{

                $getmember_query = mysqli_query($conn, "SELECT * FROM `members_tab` WHERE `member_id` = '$member_id'");
                $getmember = mysqli_fetch_array($getmember_query);
                $mempassport= $getmember['passport'];

                if($mempassport != ''){

                    unlink("uploadedImages/".$mempassport);
                    mysqli_query($conn, "UPDATE `members_tab` SET `passport`='' WHERE `member_id`='$member_id'");
                
                    
                }

              
                

                $uploadfile=$_FILES['ImageSelector']['name'];
                $datetime=date("Ymdhis");
                $uploadfile = $datetime.'_'.$uploadfile;
            move_uploaded_file($_FILES['ImageSelector']['tmp_name'], "uploadedImages/".$uploadfile);

        $member_id = $_GET['member_id'];
       mysqli_query($conn, "UPDATE members_tab SET `title`= '$title',`firstname`='$firstname',`middlename`='$middlename',
       `lastname`='$lastname', `passport`='$uploadfile' ,`owners_lga`='$owners_lga',`gender`='$gender',`email_address`='$email_address',`home_address`='$home_address',`role`='$role',
       `farm_name`='$farm_name',`farm_address`='$farm_address',`farm_lga`='$farm_lga',`types_of_birds`='$types_of_birds',
       `farm_capacity`='$farm_capacity' WHERE `member_id`='$member_id'") or die('cannot update members-tab');
    
?>
        <script>
            window.parent(location="../update-successful.php");
        </script>
<?php

}
        }else{
?>
            <script>
                alert('Select an Image Please!!!')
            </script>
<?php
        }
    }
?>




<?php 
    if ($action== 'establishdues'){

        $counterid="ANNUALDUE";

        $counterquery=mysqli_query($conn, "SELECT counter_value+1 AS counter_value FROM counter_tab WHERE counter_id='$counterid'");
        $counterqueryfetch=mysqli_fetch_array($counterquery);

        $countervalue=$counterqueryfetch['counter_value'];
        $annualdue_id=$counterid."-"."".$countervalue;



        // UPDATE THE COUNTER TAB //
        mysqli_query($conn, "UPDATE counter_tab SET counter_value='$countervalue' WHERE counter_id='$counterid'");



        // INSERT INTO ANNUAL DUE TAB //

        mysqli_query($conn, "INSERT INTO `annual_due_tab`
        (`member_id`, `annual_due_id`, `annual_due_heading`, `annual_due_comment`, `date_established`)
         VALUES ('$s_member_id','$annualdue_id','$dueheading','$summary', NOW())")
        or die('cannot insert into annual-due-tab');

    
?>

            <script>
                window.parent(location="../registration-successful.php");
            </script>
<?php

    }

?>

<!-- LOGOUT FUNCION -->
<?php
    if ($action== 'signout'){
        session_destroy();
?>
            <script>
                window.parent(location="../../index.php")
            </script>
<?php
    }
?>

<!-- update-payment -->
<?php
$mem_id= $_GET['memberid'];
    if ($action== 'verifypayment'){
        
        mysqli_query($conn, "UPDATE `payment_verification_tab` SET payment_status='confirmed' WHERE member_id='$mem_id'") or die('Cannot update');

    }
?>

<!-- DELETE FUNCTION -->
<?php 
    ///  DELETE FROM THE DATABASE ///
    $memb_id=$_GET['memberid'];
    $getmember_query = mysqli_query($conn, "SELECT * FROM `members_tab` WHERE `member_id` = '$memb_id'");
    $getmember = mysqli_fetch_array($getmember_query);
    $memfirstname= $getmember['firstname'];
    $memtitle= $getmember['title'];
    $memlastname= $getmember['lastname'];

    if($action=='deletemember'){
?>
        <script>
        let result;
        if (confirm('Are you sure you want to delete the account that belongs to <?php echo $memtitle ?> <?php echo $memlastname ?> <?php echo $memfirstname ?> ') == false){
            window.parent(location="../members_list.php");
        }else{
            <?php  mysqli_query($conn, "DELETE FROM `members_tab` WHERE `member_id`='$memb_id'") or die('cannot delete from database'); ?>
            window.parent(location="../index.php");
        }
         
             
      
      </script>
<?php
    }
?>           
        
             



 
