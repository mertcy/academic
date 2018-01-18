<?php
  session_start(); // start the session

  if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
      $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

			if($connection) {
          $sql_log = "SELECT kullanici_id, kullanici_tipi, kullanici_parolasi FROM Kullanici";
          $result = mysqli_query($connection, $sql_log);
          $valid = 0; // user not verified yet

          while($row_log = mysqli_fetch_row($result)) {
              $username_db = $row_log[0];
              $userType = $row_log[1];
              $password_db = $row_log[2];

              if(($username == $username_db) && ($password == $password_db)) { // user credentials match
                  $valid = 1; // user verified
                  $_SESSION["user_id"] = $username;
                  break;
              }
          }

          mysqli_free_result($result);

          if($valid == 1) { // user verified
              $sql_info = "SELECT kisi_id, kisi_adi, kisi_soyadi FROM Kisi WHERE kisi_id = $username";
              $result = mysqli_query($connection, $sql_info);

              if($row_info = mysqli_fetch_row($result)) {
                  $kisi_adi = $row_info[1];
                  $kisi_soyadi = $row_info[2];
                  mysqli_free_result($result);
                  mysqli_close($conn);
                  echo "<script type='text/javascript'>alert('$kisi_adi $kisi_soyadi olarak sisteme giriş yapılmıştır.');</script>";

                  if($userType == 0) { // opens student's page
                      header('Refresh: 1; URL = student.php');
                      exit;
                  } elseif ($userType == 1) { // opens parent's page
                      header('Refresh: 1; URL = parent.php');
                      exit;
                  } elseif ($userType == 2) { // opens teacher's page
                      header('Refresh: 1; URL = teacher.php');
                      exit;
                  }
              }

            } elseif($valid == 0) { // user not verified
                mysqli_close($conn);
                echo "<script type='text/javascript'>alert('Yanlış kullanıcı adı ve şifre kombinasyonu girilmiştir.');</script>";
                unset($_POST['username']);
                unset($_POST['password']);
                session_unset(); // remove all session variables
                session_destroy(); // destroy the session
                header('Refresh: 1; URL = login.php');
                exit;
            }

      }


	}
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giriş</title>
    <link rel="stylesheet" href="/src/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
      <div class="col-sm-6">
        <form action="login.php" method="post">
            <div class="form-group">
              <label for="username">Kullanıcı Adı</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Şifre</label>
              <input type="password" name="password" class="form-control">
            </div>
        	<input class="btn btn-primary" type="submit" name="submit" value="Giriş">
        </form>
      </div>
    </div>
</body>
</html>
