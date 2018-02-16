<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/src/css/teacher_note.css">
    <script  src="src/js/teacher_note.js"></script>
</head>

<?php
    session_start(); // start the session
    $sinif_sube_id = $_COOKIE['sinif_sube_id'];
    $current_OgretmenId = $_SESSION['user_id'];
    $sube_note = substr("$sinif_sube_id",-1,1);
    $sinif_note = substr("$sinif_sube_id", -3,1);
?>

    <h4><?php echo $sinif_sube_id;?> sınıfınızın öğrencilerinin notlarını girmek için aşağıdaki alanı kullanın. </h4>
    <br><br/>

    <table id="notes" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>İsim Soyisim</th>
            <th>1.Yazılı Notu</th>
            <th>2.Yazılı Notu</th>
            <th>1.Sözlü Notu</th>
            <th>2.Sözlü Notu</th>
            <th>1.Ödev Notu</th>
            <th>2.Ödev Notu</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $connection_note = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
    if ($connection_note) {
      $sql_note = "SELECT ki.kisi_adi, ki.kisi_soyadi
                   FROM Ogrenci AS og, Kisi AS ki
                   WHERE og.ogrenci_id = ki.kisi_id AND og.sinif_id = $sinif_note AND og.sube_id = '$sube_note'";
      $result_note = mysqli_query($connection_note, $sql_note);
      while ($row_log_n = mysqli_fetch_row($result_note)) {
          $ogrenci_adi = $row_log_n[0];
          $ogrenci_soyadi = $row_log_n[1];?>
          <tr>
            <td><?php echo "$ogrenci_adi"." $ogrenci_soyadi"; ?></td>
            <td><input type="text" id="row-1-yazili1" name="row-1-yazili1"></td>
            <td><input type="text" id="row-1-yazili2" name="row-1-yazili2"></td>
            <td><input type="text" id="row-1-sozlu1" name="row-1-sozlu1"></td>
            <td><input type="text" id="row-1-sozlu2" name="row-1-sozlu1"></td>
            <td><input type="text" id="row-1-odev1" name="row-1-odev1"></td>
            <td><input type="text" id="row-1-odev2" name="row-1-odev2"></td>
            </tr>
        <?php
        }
      }
      ?>

      </tbody>
    </table>
</html>
