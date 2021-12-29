<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    $con = mysqli_connect('localhost', 'root');

    mysqli_select_db($con, 'blog1');

    $username = $_POST['name'];
    $pass = $_POST['password'];

    $getdata = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($con, $getdata);
    $num = mysqli_num_rows($result);

    if($num == 1){
        echo '<script>alert("Akun Sudah Pernah Didaftarkan!")
        window.location.href="sign-in-up.php";
        </script>';
    }
    else{
        $reg = "INSERT into user(username, password) values ('$username', '$pass')";
        mysqli_query($con, $reg);
        echo '<script>alert("Registrasi BERHASIL!")</script>';
        header('location:sign-in-up.php');
    }

?>