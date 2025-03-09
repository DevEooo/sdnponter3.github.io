<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin | SDN Ponter 3</title>
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
            height: 100vh;
        }
        .container {
            display: flex;
            width: 100%;
        }
        .left {
            width: 40%;
            background-image: url('foto anak sd.jpg');
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
           color:  #CA0000;
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
            font-family: 'Inter', sans-serif;
            font-size: 24px;
            font-weight: bold;
            border-right: 3px solid black; 
            white-space: nowrap;
            overflow: hidden;
            width: fit-content;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
        <a href="registerponter3.php" class="login-admin">Register User</a>
            <div data-aos="fade-right">
                <h2>Menginspirasi Masa Depan Anak</h2>
                <p>Pendidikan berkualitas untuk membangun karakter, kreativitas, dan prestasi anak sejak dini.</p>
    
                <div class="quote">
                    <p>"Keberhasilan bukanlah kunci kebahagiaan. Kebahagiaanlah yang menjadi kunci keberhasilan. Jika Anda mencintai apa yang Anda lakukan, Anda akan sukses." </p><br>
                    <p>- Quote by: Albert Schweitzer - </p>
                </div>
            </div>
        </div>
        <div class="right">
            <a href="javascript: window.history.back();" class="back">← Kembali</a>
            <div class="login-box">
                <div data-aos="fade-right" data-aos-delay="300">
                    <h2 id="typing-text"></h2>
                    <form action="act_regist_admin.php" method="post">
                        <input type="hidden" name="id_admin">
    
                        <div class="input-group">
                            <label>Nama :</label>
                            <input type="text" name="nama" placeholder="contoh: Admin" required>
                        </div>
                        <div class="input-group">
                            <label for="username">E-mail :</label>
                            <input type="text" id="username" name="email" placeholder="contoh: admin@gmail.com" required>
                        </div>
                        <div class="input-group">
                            <label for="password">Password :</label>
                            <input type="password" id="password" name="password" placeholder="contoh: admin123" required>
                        </div>
                        <div class="input-group" id="adminCodeContainer">
                            <label for="adminCode">Kode Admin :</label>
                            <input type="text" name="adminCode" placeholder="contoh: 112233" required>
                        </div>
                        <button type="submit" class="login-btn" name="login">Login</button>
                        <div class="regist-info">
                            <p>Sudah punya akun? <a href="loginadmin.php" class="regist-btn">Login Disini!</a></p>
                        </div>
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

<script>

    const texts = ["Halo admin!", "Yuk register dulu!", "Pastikan datanya valid ya!"];
    let textIndex = 0;
    let charIndex = 0;
    const speed = 120; 
    const eraseSpeed = 70; 
    const delayBetweenTexts = 2000; 
    const typingElement = document.getElementById("typing-text");

    function typeText() {
        if (charIndex < texts[textIndex].length) {
            typingElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(typeText, speed);
        } else {
            setTimeout(eraseText, delayBetweenTexts);
        }
    }

    function eraseText() {
        if (charIndex > 0) {
            typingElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(eraseText, eraseSpeed);
        } else {
            textIndex = (textIndex + 1) % texts.length;
            setTimeout(typeText, speed);
        }
    }

    typeText();
</script>
</html>