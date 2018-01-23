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
    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
        $sql_log = "SELECT de.ders_adi, si.sinav_no
                    FROM Ogrenci AS og, Odev AS od, Sinav As si, Quiz As qu, Ders AS de, Ders_Duyurusu AS dd
                    WHERE og.ogrenci_id = 123 AND og.sinif_id = dd.sinif_id AND og.sube_id = dd.sube_id
                      AND dd.ders_id =de.ders_id;";
        $result = mysqli_query($connection, $sql_log);

        ?>
        <h2>Sinavlar</h2>
        <p><?php
          while($row_log = mysqli_fetch_row($result)) {
            $ders_adi = $row_log[0];
            $sinav_no = $row_log[1];

            ?>
            <li><a href="#">Ders Adi: <?php echo $ders_adi; ?> Sinav No: <?php echo $sinav_no; ?></a></li>
          <?php }} ?>
        </p>
        <div class="line"></div>

        <h2>Baslik2</h2>
        <p> Icerik2</p>
        <div class="line"></div>

        <h2>Baslik3</h2>
        <p> Icerik3 </p>
        <div class="line"></div>

        <h3>Baslik4</h3>
        <p> Icerik4</p>



</body>
</html>
