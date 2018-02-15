<?php
session_start();
$current_veliId = $_SESSION['user_id'];

$sql_log = "SELECT v.ogrenci_id
            FROM Veli AS v
            WHERE veli_id = $current_veliId";
$result = mysqli_query($connection, $sql_log);
while($row_log = mysqli_fetch_row($result)) {
     $current_ogrenciId = $row_log[0];
}

$sql_log_sinif = "SELECT og.sinif_id, og.sube_id
            FROM Ogrenci AS og
            WHERE ogrenci_id = $current_ogrenciId";
$result_sinif = mysqli_query($connection, $sql_log_sinif);

while($row_log = mysqli_fetch_row($result_sinif)) {
     $sinif_id = $row_log[0];
     $sube_id = $row_log[1];
}

$sql_log_ogretmen = "SELECT og.ogretmen_id FROM Sinif AS og WHERE sinif_id = $sinif_id";
$result_ogretmen = mysqli_query($connection, $sql_log_ogretmen);

while($row_log = mysqli_fetch_row($result_ogretmen)) {
     $ogretmen_id = $row_log[0];
}

$sql_log_iletisim = "SELECT og.kisi_adi, og.kisi_soyadi, i.tel_num, i.ofis_num, i.mail_adresi FROM Kisi AS og, Iletisim AS i WHERE ogretmen_id = $ogretmen_id AND kisi_id = $ogretmen_id";
$result_ogretmen = mysqli_query($connection, $sql_log_iletisim);

while($row_log = mysqli_fetch_row($result_ogretmen)) {
     $ogretmen_isim = $row_log[0];
     $ogretmen_soyisim = $row_log[1];
     $tel_num = $row_log[2];
     $ofis_num = $row_log[3];
     $mail_adresi = $row_log[4];
}
?>
