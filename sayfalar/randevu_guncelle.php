<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hastane";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı Başarısız: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rid = $_POST['rid'];  
    $rad = $_POST['rad'];
    $rsoy = $_POST['rsoy'];
    $rtel = $_POST['rtel'];
    $rtar = $_POST['rtar'];
    $rdok = $_POST['rdok'];

    $sql = "UPDATE randevu SET rad = ?, rsoy = ?, rtel = ?, rtar = ?, rdok = ? WHERE rid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $rad, $rsoy, $rtel, $rtar, $rdok, $rid);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<p>Randevu başarıyla güncellendi!</p>";
        header("Location: sekretermenu.php");
        exit; 
    } else {
        $message = "Randevu güncellenemedi.";
    }

    
    $sql = "SELECT * FROM randevu WHERE rid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rid);
    $stmt->execute();
    $result = $stmt->get_result();
    $randevu = $result->fetch_assoc();
}

if (isset($_GET['rid']) && !empty($_GET['rid']) && !isset($randevu)) {
    $rid = $_GET['rid'];

    $sql = "SELECT * FROM randevu WHERE rid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rid);
    $stmt->execute();
    $result = $stmt->get_result();
    $randevu = $result->fetch_assoc();

    
    if (!$randevu) {
        die("Randevu bulunamadı.");
    }
}


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
    <h2>Randevu Düzenle</h2>

<?php if (isset($message)) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>
<center>
<form method="POST" action="randevu_guncelle.php">
    <input type="hidden" name="rid" value="<?php echo $randevu['rid']; ?>">

    <label>Ad:</label>
    <input type="text" name="rad" value="<?php echo $randevu['rad']; ?>" required><br>

    <label>Soyad:</label>
    <input type="text" name="rsoy" value="<?php echo $randevu['rsoy']; ?>" required><br>

    <label>Telefon:</label>
    <input type="text" name="rtel" value="<?php echo $randevu['rtel']; ?>" required><br>

    <label>Tarih:</label>
    <input type="date" name="rtar" value="<?php echo $randevu['rtar']; ?>" required><br>

    <label>Doktor:</label>
    <input type="text" name="rdok" value="<?php echo $randevu['rdok']; ?>" required><br>

    <button type="submit">Güncelle</button>
</form>
</center>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
