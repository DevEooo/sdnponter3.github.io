<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_siswa = $_POST['id_siswa'];
    $nisn = $_POST['nisn'];
    $id_admin = $_POST['id_admin'];
    $id_kelas = $_POST['id_kelas'];
    $nama = $_POST['nama'];
    $nama_pengajar = $_POST['namaguru'];
    $alamat = $_POST['alamat'];
    $nomor_induk = $_POST['nomor_induk'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_orangtua = $_POST['nama_orangtua'];

    $check_sql = "SELECT id_siswa FROM siswa WHERE (nisn = '$nisn' OR nomor_induk = '$nomor_induk') AND id_siswa != '$id_siswa'";
    $result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('NISN atau NIK sudah ada. Coba gunakan yang lain.'); 
            window.history.back();
        </script>";
    } else {
        $sql = "UPDATE siswa SET nisn = '$nisn', id_admin = '$id_admin', id_kelas = '$id_kelas', nama = '$nama', nama_pengajar = '$nama_pengajar', alamat = '$alamat', nomor_induk = '$nomor_induk', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', nama_orangtua = '$nama_orangtua' WHERE id_siswa = '$id_siswa'";

        if (mysqli_query($connect, $sql)) {
            echo "<script>
                alert('Data pelajar berhasil diperbarui, Silahkan dicek,'); 
                window.location.href='data_kelas.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal mengupdate data pelajar, Coba lagi.'); 
                window.history.back();
            </script>";
        }
    }
}