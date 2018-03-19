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
      $sql_ogr = "SELECT o.ogrenci_id
                  FROM Ogrenci AS o, Veli AS v
                  WHERE v.veli_id = $current_veliId AND v.ogrenci_id = o.ogrenci_id;";

      $result_ogr = mysqli_query($connection, $sql_ogr);

      while($row_ogr = mysqli_fetch_row($result_ogr)) {
          $current_ogrenciId = $row_ogr[0];
          $sql_kisi = "SELECT k.kisi_adi, k.kisi_soyadi
                      FROM Kisi AS k
                       WHERE k.kisi_id = $current_ogrenciId;";
           $result_kisi = mysqli_query($connection, $sql_kisi);
           while($row_kisi = mysqli_fetch_row($result_kisi)) {
           ?>
             <p>Çocuğunuz <b><?php echo $row_kisi[0] . ' ' . $row_kisi[1];?> </b>'ın  <b><?php echo $ders_adi; ?> </b> dersinde öğretmenimizin haftalık değerlendirme puanları sonucu oluşan genel gidişat tablosu ve değerlendirmesini aşağıda inceleyebilirsiniz.</p>
           <?php
           }
      }
  }

  $connection2 = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection2) { // Derse Katilim
      $sql_puan_dersKatilim = "SELECT od.degerlendirme_puani
                  FROM Ogrenci_Degerlendirme AS od, Ders AS de
                  WHERE od.ogrenci_id = '$current_ogrenciId' AND '$ders_adi' = de.ders_adi AND de.ders_id = od.ders_id AND (od.degerlendirme_tipi = '1' OR od.degerlendirme_tipi = '5')";

      $result_puan_dersKatilim = mysqli_query($connection2, $sql_puan_dersKatilim);

      while($row_puan_dersKatilim = mysqli_fetch_row($result_puan_dersKatilim)) {
          $dersKatilimPuani += $row_puan_dersKatilim[0];
      }
      $dersKatilimPuani *= 100; // $dersKatilimPuani = 100 * (Derse Katılım Durumu + Sorulara Cevap Vermesi)  seklinde hesaplanir
  }

  $connection3 = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection3) {  // Ders İçi Disiplin
      $sql_puan_dersDisiplin = "SELECT od.degerlendirme_puani
                  FROM Ogrenci_Degerlendirme AS od, Ders AS de
                  WHERE od.ogrenci_id = '$current_ogrenciId' AND '$ders_adi' = de.ders_adi AND de.ders_id = od.ders_id AND od.degerlendirme_tipi = '2'";

      $result_puan_dersDisiplin = mysqli_query($connection3, $sql_puan_dersDisiplin);

      while($row_puan_dersDisiplin = mysqli_fetch_row($result_puan_dersDisiplin)) {
          $dersDisiplinPuani += $row_puan_dersDisiplin[0];
      }
      $dersDisiplinPuani *= 200; // $dersDisiplinPuani = 200 * (Dersi Engelleme Durumu)  seklinde hesaplanir
  }

  $connection5 = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection5) {  // Ödev Titizliği
      $sql_puan_odev = "SELECT od.degerlendirme_puani
                  FROM Ogrenci_Degerlendirme AS od, Ders AS de
                  WHERE od.ogrenci_id = '$current_ogrenciId' AND '$ders_adi' = de.ders_adi AND de.ders_id = od.ders_id AND od.degerlendirme_tipi = '3'";

      $result_puan_odev = mysqli_query($connection5, $sql_puan_odev);

      while($row_puan_odev = mysqli_fetch_row($result_puan_odev)) {
          $odevPuani += $row_puan_odev[0];
      }
      $odevPuani *= 200; // $odevPuani = 200 * (Verilen Ödevleri Yapması)  seklinde hesaplanir
  }

  $connection6 = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection6) {  // Ders Hazirligi
      $sql_puan_dersHazirligi = "SELECT od.degerlendirme_puani
                  FROM Ogrenci_Degerlendirme AS od, Ders AS de
                  WHERE od.ogrenci_id = '$current_ogrenciId' AND '$ders_adi' = de.ders_adi AND de.ders_id = od.ders_id AND od.degerlendirme_tipi = '4'";

      $result_puan_dersHazirligi = mysqli_query($connection6, $sql_puan_dersHazirligi);

      while($row_puan_dersHazirligi = mysqli_fetch_row($result_puan_dersHazirligi)) {
          $dersHazirligi += $row_puan_dersHazirligi[0];
      }
      $dersHazirligi *= 200; // $dersHazirligi = 200 * (Derse Hazırlıklı Gelmesi)  seklinde hesaplanir
  }

  $connection7 = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection7) {  // Arkadas iiskileri
      $sql_puan_arkadas = "SELECT od.degerlendirme_puani
                  FROM Ogrenci_Degerlendirme AS od, Ders AS de
                  WHERE od.ogrenci_id = '$current_ogrenciId' AND '$ders_adi' = de.ders_adi AND de.ders_id = od.ders_id AND od.degerlendirme_tipi = '10'";

      $result_puan_arkadas = mysqli_query($connection7, $sql_puan_arkadas);

      while($row_puan_arkadas = mysqli_fetch_row($result_puan_arkadas)) {
          $arkadas += $row_puan_arkadas[0];
      }
      $arkadas *= 200; // $arkadas = 200 * (Arkadas Iliskileri)  seklinde hesaplanir
  }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);
      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Derse Katılım', 'Ders İçi Disiplini', 'Quiz Performans', 'Ödev Titizliği', 'Derse Hazırlığı', 'Arkadaş İletişimi'],
         ['1.Hafta',  <?php echo $dersKatilimPuani; ?>,<?php echo $dersDisiplinPuani; ?>, 1000,<?php echo $odevPuani; ?>,<?php echo $dersHazirligi; ?>,<?php echo $arkadas; ?>],
         ['2.Hafta',  135,      120,        599,             268,          288,      682],
         ['3.Hafta',  157,      167,        587,             807,           397,      623],
         ['4.Hafta',  139,      110,        615,             968,           215,      609.4]
      ]);

    var options = {
      title : 'Çocuğunuzun haftalık değerlendirme puanları',
      vAxis: {title: 'Değerlendirme Puanı'},
      hAxis: {title: 'Şubat'},
      seriesType: 'bars',
      series: {6: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>

  </head>
  <body>
    <div id="chart_div" style="width: 1000px; height: 500px;"></div>
  </body>
</html>


</html>
