<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/src/css/teacher_homework.css">
</head>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading"><strong>Ödev yükleme penceresi</strong></div>
        <div class="panel-body">
          <!-- Standart Form -->
            <h4>Yüklemek istediğiniz ödev dosyasını bilgisayarınızdan seçiniz</h4>
          <form action="teacher_uploadFile.php" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload" multiple>
              </div>
              <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Dosyaları yükle</button>
            </div>
          </form>
          <br></br>
          <!-- Drop Zone -->
          <h4>Ya da yüklemek istediğiniz dosyayı aşağıdaki alana sürükleyin</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Dosyayı buraya sürükle ve bırak!
          </div>
        </div>
      </div>
</div>

</html>
