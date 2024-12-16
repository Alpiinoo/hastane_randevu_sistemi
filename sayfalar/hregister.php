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
            $hkimlik = $_POST['hkimlik'];
            $htel = $_POST['htel'];

            if ($ekle = mysqli_query($conn, "INSERT INTO hasta(hisim, hsoyisim, hkimlik, htel) VALUES('$hisim', '$hsoyisim', '$hkimlik', '$htel')
            ")) {
                echo 'Başarıyla Üye Oldunuz. <br> <a href="sekretermenu.php">Sekreter Menuye Dön.</a>';
            } else {
                echo 'Hata: ' . mysqli_error($conn);
            }
        }
        ?>
    </center>
    </font>
</body>
</html>
