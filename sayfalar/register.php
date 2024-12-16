<!DOCTYPE html>
<html>
<head>
    <title>Üye Kayıt</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5;URL=index.php">
</head>
<body>
    <font face="arial">
    <center>
        <?php 
        include("veritabani_baglanti.php"); 

        if ($_POST) {
            $hisim = $_POST['hisim'];
            $hsoyisim = $_POST['hsoyisim'];
            $hkno=$_POST['hkno'];

            if ($ekle = mysqli_query($baglanti, "INSERT INTO hasta(hisim, hsoyisim, skno) VALUES('$hisim', '$hsoyisim', '$hkno')")) {
                echo 'Başarıyla Üye Oldunuz. <br> <a href="index.php">Giriş Sayfasına Dön</a>';
            } else {
                echo 'Hata! Üye Olamadınız. <br> <a href="index.php">Giriş Sayfasına Dön</a>';
            }
        }
        ?>
    </center>
    </font>
</body>
</html>
