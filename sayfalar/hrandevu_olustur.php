<!DOCTYPE html>
<html>
<head>
    <title>Randevu Olustur</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5;URL=index.php">
</head>
<body>
    <font face="arial">
    <center>
        <?php 
        include("veritabani_baglanti.php"); 

        if ($_POST) {
            $rad = $_POST['rad'];
            $rsoy = $_POST['rsoy'];
            $rtel = $_POST['rtel'];
            $rtar = $_POST['rtar'];
            $rdok = $_POST['rdok'];

            if ($ekle = mysqli_query($conn, "INSERT INTO randevu(rad, rsoy, rtel, rtar, rdok) VALUES('$rad', '$rsoy', '$rtel', '$rtar', '$rdok')
            ")) {
                echo 'Başarıyla Randevu Olusturuldu. <br> <a href="sekretermenu.php">Sekreter Menuye Dön.</a>';
            } else {
                echo 'Hata: ' . mysqli_error($conn);
            }
        }
        ?>
    </center>
    </font>
</body>
</html>
