<?php
$act = 'view';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'view':
        include 'View/pages/forgetps.php';
        break;
    case 'view_checkcode':
        include 'View/pages/checkcode.php';
        break;
    case 'forgetps':
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $admin = new user();
            $check = $admin->checkUserEmail($email);
            if ($check !== false) {
                $code = random_int(100000, 1000000);
                $_SESSION['forgetps']['code'] = $code;
                $_SESSION['forgetps']['email'] = $email;
                $mail = new PHPMailer;
                $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
                $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = 587;                                //Sets the default SMTP server port
                $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = 'duyphucad76@gmail.com';                    //Sets SMTP username
                $mail->Password = 'obgcngcjdccdwyod'; //Phplytest20@php					//Sets SMTP password
                $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->From = 'duyphucad76@gmail.com';                    //Sets the From email address for the message
                $mail->FromName = 'Cara';                //Sets the From name of the message
                $mail->AddAddress($email, "Reset password");        //Adds a "To" address
                //$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
                $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
                $mail->IsHTML(true);                            //Sets message type to HTML				
                $mail->Subject = "Reset password";                //Sets the Subject of the message
                $mail->Body = "Code: $code";                //An HTML or plain text message body
                if ($mail->Send())                                //Send an Email. Return true on success or false on error
                {
                    echo "<script>alert('Email sent successful')
                    location.href = 'index.php?action=forgetps&act=checkcode'
                    </script>";
                } else {
                    echo "<script>alert('Email sent failed')</script>";
                    include "View/pages/forgetps.php";
                }
            } else {
                echo "<script>alert('Email is not correct')</script>";
                include "View/pages/forgetps.php";
            }
        };
        break;
    case 'checkcode':
        if (isset($_POST['submit'])) {
            $code = (int)$_POST['code'];
            if ($_SESSION['forgetps']['code'] === $code) {
                echo "<script>alert('Loading to reset password')
                    location.href='index.php?action=forgetps&act=resetpw'
                    </script>";
            } else {
                echo "<script>alert('The code is not correct')</script>";
                include 'View/pages/checkcode.php';
                break;
            }
        }
        include "View/pages/checkcode.php";
        break;
    case 'resetpw':
        if (isset($_POST['submit'])) {
            $pass = $_POST['newpw'];
            $conf_pass = $_POST['conf_pw'];
            $email = $_SESSION['user']['email'];
            if ($pass == $conf_pass) {
                $cdau = "GHT%H";
                $ccuoi = "&TUY9";
                $crypt = md5($cdau . $pass . $ccuoi);
                $user = new user();
                $check = $user->updateUserPassword($email, $crypt);
                if ($check !== false) {
                    echo "<script>alert('Update successful')
                    </script>";
                } else {
                    echo "<script>alert('Update failed')</script>";
                    include 'View/pages/resetpw.php';
                    break;
                }
            } else {
                echo "<script>alert('Password does not match')</script>";
                include 'View/pages/resetpw.php';
                break;
            }
        }
        include "View/pages/resetpw.php";
        break;
}
