<?php
session_start();
include("veritabani_baglanti.php"); 

//Zaten giris yapildiysa anasayfaya yolla.
if (isset($_SESSION["sgiris"])) {
   header("Location: sekretermenu.php");
   exit;
}

$hata_mesaji = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $skno = $_POST['skno']; 
    $ssifre = $_POST['ssifre']; 

    $sql = "SELECT * FROM sekreter WHERE skno = ? AND ssifre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $skno, $ssifre); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION["sgiris"] = true; 
        header("Location: sekretermenu.php");
	
        exit;
    } else {
        $hata_mesaji = "Geçersiz kimlik numarası veya şifre!";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../resimler/logo2.ico"/>
</head>
<body>
    <img src="../resimler/logo1.png" width="124" height="124">
    <section id="login" class="login-section">
    <div class="TableOuter">
        <h1>Kayıt Ol</h1>
        <form action="sgiris.php" method="post">
    <div class="user">
        <input type="number" class="alan" name="skno" id="skno" placeholder="Kimlik Numarası" required>
    </div>
    <div class="password">
        <input type="password" class="alan" name="ssifre" id="ssifre" placeholder="Şifre" required>
    </div>
    <button type="submit" class="button1">Giriş Yap</button>
</form>
<a href="dsifremi_unuttum.php">Şifremi Unuttum</a>
<h1>Giriş Yap</h1>

<?php if ($hata_mesaji != ""): ?>
    <div style="color: red; font-weight: bold;">
        <?php echo $hata_mesaji; ?>
    </div>
<?php endif; ?>
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