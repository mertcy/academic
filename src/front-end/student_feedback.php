<html>

<?php
session_start(); // start the session
$ders_adi = $_COOKIE['ders_adi'];
$current_ogrenciId = $_SESSION['user_id'];
?>

<h2> <?php echo $ders_adi; ?> Dersi Değerlendirmesi</h2>
<br></br>
