<!DOCTYPE HTML>
<html>
<body>

<h2> Veli toplantısı oluşturma alanı </h2>
<br></br>
<p> Veli toplantısı oluşturmak için aşağıdaki 'Toplantı Oluştur' butonunu kullanarak, hangi tarihte hangi sınıf ile nerede toplantıyı yapacağınız bilgilerini girin.</p>
<br></br>


<div id="toplanti">
  <button name="send_toplanti_button" id="send_toplanti_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#toplanti_modal">Toplantı Oluştur</button>
</div>
<br></br>
<h4> Mevcut toplantılarınız:</h4>
<?php
    $connection_toplanti = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
    if($connection_toplanti){
      $sql_toplanti =  "SELECT t.sinif_id, t.sube_id, t.toplanti_baslik, t.toplanti_tarihi FROM Toplanti AS t";
      $result = mysqli_query($connection_toplanti, $sql_toplanti);
      while($row = mysqli_fetch_row($result)){ ?>
        <p><?php echo $row[3];?> tarihinde <?php echo $row[0]."-".$row[1];?> sınıfı ile '<?php echo $row[2];?>' başlıklı toplantınız bulunmaktadır.</p>
        <?php
      }
      mysqli_free_result($result);
    }
?>

<div id="toplanti_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Toplantı Oluştur</h4>
      </div>
       <!-- Modal Body -->
      <div class="modal-body">
        <form method='post' id='send_toplanti'>
          <label>Toplantı Tarihi</label>
          <input type="text" id="toplanti_tarihi" name="toplanti_tarihi" class="form-control" placeholder="2018-03-25" />
          <br />
          <label>Sınıf</label>
          <input type="text" id="sinif_toplanti" name="sinif_toplanti" class="form-control" placeholder="6" />
          <br />
          <label>Şube</label>
          <input type="text" id="sube_toplanti" name="sube_toplanti" class="form-control" placeholder="C" />
          <br />
          <label>Toplantı Başlığı</label>
          <input type="text" id="toplanti_baslik" name="toplanti_baslik" class="form-control" placeholder="Tanışma Toplantısı" />
          <br />
          <label>Toplantı İçeriği</label>
            <textarea placeholder="Tanışma toplantısı yapılacaktır. Saat: SS:DD de başlayacaktır. Yeri: Okuldaki toplantı salonu." name="toplanti_icerik" rows="7" cols="17" maxlength="255" style="overflow-y: auto; width: 500px; height: 100px" required></textarea>
          <br />
          <br />
          <input type="submit" id="toplanti_gonder" name="toplanti_gonder" value="Gonder" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
