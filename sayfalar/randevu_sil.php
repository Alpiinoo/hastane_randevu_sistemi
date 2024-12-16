<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hastane";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı Başarısız: " . $conn->connect_error);
}
if (isset($_GET['rid']) && !empty($_GET['rid'])) {
    $rid = $_GET['rid'];

    $sql = "DELETE FROM randevu WHERE rid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rid);
    
    if ($stmt->execute()) {
        header("Location: sekretermenu.php");
        exit;
    } else {
        echo "Randevu silinirken bir hata oluştu: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT * FROM randevu ORDER BY rtar ASC";
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
<h2>Randevu Seç</h2>
    <table border="1">
        <tr>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Telefon</th>
            <th>Tarih</th>
            <th>Doktor</th>
            <th>İşlem</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["rad"] . "</td>";
                echo "<td>" . $row["rsoy"] . "</td>";
                echo "<td>" . $row["rtel"] . "</td>";
                echo "<td>" . $row["rtar"] . "</td>";
                echo "<td>" . $row["rdok"] . "</td>";
                echo "<td><a href='randevu_sil.php?rid=" . $row["rid"] . "'>Sil</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Hiç randevu bulunamadı.</td></tr>";
        }
        ?>
    </table>
        </center>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
