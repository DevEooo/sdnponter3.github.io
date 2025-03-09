<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | SDN Ponter 3</title>
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

        .content-wrapper {
            display: flex;
            justify-content: center; 
            gap: 10%;
            margin: 30px auto;
            max-width: 100%;
            width: 1200px;
            height: auto;
        }

        .container2 {
            flex: 1;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;   
        }

        .container2 h2 {
            text-align: center;
        }

        .contact-info {
            margin: 0 0 0 1 em;
        }

        .head-container {
            display: flex;
            justify-content: center; 
            gap: 10%;
            margin: 30px auto;
            max-width: 100%;
            width: 1200px;
            height: auto;
        }

        .container1 {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;   
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
                <a id="profil-btn">Data <span class="nav-arrow">▼</span></a>
                <div class="dropdown" id="profil-dropdown">
                    <a href="data_kelas.php">Kelas</a>
                    <a href="data_guru.php">Guru</a>
                    <a href="data_siswa.php">Siswa</a>
                </div>
            </li>
            <li><a href="jadwal_piket.php">Jadwal Piket</a></li>
            <li><a href="contactinfo.php" class="btnhome">Contact</a></li>
            <li><a href="index.html" class="login-btn">Log out</a></li>
        </ul>
    </nav>

    <div class="head-container">
        <div class="container1" data-aos="fade-right">
            <h2>Deskripsi</h2><br>
            <p>Halaman ini dibuat untuk memberikan informasi kontak bagi pengguna yang ingin berkomunikasi dengan pihak sekolah atau tim pengembang. Kami memahami pentingnya komunikasi yang efektif, oleh karena itu kami menyediakan berbagai cara untuk menghubungi kami. tim IT kami siap membantu Anda dalam menyelesaikan permasalahan tersebut. Anda juga dapat melaporkan bug atau memberikan saran pengembangan melalui kontak yang tersedia. Kami berkomitmen untuk selalu meningkatkan kualitas layanan agar dapat memberikan pengalaman terbaik bagi pengguna.</p>
        </div>
    </div>
    
    <div class="head-container">
        <div class="container1" data-aos="fade-left" data-aos-delay="300">
            <h2>Hubungi Kami</h2><br>
            <p>Kami selalu siap membantu Anda, Jika Anda memiliki pertanyaan, saran, atau kendala terkait layanan kami, silakan hubungi kami melalui informasi yang tersedia di bawah ini. Kami akan berusaha merespons secepat mungkin untuk memastikan kenyamanan dan kepuasan Anda. Jika Anda mengalami kendala teknis atau menemukan bug dalam sistem, silakan hubungi tim pengembang kami melalui sistem pelaporan yang telah disediakan.</p>
        </div>
    </div>


    <div class="content-wrapper" data-aos="flip-left" data-aos-duration="1200" data-aos-delay="600">
        <div class="container2">
            <h2>Kontak Programmer 1</h2><br>
            <div class="contact-info">
                <p><strong>Nama:</strong> Nathanieldy Satria Fisel</p>
                <p><strong>Email:</strong> -</p>
                <p><strong>Telepon:</strong> +62 897-8388-608</p>
                <p><strong>Alamat:</strong> Depok</p>
                <p><strong>Jam Operasional:</strong> Senin - Jumat, 08:00 - 16:00</p><br>
            </div>
        </div>


        <div class="container2" data-aos="flip-left" data-aos-duration="1200" data-aos-delay="800">
            <h2>Kontak Programmer 2</h2><br>
            <div class="contact-info">
                <p><strong>Nama:</strong> Herald Panji</p>
                <p><strong>Email:</strong> -</p>
                <p><strong>Telepon:</strong> +62 895 - 3453 - 60109</p>
                <p><strong>Alamat:</strong> Depok</p>
                <p><strong>Jam Operasional:</strong> Senin - Jumat, 08:00 - 16:00</p><br>
            </div>
        </div>
    </div>
</body>

 <!-- Script untuk setup animasi websitenya -->
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profilBtn = document.getElementById("profil-btn");
        const profilDropdown = document.getElementById("profil-dropdown");

        profilBtn.addEventListener("click", function (event) {
            event.preventDefault();
            profilDropdown.style.display = (profilDropdown.style.display === "block") ? "none" : "block";
        });

        document.addEventListener("click", function (event) {
            if (!profilBtn.contains(event.target) && !profilDropdown.contains(event.target)) {
                profilDropdown.style.display = "none";
            }
        });
    });
</script>
</html>
