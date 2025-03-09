<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM siswa WHERE id_siswa = '$id'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);
} else {
    echo "ID tidak ditemukan!";
    exit;
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
    <title>Edit Data Siswa | SDN Ponter 3</title>
    <!-- AOS Untuk Animasi pada Website -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            height: 140vh;
        }

        body::-webkit-scrollbar {
          display: none; 
        }

        .container {
            display: flex;
            width: 100%;
        }

        .left {
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

        .left h2 {
            font-size: 30px;
        }

        .left p {
            max-width: 450px;
            font-size: 18px;
        }

        .quote {
            margin: 30px 0 0;
            max-width: 450px;
        }

        .left h2 {
            margin: 0 0 10px;
        }

        .right {
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #fff;
            padding: 40px;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            margin: 4em 0 0;
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
            font-size: 18px;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #CA0000;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
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
            right: 15px;
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
            left: 15px;
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
            font-size: 28px;
            font-weight: bold;
            white-space: nowrap;
            width: fit-content;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <a href="javascript: window.history.back();" class="back">← Kembali</a>

            <div data-aos="fade-right">
                <h2>Menginspirasi Masa Depan Anak</h2>
                <p>Pendidikan berkualitas untuk membangun karakter, kreativitas, dan prestasi anak sejak dini.</p>
    
                <div class="quote">
                    <p>"Keberhasilan bukanlah kunci kebahagiaan. Kebahagiaanlah yang menjadi kunci keberhasilan. Jika Anda
                        mencintai apa yang Anda lakukan, Anda akan sukses." </p><br>
                    <p>- Quote by: Albert Schweitzer - </p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="login-box">
                <div data-aos="fade-right" data-aos-delay="300">
                    <h2 id="typing-text">Edit Data Siswa</h2>
                    <form action="act_edit_siswa.php" method="post">
                        <input type="hidden" name="id_siswa" value="<?= $row['id_siswa'] ?>">
    
                        <div class="input-group">
                            <label>NISN:</label>
                            <input type="text" name="nisn" value="<?= $row['nisn'] ?>" required><br>
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
                            <label for="">ID Kelas</label>
                            <select name="id_kelas">
                                <?php while ($kelas = mysqli_fetch_assoc($queryKelas)) { ?>
                                    <option value="<?= $kelas['id_kelas'] ?>"><?= "ID: ", $kelas['id_kelas'] ?></option>
                                <?php } ?>
                            </select><br>
                        </div>
    
                        <div class="input-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br>
                        </div>
    
                        <div class="input-group">
                            <label for="">Nama Pengajar</label>
                            <select name="namaguru">
                                <?php while ($guru = mysqli_fetch_assoc($queryGuru)) { ?>
                                    <option value="<?= $guru['nama'] ?>"> <?= "Nama: ", $guru['nama'] ?></option>
                                <?php } ?>
                            </select><br>
                        </div>
    
                        <div class="input-group">
                            <label>Alamat:</label>
                            <input type="text" name="alamat" value="<?= $row['alamat'] ?>" required><br>
                        </div>
    
                        <div class="input-group">
                            <label>Nomor Induk:</label>
                            <input type="text" name="nomor_induk" value="<?= $row['nomor_induk'] ?>" required><br>
                        </div>
    
                        <div class="input-group">
                            <label>Tanggal Lahir:</label>
                            <input type="date" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" required><br>
                        </div>
    
                        <div class="input-group">
                            <label>Jenis Kelamin:</label>
                            <select name="jenis_kelamin" required>
                                <option value="Laki-Laki" <?= ($row['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?>>
                                    Laki-Laki</option>
                                <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>
                                    Perempuan</option>
                            </select><br>
                        </div>
    
                        <div class="input-group">
                            <label>Nama Orang Tua:</label>
                            <input type="text" name="nama_orangtua" value="<?= $row['nama_orangtua'] ?>" required><br>
                        </div>
    
                        <button type="submit" class="login-btn">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Script untuk setup animasi websitenya -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>