<!DOCTYPE html>
<html>
<body>

  <?php
  session_start(); // start the session
  $current_ogrenciId = $_SESSION['user_id'];
  $current_sinif_id;
  $current_sube_id;

  $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection){
    $sql= "SELECT og.sinif_id, og.sube_id
                FROM Ogrenci AS og
                WHERE og.ogrenci_id =   $current_ogrenciId";
    $result = mysqli_query($connection, $sql);
    while($row_log = mysqli_fetch_row($result)){
      $current_sinif_id = $row_log[0];
      $current_sube_id = $row_log[1];
    }
  }

    $connection_geziler = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection_geziler){
    $sql_geziler =  "SELECT gezi.sinif_id, gezi.sube_id, gezi.gezi_basligi, gezi.gezi_icerigi,gezi.gezi_tarihi
    FROM geziler AS gezi
    WHERE gezi.sinif_id = '$current_sinif_id' AND gezi.sube_id = '$current_sube_id' ";
    $result = mysqli_query(  $connection_geziler, $sql_geziler);
          while($row = mysqli_fetch_row($result)){
  ?>
  <textarea rows="10" cols="60">
  <?php echo $row[0];?>-<?php echo $row[1];?> SINIFI <?php echo $row[2];?> GEZİSİ:

  GEZİ İÇERİĞİ:    <?php echo $row[3];?>

  GEZİ TARİHİ:     <?php echo $row[4];?>
  </textarea>
            <?php
          }
          mysqli_free_result($result);
        ?>
            <?php
  }
    ?>

</body>
</html>
