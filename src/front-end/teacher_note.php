<html lang="en">
<head>
    <meta charset="UTF-8">
</head>

<?php
    session_start(); // start the session
    $sinif_sube_id = $_COOKIE['sinif_sube_id'];
    $current_OgretmenId = $_SESSION['user_id'];
    $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
    ?><h4><?php echo $sinif_sube_id;?> sınıfınızın öğrencilerinin notlarını girmek için aşağıdaki alanı kullanın. </h4>
    <br><br/>
    <?php
?>

</html>
