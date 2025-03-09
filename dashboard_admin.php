<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        header('Location: loginadmin.php');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SDN Ponter 3</title>
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
        }

        .loading-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }

        .spinner {
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-top: 5px solid #CA0000;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 50px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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

        nav ul li a:hover, .btnhome {
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

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 70px 100px;
        }


        .text {
            max-width: 50%;
        }

        .text h2 {
            font-size: 28px;
            font-style: italic;
        }

        .text p {
            margin: 15px 0;
            color: #444;
            line-height: 1.6;
        }

        .explore-btn {
            background-color: #CA0000;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: 0.4s ease;
            border: 3px solid transparent;
            display: inline-block;
            margin: 8px 0 0;
        }
        
        .explore-btn:hover {
            color: #CA0000;
            background: transparent;
            border: 3px solid #CA0000;
        }

        .image img {
            margin: 40px 0 0;
            width: 500px;
            height: 320px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
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
            <li><a href="dashboard_admin.php" class="btnhome">Beranda</a></li>
            <li class="dropdown-container">
                <a id="profil-btn">Data <span class="nav-arrow">▼</span></a>
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

    <div class="container">
        <div class="text">
            <p class="welcome" data-aos="zoom-in">Welcome</p>
            <?php
                require_once 'connect.php';
                $sql = "SELECT * FROM admin LIMIT 1"; 
                $query = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($query);

                if ($row) {
            ?>
                <h2 data-aos="zoom-in" data-aos-delay="150"><em>Selamat datang, admin <?= isset($_SESSION['nama_admin']) ? htmlspecialchars($_SESSION['nama_admin']) : 'Guest'; ?>!</em></h2>
            <?php
                } else {
                    echo "<h2><em>Selamat datang, Admin</em></h2>";
                }
            ?>
            <div data-aos="zoom-in" data-aos-delay="300">
                <p>Selamat datang di pusat Database SDN Pondok Terong 3!, Disini anda masuk sebagai admin yang dimana anda memiliki otoritas untuk mengubah data baik itu menambah, menghapus bahkan mengupdate data Sekolah. </p>
                <a href="#" class="explore-btn">Lihat sekarang</a>
            </div>
        </div>
        <div class="image" data-aos="zoom-in" data-aos-delay="500">
            <img src="database-img.jpg" alt="Database Image">
        </div>
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
