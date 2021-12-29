<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    $con = mysqli_connect('localhost', 'root');

    mysqli_select_db($con, 'blog1');

    $username = $_POST['name'];
    $pass = $_POST['password'];

    $getdata = "SELECT * FROM user WHERE username = '$username' && password = '$pass'";
    $result = mysqli_query($con, $getdata);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $_SESSION['username'] = $username;
        header('location:dashboard.php');
    }
    else{
        echo '<script>alert("Silahkan MASUK/DAFTAR AKUN!")
        window.location.href="sign-in-up.php";
        </script>';
    }
?>