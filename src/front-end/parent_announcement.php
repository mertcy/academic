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
    $current_veliId = $_SESSION['user_id'];
    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
        $sql_ogr = "SELECT o.ogrenci_id FROM Ogrenci AS o, Veli AS v
                    WHERE v.veli_id = $current_veliId AND v.ogrenci_id = o.ogrenci_id;";

        $result_ogr = mysqli_query($connection, $sql_ogr);

        while($row_ogr = mysqli_fetch_row($result_ogr)) {
            $current_ogrenciId = $row_ogr[0];

            $sql_kisi = "SELECT k.kisi_adi, k.kisi_soyadi FROM Kisi AS k
                        WHERE k.kisi_id = $current_ogrenciId;";
            $result_kisi = mysqli_query($connection, $sql_kisi);
            while($row_kisi = mysqli_fetch_row($result_kisi)) {

      ?>
      <li>
        <h3>Ogrenci: <?php echo $row_kisi[0] . ' ' . $row_kisi[1]; mysqli_free_result($result); ?> </h3>

        <h2>Genel</h2>
        <div class="line">
        <p>
            <?php
              $announcement_code = 0;
              INCLUDE('parent_announcementSql.php');
              $sql_log = $sql . $announcement_code . ";";
              $result = mysqli_query($connection, $sql_log);

              while($row_log = mysqli_fetch_row($result)) {
            ?>
            <li>
              <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
              <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
              <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
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
          INCLUDE('parent_announcementSql.php');
          $sql_log = $sql . $announcement_code . ";";
          $result = mysqli_query($connection, $sql_log);

          while($row_log = mysqli_fetch_row($result)) {
        ?>
        <li>
          <h4>Duyuru Basligi: <?php echo $row_log[0]; ?> </h4>
          <h5>Duyuru Icerigi: <?php echo $row_log[1]; ?> </h5>
          <h6>Duyuru Tarihi: <?php echo $row_log[2]; ?> </h6>
        </li>

        <?php
          }
          mysqli_free_result($result);
        }
          mysqli_free_result($result_kisi);
        }
          mysqli_free_result($result_ogr);


        ?>
    </p>

    <?php
      }
      mysqli_close($conn);
    ?>

</body>
</html>
