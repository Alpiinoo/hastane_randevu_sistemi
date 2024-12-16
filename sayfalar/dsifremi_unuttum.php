<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hastane";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı Başarısız: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['dmail'])) {
        $dmail = $_POST['dmail'];

        
        $stmt = $conn->prepare("SELECT did FROM doktor WHERE dmail = ?");
        $stmt->bind_param("s", $dmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            
            $token = bin2hex(random_bytes(50));
            $stmt = $conn->prepare("UPDATE doktor SET reset_token = ?, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE dmail = ?");
            $stmt->bind_param("ss", $token, $dmail);
            $stmt->execute();
            $resetLink = "http://yourwebsite.com/sifre-sifirla.php?token=$token";


            $to = $dmail;
            $subject = "Şifre Sıfırlama";
            $message = "Merhaba,\n\nŞifrenizi sıfırlamak için aşağıdaki bağlantıya tıklayın:\n$resetLink\n\nBağlantı 1 saat boyunca geçerlidir.";
            $headers = "From: no-reply@yourwebsite.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Şifre sıfırlama e-postası gönderildi.";
            } else {
                echo "E-posta gönderilirken bir hata oluştu.";
            }
        } else {
            echo "Bu e-posta adresi kayıtlı değil.";
        }
        exit;
    }

    if (isset($_POST['token']) && isset($_POST['password'])) {
        $token = $_POST['token'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE doktor SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ? AND token_expiry > NOW()");
        $stmt->bind_param("ss", $password, $token);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            echo "Şifreniz başarıyla güncellendi.";
        } else {
            echo "Geçersiz veya süresi dolmuş bağlantı.";
        }
        exit;
    }
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $conn->prepare("SELECT did FROM doktor WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '
        <form method="post">
            <input type="hidden" name="token" value="' . htmlspecialchars($token) . '">
            <label for="password">Yeni Şifre:</label>
            <input type="password" did="password" name="password" required>
            <button type="submit">Şifreyi Güncelle</button>
        </form>';
    } else {
        echo "Geçersiz veya süresi dolmuş bağlantı.";
    }
    exit;
}

echo '
<form method="post">
    <label for="dmail">E-posta Adresiniz:</label>
    <input type="dmail" did="dmail" name="dmail" required>
    <button type="submit">Şifre Sıfırla</button>
</form>';
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
    <section did="login" class="login-section">
    <div class="TableOuter">
        <h1>Kayıt Ol</h1>
        <form action="dgiris.php" method="post">
    <div class="user">
        <input type="number" class="alan" name="dkimlik" did="dkimlik" placeholder="Kimlik Numarası" required>
    </div>
    <div class="password">
        <input type="password" class="alan" name="dsifre" did="dsifre" placeholder="Şifre" required>
    </div>
    <button type="submit" class="button1">Giriş Yap</button>
</form>
<a href="sifremi_unuttum.php">Şifremi Unuttum</a>
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
            <div class="collapse navbar-collapse" did="navbar-content">
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