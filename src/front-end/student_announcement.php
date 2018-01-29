<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

  <?php
    session_start(); // start the session
    $current_ogrenciId = $_SESSION['user_id'];

    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
  ?>
        <h2>Genel</h2>
        <div class="line">
        <p>
            <?php
              $announcement_code = 0;
              INCLUDE('student_announcementSql.php');
              $sql_log = $sql . $announcement_code . ";";
              $result = mysqli_query($connection, $sql_log);

              while($row_log = mysqli_fetch_row($result)) {
            ?>
            <li>
              <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
              <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
              <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
              <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
            </li>

            <?php
              }
              mysqli_free_result($result);
            ?>
        </p>

    <h2>Sinav</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 1;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>

    <h2>Odev</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 2;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>

    <h2>Quiz</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 3;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>

    <h2>Dokuman</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 4;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>

    <h2>Etkinlik</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 5;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>

    <h2>Gezi</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 6;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>


    <h2>Toplanti</h2>
    <div class="line">
    <p>
        <?php
          $announcement_code = 7;
          INCLUDE('student_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h3>Ders Adi: <?php echo $row_log[0]; ?> </h3>
          <h4>Duyuru Basligi: <?php echo $row_log[1]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[2]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[3]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        ?>
    </p>

    <?php
      }
      mysqli_close($conn);
    ?>

</body>
</html>
