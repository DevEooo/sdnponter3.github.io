<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guru = $_POST['id_guru'];
    $admin = $_POST['id_admin'];
    $namakelas = $_POST['namakelas'];
    
    $varCheck = "SELECT * FROM kelas WHERE id_guru = '$guru'";
    $hasil = mysqli_query($connect, $varCheck);

    if(mysqli_num_rows($hasil) > 0) {
        echo "<script>
            alert('ID Guru Sudah dipakai, silahkan coba ID yang lain.'); 
            window.history.back();
        </script>";
    }

    $sql = "INSERT INTO kelas (id_guru , id_admin, nama_kelas) VALUES ('$guru' ,'$admin' ,'$namakelas')";
    
    if (mysqli_query($connect, $sql)) {
        echo "<script>
            alert('Berhasil menambahkan Data Kelas!');
            window.location.href='data_kelas.php';
         </script>";
    } else {
        echo "<script>
            alert('Gagal menambah data!'); 
            window.history.back();
        </script>";
    }
    
} else {
    echo "<script>
        alert('Terjadi kesalahan, coba lagi'); 
        window.history.back();
    </script>";
}


