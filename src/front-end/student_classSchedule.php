<!DOCTYPE html>
<html>
<head>
  <?php
    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
        $sql_log = "SELECT og.sinif_id, og.sube_id
                    FROM Ogrenci AS og
                    WHERE og.ogrenci_id = 1";
        $result = mysqli_query($connection, $sql_log);

        ?>
        <p><?php
          while($row_log = mysqli_fetch_row($result)) {
            $sinif_id = $row_log[0];
            $sube_id = $row_log[1];

            ?>
          <?php }} ?>
      </p>
   <h2><?php echo $sinif_id;?>-<?php echo $sube_id;?> Sınıfı Ders Programı</h2>
<table style="width:100%" border="2">
  <tr>
    <th>Saat</th>
    <th>Pazartesi</th>
    <th>Salı</th>
    <th>Çarşamba</th>
    <th>Perşembe</th>
    <th>Cuma</th>
  </tr>
  <tr>
    <td>8:30-9:20</td>

  </tr>
  <tr>
    <td>9:30-10:20</td>
  
  </tr>
  <tr>
    <td>10:30-11:20</td>

  </tr>
  <tr>
    <td>11:30-12:20</td>

  </tr>
  <tr>
    <td>12:30-13:20</td>

  </tr>
  <tr>
    <td>13:30-14:20</td>

  </tr>
  <tr>
    <td>14:30-15:20</td>

  </tr>
  <tr>
    <td>15:30-16:20</td>

  </tr>
  <tr>
    <td>16:30-17:20</td>

  </tr>
  <tr>
    <td>17:30-18:20</td>

  </tr>
</table>

</head>
</html>
