<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Academic Ogrenci Sayfasi</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/src/css/template.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <?php
        session_start(); // start the session

        if($_SESSION['status']!="Active")
        {
          header("location:login.php");
        }

        $current_ogrenciId = $_SESSION['user_id'];
    ?>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>AcadeMic</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Ogrenci Anasayfa</p>
                    <li>
                        <a href="#" onclick="showAnnouncements(<?php echo $current_ogrenciId; ?>)">Duyurular</a>
                        <script>
                        function showAnnouncements(ogrenci_url) {

                          if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                          } else { // code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange=function() {
                            if (this.readyState==4 && this.status==200) {
                              document.getElementById("announcements").innerHTML=this.responseText;
                            }
                          }
                          xmlhttp.open("GET","student_announcement.php?q="+ogrenci_url,true);
                          xmlhttp.send();
                        }
                        </script>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Derslerim</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <?php
                              $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');

                              if($connection) {
                                  $sql_log = "SELECT o.ogrenci_id, o.sinif_id, o.sube_id, dp.ders_programId, dp.sinif_id, dp.sube_id,
                                                     d.ders_id, d.ders_adi, k.kisi_adi, k.kisi_soyadi
                                              FROM Ogrenci AS o, Ders_Programi AS dp, Ders AS d, Kisi AS k
                                              WHERE o.ogrenci_id = $current_ogrenciId AND d.ders_id = dp.ders_programId
                                              AND   o.sinif_id = dp.sinif_id AND  o.sube_id = dp.sube_id AND kisi_id = $current_ogrenciId ";
                                  $result = mysqli_query($connection, $sql_log);

                                  while($row_log = mysqli_fetch_row($result)) {
                                      $ders_adi = $row_log[7];
                                      $ogrenci_adi = $row_log[8];
                                      $ogrenci_soyadi = $row_log[9];
                                      ?>
                                      <li><a href="#"><?php echo $ders_adi; ?></a></li>
                                      <?php
                                  }
                              }
                          ?>
                        </ul>
                    </li>
                    <li>
                      <a href="#DersProg" onclick="showClassSchedule(<?php echo $current_ogrenciId; ?>)">Ders Programim</a>
                      <script>
                      function showClassSchedule(ogrenci_url) {

                        if (window.XMLHttpRequest) {
                          // code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                          if (this.readyState==4 && this.status==200) {
                            document.getElementById("announcements").innerHTML=this.responseText;
                          }
                        }
                        xmlhttp.open("GET","student_classSchedule.php?q="+ogrenci_url,true);
                        xmlhttp.send();
                      }
                      </script>




                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Etkinliklerim</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Gezilerim</a></li>
                            <li><a href="#">Kuluplerim</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Not Dokumum</a>
                    </li>
                </ul>

            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Kenar Cubugunu Gizle</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                              <li><a href="#"><?php echo $ogrenci_adi." ".$ogrenci_soyadi; ?></a></li>
                              <li><a href="#"><?php echo "Sifremi degistir"; ?></a></li>
                              <li><a href="logout.php"><?php echo "Guvenli cikis"; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div id="announcements"><b><?php INCLUDE('student_announcement.php'); ?></b></div>
                <!-- announcements related to students will be listed here -->

              </div>
        </div>


        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>
