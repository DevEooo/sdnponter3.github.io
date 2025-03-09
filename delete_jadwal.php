<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id_jadwal = $_GET['id'];
    
    $sql = "DELETE FROM jadwal_piket WHERE id_jadwal = $id_jadwal";
    
    if (mysqli_query($connect, $sql)) {
        echo "<script>
            alert('Data jadwal piket berhasil dihapus, Silahkan dicek');
            window.location.href='jadwal_piket.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data, Silahkan coba lagi.'); 
            window.location.href='jadwal_piket.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak ditemukan!'); 
        window.location.href='jadwal_piket.php';
    </script>";
}