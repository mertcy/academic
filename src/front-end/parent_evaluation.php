<html>




<?php
  session_start(); // start the session
  $ders_adi = $_COOKIE['ders_adi'];

  $current_veliId = $_SESSION['user_id'];
  $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

  if($connection) {
      $sql_ogr = "SELECT o.ogrenci_id
                  FROM Ogrenci AS o, Veli AS v
                  WHERE v.veli_id = $current_veliId AND v.ogrenci_id = o.ogrenci_id;";

      $result_ogr = mysqli_query($connection, $sql_ogr);

      while($row_ogr = mysqli_fetch_row($result_ogr)) {
          $current_ogrenciId = $row_ogr[0];//ogrenci id burada------------------------------
          $sql_kisi = "SELECT k.kisi_adi, k.kisi_soyadi
                      FROM Kisi AS k
                       WHERE k.kisi_id = $current_ogrenciId;";
           $result_kisi = mysqli_query($connection, $sql_kisi);
           while($row_kisi = mysqli_fetch_row($result_kisi)) {
           ?>
           <h2> <?php echo $ders_adi; ?> Degerlendirmesi </h2>
           <br></br>
             <p>Ogrenciniz <b><?php echo $row_kisi[0] . ' ' . $row_kisi[1];?> </b>'ın  <b><?php echo $ders_adi; ?> </b> dersinde öğretmenimizin haftalık <br>değerlendirme puanları sonucu oluşan genel gidişat tablosu ve değerlendirmesini <br>aşağıda inceleyebilirsiniz.</p>
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

  $connection_graph = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection_graph){
    $sql_sube = "SELECT s.sube_id FROM Ogrenci AS s WHERE s.ogrenci_id = '$current_ogrenciId'";
    $result = mysqli_query($connection_graph, $sql_sube);
    while($row_log = mysqli_fetch_row($result)) {
         $sube_id = $row_log[0];//sube id
    }
    $sql_did ="SELECT d.ders_id FROM Ders AS d WHERE d.ders_adi = '$ders_adi'";
    $result = mysqli_query($connection_graph, $sql_did);
    while($row_log = mysqli_fetch_row($result)) {
         $ders_id = $row_log[0];//ders id

    }
    $sql_tumnotlar = "SELECT n.odev1, n.quiz1, n.sinav1, n.odev2, n.quiz2, n.sinav2, n.proje FROM tumnotlar AS n
    WHERE n.ogrenci_id = '$current_ogrenciId' AND n.sube_id = '$sube_id' AND n.ders_id = '$ders_id'";
    $result = mysqli_query($connection_graph, $sql_tumnotlar);
    while($row_log = mysqli_fetch_row($result)) {
         $odev1 = $row_log[0];//ders id
         $quiz1 = $row_log[1];//ders id
         $sinav1 = $row_log[2];//ders id
         $odev2 = $row_log[3];//ders id
         $quiz2 = $row_log[4];//ders id
         $sinav2 = $row_log[5];//ders id
         $proje = $row_log[6];//ders id

    }
    $sql_odev1ort = "SELECT AVG(odev1), AVG(quiz1), AVG(sinav1), AVG(odev2), AVG(quiz2), AVG(sinav2), AVG(proje)
    FROM tumnotlar WHERE sube_id = '$sube_id' AND ders_id = '$ders_id'";
    $result = mysqli_query($connection_graph, $sql_odev1ort);
    while($row_log = mysqli_fetch_row($result)) {
         $odev1ort = $row_log[0];//ders id
         $quiz1ort = $row_log[1];
         $sinav1ort = $row_log[2];
         $odev2ort = $row_log[3];
         $quiz2ort = $row_log[4];
         $sinav2ort = $row_log[5];
         $projeort = $row_log[6];
    }
    if(is_null($odev1ort)){$odev1ort = 0;}
    if(is_null($quiz1ort)){$quiz1ort = 0;}
    if(is_null($sinav1ort)){$sinav1ort = 0;}
    if(is_null($odev2ort)){$odev2ort = 0;}
    if(is_null($quiz2ort)){$quiz2ort = 0;}
    if(is_null($sinav2ort)){$sinav2ort = 0;}
    if(is_null($projeort)){$projeort = 0;}
  }
  $quizPuani = 1000;


  if($dersKatilimPuani == 200 || $dersKatilimPuani == 300)
    $Degerlendirme = "Bu hafta derse katılma konusunda ciddi sıkıntıları var. Ders anlatılırken ders ile ilgilenmiyor. Ders esnasında sorulan sorulara cevap veremiyor. Bu şekilde devam ederse bu durumu sınav notlarına yansıyacaktır. Derse katılma konusunda uyarılmalı." . "<br>" . PHP_EOL;
  if($dersKatilimPuani == 400 || $dersKatilimPuani == 500)
    $Degerlendirme = "Bu hafta derse katılma konusunda sıkıntı yaşıyor. Derste biraz daha aktif olmalı ve sorulan sorulara cevap vermede biraz daha gayretli olmalı. Bu şekilde devam ederse bu durumu sınav notlarına yansıyacaktır. Derse katılma konusunda uyarılmalı." . "<br>" . PHP_EOL;
  if($dersKatilimPuani == 600 || $dersKatilimPuani == 700)
    $Degerlendirme = "Bu hafta derse katılma konusunda sıkıntılı olduğu söylenemez. Sorulan sorulara genelde cevap verebiliyor. Fakat biraz daha gayretli olursa çok daha iyisini yapabilir." . "<br>" . PHP_EOL;
  if($dersKatilimPuani >= 800)
    $Degerlendirme = "Bu hafta derse katılma konusunda çok iyiydi. Sorulan sorulara eksiksiz yanıt verdiği söylenebilir. Ders içerisindeki bu gayreti ve başarısı notlarına yansıyacaktır. Aynen bu şekilde devam etmeli." . "<br>" . PHP_EOL;


  if($dersDisiplinPuani == 200)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumu oldukça kötü. Dersi sürekli sabote ediyor ve işleyişi bozuyor. Ders içerisindeki bu disiplinsiz tutumları diğer arkadaşlarına da büyük ölçüde zarar veriyor. Bu konuda ciddi şekilde uyarılmalı. Bu şekilde devam ederse sözlü notlarına bu durum yansıyacaktır." . "<br>" . PHP_EOL;
  if($dersDisiplinPuani == 400)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumunun iyi olduğu söylenemez. Dersi zaman zaman sabote ediyor ve işleyişi bozuyor. Biraz kendine çeki düzen vermeli. Bu sayede dersteki başarısı da artacağına inanıyorum." . "<br>" . PHP_EOL;
  if($dersDisiplinPuani == 600)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumunundan memnunum fakat nadir de olsa ara sıra disiplinsiz davranışları olabiliyor." . "<br>" . PHP_EOL;
  if($dersDisiplinPuani >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Ders içerisindeki disiplini ve tutumunundan oldukça memnunum. Huzuru bozmayışı dersteki başarısına etki edeceğine inanıyorum. Bu davranışları diğer arkadaşlarına da örnek oluyor." . "<br>" . PHP_EOL;


  if($quizPuani == 200)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde puanları çok düşük. Günlük ders çalışmalı ve tekrar yapmalı. Bu şekilde devam ederse sınavlardan yüksek puan alması imkansız gibi gözüküyor. Çok daha gayretli olmalı." . "<br>" . PHP_EOL;
  if($quizPuani == 400)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde notları pek iç açıcı değil. Günlük olarak dersine çalışmalı ve tekrar yapmalı. Bu konuda gayretini artırmalı." . "<br>" . PHP_EOL;
  if($quizPuani == 600)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde notları fena değil. Biraz daha gayret ederse sınavlarda da gayet iyi notlar alması mümkün. Gidişatını bozmadan biraz daha gayretli olabilir." . "<br>" . PHP_EOL;
  if($quizPuani >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Gerek online quiz gerekse derste yaptığım quizlerde notları gayet iyi. Bu da günlük tekrar yapıp iyi çalıştığını gösteriyor. Bu gidişatını bozmamalı. Bu şekilde devam ettiği sürece sınavlardan da yüksek not alması muhtemel." . "<br>" . PHP_EOL;


  if($odevPuani == 200)
    $Degerlendirme = $Degerlendirme. " " ."Verilen hiçbir ödevini yapmıyor. Bu şekilde devam etmesi mümkün değil. Ödevlerini yapmamaya devam ederse sınavlardan yüksek not alması imkansız. Ödev konusunda ciddi uyarılara ihtiyacı var." . "<br>" . PHP_EOL;
  if($odevPuani == 400)
    $Degerlendirme = $Degerlendirme. " " ."Ödevlerini baştan savma yapıyor. Ödev yapma daha titiz olmalı. Ödev konusunda gayretini artırırsa bu durum sınavlarına da yansıyacaktır." . "<br>" . PHP_EOL;
  if($odevPuani == 600)
    $Degerlendirme = $Degerlendirme. " " ."Verilen ödevleri büyük ölçüde yapıyor. Fakat ödev konusunda biraz daha titiz olabilir." . "<br>" . PHP_EOL;
  if($odevPuani >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Verilen ödevleri istenilen şekilde ve büyük bir titizlikle yapıyor. Ödev konusunda çizgisini bozmamalı." . "<br>" . PHP_EOL;


  if($dersHazirligi == 200)
    $Degerlendirme = $Degerlendirme. " " ."Derslere hiçbir zaman hazırlıklı gelmiyor. Ders araç gereçleri genelde yanında olmuyor. Bu da dersi anlamasını zorlaştırıyor. Bu konuda dikkatli olmalı." . "<br>" . PHP_EOL;
  if($dersHazirligi == 400)
    $Degerlendirme = $Degerlendirme. " " ."Derse hazırlıklı gelme konusunda sıkıntı yaşıyor. " . "<br>" . PHP_EOL;
  if($dersHazirligi == 600)
    $Degerlendirme = $Degerlendirme. " " ."Derse genelde hazırlıklı geliyor." . "<br>" . PHP_EOL;
  if($dersHazirligi >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Derse hazırlıklı gelme konusunda oldukça başarılı." . "<br>" . PHP_EOL;


  if($arkadas == 200)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaşları ile olan iletişimi oldukça kötü. Agresif ve negatif tavırlar sergiliyor. Bu durum çok ciddi sıkıntılar doğurabilir." . "<br>" . PHP_EOL;
  if($arkadas == 400)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaşları ile olan iletişimi ve ilişkisi konusunda biraz daha iyi niyetli ve pozitif olmalı. " . "<br>" . PHP_EOL;
  if($arkadas == 600)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaşları ile iletişimi ve ilişkisi konusunda bir problemi yok." . "<br>" . PHP_EOL;
  if($arkadas >= 800)
    $Degerlendirme = $Degerlendirme. " " ."Arkadaş ilişkileri ve iletişimi oldukça iyi. Çok pozitif bir çocuk. Arkadaşları tarafından da oldukça seviliyor." . "<br>" . PHP_EOL;


?>
<?php
//-----------------------------------2.Grafik Degerlendirme------------------------------------

if($odev1 != null){
if($odev1 >= $odev1ort){
  if($odev1 == 100){
    $Yorum = "-Ogrenciniz 1. Odevden tam not almistir. Ayni sekilde calismaya devam ederek bu dersi basari ile tamamlayabilecektir.". "<br>" . PHP_EOL;
  }
  else if($odev1 - $odev1ort <= 5){
    $Yorum = "-Ogrenciniz 1. Odevde ortalamanin az da olsa uzerindedir. Bu da biraz daha caba ile sinifinda en iyilerinden olabilecegini gostermektedir.". "<br>" . PHP_EOL;
  }
  else if($odev1 - $odev1ort > 5){
    $Yorum = "-Ogrenciniz 1. Odevden tam not alamasa da sinifinin en iyilerindendir. Daha dikkatli calismasi halinde tam not alabilecektir.". "<br>" . PHP_EOL;
  }
}
else{
  if($odev1 == 0){
    $Yorum = "-Ogrenciniz odevini teslim etmemis veya yeterli bilgiye sahip degildir. En kisa zamanda odevleri hakkinda onunla konusup daha basarili olabilecegi konusunda cesaretlendiriniz.". "<br>" . PHP_EOL;
  }
  else if($odev1ort - $odev1 <= 5){
    $Yorum = "-Ogrenciniz 1. Odevde sinif ortalamasinin biraz altinda kalmistir. Daha sonraki degerlendirmede sinifa yetismesi zor olmayacaktir. Onu daha ozverili calismaya tesfik ediniz.". "<br>" . PHP_EOL;
  }
  else if($odev1ort - $odev1 > 5){
    $Yorum = "-Ogrenciniz 1. Odevde sinif ortalamasinin cok altinda kalmistir. Lutfen en kisa zamanda daha dikkatli calismasina on ayak olunuz. Henuz duzeltmek icin cok zamani vardir.". "<br>" . PHP_EOL;
  }
}
}
if($quiz1 != null){
  if($odev1 != null){
    if($quiz1 > $odev1){
      $Yorum =$Yorum. "-Ilk quizde 1. Odeve gore notunu yukselteyi basarmistir. Bu da daha iyi calistiginin gostergesidir." ."<br>" . PHP_EOL;
    }
    else{
      $Yorum =$Yorum. "-Ilk quizde 1. Odeve gore notunu dusurmustur. Bu calisma aliskanliklarinin kotuye gittiginin gostergesidir." ."<br>" . PHP_EOL;
    }
  }
  if($quiz1 >= $quiz1ort){
    if($quiz1 == 100){
    $Yorum =$Yorum. "-1. Quizden tam not alarak dersi su ana kadar cok iyi takip ederek anladigini kanitlamistir. Temposunu dusurmeden devam etmelidir." ."<br>" . PHP_EOL;
    }
    else if($quiz1 - $quiz1ort <= 5){
    $Yorum =$Yorum. "-Ilk quizde sinifin ortalamasina yakin not almistir. Cogu arkadasinin onundedir. Gectigimiz haftalarda anlamadigi konulari tekrar ederse daha da basarili olacaktir." . "<br>" . PHP_EOL;
    }
    else if($quiz1 - $quiz1ort > 5){
    $Yorum =$Yorum. "-Ilk quizde sinifina gore cok iyi not almistir. Bu sekilde devam ederek 1. Sinavda yuksek bir not alabilir." . "<br>" . PHP_EOL;
    }
  }
  else{
    if($quiz1 == 0){
      $Yorum =$Yorum. "-Ilk quize girmemis veya bildikleri yeterli olmamistir. Acilen kendine cekiduzen vererek siki bir tempo ile calismalarini hizlandirmalidir." . "<br>" . PHP_EOL;
    }
    else if($quiz1ort - $quiz1 <= 5){
      $Yorum =$Yorum. "-Ilk quizde ortalamanin altinda kalsa da sinif arkadaslarina yetismek icin gec degil. Sinava iyi calisarak aradaki farki kapatmalidir." . "<br>" . PHP_EOL;
    }
    else if($quiz1ort - $quiz1 > 5){
      $Yorum =$Yorum. "-Ilk quizde sinif ortalamasinin cok altinda kalmistir. Dersi daha iyi takip etmeli, calismalarini artirip ilk sinavda yukselmelidir." . "<br>" . PHP_EOL;
    }
  }
}

if($sinav1 != null){
  if($quiz1 != null){
    if($sinav1 > $quiz1){
      $Yorum =$Yorum. "-Ogrenciniz 1. sinavda ilk quizde gosterdigi basarinin uzerine cikmistir." . "<br>" . PHP_EOL;
    }
    else{
      $Yorum =$Yorum. "-Ogrenciniz 1. sinavda ilk quizde gosterdigi basarinin uzerine cikamamistir. Daha dikkatli olmalidir" . "<br>" . PHP_EOL;
    }
  }
  if($sinav1 >= $sinav1ort){
    if($sinav1 == 100){
      $Yorum =$Yorum. "-Sinavdan tam not alarak duzenli calismanin onemini tum arkadaslarina kanitlamistir." . "<br>" . PHP_EOL;
    }
    else if($sinav1 - $sinav1ort <= 5){
      $Yorum =$Yorum. "-Sinavda ortalamanin uzerinde ama sinif arkadaslarindan cok da yuksek olmayan bir not almistir. Arkadaslaindan daha iyi olmasi calisma tarzina baglidir." . "<br>" . PHP_EOL;
    }
    else if($sinav1 - $sinav1ort > 5){
      $Yorum =$Yorum. "-Ilk sinavda ortalamanin iyi bir miktarda uzerinde not alarak basarili bir sekilde devam etmektedir. Bu basarisini 2. odev-quiz-sinav da devam ettirmesini beklenmektedir." . "<br>" . PHP_EOL;
    }
  }
  else{
    if($sinav1 == 0){
      $Yorum =$Yorum. "-Sinavdan hic puan alamamistir. Notunu duzeltmesi icin hala zamani mevcuttur. Kendisini uyararak daha dikkatli olmasini tembih etmelisiniz." . "<br>" . PHP_EOL;
    }
    else if($sinav1ort - $sinav1 <= 5){
      $Yorum =$Yorum. "-Ilk sinavda ortalamanin cok az altinda kalmistir. Son konulari tekrar etmesi yararina olacaktir." . "<br>" . PHP_EOL;
    }
    else if($sinav1ort - $sinav1 > 5){
      $Yorum =$Yorum. "-Ilk sinavda ortalamanin cok alindadir. Dersi takip etmekte ve konu tekrarinda eksikleri mevcuttur" . "<br>" . PHP_EOL;
    }
  }
}

if($odev2 != null){
  if($odev2 >= $odev2ort){
    if($odev2 == 100){
      $Yorum =$Yorum. "-2. odevini tam istendigi gibi yapmistir. Ozeni icin tesekkurler." . "<br>" . PHP_EOL;
    }
    else if($odev2 - $odev2ort <= 5){
      $Yorum =$Yorum. "-2. odevde sinif arkadaslarina yakin bir not almistir. 2. quizden beklentiler yuksektir." . "<br>" . PHP_EOL;
    }
    else if($odev2 - $odev2ort > 5){
      $Yorum =$Yorum. "-2. odevde sinif arkadaslarindan daha yuksek not almistir. 2. quizden beklentiler yuksektir." . "<br>" . PHP_EOL;
    }
  }
  else{
    if($odev2 == 0){
      $Yorum =$Yorum. "-2. Odevini teslim etmeyerek hata yapmistir. Derse gereken onemi gostermelidir." . "<br>" . PHP_EOL;
    }
    else if($odev2ort - $odev2 <= 5){
      $Yorum =$Yorum. "-2. odevde sinif arkadaslarina yakin bir not almistir. Daha siki calisirsa 2. quizden yuksek bir not alabilir." . "<br>" . PHP_EOL;
    }
    else if($odev2ort - $odev2 > 5){
      $Yorum =$Yorum. "-2. odevde sinif arkadaslarina yetisememistir. Siki calisarak 2. quizden yuksek bir not almalidir." . "<br>" . PHP_EOL;
    }
  }
}

if($quiz2 != null){
  if($quiz2 >= $quiz2ort){
    if($quiz2 == 100){
      $Yorum =$Yorum. "-2. quizde beklentileri karsilamis ve tam not almistir." . "<br>" . PHP_EOL;
    }
    else if($quiz2 - $quiz2ort <= 5){
      $Yorum =$Yorum. "-2. quizde ortalamanin biraz uzerinde olarak son bir kac degerlendirme icin ne kadar istekli oldugunu gotermistir." . "<br>" . PHP_EOL;
    }
    else if($quiz2 - $quiz2ort > 5){
      $Yorum =$Yorum. "-2. quizde ortalamanin uzerinde olarak son bir kac degerlendirme icin ne kadar istekli oldugunu gotermistir." . "<br>" . PHP_EOL;
    }
  }
  else{
    if($quiz2 == 0){
      $Yorum =$Yorum. "-Ogrenciniz 2. quize girmemistir. Geriye kalan az vakitte uzulmemek icin gerekeni yapin." . "<br>" . PHP_EOL;
    }
    else if($quiz2ort - $quiz2 <= 5){
      $Yorum =$Yorum. "-2. quizde ortalamanin az da olsa altinda kalmistir. 2. Sinava iyi hazirlanip basarili olmasi beklenmektedir." . "<br>" . PHP_EOL;
    }
    else if($quiz2ort - $quiz2 > 5){
      $Yorum =$Yorum. "-2. quizde ortalamanin altinda kalmistir. 2. Sinava iyi hazirlanip basarili olmasi beklenmektedir." . "<br>" . PHP_EOL;
    }
  }
}

if($sinav2 != null){
  if($quiz2 != null){
    if($sinav2 > $quiz2){
      $Yorum =$Yorum. "-2. sinavda, onceki uyarilari dikkate almis ve 2. quize gore notunu artirmistir." . "<br>" . PHP_EOL;
    }
    else{
      $Yorum =$Yorum. "-2. sinavda, onceki uyarilari dikkate almamis ve 2. quize gore notunu dusurmustur." . "<br>" . PHP_EOL;
    }
  }
  if($sinav2 >= $sinav2ort){
    if($sinav2 == 100){
      $Yorum =$Yorum. "-Son sinavda tam not almis ve dersi basari ile bitirmesi beklenmektedir" . "<br>" . PHP_EOL;
    }
    else if($sinav2 - $sinav2ort <= 5){
      $Yorum =$Yorum. "-Son sinavda ortalama bir not almistir. Projede one cikmasi beklenmektedir." . "<br>" . PHP_EOL;
    }
    else if($sinav2 - $sinav2ort > 5){
      $Yorum =$Yorum. "-Son sinavda ortalamanin uzerinde bir not almistir. Projede de bunu surdurmelidir." . "<br>" . PHP_EOL;
    }
  }
  else{
    if($sinav2 == 0){
      $Yorum =$Yorum. "-Son sinava girmemistir lutfen cocugunuzun ogretmeni ile iletisime geciniz." . "<br>" . PHP_EOL;
    }
    else if($sinav2ort - $sinav2 <= 5){
      $Yorum =$Yorum. "-Son sinavda ortalama bir not almistir. Projede one cikmasi beklenmektedir." . "<br>" . PHP_EOL;
    }
    else if($sinav2ort - $sinav2 > 5){
      $Yorum =$Yorum. "-Son sinavda ortalamanin altinda bir not almistir. Projede one cikmasi beklenmektedir." . "<br>" . PHP_EOL;
    }
  }
}

if($proje != null){
  if($proje >= $projeort){
    if($proje == 100){
      $Yorum =$Yorum. "-Projede tam istendigi gibi calismisir. Son degerlendirmede basarili olmasi bizleri sevindirmistir." . "<br>" . PHP_EOL;
    }
    else if($proje - $projeort <= 5){
      $Yorum =$Yorum. "-Projede ortalama bir not alarak donemi tamamlamistir." . "<br>" . PHP_EOL;
    }
    else if($proje - $projeort > 5){
      $Yorum =$Yorum. "-Projede ortalamada yuksek bir not alarak donemi tamamlamistir." . "<br>" . PHP_EOL;
    }
  }
  else{
    if($proje == 0){
      $Yorum =$Yorum. "-Projeye ilgi gostermemesi ve hic calismamasi bizi derinden uzmustur. Dersin sonuna geldigimiz bu gunlerde lutfen ogrencinizi sonraki dersler adina uyarin." . "<br>" . PHP_EOL;
    }
    else if($projeort - $proje <= 5){
      $Yorum =$Yorum. "-Projede ortalama bir not alarak donemi tamamlamistir." . "<br>" . PHP_EOL;
    }
    else if($projeort - $proje > 5){
      $Yorum =$Yorum. "-Projede ortalamadan cok dusuk bir not alarak donemi tamamlamistir." . "<br>" . PHP_EOL;
    }
  }
}
?>

<br></br>



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
  </script>
  <script type="text/javascript" >
  google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    var data1 = new google.visualization.DataTable();
    data1.addColumn('string', 'X');
    data1.addColumn('number', "Öğrenciniz");
    data1.addColumn('number', "Sınıf Ortalaması");
    //data1.addRows([['DUMMY',null ,56]]);

    //if(<?php echo $odev1ort; ?>){
    data1.addRows([
      ['Odev-1', <?php echo $odev1; ?>, <?php echo $odev1ort; ?>]]);

    //  if(<?php echo $quiz1ort; ?>){
      data1.addRows([
        ['Quiz-1', <?php echo $quiz1; ?>, <?php echo $quiz1ort; ?>]]);

      //  if(<?php echo $sinav1ort; ?>){
        data1.addRows([
          ['Sinav-1', <?php echo $sinav1; ?>, <?php echo $sinav1ort; ?>]]);

      //    if(<?php echo $odev2ort; ?>){
          data1.addRows([
            ['Odev-2', <?php echo $odev2; ?>, <?php echo $odev2ort; ?>]]);

          //  if(<?php echo $quiz2ort; ?>){
            data1.addRows([
              ['Quiz-2', <?php echo $quiz2; ?>, <?php echo $quiz2ort; ?>]]);

          //    if(<?php echo $sinav2ort; ?>){
              data1.addRows([
                ['Sinav-2', <?php echo $sinav2; ?>, <?php echo $sinav2ort; ?>]]);

            //    if(<?php echo $projeort; ?>){
                data1.addRows([
                  ['Proje', <?php echo $proje; ?>,<?php echo $projeort; ?>]]);
        //  }
      //   }
    //    }
  //     }
  //    }
  //   }
  //  }
    var options1 = {
      //interpolateNulls: true
      hAxis: {
        title: 'Ödev ve Sınavlar'
      },
      vAxis: {
        title: 'Notlar',
        ticks: [0, 20, 40, 60, 80, 100]
      }
    };

    var chart1 = new google.visualization.LineChart(document.getElementById('chart_div1'));

    chart1.draw(data1, options1);
  }
  </script>

  </head>
  <body>
    <link rel="stylesheet" href="/src/css/template.css">
    <div id="chart_div"  style="width: 800px; height: 400px;"></div>
    <p><b> Ogretmen değerlendirme yorumları: </b></p>
    <div><?php echo $Degerlendirme ;?></div>
    <br></br>
    <div id="chart_div1" style="width: 800px; height: 500px;"></div>
    <p><b> Odev-Sinav-Quiz değerlendirme yorumları: </b></p>
    <div><?php echo $Yorum ;?></div>
    <br></br>

  </body>
</html>


</html>
