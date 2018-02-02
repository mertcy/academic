<?php
session_start();
$current_veliId = $_SESSION['user_id'];
$current_ogrenciId;
$sinif_id;
$sube_id;

$sql_log = "SELECT v.ogrenci_id
            FROM Veli AS v
            WHERE v.veli_id =   '$current_veliId' ";
$result = mysqli_query($connection, $sql_log);
while($row_log = mysqli_fetch_row($result)) {
     $current_ogrenciId = $row_log[0];
}

$sql_log_sinif = "SELECT og.sinif_id, og.sube_id
            FROM Ogrenci AS og
            WHERE og.ogrenci_id =   '$current_ogrenciId' ";
$result_sinif = mysqli_query($connection, $sql_log_sinif);

while($row_log = mysqli_fetch_row($result_sinif)) {
     $sinif_id = $row_log[0];
     $sube_id = $row_log[1];
}


$sql_ders = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 1";
$result_ders = mysqli_query($connection, $sql_ders);

$sql_ders2 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 2";
$result_ders2 = mysqli_query($connection, $sql_ders2);

$sql_ders3 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 3";
$result_ders3 = mysqli_query($connection, $sql_ders3);

$sql_ders4 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 4";
$result_ders4 = mysqli_query($connection, $sql_ders4);

$sql_ders5 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 5";
$result_ders5 = mysqli_query($connection, $sql_ders5);

$sql_ders6 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 6";
$result_ders6 = mysqli_query($connection, $sql_ders6);

$sql_ders7 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 7";
$result_ders7 = mysqli_query($connection, $sql_ders7);

$sql_ders8 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Sinif_Ders_Programi ON Sinif_Ders_Programi.ders_id = d.ders_id
            WHERE Sinif_Ders_Programi.sinif_id = '$sinif_id' AND Sinif_Ders_Programi.sube_id= '$sube_id' AND
            Sinif_Ders_Programi.ders_zamani = 8";
$result_ders8 = mysqli_query($connection, $sql_ders8);

?>
