<?php
$sql_log = "SELECT og.sinif_id, og.sube_id
            FROM Ogrenci AS og
            WHERE og.ogrenci_id = 1";
$result = mysqli_query($connection, $sql_log);


$sql_ders = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Ders_Programi ON Ders_Programi.ders_programId = d.ders_id
            WHERE Ders_Programi.sinif_id = 6 AND Ders_Programi.sube_id='C' AND Ders_Programi.ders_gunu= 1
            AND Ders_Programi.ders_saati= 1 ";
$result_ders = mysqli_query($connection, $sql_ders);

$sql_ders2 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Ders_Programi ON Ders_Programi.ders_programId = d.ders_id
            WHERE Ders_Programi.sinif_id = 6 AND Ders_Programi.sube_id='C' AND Ders_Programi.ders_gunu= 2
            AND Ders_Programi.ders_saati= 2 ";
$result_ders2 = mysqli_query($connection, $sql_ders2);

$sql_ders3 = "SELECT d.ders_adi
            FROM Ders As d
            INNER JOIN Ders_Programi ON Ders_Programi.ders_programId = d.ders_id
            WHERE Ders_Programi.sinif_id = 6 AND Ders_Programi.sube_id='C' AND Ders_Programi.ders_gunu= 3
            AND Ders_Programi.ders_saati= 3 ";
$result_ders3 = mysqli_query($connection, $sql_ders3);

?>
