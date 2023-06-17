<?php
    use PHPmailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include('phpmailer/src/Exception.php');
    include('phpmailer/src/PHPMailer.php');
    include('phpmailer/src/SMTP.php');

    include 'koneksi/koneksi.php';
    $query = 'SELECT * FROM admin';
    $result_set = $koneksi->query($query);
    $row = $result_set->fetch_assoc();

    // Ambil nilai email yang diisi dalam formulir HTML
    $email = $_POST['email'];

    // Lakukan query untuk memeriksa apakah email ada dalam tabel admin
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    // Periksa jumlah baris yang dikembalikan oleh query
    if (mysqli_num_rows($result) > 0) {
        $email_pengirim = 'gilberdlee123@gmail.com';
        $nama_pengirim  = 'Admin';
        $email_penerima = $_POST['email'];
        $password       = $row['password'];
        $username       = $row['username'];
        $subjek         = 'Password Anda';
        $pesan = 'Username anda adalah ' . $username . '<br>Password anda adalah ' . $password;
    } else {
        echo "Email does not exist in the database.";
    }

    $mail   = new PHPMailer;
    $mail   ->isSMTP();

    $mail   ->Host = 'smtp.gmail.com';
    $mail   ->Username = $email_pengirim;
    $mail   ->Password = 'poznhcdmuqrsdgyl';
    $mail   ->Port = 465;
    $mail   ->SMTPAuth = true;
    $mail   ->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail   ->SMTPDebug = 2;

    $mail   ->setFrom($email_pengirim, $nama_pengirim);
    $mail   ->addAddress($email_penerima);
    $mail   ->isHTML(true);
    $mail   ->Subject = $subjek;
    $mail   ->Body = $pesan;

    $send   = $mail->send();

    if($send){
        echo "<script>alert('Email berhasil dikirim');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }else{
        echo "<script>alert('Email gagal dikirim. Error: " . $mail->ErrorInfo . "');</script>";        
    }
?>
