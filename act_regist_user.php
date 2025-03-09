<?php

    session_start();
    require_once 'connect.php';

    $nisn = isset($_POST['nisn']) ? trim($_POST['nisn']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? ($_POST['password']) : ''; 

    if (!ctype_digit($nisn) || intval($nisn) <= 0) {
        echo "<script>
            alert('NISN harus berupa angka positif!');
            window.history.back();
        </script>";
        exit;
    }

    $stmt = $connect->prepare("SELECT nisn FROM siswa WHERE nisn = ?");
    $stmt->bind_param("s", $nisn);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo "<script>
            alert('NISN tidak ditemukan! Silakan hubungi admin.');
            window.history.back();
        </script>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    $stmt = $connect->prepare("SELECT nisn FROM user WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
            alert('Username atau email sudah digunakan!'); 
            window.history.back();
        </script>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    $stmt = $connect->prepare("INSERT INTO user (nisn, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nisn, $username, $email, $password);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registrasi berhasil! Silakan login.'); 
            window.location.href = 'loginponter3.php';
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan, silakan coba lagi!'); 
            window.history.back();
        </script>";
    }

    $stmt->close();
    $connect->close();