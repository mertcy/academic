<html>

<h2> Öğrencinin Gidişat Alanı </h2>
<br></br>


<?php
  session_start(); // start the session
  $ders_adi = $_COOKIE['ders_adi'];
  $current_parentID = $_SESSION['user_id'];
  $current_veliId = $_SESSION['user_id'];
  $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

  if($connection) {
      $sql_ogr = "SELECT o.ogrenci_id FROM Ogrenci AS o, Veli AS v
                  WHERE v.veli_id = $current_veliId AND v.ogrenci_id = o.ogrenci_id;";

      $result_ogr = mysqli_query($connection, $sql_ogr);

      while($row_ogr = mysqli_fetch_row($result_ogr)) {
          $current_ogrenciId = $row_ogr[0];
          $sql_kisi = "SELECT k.kisi_adi, k.kisi_soyadi FROM Kisi AS k
                       WHERE k.kisi_id = $current_ogrenciId;";
           $result_kisi = mysqli_query($connection, $sql_kisi);
           while($row_kisi = mysqli_fetch_row($result_kisi)) {
           ?>
             <p>Çocuğunuz <b><?php echo $row_kisi[0] . ' ' . $row_kisi[1]; mysqli_free_result($result); ?> </b>'ın  <b><?php echo $ders_adi; ?> </b> dersinde öğretmenimizin haftalık değerlendirme puanları sonucu oluşan genel gidişat tablosu ve değerlendirmesini aşağıda inceleyebilirsiniz.</p>
           <?php
           }
      }
  }
?>


</html>
