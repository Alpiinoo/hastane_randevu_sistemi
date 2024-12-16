<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("veritabani_baglanti.php"); 

if (!isset($_SESSION["dgiris"]) || $_SESSION["dgiris"] !== true) {
   exit("Erişim reddedildi: Oturum açılmamış.");
}

$hata_mesaji = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doktor Menu</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../resimler/logo2.ico"/>
</head>
<body>
    <img src="../resimler/logo1.png" width="124" height="124">
    <section id="welcome" class="welcome-section">
    <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-5">
                <p><a href="../sayfalar/sekreterkayit.php">Sekreter Kayıt</a></a></p>
                <p><a href="../sayfalar/randevu_listele.php">Randevu Listele</a></a></p>
                <p><a href="../sayfalar/randevu_ekle.php">Randevu Ekle</a></a></p>
                <p><a href="../sayfalar/randevu_sec.php">Randevu Düzenle</a></a></p>
                <p><a href="../sayfalar/randevu_sil.php">Randevu Sil</a></a></p>
                <p><a href="../sayfalar/hasta_listele.php">Hasta Listele</a></a></p>
                <p><a href="../sayfalar/logout.php">Çıkış Yap</a></p>
                </div>
            </div>
    </section>

    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
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
