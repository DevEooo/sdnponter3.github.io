<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id_guru = $_GET['id'];
    
    $sql = "DELETE FROM guru WHERE id_guru = $id_guru";
    
    if (mysqli_query($connect, $sql)) {
        echo "<script>
            alert('Data guru berhasil dihapus, Silahkan dicek.');
            window.location.href='data_guru.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data, Silahkan coba lagi.'); 
            window.location.href='data_guru.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak ditemukan!'); 
        window.location.href='data_guru.php';
    </script>";
}