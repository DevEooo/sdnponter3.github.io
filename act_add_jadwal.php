<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nisn']) || empty($_POST['id_siswa']) || empty($_POST['id_admin']) || empty($_POST['id_guru']) || empty($_POST['id_kelas']) || empty($_POST['nama']) || empty($_POST['hari']) || empty($_POST['tugas'])) {
        echo "<script>
            alert('Silahkan isi data terlebih dahulu.'); 
            window.history.back();
        </script>";
        exit;
    }

    $nisn = $_POST['nisn'];
    $id_siswa = $_POST['id_siswa'];
    $id_admin = $_POST['id_admin'];
    $id_guru = $_POST['id_guru'];
    $id_kelas = $_POST['id_kelas'];
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $tugas = $_POST['tugas'];

    $checkQuery = "SELECT * FROM jadwal_piket WHERE nisn = '$nisn' AND nama = '$nama'";
    $result = mysqli_query($connect, $checkQuery);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Data sudah ada! Silakan tambahkan data yang berbeda.'); 
            window.history.back();
        </script>";
    } else {
        $query = "INSERT INTO jadwal_piket (nisn, id_siswa, id_admin, id_guru, id_kelas, nama, hari, tugas) 
                  VALUES ('$nisn', '$id_siswa', '$id_admin', '$id_guru', '$id_kelas', '$nama', '$hari', '$tugas')";
        
        if (mysqli_query($connect, $query)) {
            echo "<script>
                alert('Jadwal Piket berhasil ditambahkan, Silahkan dicek.');
                window.location.href='jadwal_piket.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal menambahkan data, Coba lagi: " . mysqli_error($connect) . "'); 
                window.history.back();
            /script>";
        }
    }
}
