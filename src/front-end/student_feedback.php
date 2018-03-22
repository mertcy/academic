<html>

<?php
session_start(); // start the session
$ders_adi = $_COOKIE['ders_adi'];
$current_ogrenciId = $_SESSION['user_id'];

?>

<h2> <?php echo $ders_adi; ?> Dersi Değerlendirmesi</h2>
<br></br>

<?php
    $connection_degerlendirme = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
    if($connection_degerlendirme) {

      $sql = "SELECT ders_id FROM Ders WHERE ders_adi = '$ders_adi'";

      $result= mysqli_query($connection_degerlendirme, $sql);
      while($row = mysqli_fetch_row($result)) {
            $ders = $row[0];
      }

      $sql_deg = "SELECT degerlendirme_puani,degerlendirme_tipi
                  FROM Ogrenci_Degerlendirme
                  WHERE ogrenci_id = $current_ogrenciId AND ders_id = $ders";

      $result_deg = mysqli_query($connection_degerlendirme, $sql_deg);
      while($row_deg = mysqli_fetch_row($result_deg)) {

           if($row_deg[0]==1 && $row_deg[1]==1){
             ?>
               <p>Derse Katılım: Derslere katılmıyorsun, başarılı olmak için derslere gelmen gerekiyor.</p>
           <?php } ?>

           <?php
           if($row_deg[0]==2 && $row_deg[1]==1){
             ?>
              <p>Derse Katılım: Derslere daha fazla katılman gerekiyor.</p>
           <?php } ?>

           <?php
           if($row_deg[0]==3 && $row_deg[1]==1){
             ?>
            <p>Derse Katılım: Derslere katılım durumun normal, biraz daha dikkat edebilirsin.</p>

          <?php } ?>

           <?php
           if($row_deg[0]==4 && $row_deg[1]==1){
             ?>
             <p>Derse Katılım: Derslere katılım durumun iyi</p>

           <?php } ?>

           <?php
           if($row_deg[0]==5 && $row_deg[1]==1){
             ?>
            <p>Derse Katılım: Derslere katılım durumun gayet iyi, bu seni başarılı yapacaktır.</p>
           <?php } ?>

          <?php
           if($row_deg[0]==1 && $row_deg[1]==2){
             ?>
             <p>Ders İçi Disiplin: Ders içi disiplini ve huzuru bozuyorsun. Dikkatli olman gerekiyor.</p>

           <?php } ?>

           <?php
           if($row_deg[0]==2 && $row_deg[1]==2){
             ?>
             <p>Ders İçi Disiplin: Ders içi disiplin konusunda zayıfsın, ders işlenmesi engelliyorsun.</p>
           <?php } ?>

           <?php
           if($row_deg[0]==3 && $row_deg[1]==2){
             ?>
             <p>Ders İçi Disiplin: Ders içi disiplin konusunda dikkat etmen gerekiyor.</p>
           <?php } ?>


           <?php
           if($row_deg[0]==4 && $row_deg[1]==2){
             ?>
             <p>Ders İçi Disiplin: Ders içi disiplin konusunda iyisin.</p>
           <?php } ?>


           <?php
           if($row_deg[0]==5 && $row_deg[1]==2){
             ?>
             <p>Ders İçi Disiplin: Ders içi disiplin durumun gayet iyi.</p>
           <?php } ?>


           <?php
            if($row_deg[0]==1 && $row_deg[1]==3){
              ?>
              <p>Ödev Durumu: Hiç ödev yapmıyorsun, bu şekilde başarılı olman çok zor.</p>
            <?php } ?>

            <?php
            if($row_deg[0]==2 && $row_deg[1]==3){
              ?>
              <p>Ödev Durumu: Ödevlerine daha fazla önem vermen gerekiyor.</p>
            <?php } ?>


            <?php
            if($row_deg[0]==3 && $row_deg[1]==3){
              ?>
              <p>Ödev Durumu: Ödevlerinde biraz daha gayretli olabilirsin.</p>
            <?php } ?>


            <?php
            if($row_deg[0]==4 && $row_deg[1]==3){
              ?>
              <p>Ödev Durumu: Ödevlerini yapma konusunda iyisin.</p>
            <?php } ?>


            <?php
            if($row_deg[0]==5 && $row_deg[1]==3){
              ?>
              <p>Ödev Durumu: Ödevlerini yapma konusunda gayet iyisin.</p>
            <?php } ?>

            <?php
             if($row_deg[0]==1 && $row_deg[1]==4){
               ?>
               <p>Derse Hazırlıklı Gelmesi: Derslere hazırlıklı gelmiyorsun, başarılı olmak için
               bu duruma dikkat etmelisin.</p>
             <?php } ?>

             <?php
             if($row_deg[0]==2 && $row_deg[1]==4){
               ?>
               <p>Derse Hazırlıklı Gelmesi: Derslere hazırlıklı gelme konusuna dikkat etmen gerekiyor.</p>
             <?php } ?>

             <?php
             if($row_deg[0]==3 && $row_deg[1]==4){
               ?>
               <p>Derse Hazırlıklı Gelmesi: Derslere daha hazır bir şekilde gelebilirsin.</p>

             <?php } ?>

             <?php
             if($row_deg[0]==4 && $row_deg[1]==4){
               ?>
               <p>Derse Hazırlıklı Gelmesi: Derslere hazırlıklı gelmen güzel, bu seni başarılı yapacaktır.</p>
             <?php } ?>

             <?php
             if($row_deg[0]==5 && $row_deg[1]==4){
               ?>
               <p>Derse Hazırlıklı Gelmesi: Derslere hazırlıklı gelme konusunda gayet iyisin. Bunu devam ettir.</p>

             <?php } ?>

             <?php
              if($row_deg[0]==1 && $row_deg[1]==5){
                ?>
                <p>Sorulara Cevap Vermesi: Derste aktif değilsin. Aktif olman gerekiyor.</p>

              <?php } ?>

              <?php
              if($row_deg[0]==2 && $row_deg[1]==5){
                ?>
                <p>Sorulara Cevap Vermesi: Derslerde parmak kaldır, soru sor, aktif katılım konusunda eksiğin var.</p>
              <?php } ?>


              <?php
              if($row_deg[0]==3 && $row_deg[1]==5){
                ?>
                <p>Sorulara Cevap Vermesi: Derste biraz daha aktif olabilirsin.</p>
              <?php } ?>

              <?php
              if($row_deg[0]==4 && $row_deg[1]==5){
                ?>
                <p>Sorulara Cevap Vermesi: Derslerde soru soruyor, cevaplıyosun.</p>
              <?php } ?>

              <?php
              if($row_deg[0]==5 && $row_deg[1]==5){
                ?>
                <p>Sorulara Cevap Vermesi: Derslere aktif bir şekilde katılmada gayet iyisin, bu şekilde başarılı olursun, devam ettir.</p>
              <?php } ?>

              <?php
               if($row_deg[0]==1 && $row_deg[1]==6){
                 ?>
                 <p>Eleştirel Düşünme Yönü: Sorgulayıcı ve eleştirel olman gerekiyor.</p>
               <?php } ?>

               <?php
               if($row_deg[0]==2 && $row_deg[1]==6){
                 ?>
                 <p>Eleştirel Düşünme Yönü: Sorgulayıcı ve eleştirel olman gerekiyor.</p>
               <?php } ?>

               <?php
               if($row_deg[0]==3 && $row_deg[1]==6){
                 ?>
                 <p>Eleştirel Düşünme Yönü: Sorgulayıcı ve eleştirel olma konusunda daha iyi olman gerekiyor.</p>
               <?php } ?>

               <?php
               if($row_deg[0]==4 && $row_deg[1]==6){
                 ?>
                 <p>Eleştirel Düşünme Yönü: Sorgulayıcı ve eleştirel olma konusunda iyisin.</p>
               <?php } ?>

               <?php
               if($row_deg[0]==5 && $row_deg[1]==6){
                 ?>
                 <p>Eleştirel Düşünme Yönü: Sorgulayıcı ve eleştirel olma konusunda gayet iyisin.</p>
               <?php } ?>

               <?php
                if($row_deg[0]==1 && $row_deg[1]==7){
                  ?>
                  <p>Yaratıcı Düşünme Yönü: Yaratıcı olman gerekiyor.</p>
                <?php } ?>

                <?php
                if($row_deg[0]==2 && $row_deg[1]==7){
                  ?>
                  <p>Yaratıcı Düşünme Yönü: Yaratıcı olma konusunda eksiklikler var.</p>
                <?php } ?>

                <?php
                if($row_deg[0]==3 && $row_deg[1]==7){
                  ?>
                  <p>Yaratıcı Düşünme Yönü: Yaratıcı olma konusunda biraz daha iyi olabilirsin.</p>
                <?php } ?>

                <?php
                if($row_deg[0]==4 && $row_deg[1]==7){
                  ?>
                  <p>Yaratıcı Düşünme Yönü: Yaratıcı olma konusunda iyisin.</p>
                <?php } ?>

                <?php
                if($row_deg[0]==5 && $row_deg[1]==7){
                  ?>
                  <p>Yaratıcı Düşünme Yönü: Yaratıcı olma konusunda gayet iyisin.</p>
                <?php } ?>

                <?php
                 if($row_deg[0]==1 && $row_deg[1]==8){
                   ?>
                   <p>Araştırma Yapma Yönü: Hiç araştırma yapmıyorsun. Bu, seni başarısız olmana sebep olur.</p>

                 <?php } ?>

                 <?php
                 if($row_deg[0]==2 && $row_deg[1]==8){
                   ?>
                   <p>Araştırma Yapma Yönü: Araştırma yapma konusunda ciddi eksiklikler var. Bu konuya dikkat etmelisin.</p>
                 <?php } ?>

                 <?php
                 if($row_deg[0]==3 && $row_deg[1]==8){
                   ?>
                   <p>Araştırma Yapma Yönü: Araştırma yapma yönünü daha da geliştirebilirsin.</p>
                 <?php } ?>

                 <?php
                 if($row_deg[0]==4 && $row_deg[1]==8){
                   ?>
                   <p>Araştırma Yapma Yönü: Araştırma yönün iyi. Bu yönünü geliştirerek daha başarılı olabilirsin.</p>
                 <?php } ?>

                 <?php
                 if($row_deg[0]==5 && $row_deg[1]==8){
                   ?>
                   <p>Araştırma Yapma Yönü: Araştırma yapma konusunda gayet iyisin, böyle devam et.</p>
                 <?php } ?>

                 <?php
                  if($row_deg[0]==1 && $row_deg[1]==9){
                    ?>
                    <p>Sorgulama ve Problem Çözme: Sorgulama ve problem çözme konusunda ciddi sıkıntılar var.
                    Bu konuda kendini geliştirmen lazım.</p>
                  <?php } ?>

                  <?php
                  if($row_deg[0]==2 && $row_deg[1]==9){
                    ?>
                    <p>Sorgulama ve Problem Çözme: Sorgulama ve problem çözme konusunda ciddi sıkıntılar var.
                    Bu konuda kendini geliştirmen lazım.</p>
                  <?php } ?>


                  <?php
                  if($row_deg[0]==3 && $row_deg[1]==9){
                    ?>
                    <p>Sorgulama ve Problem Çözme: Sorgulama ve problem çözme konusunda daha iyi olabilirsin.
                    Bu konuda kendini geliştirmen lazım.</p>
                  <?php } ?>

                  <?php
                  if($row_deg[0]==4 && $row_deg[1]==9){
                    ?>
                    <p>Sorgulama ve Problem Çözme: Sorgulama ve problem çözmede başarılısın.</p>
                  <?php } ?>

                  <?php
                  if($row_deg[0]==5 && $row_deg[1]==9){
                    ?>
                    <p>Sorgulama ve Problem Çözme: Sorgulama ve problem çözmede gayet başarılısın.</p>
                  <?php } ?>


                  <?php
                   if($row_deg[0]==1 && $row_deg[1]==10){
                     ?>
                     <p>Arkadaş İlişkileri: Arkadaş ilişkilerinde ciddi sıkıntıların var. Bu konuda
                       dikkat etmelisin.</p>
                   <?php } ?>

                   <?php
                   if($row_deg[0]==2 && $row_deg[1]==10){
                     ?>
                     <p>Arkadaş İlişkileri: Arkadaş ilişkilerinde ciddi sıkıntıların var. Bu konuda
                       dikkat etmelisin.</p>
                   <?php } ?>

                   <?php
                   if($row_deg[0]==3 && $row_deg[1]==10){
                     ?>
                     <p>Arkadaş İlişkileri: Arkadaş ilişkilerin daha iyi olabilir.</p>
                   <?php } ?>

                   <?php
                   if($row_deg[0]==4 && $row_deg[1]==10){
                     ?>
                     <p>Arkadaş İlişkileri: Arkadaş ilişkilerin iyi.</p>
                   <?php } ?>

                   <?php
                   if($row_deg[0]==5 && $row_deg[1]==10){
                     ?>
                     <p>Arkadaş İlişkileri: Arkadaş ilişkilerin gayet iyi. Sevilen bir insansın. :) </p>
                   <?php } ?>



                   <?php
                    if($row_deg[0]==1 && $row_deg[1]==11){
                      ?>
                      <p>Kılık Kıyafet Özeni: Kılık kıyafetine hiç önem vermiyorsun.</p>
                    <?php } ?>

                    <?php
                    if($row_deg[0]==2 && $row_deg[1]==11){
                      ?>
                      <p>Kılık Kıyafet Özeni: Kılık kıyafet konusunda ciddi eksiklikler var.</p>
                    <?php } ?>


                    <?php
                    if($row_deg[0]==3 && $row_deg[1]==11){
                      ?>
                      <p>Kılık Kıyafet Özeni: Kılık kıyafet konusuna daha fazla önem verebilirsin.</p>
                    <?php } ?>

                    <?php
                    if($row_deg[0]==4 && $row_deg[1]==11){
                      ?>
                      <p>Kılık Kıyafet Özeni: Kılık kıyafet konusunda iyisin.</p>
                    <?php } ?>

                    <?php
                    if($row_deg[0]==5 && $row_deg[1]==11){
                      ?>
                      <p>Kılık Kıyafet Özeni: Kılık kıyafet konusunda gayet iyisin.</p>
                    <?php } ?>


            <?php
      }

    }
?>
