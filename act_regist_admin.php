<?php

    session_start();
    require_once 'connect.php';

    $id_admin = $_POST['id_admin'];
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? ($_POST['password']) : ''; 
    $adminCode = isset($_POST['adminCode']) ? $_POST['adminCode'] : '';

    $checkEmail = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
    $hasil = mysqli_query($connect, $checkEmail);

    if(mysqli_num_rows($hasil) > 1) {
        echo "<script>
            alert('Email ini sudah dipakai, Silahkan gunakan email lain.');
            window.location.href = 'regist_admin.php';
         </script>";
    }

    $isAdmin = 0;
    $storedAdminCode = getenv('ADMINPONTER3'); 

    if (!empty($adminCode) && $adminCode === $storedAdminCode) {
        $isAdmin = 1;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            alert('Format email tidak valid!');
            window.location.href = 'regist_admin.php';
         </script>";
        exit;
    } else {
        $stmt = $connect->prepare("INSERT INTO admin (nama, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $password);
    
        if ($stmt->execute()) {
            echo "<script>
                alert('Registrasi berhasil! Silakan login.'); 
                window.location.href = 'loginadmin.php'; 
            </script>";
        } else {
            echo "<script>
                alert('Terjadi kesalahan, silakan coba lagi!'); 
                window.history.back();
            </script>";
        }
    }

    $connect->close();