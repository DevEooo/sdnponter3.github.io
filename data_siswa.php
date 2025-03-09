<?php
require_once 'connect.php';
$sql = "SELECT * FROM siswa";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelajar | SDN Ponter 3</title>
    <!-- AOS Untuk Animasi pada Website -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Inter", sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 110px 0 0;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 50px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            position: relative;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #000;
            font-weight: 450;
            cursor: pointer;
        }

        nav ul li a:hover,
        .btnhome {
            color: #CA0000;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            top: 100%;
            left: 0;
            width: 150px;
            text-align: center;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #000;
            text-decoration: none;
        }

        .dropdown a:hover {
            background-color: #f4f4f4;
        }

        .nav-arrow {
            margin: 0 0 0 1px;
            font-size: 12px;
            color: #000;
        }

        .login-btn {
            background-color: #CA0000;
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.4s;
            border: 3px solid transparent;
        }

        .login-btn:hover {
            color: #CA0000;
            background: transparent;
            border: 3px solid #CA0000;
            font-weight: bold;
        }

        select {
            width: 100%;
            max-width: 200px;
            padding: 8px 16px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            background: #f8f9fa;
            color: #333;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            outline: none;
            margin: 0 0 0 5px;
        }

        /* Icon */
        select {
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="%23333"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>');
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
            padding-right: 40px;
        }

        select:hover {
            background-color: #eceff1;
        }

        select:focus {
            background-color: white;
            box-shadow: 0 0 5px rgba(33, 150, 243, 0.5);
        }

        option {
            font-size: 14px;
            color: #333;
            background: white;
        }

        option:disabled {
            color: #aaa;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }

        th {
            background-color: #CA0000;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .edit-btn,
        .delete {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
            display: inline-block;
        }

        .edit-btn {
            background-color: #3498db;
            color: white;
        }

        .edit-btn:hover {
            background-color: #2980b9;
        }

        .delete {
            background-color: #e74c3c;
            color: white;
        }

        .delete:hover {
            background-color: #c0392b;
        }

        .add {
            display: inline-block;
            margin: 15px 0 0 5px;
            padding: 10px 10px 10px 8px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .add:hover {
            background-color: #219150;
        }

        .txt {
            max-width: 100%;
            width: 230px;
            font-size: 36px;
            color: black;
            text-decoration: none;
            margin: 10px 0 10px 5px;

        }

        .txt:hover {
            color: black;
            text-decoration: underline;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="Logo SD.png" height="60" alt="Logo SDN Pondok Terong 3">
            <h1>ADMIN SDN PONTER 3</h1>
        </div>
        <ul>
            <li><a href="dashboard_admin.php">Beranda</a></li>
            <li class="dropdown-container">
                <a id="profil-btn" class="btnhome">Data <span class="nav-arrow" class="">▼</span></a>
                <div class="dropdown" id="profil-dropdown">
                    <a href="data_kelas.php">Kelas</a>
                    <a href="data_guru.php">Guru</a>
                    <a href="data_siswa.php">Siswa</a>
                </div>
            </li>
            <li><a href="jadwal_piket.php">Jadwal Piket</a></li>
            <li><a href="contactinfo.php">Contact</a></li>
            <li><a href="index.html" class="login-btn">Log out</a></li>
        </ul>
    </nav>

    <h1 class="txt" data-aos="fade-up">Data Pelajar</h1>
    <a href="add_form_siswa.php" method="post" class="add" data-aos="fade-up" data-aos-duration="300" data-aos-delay="300">Tambah Data</a>
    <select name=""  data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
        <option disabled selected>Pilih Data Kelas</option>
        <option value="4A">Kelas 4A</option>
    </select>

    <div class="table-container"  data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
        <table border="1">
            <tr>
                <th>ID Siswa</th>
                <th>NISN</th>
                <th>ID Admin</th>
                <th>ID Kelas</th>
                <th>Nama Pelajar</th>
                <th>Nama Pengajar</th>
                <th>Alamat</th>
                <th>Nomor Induk</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nama Orangtua</th>
                <th>Action Button</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $row['id_siswa'] ?></td>
                    <td><?= $row['nisn'] ?></td>
                    <td><?= $row['id_admin'] ?></td>
                    <td><?= $row['id_kelas'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nama_pengajar'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['nomor_induk'] ?></td>
                    <td><?= $row['tgl_lahir'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['nama_orangtua'] ?></td>

                    <td>
                        <a href="edit_form_siswa.php?id=<?= $row['id_siswa'] ?>" class="edit-btn">Edit</a>
                        <a href="delete_siswa.php?id=<?= $row['id_siswa'] ?>"
                            onclick="return confirm('Data yang dihapus tidak bisa di recover, Anda yakin?');"
                            class="delete">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Script untuk setup animasi websitenya -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const profilBtn = document.getElementById("profil-btn");
            const profilDropdown = document.getElementById("profil-dropdown");
            const informasiBtn = document.getElementById("informasi-btn");
            const informasiDropdown = document.getElementById("informasi-dropdown");

            profilBtn.addEventListener("click", function (event) {
                event.preventDefault();
                profilDropdown.style.display = (profilDropdown.style.display === "block") ? "none" : "block";
            });

            informasiBtn.addEventListener("click", function (event) {
                event.preventDefault();
                informasiDropdown.style.display = (informasiDropdown.style.display === "block") ? "none" : "block";
            });

            document.addEventListener("click", function (event) {
                if (!profilBtn.contains(event.target) && !profilDropdown.contains(event.target)) {
                    profilDropdown.style.display = "none";
                }
                if (!informasiBtn.contains(event.target) && !informasiDropdown.contains(event.target)) {
                    informasiDropdown.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>