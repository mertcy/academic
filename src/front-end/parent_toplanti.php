<!DOCTYPE html>
<html>
<body>
  <h2>Toplanti Bilgileri</h2>

  <br><b>7-B SINIFI TANISMA TOPLANTISI: </b></br>
  <br><b>TOPLANTI NO:  </b>2</br>

  <br><b>TOPLANTI TARIHI:  </b>2018-01-10</br>

  <br></br>

  <label><input type="checkbox" name="checkbox" value="value">Katiliyorum</label>
  <label><input type="checkbox" name="checkbox" value="value">Katilmiyorum</label>

  <br></br>

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

    $connection_toplanti = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection_toplanti){
    $sql_toplanti =  "SELECT t.sinif_id, t.sube_id, t.toplanti_no, t.toplanti_tarihi
    FROM toplanti AS t
    WHERE t.sinif_id = '$current_sinif_id' AND t.sube_id = '$current_sube_id' ";
    $result = mysqli_query(  $connection_toplanti, $sql_toplanti);
          while($row = mysqli_fetch_row($result)){
  ?>


  <br><b><?php echo $row[0];?>-<?php echo $row[1];?> SINIFI VELI TOPLANTISI: </b></br>


  <br><b>TOPLANTI NO:  </b><?php echo $row[2];?></br>

  <br><b>TOPLANTI TARIHI:  </b><?php echo $row[3];?></br>

  <br></br>

  <label><input type="checkbox" name="checkbox" value="value">Katiliyorum</label>
  <label><input type="checkbox" name="checkbox" value="value">Katilmiyorum</label>

  <br></br>

            <?php
          }

        ?>
            <?php
  }
    ?>
</body>
</html>
