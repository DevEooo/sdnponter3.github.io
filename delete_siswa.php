<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    
    $sql = "DELETE FROM siswa WHERE id_siswa = $id_siswa";
    
    if (mysqli_query($connect, $sql)) {
        echo "<script>
            alert('Data siswa berhasil dihapus, Silahkan dicek.');
            window.location.href='data_siswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data, Silahkan coba lagi'); 
            window.location.href='data_siswa.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak ditemukan, silahkan coba lagi'); 
        window.location.href='data_siswa.php';
    </script>";
}