<!DOCTYPE html>
<html>
<head>
  <?php
    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
         INCLUDE('student_classScheduleSql.php');
?>
        <p><?php
          while($row_log = mysqli_fetch_row($result)) {
            ?>
        <h2><?php echo $row_log[0];?>-<?php echo $row_log[1];?> Sınıfı Ders Programı</h2>
          <?php
          }
            mysqli_free_result($result);
          ?>
      </p>

      <p>
          <?php
            INCLUDE('student_classScheduleSql.php');

          while($row_log = mysqli_fetch_row($result_ders)) {
            while($row_log2 = mysqli_fetch_row($result_ders2)) {
              while($row_log3 = mysqli_fetch_row($result_ders3)) {
          ?>
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
               <th><?php echo $row_log[0]; ?> </th>
               <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log3[0]; ?> </th>
            </tr>
            <tr>
              <td>9:30-10:20</td>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log3[0]; ?> </th>

            </tr>
            <tr>
              <td>10:30-11:20</td>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>

            </tr>
            <tr>
              <td>11:30-12:20</td>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log2[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>

            </tr>
            <tr>
              <td>12:30-13:20</td>
              <th>ÖĞLE ARASI</th>
              <th>ÖĞLE ARASI</th>
              <th>ÖĞLE ARASI</th>
              <th>ÖĞLE ARASI</th>
              <th>ÖĞLE ARASI</th>
            </tr>
            <tr>
              <td>13:30-14:20</td>
              <th><?php echo $row_log3[0]; ?> </th>
              <th><?php echo $row_log3[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log3[0]; ?> </th>
            </tr>
            <tr>
              <td>14:30-15:20</td>
              <th><?php echo $row_log3[0]; ?> </th>
              <th><?php echo $row_log3[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log[0]; ?> </th>
              <th><?php echo $row_log3[0]; ?> </th>

            </tr>
          </table>

          <?php
        }}}
            mysqli_free_result($result);
          ?>
      </p>

<?php
  }
  mysqli_close($conn);
?>

</head>
</html>
