<!DOCTYPE html>
<html>
<head>
  <?php
  session_start(); // start the session

  $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

    if($connection) {
         INCLUDE('parent_iletisimSql.php');
  ?>
    <h2><?php echo $ogretmen_isim;?> <?php echo $ogretmen_soyisim;?> Iletisim Bilgileri</h2>

    <p>
      <br><b>Telefon Numarasi: </b><?php echo $tel_num;?></br>
      <br><b>Ofis Numarasi: </b><?php echo $ofis_num;?></br>
      <br><b>E-mail adresi: </b><?php echo $mail_adresi;?></br>

    </p>
    <?php
    }
    mysqli_close($connection);
    ?>
  </head>
</html>
