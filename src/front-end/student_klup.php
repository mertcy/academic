<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

  <?php
  session_start(); // start the session
  $current_ogrenciId = $_SESSION['user_id'];

  $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection){
    $sql= "SELECT og.klup, og.klup_icerigi
                FROM Ogrenci AS og
                WHERE og.ogrenci_id =   $current_ogrenciId";
    $result = mysqli_query($connection, $sql);
    while($row_log = mysqli_fetch_row($result)){
      $klup = $row_log[0];
      $klup_icerigi = $row_log[1];
    }
  }
  ?>

<div class="jumbotron text-center">
  <h1><?php echo $klup;?></h1>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-10">
      <h3>Klüp İçeriği</h3>
      <p><?php echo $klup_icerigi;?></p>
    </div>

  </div>
</div>

</body>
</html>
