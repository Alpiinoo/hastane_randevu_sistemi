<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Listele</title>
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

    <?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "hastane";        

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Baglanti Hatasi: " . $conn->connect_error);
}

$sql = "SELECT rid, rad, rsoy, rtel, rtar, rdok FROM randevu";
$result = $conn->query($sql);


echo '<link rel="stylesheet" type="text/css" href="style.css">';


echo "<table>
        <tr>
            <th>Randevu Numarası</th>
            <th>Hasta Adı</th>
            <th>Hasta Soyadı</th>
            <th>Telefon</th>
            <th>Tarih</th>
            <th>Doktor</th>
        </tr>";


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["rid"] . "</td>
                <td>" . $row["rad"] . "</td>
                <td>" . $row["rsoy"] . "</td>
                <td>" . $row["rtel"] . "</td>
                <td>" . $row["rtar"] . "</td>
                <td>" . $row["rdok"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='6'>Hiç randevu bulunamadı.</td></tr>";
}

$conn->close();
?>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
