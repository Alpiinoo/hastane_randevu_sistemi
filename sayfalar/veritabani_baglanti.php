<?php
$serveradi = "localhost"; 
$kullaniciadi = "root"; 
$sifre = "";
$vtadi = "hastane";
$conn = new mysqli($serveradi, $kullaniciadi, $sifre, $vtadi);
if ($conn->connect_error) {
    die("Baglanti hatasi!: " . $conn->connect_error);
}
?>
