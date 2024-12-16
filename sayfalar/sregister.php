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
            $sisim = $_POST['sisim'];
            $ssoyisim = $_POST['ssoyisim'];
            $skno = $_POST['skno'];

            if ($ekle = mysqli_query($conn, "INSERT INTO sekreter(sisim, ssoyisim, skno) VALUES('$sisim', '$ssoyisim', '$skno')
            ")) {
                echo 'Başarıyla Sekreter Eklendi. <br> <a href="doktormenu.php">Sekreter Menuye Dön.</a>';
            } else {
                echo 'Hata: ' . mysqli_error($conn);
            }
        }
        ?>
    </center>
    </font>
</body>
</html>
