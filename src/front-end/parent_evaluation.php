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
  $quizPuani = 1000;


  if($dersKatilimPuani == 200 || $dersKatilimPuani == 300)
    $Degerlendirme = "Bu hafta derse katılma konusunda ciddi sıkıntıları var. Ders anlatılırken ders ile ilgilenmiyor. Ders esnasında sorulan sorulara cevap veremiyor. Bu şekilde devam ederse bu durumu sınav notlarına yansıyacaktır. Derse katılma konusunda uyarılmalı.";
  if($dersKatilimPuani == 400 || $dersKatilimPuani == 500)
    $Degerlendirme = "Bu hafta derse katılma konusunda sıkıntı yaşıyor var. Derste biraz daha aktif olmalı ve sorulan sorulara cevap vermede biraz daha gayretli olmalı. Bu şekilde devam ederse bu durumu sınav notlarına yansıyacaktır. Derse katılma konusunda uyarılmalı.";
  if($dersKatilimPuani == 600 || $dersKatilimPuani == 700)
    $Degerlendirme = "Bu hafta derse katılma konusunda sıkıntılı olduğu söylenemez. Sorulan sorulara genelde cevap verebiliyor. Fakat biraz daha gayretli olursa çok daha iyisini yapabilir.";
  if($dersKatilimPuani >= 800)
    $Degerlendirme = "Bu hafta derse katılma konusunda çok iyiydi. Sorulan sorulara eksiksiz yanıt verdiği söylenebilir. Ders içerisindeki bu gayreti ve başarısı notlarına yansıyacaktır. Aynen bu şekilde devam etmeli.";


  if($dersDisiplinPuani == 200)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumu oldukça kötü. Dersi sürekli sabote ediyor ve işleyişi bozuyor. Ders içerisindeki bu disiplinsiz tutumları diğer arkadaşlarına da büyük ölçüde zarar veriyor. Bu konuda ciddi şekilde uyarılmalı. Bu şekilde devam ederse sözlü notlarına bu durum yansıyacaktır.";
  if($dersDisiplinPuani == 400)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumunun iyi olduğu söylenemez. Dersi zaman zaman sabote ediyor ve işleyişi bozuyor. Biraz kendine çeki düzen vermeli. Bu sayede dersteki başarısı da artacağına inanıyorum.";
  if($dersDisiplinPuani == 600)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumunundan memnunum fakat nadir de olsa ara sıra disiplinsiz davranışları olabiliyor.";
  if($dersDisiplinPuani >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumunundan oldukça memnunum. Huzuru bozmayışı dersteki başarısına etki edeceğine inanıyorum. Bu davranışları diğer arkadaşlarına da örnek oluyor.";


  if($quizPuani == 200)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde puanları çok düşük. Günlük ders çalışmalı ve tekrar yapmalı. Bu şekilde devam ederse sınavlardan yüksek puan alması imkansız gibi gözüküyor. Çok daha gayretli olmalı.";
  if($quizPuani == 400)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde notları pek iç açıcı değil. Günlük olarak dersine çalışmalı ve tekrar yapmalı. Bu konuda gayretini artırmalı.";
  if($quizPuani == 600)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde notları fena değil. Biraz daha gayret ederse sınavlarda da gayet iyi notlar alması mümkün. Gidişatını bozmadan biraz daha gayretli olabilir.";
  if($quizPuani >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde notları gayet iyi. Bu da günlük tekrar yapıp iyi çalıştığını gösteriyor. Bu gidişatını bozmamalı. Bu şekilde devam ettiği sürece sınavlardan da yüksek not alması muhtemel.";


  if($odevPuani == 200)
    $Degerlendirme = $Degerlendirme. " " ."Verilen hiçbir ödevini yapmıyor. Bu şekilde devam etmesi mümkün değil. Ödevlerini yapmamaya devam ederse sınavlardan yüksek not alması imkansız. Ödev konusunda ciddi uyarılara ihtiyacı var.";
  if($odevPuani == 400)
    $Degerlendirme = $Degerlendirme. " " ."Ödevlerini baştan savma yapıyor. Ödev yapma daha titiz olmalı. Ödev konusunda gayretini artırırsa bu durum sınavlarına da yansıyacaktır.";
  if($odevPuani == 600)
    $Degerlendirme = $Degerlendirme. " " ."Verilen ödevleri büyük ölçüde yapıyor. Fakat ödev konusunda biraz daha titiz olabilir.";
  if($odevPuani >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Verilen ödevleri istenilen şekilde ve büyük bir titizlikle yapıyor. Ödev konusunda çizgisini bozmamalı.";


  if($dersHazirligi == 200)
    $Degerlendirme = $Degerlendirme. " " ."Derslere hiçbir zaman hazırlıklı gelmiyor. Ders araç gereçleri genelde yanında olmuyor. Bu da dersi anlamasını zorlaştırıyor. Bu konuda dikkatli olmalı.";
  if($dersHazirligi == 400)
    $Degerlendirme = $Degerlendirme. " " ."Derse hazırlıklı gelme konusunda sıkıntı yaşıyor. ";
  if($dersHazirligi == 600)
    $Degerlendirme = $Degerlendirme. " " ."Derse genelde hazırlıklı geliyor.";
  if($dersHazirligi >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Derse hazırlıklı gelme konusunda oldukça başarılı.";


  if($arkadas == 200)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaşları ile olan iletişimi oldukça kötü. Agresif ve negatif tavırlar sergiliyor. Bu durum çok ciddi sıkıntılar doğurabilir.";
  if($arkadas == 400)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaşları ile olan iletişimi ve ilişkisi konusunda biraz daha iyi niyetli ve pozitif olmalı. ";
  if($arkadas == 600)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaşları ile iletişimi ve ilişkisi konusunda bir problemi yok.";
  if($arkadas >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaş ilişkileri ve iletişimi oldukça iyi. Çok pozitif bir çocuk. Arkadaşları tarafından da oldukça seviliyor.";


?>

<br></br>
<p><b> Şubat ayı 1.hafta değerlendirme yorumları: </b></p>
<?php echo $Degerlendirme; ?>

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
         ['1.Hafta',  <?php echo $dersKatilimPuani; ?>,<?php echo $dersDisiplinPuani; ?>, <?php echo $quizPuani; ?>,<?php echo $odevPuani; ?>,<?php echo $dersHazirligi; ?>,<?php echo $arkadas; ?>],
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
