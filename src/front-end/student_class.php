
<?php
    session_start(); // start the session

    $ders_id = $_COOKIE['ders_id'];
    $current_ogrenciId = $_SESSION['user_id'];
    $sinif_id = $_SESSION['sinif_id'];
    $sube_id = $_SESSION['sube_id'];

    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
        $sql_log = "SELECT ders_adi FROM Ders WHERE ders_id = $ders_id";
        $result = mysqli_query($connection, $sql_log);

        while($row_log = mysqli_fetch_row($result)) {
            $ders_adi = $row_log[0];
        }

        mysqli_free_result($result);
        mysqli_close($connection);
        ?>
        <h3><?php echo $ders_adi; ?></h3>
        <br></br>
        <h4>Dersin quizi:</h4>
        <?php
    }

    $connection2 = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection2) {
        $sql_log2 = "SELECT q.link
                     FROM Quiz AS q, Ders AS d, Ogrenci AS o
                     WHERE q.ders_id = d.ders_id AND o.ogrenci_id = $current_ogrenciId AND o.sinif_id = q.sinif_id AND o.sube_id = q.sube_id AND d.ders_adi = '$ders_adi'";
        $result2 = mysqli_query($connection2, $sql_log2);

        while($row_log2 = mysqli_fetch_row($result2)) {
            $link = $row_log2[0];
        }

        mysqli_free_result($result2);
        mysqli_close($connection2);
        echo "$link";
    }
?>
        <script type="text/javascript" async defer src="https://d134jvmqfdbkyi.cloudfront.net/script/embed.min.js"></script>
        <br></br>
        ​<iframe width="950" height="450" src= <?php echo "$link"; ?> frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
