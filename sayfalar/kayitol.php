<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../resimler/logo2.ico"/>
</head>
<body>
    <img src="../resimler/logo1.png" width="124" height="124">

    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid"> 
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">XYZ Hastanesi</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="nav navbar-nav navbar-center">
                    <li><a href="../index.php">Anasayfa</a></li>
                    <li><a href="sayfalar/hakkimizda.php">Hakkımızda</a></li>
                    <li><a href="sayfalar/">Doktorlar</a></li>
                    <li><a href="sayfalar/">İletişim</a></li>
                </ul>
            </div>
        </div>  
    </section>

    <section id="register" class="register-section">
    <div class="TableOuter">
        <h1>Kayıt Ol</h1>
        <form action="register.php" method="post">
    <div class="user">
        <input type="text" class="alan" name="sisim" id="sisim" placeholder="İsim" required>
    </div>
    <div class="user">
        <input type="text" class="alan" name="ssoyisim" id="ssoyisim" placeholder="Soyisim" required>
    </div>
    <div class="user">
        <input type="number" class="alan" name="skno" id="skno" placeholder="Kimlik Numarası" required>
    </div>
    <div class="user">
        <input type="email" class="alan" name="smail" id="smail" placeholder="Mail" required>
    </div>
    <div class="password">
        <input type="password" class="alan" name="ssifre" id="ssifre" placeholder="Şifre" required>
    </div>
    <button type="submit" class="button1">Kayıt Ol</button>
</form>


    </div>
</section>
</br>
</br>
</br>
</br>
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="footer">
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="nav navbar-nav navbar-center">
                    <li><a href="mailto:iletisim@xyz.hastane">Mail</a></li>
                    <li><a href="tel:000000">Telefon: 000 000</a></li>
                </ul>
            </div>
        </div>  
    </section>
     
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>