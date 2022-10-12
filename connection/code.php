<?php include '../connection/connection.php' ?>
<?php include '../connection/session.php' ?>

<?php
    $action = $_GET['action']; //$_GET perform function on the url //
?>


 

            <!-- RESET PASSWORD -->
<?php
    if ($action == 'checkemail'){

        $checkemailquery = mysqli_query($conn, "SELECT * FROM `members_tab` WHERE `email_address`='$email_address'");
        $countemail= mysqli_num_rows($checkemailquery);
        $sendotp = rand(11111, 99999);

        if($countemail > 0){
            $fetchemail = mysqli_fetch_array($checkemailquery);
            $member_id = $fetchemail['member_id'];
            $firstname = $fetchemail['firstname'];
            $lastname = $fetchemail['lastname'];

            include 'reset_password_mail/mail.php';

            
            mysqli_query($conn, "UPDATE members_tab SET `otp`='$sendotp' WHERE member_id='$member_id'") or die('cannot update the database');

?>
         <script>
            window.parent(location="../reset-password.php?member_id=<?php echo $member_id ?>");
        </script>
<?php
        }else{
?>
            <script>
                alert('Invalid Email Entered. Try again');
                window.parent(location="../index.php");
            </script>
<?php
        }





    }

?>

        <!-- RESET-PASSWORD -->

<?php
    if ($action == 'reset-password'){
        $member_id = $_GET['member_id'];
        $otp = $_GET['otp'];

        if($createpassword != $confirmpassword){
?>
        <script>
                alert('Password does not match');
                window.parent(location="../index.php");
        </script>
<?php
        }else{
            mysqli_query($conn, "UPDATE members_tab SET `password`='$createpassword' WHERE member_id='$member_id' AND otp='$OTP'") or die('cannot update the database');
            if($OTP != $otp){
?>

        <script>
            alert('OTP is Incorrect');
            window.parent(location="../reset-password.php");
        </script>
<?php
            }else{

?>
        <script>
                alert('Password Reset Successful');
                window.parent(location="../index.php");
        </script>
<?php
        }
    }
    }
?>









<?php
    if ($action == 'login'){
        $loginemailquery=mysqli_query($conn, "SELECT * FROM members_tab WHERE `email_address`='$loginemail' AND `password`='$loginpassword' AND `role`='Administrator'");
        $loginemailcount=mysqli_num_rows($loginemailquery);

        if($loginemailcount>0){

            $loginmemberidfetch=mysqli_fetch_array($loginemailquery);
            $loginmemberid=$loginmemberidfetch['member_id'];
            
            $_SESSION['member_id']=$loginmemberid;
            $loginmemberid=$_SESSION['member_id'];
            $_SESSION['status']=true;

?>

            <script>
                window.parent(location="../admin/index.php");
            </script>
<?php

    }else{
        $loginemailquery=mysqli_query($conn, "SELECT * FROM members_tab WHERE `email_address`='$loginemail' AND `password`='$loginpassword' AND `role`='Member'");
        $loginemailcount=mysqli_num_rows($loginemailquery);

        if($loginemailcount>0){

            $loginmemberidfetch=mysqli_fetch_array($loginemailquery);
            $loginmemberid=$loginmemberidfetch['member_id'];
            
            $_SESSION['member_id']=$loginmemberid;
            $loginmemberid=$_SESSION['member_id'];
            $_SESSION['status']=true;
?>

            <script>
                window.parent(location="../member-login/index.php");
            </script>
<?php
        
    }else{
?>

            <script>
                alert('Incorrect email or password entered')
                window.parent(location="../index.php");
            </script>

<?php
    }
}
    }
?>