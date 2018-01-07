<?php
        if(isset($_POST['submit'])) {

					$username = $_POST['username'];
					$password = $_POST['password'];

      $connection = mysqli_connect('localhost','root','','academics');

			if($connection) {
				echo "databaseye bağlanıldı";
			}else {
				die("databaseye bağlanılamadı");
			}


				// if( $username && $password){
				// 		echo $username;
				// 	   echo $password;
        //
				// } else {
				//   echo "geçersiz giriş";
				// }

		}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
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
