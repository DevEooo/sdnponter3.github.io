<?php

    session_start();

    require_once 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && $password == $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['nama_user'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "<script>
            alert('Data tidak valid!');
            window.location.href = 'loginponter3.php'
            window.reload();
        </script>";
    }