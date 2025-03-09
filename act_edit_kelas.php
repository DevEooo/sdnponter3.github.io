<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas = $_POST['id_kelas'];
    $id_guru = $_POST['id_guru'];
    $id_admin = $_POST['id_admin'];
    $namakelas = $_POST['namakelas'];  
    
    $check_sql = "SELECT id_kelas FROM kelas WHERE (id_guru = '$id_guru' OR nama_kelas = '$namakelas') AND id_kelas != '$id_kelas'";
    $result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('ID Guru atau Nama Kelas sudah ada, Coba gunakan yang lain.'); 
            window.history.back();
        </script>";
    } else {
        $sql = "UPDATE kelas SET id_guru = '$id_guru', id_admin = '$id_admin', nama_kelas = '$namakelas' WHERE id_kelas = $id_kelas";
    
        if (mysqli_query($connect, $sql)) {
            echo "<script>
                alert('Data kelas berhasil disimpan, Silahkan dicek.');
                window.location.href='data_kelas.php';
             </script>";
        } else {
            echo "<script>
                alert('Gagal mengedit data.'); 
                window.location.href='edit_form_kelas.php?id=$id_kelas';
            </script>";
        }
    }

} else {
    echo "<script>
        alert('Akses tidak diizinkan, Hubungi programmer.'); 
        window.location.href='data_kelas.php';
    </script>";
}


