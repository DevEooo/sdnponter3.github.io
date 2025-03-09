<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telp = $_POST['no_telp'];
    $spesialisasi = $_POST['spesialisasi'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    
    $varCheck = "SELECT * FROM guru WHERE nik = '$nik'";
    $hasil = mysqli_query($connect, $varCheck);

    if(mysqli_num_rows($hasil) > 0) {
        echo "<script>
            alert('NIK sudah terpakai, Gunakan NIK yang berbeda.'); 
            window.history.back();
        </script>";
    } else {
        $sql = "INSERT INTO guru (id_admin, nama, tgl_lahir, no_telp, spesialisasi, alamat, jenis_kelamin, nik) VALUES ('$admin' ,'$nama', '$tgl_lahir', '$no_telp', '$spesialisasi', '$alamat', '$jenis_kelamin', '$nik')";
    
        if (mysqli_query($connect, $sql)) {
            echo "<script>
                alert('Berhasil menambahkan Data Guru, Silahkan dicek.');
                window.location.href='data_guru.php';
             </script>";
        } else {
            echo "<script>
                alert('Gagal menambah data, Silahkan coba lagi.'); 
                window.history.back();
            </script>";
        }
    }

} else {
    echo "<script>
        alert('Akses tidak diizinkan, Hubungi programmer.'); 
        window.history.back();
    </script>";
}


