<?php

    session_start();

    require_once 'connect.php';

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $queryAdm = "SELECT * FROM admin WHERE nama = '$username' OR email = '$username'";
    $result = mysqli_query($connect, $queryAdm);
    $row = mysqli_fetch_assoc($result);

    if ($row && $password == $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['nama_admin'] = $row['nama'];
        header("Location: dashboard_admin.php");
    } else {
        echo "<script>
            alert('Data tidak valid, coba lagi.');
            window.location.href = 'loginadmin.php'
            window.reload();
        </script>";
    }