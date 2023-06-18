<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/vendor/autoload.php';
include_once('koneksi/koneksi.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pizzaetniktobabakery@gmail.com';                     //SMTP username
    $mail->Password   = 'ajpridtgzknkloar';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $kategori_query = "SELECT * FROM admin";
    $kategori_result = mysqli_query($koneksi, $kategori_query);
    $kategori = mysqli_fetch_assoc($kategori_result);
    $mail->setFrom('pizzaetniktobabakery@gmail.com', 'Pizza Etnik Toba Bakery');
    $mail->addAddress($kategori['email_admin'], 'Helena');     //Add a recipient
    $mail->addReplyTo('pizzaetniktobabakery@gmail.com', 'Pizza Etnik Toba Bakery');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $check_email = "SELECT * FROM admin WHERE email_admin ='$email'";
        $run_sql = mysqli_query($koneksi, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE admin SET kode = $code WHERE email_admin = '$email'";
            $run_query =  mysqli_query($koneksi, $insert_code);
                //Recipients
    $mail->setFrom('pizzaetniktobabakery@gmail.com', 'Pizza Etnik Toba Bakery');
    $mail->addAddress($kategori['email_admin'], 'Helena');     //Add a recipient
    $mail->addReplyTo('pizzaetniktobabakery@gmail.com', 'Pizza Etnik Toba Bakery');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Kode Mengatur Ulang Password';
    $mail->Body    = '<p>kode untuk mengatur ulang password anda adalah </p>'.$code;
    $mail->send();
    echo "<script>window.location='verifikasi_kode.php';</script>";}
    $error = true;
}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// verifikasi kode
$info = true;

if(isset($_POST['verifikasi'])){
        $otp_code = mysqli_real_escape_string($koneksi, $_POST['otp']);
        $check_code = "SELECT * FROM admin WHERE kode = $otp_code";
        $code_res = mysqli_query($koneksi, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['kode'];
            $email = $fetch_data['email_admin'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE admin SET kode = $code, status = '$status' WHERE kode = $fetch_code";
            $update_res = mysqli_query($koneksi, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: reset_password.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $error = true;
        }
    }

    // reset password
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($koneksi, $_POST['password_baru']);
        $cpassword = mysqli_real_escape_string($koneksi, $_POST['password_konfirmasi']);
        if($password !== $cpassword){
            $error = true;
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $kategori_query = "SELECT * FROM admin";
            $kategori_result = mysqli_query($koneksi, $kategori_query);
            $kategori = mysqli_fetch_assoc($kategori_result);
            $encpass = password_hash($password,PASSWORD_DEFAULT);
            $email_asli = $kategori['email_admin'];
            $update_pass = "UPDATE admin SET password = '$encpass', kode='$code' WHERE email_admin = '$email_asli'";
            $run_query = mysqli_query($koneksi, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: login.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    ?>