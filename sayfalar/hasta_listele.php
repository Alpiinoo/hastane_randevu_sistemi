<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasta Listele</title>
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

$sql = "SELECT hid, hisim, hsoyisim, hkimlik, htel, hgecmis FROM hasta";
$result = $conn->query($sql);


echo '<link rel="stylesheet" type="text/css" href="style.css">';


echo "<table>
        <tr>
            <th>Hasta Numarası</th>
            <th>Hasta Adı</th>
            <th>Hasta Soyadı</th>
            <th>Hasta Kimlik</th>
            <th>Hasta Telefon</th>
            <th>Hasta Gecmis</th>
        </tr>";


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["hid"] . "</td>
                <td>" . $row["hisim"] . "</td>
                <td>" . $row["hsoyisim"] . "</td>
                <td>" . $row["hkimlik"] . "</td>
                <td>" . $row["htel"] . "</td>
                <td>" . $row["hgecmis"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='6'>Hiç Hasta bulunamadı.</td></tr>";
}

$conn->close();
?>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
