<html lang="en">

<?php
    session_start(); // start the session
    $sinif_sube_id = $_COOKIE['sinif_sube_id'];
    $current_OgretmenId = $_SESSION['user_id'];
    $sube_id = substr("$sinif_sube_id",-1,1);
    $sinif_id = substr("$sinif_sube_id", -3,1);
?>

    <h4><?php echo $sinif_sube_id;?> sınıfınızın öğrencilerinin değerlendirme puanlarının giriş ekranı </h4>
    <hr>
    <br>

<form method='post' id='sendEvaluation'>
    <label>
      <b>Ögrenci: &nbsp;</b><select id="ogrenci_id" name="ogrenci_id" class="ogrenci" required>
        <option value="" disabled selected>--</option>
          <?php
            $connection_evaluation = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
            if ($connection_evaluation) {
              $sql = "SELECT k.kisi_id, k.kisi_adi, k.kisi_soyadi FROM Kisi AS k, Sinif As s, Ogrenci AS o
                      WHERE k.kisi_id = o.ogrenci_id AND s.sinif_id = $sinif_id AND s.sube_id = '$sube_id' AND
                      o.sinif_id = s.sinif_id AND o.sube_id = s.sube_id
                      ORDER BY k.kisi_adi ASC;";
              $result = mysqli_query($connection_evaluation, $sql);
              while ($row = mysqli_fetch_row($result)) {
              ?>
                <option value="<?php echo $row[0]; ?>" <?php echo(isset($_POST['ogrenci_id'])&&($_POST['ogrenci_id']=='$row[0]')?' selected="selected"':'');?>><?php echo $row[1] . ' ' . $row[2]; ?></options>
              <?php
              }
              mysqli_free_result($result);
              //$result = mysqli_query($connection_evaluation,"SELECT MAX(hafta_id) AND IFNULL(hafta_id,0) FROM Ogrenci_Degerlendirme WHERE ogrenci_id = $ogrenci_id");
            }
            ?></select>
    </label>
    <br>
    <h5>Seçilen öğrenci için aşağıda bu haftaki değerlendirme puanlamalarını girdikten sonra 'Onayla' butonuna basınız. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" id="sendEvaluation" name="sendEvaluation" value="Onayla" class="btn btn-info"/>
    </h5>

    <label>
      <b>Derse Katılım Durumu (Devam Hariç): &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="e1" name="e1" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e1'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e1'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e1'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e1'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e1'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <b>Dersi Engelleme Durumu (Ders İçi Disiplini): </b><select id="e2" name="e2" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e2'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e2'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e2'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e2'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e2'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    <br>
    <label>
      <b>Verilen Ödevleri Yapması (Ödev Titizliliği): &nbsp;</b><select id="e3" name="e3" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e3'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e3'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e3'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e3'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e3'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    <label>
      <b>Derse Hazırlıklı Gelmesi (İşlenecek Konuya Çalışmış Olması ve Ders Araç-Gereçlerini Bulundurması): &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="e4" name="e4" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e4'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e4'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e4'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e4'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e4'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    <br>
    <label>
      <b>Sorulara Cevap Vermesi: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="e5" name="e5" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e5'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e5'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e5'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e5'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e5'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <b>Eleştirel Düşünme Yönü: &nbsp;&nbsp;&nbsp;</b><select id="e6" name="e6" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e6'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e6'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e6'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e6'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e6'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    <br>
    <label>
      <b>Yaratıcı Düşünme Yönü: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="e7" name="e7" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e7'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e7'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e7'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e7'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e7'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <b>Araştırma Yapma Yönü: &nbsp;&nbsp;</b><select id="e8" name="e8" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e8'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e8'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e8'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e8'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e8'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    <br>
    <label>
      <b>Sorgulama ve Problem Çözme: &nbsp;</b><select id="e9" name="e9" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e9'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e9'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e9'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e9'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e9'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <b>Arkadaş İlişkileri: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="e10" name="e10" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e10'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e10'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e10'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e10'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e10'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
    <br>
    <label>
      <b>Kılık Kıyafet Özeni: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="e11" name="e11" required>
        <option value="" disabled selected>--</option>
          <option value="1" <?php echo(isset($_POST['e11'])?' selected="selected"':'');?>>Zayıf</options>
          <option value="2" <?php echo(isset($_POST['e11'])?' selected="selected"':'');?>>Kabul Edilebilir</options>
          <option value="3" <?php echo(isset($_POST['e11'])?' selected="selected"':'');?>>Orta</options>
          <option value="4" <?php echo(isset($_POST['e11'])?' selected="selected"':'');?>>İyi</options>
          <option value="5" <?php echo(isset($_POST['e11'])?' selected="selected"':'');?>>Çok İyi</options>
      </select>
    </label>
  </form>

</html>
