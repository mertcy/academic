<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>

<h2> Duyuru ekleme alanı </h2>
<br></br>

<p> Duyuru eklemek için ekleyeceğinizin duyuru tipini seçerek gerekli bilgileri doldurunuz. Duyurunun velinin yanısıra öğrencilere de ulaşmasını istiyorsanız, öğrencinin yanındaki tik işaretini seçin. </p>
<br></br>
  <?php
      session_start(); // start the session
      if ($_SESSION['status']!="Active") {
          header("location:login.php");
      }
      $current_OgretmenId = $_SESSION['user_id'];
   ?>
<body>
  <div id="announcementAdd">
    <button name="send_announcement_button" id="send_announcement_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#announcement_modal">Duyuru Ekle</button>
  </div>
</body>

<br></br>
<h4> Mevcut eklemiş olduğunuz duyurularınız:</h4>
<?php
    $connection_toplanti = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
    if($connection_toplanti){
      $sql_toplanti =  "SELECT d.sinif_id, d.sube_id, d.duyuru_basligi, d.duyuru_tarihi FROM Duyuru AS d WHERE d.ogretmen_id = $current_OgretmenId";
      $result = mysqli_query($connection_toplanti, $sql_toplanti);
      while($row = mysqli_fetch_row($result)){ ?>
        <p><?php echo $row[3];?> tarihinde <?php echo $row[0]."-".$row[1];?> sınıfı öğrenci ve velilerine '<?php echo $row[2];?>' başlıklı duyuru eklediniz.</p>
        <?php
      }
      mysqli_free_result($result);
    }
?>

  <div id="announcement_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" title="Vazgeç">&times;</button>
          <h2>Duyuru Ekleme</h2>
        </div>
         <!-- Modal Body -->
        <div class="modal-body">
          <form method='post' id='send_announcement'>

            <div class="info">

              <label>
                <b>Sinif: </b><select id="sinif_id" name="sinif_id" required>
                  <option value="" disabled selected>--</option>
                    <?php
                      $connection_announcement = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
                      if ($connection_announcement) {
                        $sql = "SELECT distinct sinif_id FROM Sinif ORDER BY sinif_id ASC;";
                        $result = mysqli_query($connection_announcement, $sql);
                        while ($row = mysqli_fetch_row($result)) {
                        ?>
                          <option value="<?php echo $row[0]; ?>" <?php echo(isset($_POST['sinif_id'])&&($_POST['sinif_id']=='$row[0]')?' selected="selected"':'');?>><?php echo $row[0]; ?></options>
                        <?php
                        }

                      ?></select>
                  </label>

                  <label><b>&nbsp;&nbsp;&nbsp;Sube: </b><select id="sube_id" name="sube_id" required>
                      <option value="" disabled selected>--</option>
                      <?php
                            $sql = "SELECT distinct sube_id FROM Sinif ORDER BY sube_id";
                            $result = mysqli_query($connection_announcement, $sql);
                            while ($row = mysqli_fetch_row($result)) {
                              ?>
                              <option value="<?php echo $row[0]; ?>" <?php echo(isset($_POST['sube_id'])&&($_POST['sube_id']=='$row[0]')?' selected="selected"':'');?>><?php echo $row[0]; ?></options>
                            <?php
                          }
                        }
                        mysqli_free_result($result);
                        mysqli_close($connection_announcement);

                      ?>
                    </select>
                  </label>

                  <label><b>&nbsp;&nbsp;&nbsp;Duyuru: </b><select id="duyuru_id" name="duyuru_id" required>
                      <option value="" disabled selected>--</option>
                      <option value="0" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='0')?' selected="selected"':'');?>>Genel</options>
                      <option value="1" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='1')?' selected="selected"':'');?>>Sinav</options>
                      <option value="2" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='2')?' selected="selected"':'');?>>Odev</options>
                      <option value="3" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='3')?' selected="selected"':'');?>>Quiz</options>
                      <option value="4" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='4')?' selected="selected"':'');?>>Dokuman</options>
                      <option value="5" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='5')?' selected="selected"':'');?>>Etkinlik</options>
                      <option value="6" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='6')?' selected="selected"':'');?>>Gezi</options>
                      <option value="7" <?php echo(isset($_POST['duyuru_id'])&&($_POST['duyuru_id']=='7')?' selected="selected"':'');?>>Toplanti</options>
                    </select>
                  </label>

                  <label><b>&nbsp;&nbsp;&nbsp;İlgili: </b>
                      <input type="checkbox" checked="checked" disabled title="İlgili duyuru veliye her türlü bildirilecektir."> Veli </input>
                      <input type="checkbox" name="ilgili" id="ilgili" <?php echo(isset($_POST['checkbox']) ?' selected="selected" value="0"':'value="1"');?>> Ogrenci </input>

                  </label>
                  &nbsp;

                  <input type="submit" id="sendAnnouncement" name="sendAnnouncement" value="✔" title="Onayla" class="btn btn-success" />
              </div>
              <hr>
              <div class="announcementInfo">
                <label><b>Baslik: </b><input type="text" placeholder="Baslik giriniz.." name="baslik" maxlength="107" style="width: 570px; height: 20px" required>
                </label>
                <br>
                <label><b>Icerik: </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <textarea placeholder="Icerik giriniz.." name="icerik" rows="7" cols="17" maxlength="255" style="overflow-y: auto; width: 570px; height: 100px" required></textarea>
                </label>

            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</html>
