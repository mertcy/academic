<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/src/css/teacher_homework.css">
</head>

<?php
    session_start(); // start the session
    $sinif_sube_id = $_COOKIE['sinif_sube_id'];
    $current_OgretmenId = $_SESSION['user_id'];
    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
    ?><h4><?php echo $sinif_sube_id;?> sınıfınıza ödev eklemek için aşağıdaki alanı kullanın. </h4>
    <br><br/>
    <?php
?>
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
