<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/src/css/teacher_homework.css">
</head>

<p>Lütfen aşağıdan işlem yapmak istediğiniz sınıfınızı seçin.</p>
<div class="dropdown">
  <button class="dropbtn">Sınıflarım</button>
  <div class="dropdown-content">

  <?php
      session_start(); // start the session
      $current_OgretmenId = $_SESSION['user_id'];
      $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');

      if ($connection) {
          $sql = "SELECT s.sinif_id, s.sube_id
                      FROM Sinif AS s, Ogretmen AS o
                      WHERE o.ogretmen_id = $current_OgretmenId AND o.ogretmen_id = s.ogretmen_id";
          $result = mysqli_query($connection, $sql);

          while ($row_log = mysqli_fetch_row($result)) {
              $sinif_adi = $row_log[0];
              $sube_adi = $row_log[1]; ?>
              <a class="dropdown-item" href="#" onclick="showAddHomeworkField(<?php echo $sinif_adi; ?>)"><?php echo $sinif_adi."-".$sube_adi; ?></a>
              <script>
              function showAddHomeworkField(sinif_url) {
                if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                } else { // code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function(){
                  if (this.readyState==4 && this.status==200) {
                    document.getElementById("addHomeworkField").innerHTML=this.responseText;
                  }
                }
                xmlhttp.open("GET","teacher_addHomework.php?q="+sinif_url,true);
                xmlhttp.send();
              }
              </script>
              <?php
          }
      }
    ?>
  </div>
</div>

<div class="line"></div>

<div id="addHomeworkField"><b></b></div>
