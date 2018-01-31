
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
        <?php
    }

?>
