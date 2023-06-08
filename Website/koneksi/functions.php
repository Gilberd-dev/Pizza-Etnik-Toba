<?php 

include_once('koneksi.php');
    function registrasi($data)
    {
        global $koneksi;

        $username= strtolower(stripslashes($data['username']));
        $password = mysqli_real_escape_string($koneksi, $data['password']);
        $password2 = mysqli_real_escape_string($koneksi, $data['password2']); 
        $phone = mysqli_real_escape_string($koneksi, $data['phone']); 

        echo "Username entered is : ". $username . "<br/>";
        echo "Password entered is : ". $password;
        echo "Phone Number entered is : ". $phone;
        

        
        if($password2 !== $password)
        {
            echo"<script>
            alert('Password tidak sesuai');
            </script>";
            return false;   
        }

        $password = password_hash($password,PASSWORD_DEFAULT);

        mysqli_query($koneksi,"INSERT INTO admin VALUES ('','$username','$password','$phone')");

        return mysqli_affected_rows($koneksi);

    }
?>