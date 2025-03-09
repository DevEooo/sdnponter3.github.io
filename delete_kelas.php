<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];
    
    $sql = "DELETE FROM kelas WHERE id_kelas = $id_kelas";
    
    if (mysqli_query($connect, $sql)) {
        echo "<script>
            alert('Data kelas berhasil dihapus, Silahkan dicek.');
            window.location.href='data_kelas.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data, Silahkan coba lagi'); 
            window.location.href='data_kelas.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak ditemukan, silahkan coba lagi'); 
        window.location.href='data_kelas.php';
    </script>";
}