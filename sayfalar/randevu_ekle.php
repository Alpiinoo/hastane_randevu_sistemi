<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Ekle</title>
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
        </div>  
    </section>
    <section id="register" class="register-section">
    <div class="TableOuter">
        <h1 style="color: black;">Randevu Ekle</h1>
        <form action="hrandevu_olustur.php" method="post">
    <div class="user">
        <input type="text" class="alan" name="rad" id="rad" placeholder="Hasta Adı" required>
    </div>
    <div class="user">
        <input type="text" class="alan" name="rsoy" id="rsoy" placeholder="Hasta Soyad" required>
    </div>
    <div class="user">
        <input type="number" class="alan" name="rtel" id="rtel" placeholder="Hasta Telefon" required>
    </div>
    <div class="user">
        <input type="date" class="alan" name="rtar" id="rtar" placeholder="Randevu Tarihi" required>
    </div>
    <div class="user">
        <input type="text" class="alan" name="rdok" id="rdok" placeholder="Doktor" required>
    </div>
    <button type="submit" class="button1">Randevu Ekle</button>
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
     
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
