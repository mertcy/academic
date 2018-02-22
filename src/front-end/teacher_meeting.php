<!DOCTYPE HTML>
<html>
<body>

<div id="toplanti">
  <button name="send_toplanti_button" id="send_toplanti_button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#toplanti_modal">Toplantı Oluştur</button>
</div>

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
            <textarea placeholder="Tanışma toplantısı yapılacaktır. Saat: SS:DD de başlayacaktır. Yeri: Okuldaki toplantı salonu." name="icerik" rows="7" cols="17" maxlength="255" style="overflow-y: auto; width: 500px; height: 100px" required></textarea>
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
