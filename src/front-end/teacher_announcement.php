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
<body>

  <div id="announcementAdd">
    <button name="send_announcement_button" id="send_announcement_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#announcement_modal">Duyuru+</button>
  </div>

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
          <form method='post' id='send_duyuru_ekle'>

            <div class="info">
                  <label><b>Sinif: </b><select id="sinif_id" name="sinif_id" required>
                      <option value="" disabled selected>--</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                  </label>

                  <label><b>&nbsp;&nbsp;&nbsp;Sube: </b><select id="sube_id" name="sube_id" required>
                      <option value="" disabled selected>--</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </label>

                  <label><b>&nbsp;&nbsp;&nbsp;Duyuru: </b><select id="duyuru_id" name="duyuru_tipi" required>
                      <option value="" disabled selected>--</option>
                      <option value="odev">Odev</option>
                      <option value="quiz">Quiz</option>
                      <option value="sinav">Sinav</option>
                      <option value="dokuman">Dokuman</option>
                      <option value="toplanti">Toplanti</option>
                      <option value="etkinlik">Etkinlik</option>
                    </select>
                  </label>

                  <label><b>&nbsp;&nbsp;&nbsp;İlgili: </b>
                      <input type="checkbox" checked="checked" disabled> Veli </input>
                      <input type="checkbox" id="ilgili"> Ogrenci </input>
                  </label>
                  &nbsp;

                  <input type="submit" id="duyuruGonder" name="duyuruGonder" value="✔" title="Onayla" class="btn btn-success" />
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


<?php
  //********************************************** teacher_announcement.php page form modal functions ********************************************************************************************

  session_start();
  $connection_announcement = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if ($connection_announcement) {
      $control = 1;
      if (isset($_POST['duyuruGonder'])) {

          $sql = "INSERT INTO Duyuru (ders_id, sinif_id, sube_id, ilgili, duyuru_tipi, duyuru_basligi, duyuru_icerigi, duyuru_tarihi) VALUES (1, '" . $_POST['sinif_id'] . "', '" . $_POST['sube_id'] . "', '" . $_POST['ilgili'] . "', '" . $_POST['duyuru_id'] . "', '" . $_POST['baslik'] . "', '" .  $_POST['icerik'] . "', 2018-01-31);";

          $result = mysqli_query($connection, $sql);

      }
  }
  mysqli_free_result($result_announcement);
  mysqli_close($connection_announcement);

?>


</body>
</html>
