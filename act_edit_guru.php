<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telp = $_POST['no_telp'];
    $spesialisasi = $_POST['spesialisasi'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    
    $check_sql = "SELECT id_guru FROM guru WHERE nik = '$nik' AND id_guru != '$id_guru'";
    $result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('NIK sudah ada, Coba gunakan yang lain.'); 
            window.history.back();
        </script>";
    } else {
        $sql = "UPDATE guru SET nama = '$nama', tgl_lahir = '$tgl_lahir', no_telp = '$no_telp', spesialisasi = '$spesialisasi', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', nik = '$nik' WHERE id_guru = $id_guru";
        
        if (mysqli_query($connect, $sql)) {
            echo "<script>
                alert('Data guru berhasil disimpan, Silahkan dicek.');
                window.location.href='data_guru.php';
             </script>";
        } else {
            echo "<script>
                alert('Gagal mengedit data.'); 
                window.location.href='edit_form_guru.php?id=$id_guru';
            </script>";
        }
    }
    
} else {
    echo "<script>
        alert('Akses tidak diizinkan!'); 
        window.location.href='data_guru.php';
    </script>";
}


