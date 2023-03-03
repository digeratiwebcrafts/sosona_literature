<?php
session_start();
require('../includes/db-connect.php');

if(isset($_POST["submit"])){
    $useremail=$_POST['useremail'];
    $sql = "SELECT * FROM user WHERE (user_email = '$useremail')";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()){
            $id = $row["id"];
            $email = $row["user_email"];
            $_SESSION['emailuser'] = $email;
            //echo "id:" . $id . "<br>";
            //echo "Email:" . $email . "<br>";
            //echo "Session Email:" . $_SESSION['emailuser'] . "<br>";
            //exit();
            $to = $row["user_email"];
            $subject = "Login Password Recovery";

            $message = "Please click the link below to reset your password. <br><a href='http://localhost/sosona_literature/reset-password-recovery.php'>Reset Password</a>";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: Sosona <noreply@sosona.com>' . "\r\n";

            mail($to, $subject, $message, $headers);

            $_SESSION['status'] = "success";
            $_SESSION['status_msg'] = "Mail sent Successfully.";
            header("Location: ../reset-password.php");
        }

    }
    else {
        $_SESSION['status'] = "error";
        $_SESSION['status_msg'] = "Email is not valid.";
        header("Location: ../reset-password.php");
    }

}


// $to_email = "amit@digeratiwebcrafts.com";
// $subject = "Test email to send from XAMPP";
// $body = "Hi, This is test mail to check how to send mail from Localhost Using Gmail ";
// $headers = "From: sender email";
 
// if (mail($to_email, $subject, $body, $headers))
 
// {
//     echo "Email successfully sent to $to_email...";
// }
 
// else
 
// {
//     echo "Email sending failed!";
// }