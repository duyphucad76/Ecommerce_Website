<?php
$act = 'view_login';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'view_login':
        include "View/pages/login.php";
        break;
    case 'view_register':
        include "View/pages/register.php";
        break;
    case 'login':
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $user = new user();
            $cdau = "GHT%H";
            $ccuoi = "&TUY9";
            $crypt = md5($cdau . $pass . $ccuoi);
            $login = $user->verifyUser($email, $crypt); //nếu có thì true

            if ($login) {
                // echo "<script type='text/javascript'>alert('Đăng nhập thành công')</script>";
                echo "<script type='text/javascript'>Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                  })</script>";
                $_SESSION['user'] = array();
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['pass'] = $crypt;
                echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';

                // echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';
            } else {
                echo '<script type="text/javascript">alert("Email hoặc mật khẩu không chính xác")</script>';
                include('View/pages/login.php');
            }
        }
        break;
    case 'register':
        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $mobile_number = $_POST['mobile_number'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $conf_pass = $_POST['conf_pass'];

            $validate = new validate();
            $err = array();
            if ($validate->check_name($name)) {
                $err['name'] = "Tên khách hàng không hợp lệ";
            }
            if ($validate->check_address($address)) {
                $err['address'] = "Địa chỉ không hợp lệ";
            }
            if ($validate->check_phone($mobile_number)) {
                $err['phone'] = "Số điện thoại không hợp lệ";
            }
            if ($validate->check_email($email)) {
                $err['email'] = "Email không hợp lệ";
            }
            if ($validate->minLenPass($pass)) {
                $err['pass'] = "Mật khẩu phải từ 8 kí tự trở lên";
            }
            if ($validate->confPass($pass, $conf_pass)) {
                $err['pass_conf'] = "Mật khẩu không trùng khớp";
            }
            if (count($err) > 0) {
                include "View/pages/register.php";
            } else {
                $user = new user();
                $cdau = "GHT%H";
                $ccuoi = "&TUY9";
                $crypt = md5($cdau . $pass . $ccuoi);
                $register = $user->checkUserEmail($email); //nếu có thì true

                if (!$register) {
                    if ($user->addUser($name, $address, $telNo, $email, $crypt)) {
                        echo '<script type="text/javascript">alert("Đăng ký thành công")</script>';
                        $_SESSION['user'] = array();
                        $_SESSION['user']['email'] = $email;
                        $_SESSION['user']['pass'] = $crypt;
                        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';
                    } else {
                        echo '<script type="text/javascript">alert("Đăng ký không thành công")</script>';
                        include('View/pages/register.php');
                    }
                    // echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';
                } else {
                    echo '<script type="text/javascript">alert("Email đã tồn tại, vui lòng đăng ký bằng email khác hoặc đăng nhập")</script>';
                    include('View/pages/register.php');
                }
            }
        }
        break;
    case 'forgetps':
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $user = new user();
            $check = $user->checkUserEmail($email);
            if ($check !== false) {
                $code = random_int(100000, 1000000);
                $item = array(
                    'code' => $code,
                    'email' => $email
                );
                $_SESSION['forgetps'] = $item;
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
                    echo "<script>alert('Gui mail thanh cong')<script>";
                    include "View/pages/reset_password.php";
                } else {
                    echo "<script>alert('Gui mail that bai')<script>";
                    include "View/pages/forgetps.php";
                }
            } else {
                echo "<script>alert('Email khong ton tai')<script>";
                include "View/pages/forgetps.php";
            }
        }
        include "View/pages/forgetps.php";
        break;
    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            unset($_SESSION['wishlist']);
            echo '<script type="text/javascript">alert("Đăng xuất thành công")</script>';
            echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=home"/>';
        }
        break;
    case 'reviews':
        if (isset($_SESSION['user'])) {
            if (isset($_POST['submit'])) {
                $user = new user();
                $result = $user->checkUserEmail($_SESSION['user']['email']);
                $user_id = $result['id'];
                $product_id = $_POST['product_id'];
                $comment = $_POST['comment'];
                $rating = $_POST['rating'];
                $review = new reviews();
                $check = $review->addNewReview($user_id, $product_id, $comment, $rating);
                $result = $review->getAllRating($product_id);
                $times = 0;
                $update_rating = 0;
                foreach ($result as $key => $value) {
                    $update_rating += $value['rating'];
                    $times++;
                }
                $update_rating = $update_rating / $times;
                $pro = new product();
                $pro->updateRatingProductById($product_id, $update_rating);
                if ($check !== false) {
                    echo '<script>location.href="index.php?action=product&act=detail&id=' . $product_id . '"</script>';
                } else {
                    echo '<script>
                    alert("Your comment post failed !!!")
                    location.href="index.php?action=product&act=detail&id=' . $product_id . '"
                    </script>';
                }
            }
        } else {
            echo "<script>alert('Please login to continue')</script>";
            include 'View/pages/login.php';
            break;
        }
        break;
    case 'information':
        if (isset($_POST['submit'])) {
            $img = trim($_FILES['input_file']['name']);
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $gender = trim($_POST['gender']);
            $birthday = trim($_POST['birthday']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $mobile_number = trim($_POST['mobile_number']);
            $fullname = $fname . ' ' . $lname;
            $user = new user();
            $user->updateUserInformation($id, $fullname, $gender, $birthday, $email, $address, $mobile_number);
        }
        include 'View/pages/user_information.php';
        break;
}
