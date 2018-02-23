<!DOCTYPE html>
<html>
<body>
  <h2>Gezi Bilgileri</h2>
  <?php
  session_start(); // start the session
  $current_parentId = $_SESSION['user_id'];
  $ogrenciId;
  $current_sinif_id;
  $current_sube_id;

  $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection){
    $sql= "SELECT v.ogrenci_id
                FROM Veli AS v
                WHERE v.veli_id =   $current_parentId";
    $result = mysqli_query($connection, $sql);
    while($row_log = mysqli_fetch_row($result)){
      $ogrenciId = $row_log[0];

    }
  }

  $connection_o = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection_o){
    $sql_o= "SELECT og.sinif_id, og.sube_id
                FROM Ogrenci AS og
                WHERE og.ogrenci_id =   $ogrenciId";
    $result = mysqli_query($connection_o, $sql_o);
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


  <br><b><?php echo $row[0];?>-<?php echo $row[1];?> SINIFI <?php echo $row[2];?> GEZİSİ: </b></br>


  <br><b>GEZI ICERIGI:  </b><?php echo $row[3];?></br>

  <br><b>GEZI TARIHI:  </b><?php echo $row[4];?></br>

  <br></br>
  
  <label><input type="checkbox" name="checkbox" value="value">Onayliyorum</label>
  <label><input type="checkbox" name="checkbox" value="value">Onaylamiyorum</label>

  <br></br>

            <?php
          }

        ?>
            <?php
  }
    ?>
</body>
</html>
