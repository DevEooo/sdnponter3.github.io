<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_jadwal = $_POST['id_jadwal'];
    $nisn = $_POST['nisn'];
    $id_siswa = $_POST['id_siswa'];
    $id_admin = $_POST['id_admin'];
    $id_guru = $_POST['id_guru'];  
    $id_kelas = $_POST['id_kelas'];
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $tugas = $_POST['tugas'];  
    
    $check_sql = "SELECT id_jadwal FROM jadwal_piket WHERE (id_siswa = '$id_siswa' OR nisn = '$nisn') AND id_jadwal != '$id_jadwal'";
    $result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('NISN atau ID Pelajar ini sudah ada, Coba gunakan yang lain.'); 
            window.history.back();
        </script>";
    } else {
        $sql = "UPDATE jadwal_piket SET nisn = '$nisn', id_siswa = '$id_siswa' ,id_admin = '$id_admin', id_guru = '$id_guru', id_kelas = '$id_kelas', nama = '$nama', hari = '$hari', tugas = '$tugas' WHERE id_jadwal = '$id_jadwal'";
    
        if (mysqli_query($connect, $sql)) {
            echo "<script>
                alert('Data jadwal piket berhasil disimpan, Silahkan dicek.');
                window.location.href='jadwal_piket.php';
             </script>";
        } else {
            echo "<script>
                alert('Gagal mengedit data, Silahkan coba lagi.'); 
                window.location.href='edit_form_jadwal.php?id=$id_jadwal';
            </script>";
        }
    }
    
} else {
    echo "<script>
        alert('Akses tidak diizinkan, Hubungi programmer.'); 
        window.location.href='jadwal_piket.php';
    </script>";
}


