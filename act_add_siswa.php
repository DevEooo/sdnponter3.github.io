<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nisn']) && empty($_POST['id_admin']) && empty($_POST['id_guru']) && empty($_POST['id_kelas']) && empty($_POST['nama'])&& empty($_POST['namaguru']) && empty($_POST['alamat']) && empty($_POST['nomor_induk']) && empty($_POST['tgl']) && empty($_POST['jenis_kelamin']) && empty($_POST['nama_orangtua']) ) {
        echo "<script>
            alert('Silahkan isi data terlebih dahulu.'); 
            window.history.back();
        </script>";
        exit;
    }

    $nisn = $_POST['nisn'];
    $id_admin = $_POST['id_admin'];
    $id_guru = $_POST['id_guru'];
    $id_kelas = $_POST['id_kelas'];
    $nama = $_POST['nama'];
    $namaguru = $_POST['namaguru'];
    $alamat = $_POST['alamat'];
    $nomor_induk = $_POST['nomor_induk'];
    $tgl = $_POST['tgl'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $namaortu = $_POST['nama_orangtua'];

    $checkQuery = "SELECT * FROM siswa WHERE nisn = '$nisn' AND nomor_induk = '$nomor_induk'";
    $result = mysqli_query($connect, $checkQuery);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('NISN dan NIK sudah ada! Silakan tambahkan data yang berbeda.'); 
            window.history.back();
        </script>";
    } else {
        $query = "INSERT INTO siswa (nisn, id_admin, id_kelas, nama, nama_pengajar, jenis_kelamin, alamat, nomor_induk, tgl_lahir, nama_orangtua) 
                  VALUES ('$nisn', '$id_admin', '$id_kelas', '$nama', '$namaguru', '$jenis_kelamin', '$alamat', '$nomor_induk', '$tgl', '$namaortu')";
        
        if (mysqli_query($connect, $query)) {
            echo "<script>
                alert('Data pelajar berhasil ditambahkan, Silahkan dicek.');
                window.location.href='data_siswa.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menambahkan data, Coba lagi: " . mysqli_error($connect) . "'); 
                window.history.back();
            /script>";
        }
    }
}