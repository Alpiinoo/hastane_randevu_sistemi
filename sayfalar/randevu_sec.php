<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hastane";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı Başarısız: " . $conn->connect_error);
}

$sql = "SELECT rid, rad, rsoy, rtar FROM randevu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Düzenle</title>
    <link rel="stylesheet" href="../css/style2.css">
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
    <h1>Duzenlenecek Randevuyu Secin</h1>
<center>
    <form method="GET" action="randevu_guncelle.php">
        <label for="rid">Randevu Seç:</label>
        <select name="rid" id="rid" required>
            <option value="">Randevu Seçin</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['rid']}'>Randevu ID: {$row['rid']} - {$row['rad']} {$row['rsoy']} - Tarih: {$row['rtar']}</option>";
                }
            } else {
                echo "<option value=''>Randevu bulunamadı</option>";
            }
            ?>
        </select>
        <button type="submit">Düzenle</button>
    </form>
        </center>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
