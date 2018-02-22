<!DOCTYPE HTML>
<html>
<body>

  <div id="gezi">
    <button name="send_gezi_button" id="send_gezi_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#gezi_modal">Gezi Gönder</button>
  </div>
  </body>
  <br></br>
  <h4> Mevcut gezileriniz:</h4>
<?php
    $connection_geziler = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
    if($connection_geziler){
      $sql_geziler =  "SELECT gezi.sinif_id, gezi.sube_id, gezi.gezi_basligi, gezi.gezi_tarihi FROM geziler AS gezi";
      $result = mysqli_query(  $connection_geziler, $sql_geziler);
            while($row = mysqli_fetch_row($result)){ ?>
                <p><?php echo $row[3];?> tarihinde <?php echo $row[0]."-".$row[1];?> sınıfı ile '<?php echo $row[2];?>' başlıklı geziniz bulunmaktadır.</p>
                <?php
            }
      mysqli_free_result($result);
    }
?>
<div id="gezi_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gezi Gonder</h4>
      </div>
       <!-- Modal Body -->
      <div class="modal-body">
        <form method='post' id='send_gezi'>
          <label>Sınıf</label>
          <input type="text" id="sinif_gezi" name="sinif_gezi" class="form-control" placeholder="" />
          <br />
          <label>Şube</label>
          <input type="text" id="sube_gezi" name="sube_gezi" class="form-control" placeholder="" />
          <br />
          <label>Gezi Başlığı</label>
          <input type="text" id="geziBaslik" name="geziBaslik" class="form-control" placeholder="" />
          <br />
          <br />
          <label>Gezi İçeriği</label>
            <textarea placeholder="Icerik giriniz.." name="icerik" rows="7" cols="17" maxlength="255" style="overflow-y: auto; width: 500px; height: 100px" required></textarea>
          <br />
          <br />
          <label>Gezi Tarihi</label>
          <input type="text" id="geziTarihi" name="geziTarihi" class="form-control" placeholder="" />
          <br />
          <input type="submit" id="geziGonder" name="geziGonder" value="Gonder" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>


</html>
