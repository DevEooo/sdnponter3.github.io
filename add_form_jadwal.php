<?php
require_once 'connect.php';

$querySiswa = mysqli_query($connect, "SELECT * FROM siswa");
$daftarSiswa = [];
while ($siswa = mysqli_fetch_assoc($querySiswa)) {
    $daftarSiswa[] = $siswa;
}
$queryAdm = mysqli_query($connect, "SELECT * FROM admin");
$queryGuru = mysqli_query($connect, "SELECT * FROM guru");
$queryKelas = mysqli_query($connect, "SELECT * FROM kelas");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jadwal Piket | SDN Ponter 3</title>
    <!-- AOS Untuk Animasi pada Website -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 120vh;
        }

        body::-webkit-scrollbar {
          display: none;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .left {
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #fff;
            padding: 40px;
        }

        .right {
            width: 40%;
            background-image: url('bgpaper.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            flex-direction: column;
            text-align: center;
            padding: 40px;
            color: black;
        }

        .right h2 {
            font-size: 30px;
        }

        .right p {
            max-width: 450px;
            font-size: 18px;
        }

        .quote {
            margin: 30px 0 0;
            max-width: 450px;
        }

        .right h2 {
            margin: 0 0 10px;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            margin: 1em 0 0;
        }

        .login-box h2 {
            margin-bottom: 25px;
            font-size: 30px;
        }

        .input-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #CA0000;
            border: 2px solid #CA0000;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
            transition: 0.3s ease;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select:focus {
            background-color: white;
            box-shadow: 0 0 5px rgba(33, 150, 243, 0.5);
        }

        .login-btn:hover {
            background: transparent;
            outline: 2px solid #CA0000;
            color: #CA0000;
            transition: 0.3s ease;
        }

        .regist-info {
            margin-top: 15px;
            font-size: 14px;
        }

        .regist-info a {
            color: #CA0000;
            text-decoration: none;
        }

        .regist-info a:hover {
            color: #CA0000;
            text-decoration: underline;
        }

        .back {
            position: absolute;
            top: 12px;
            left: 15px;
            margin: 5px 2px 0 0;
            text-decoration: none;
            color: black;
            font-size: 18px;
        }

        .back:hover {
            text-decoration: underline;
            color: #CA0000;
            text-underline-offset: 5px;
        }

        .login-admin {
            position: absolute;
            top: 12px;
            right: 15px;
            text-decoration: none;
            padding: 10px;
            background: #CA0000;
            outline: 2px solid #CA0000;
            border: none;
            color: white;
            border-radius: 4px;
            transition: 0.3s ease;
        }

        .login-admin:hover {
            background: transparent;
            outline: 2px solid #CA0000;
            color: #CA0000;
            transition: 0.3s ease;
        }

        #typing-text {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <a href="javascript: window.history.back();" class="back">← Kembali</a>

            <div class="login-box" data-aos="fade-right">
                <h2 id="typing-text">Tambah Data Jadwal</h2>
                <form action="act_add_jadwal.php" method="post">
                    <div class="input-group">
                        <label for="">NISN</label>
                        <select name="nisn">
                            <option disabled selected>Pilih NISN</option>
                            <?php foreach ($daftarSiswa as $siswa) { ?>
                                <option value="<?= $siswa['nisn'] ?>">
                                    <?= "NISN: ", $siswa['nisn'], " | Nama Siswa: ", $siswa['nama'] ?></option>
                            <?php } ?>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label for="">ID Siswa</label>
                        <select name="id_siswa">
                            <option disabled selected>Pilih ID Siswa</option>
                            <?php foreach ($daftarSiswa as $siswa) { ?>
                                <option value="<?= $siswa['id_siswa'] ?>">
                                    <?= "ID Siswa: ", $siswa['id_siswa'], " | Nama Siswa: ", $siswa['nama'] ?></option>
                            <?php } ?>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label for="">ID Admin</label>
                        <select name="id_admin">
                            <?php while ($admin = mysqli_fetch_assoc($queryAdm)) { ?>
                                <option value="<?= $admin['id_admin'] ?>"><?= "ID: ", $admin['id_admin'] ?></option>
                            <?php } ?>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label for="">ID Guru</label>
                        <select name="id_guru">
                            <?php while ($guru = mysqli_fetch_assoc($queryGuru)) { ?>
                                <option value="<?= $guru['id_guru'] ?>"><?= "ID: ", $guru['id_guru'] ?></option>
                            <?php } ?>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label for="">ID Kelas</label>
                        <select name="id_kelas">
                            <?php while ($kelas = mysqli_fetch_assoc($queryKelas)) { ?>
                                <option value="<?= $kelas['id_kelas'] ?>"><?= "ID: ", $kelas['id_kelas'] ?></option>
                            <?php } ?>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label for="">Nama</label>
                        <select name="nama">
                            <option disabled selected>Pilih Nama Siswa</option>
                            <?php foreach ($daftarSiswa as $siswa) { ?>
                                <option value="<?= $siswa['nama'] ?>"> <?= "Nama Siswa: ", $siswa['nama'] ?></option>
                            <?php } ?>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label>Hari</label>
                        <select name="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select><br>
                    </div>

                    <div class="input-group">
                        <label>Tugas</label>
                        <select name="tugas" required>
                            <option value="Menyapu">Menyapu</option>
                            <option value="Mengepel">Mengepel</option>
                            <option value="Hapus Papan Tulis">Menghapus Papan Tulis</option>
                        </select><br>
                    </div>

                    <button type="submit" class="login-btn">Tambah</button>
                </form>
            </div>
        </div>
        <div class="right">
            <div data-aos="fade-left" data-aos-delay="300">
                <h2>Menginspirasi Masa Depan Anak</h2>
                <p>Pendidikan berkualitas untuk membangun karakter, kreativitas, dan prestasi anak sejak dini.</p>
    
                <div class="quote">
                    <p>"Pendidikan adalah kunci menuju masa depan, karena hari esok dimiliki oleh mereka yang
                        mempersiapkannya hari ini." </p><br>
                    <p>- Quote by: Malcolm X - </p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>