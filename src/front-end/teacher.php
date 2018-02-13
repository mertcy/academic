<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Academic Ogretmen Sayfasi</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/src/css/template.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- addAnnouncement Custom CSS -->
    </head>

<!---**********************************************Header Content Begins ------------------------------------------------------------------------------------------------------------------------->

    <?php
        session_start(); // start the session
        if ($_SESSION['status']!="Active") {
            header("location:login.php");
        }
        $current_OgretmenId = $_SESSION['user_id'];
        $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
        if ($connection) {
            $sql_log = "SELECT o.ogretmen_id, k.kisi_adi, k.kisi_soyadi, ku.kullanici_parolasi FROM Ogretmen AS o, Kisi AS k, Kullanici AS ku
          WHERE o.ogretmen_id = $current_OgretmenId AND kisi_id = $current_OgretmenId AND kullanici_id = $current_OgretmenId";
            $result = mysqli_query($connection, $sql_log);
            while ($row_log = mysqli_fetch_row($result)) {
                $ogretmen_adi = $row_log[1];
                $ogretmen_soyadi = $row_log[2];
                $ogretmen_parolasi = $row_log[3];
            }
            if (isset($_POST['kayit'])) {
                $eskiPass = $_POST['eskipass'];
                $yeniPass = $_POST['yenipass'];
                $yeniPassT = $_POST['yenipasst'];
                if ($eskiPass == "") {
                    echo "<script type='text/javascript'>alert('Eski sifrenizi giriniz');</script>";
                } elseif ($yeniPass == "") {
                    echo "<script type='text/javascript'>alert('Yeni sifre giriniz');</script>";
                } elseif ($eskiPass != $ogretmen_parolasi) {
                    echo "<script type='text/javascript'>alert('Eski sifrenizi dogru giriniz');</script>";
                } elseif ($yeniPass != $yeniPassT) {
                    echo "<script type='text/javascript'>alert('Yeni sifreyi ayni girdiginizden emin olun');</script>";
                } else {
                    $sql = "UPDATE Kullanici SET kullanici_parolasi='$yeniPass' WHERE kullanici_id=$current_OgretmenId";
                    if (mysqli_query($connection, $sql)) {
                        echo "<script type='text/javascript'>alert('Sifreniz degistirilmistir');</script>";
                    } else {
                        echo "<script type='text/javascript'>alert('Hata lutfen tekrar deneyiniz');</script>";
                    }
                }
            }
        }

//********************************************** teacher_quiz.php page form modal functions ********************************************************************************************

        session_start();
        $connection_quiz = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
        if ($connection_quiz) {
            $control = 1;
            if (isset($_POST['gonder'])) {
                $sinif_quiz = $_POST['sinif_quiz'];
                $sube_quiz = $_POST['sube_quiz'];
                $link_quiz = $_POST['quizlink'];
                if ($sinif_quiz == "" || $sinif_quiz < 1 || $sinif_quiz > 12) {
                    echo "<script type='text/javascript'>alert('Sinifi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
                    $control = 0;
                } elseif ($sube_quiz == "" || strlen($sube_quiz) > 1) {
                    echo "<script type='text/javascript'>alert('Subeyi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
                    $control = 0;
                } elseif ($link_quiz == "") {
                    echo "<script type='text/javascript'>alert('Quiz linkini giriniz.');</script>";
                    $control = 0;
                } elseif ($control == 1) {
                    $sqlQuiz = "INSERT INTO `Quiz` (`quiz_id`, `ders_id`, `sinif_id`, `sube_id`, `duyuru_tipi`, `quiz_no`, `quiz_tarihi`, `notlandirma_tipi`, `not_yuzdesi`, `link`) VALUES ('', '', '$sinif_quiz', '$sube_quiz', '1', '', '2018-02-08', '5', '5', '$link_quiz')";
                    if (mysqli_query($connection_quiz, $sqlQuiz)) {
                        echo "<script type='text/javascript'>alert('Quiz basariyla $sinif_quiz-$sube_quiz sinifina eklenmistir.');</script>";
                    } else {
                        echo "<script type='text/javascript'>alert('Quiz eklenemedi. Lutfen tekrar deneyiniz.');</script>";
                    }
                }
                echo '<script>window.location.href = "teacher.php";</script>';
            }
        }
        mysqli_free_result($result_quiz);
        mysqli_close($connection_quiz);


//********************************************** teacher_gezi.php page form modal functions ********************************************************************************************
session_start();
$connection_gezi = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
if ($connection_gezi) {
    $control = 1;
    if (isset($_POST['geziGonder'])) {
        $sinif_gezi = $_POST['sinif_gezi'];
        $sube_gezi = $_POST['sube_gezi'];
        $gezi_basligi = $_POST['geziBaslik'];
        $gezi_icerigi = $_POST['icerik'];
        $gezi_tarihi = $_POST['geziTarihi'];

        if ($sinif_gezi == "" || $sinif_gezi < 1 || $sinif_gezi > 12) {
            echo "<script type='text/javascript'>alert('Sinifi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
            $control = 0;
        } elseif ($sube_gezi == "" || strlen($sube_gezi) > 1) {
            echo "<script type='text/javascript'>alert('Subeyi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
            $control = 0;
        }  elseif ($control == 1) {
            $sqlGezi = "INSERT INTO `geziler` (`sinif_id`, `sube_id`, `gezi_basligi`, `gezi_icerigi`, `gezi_tarihi`) VALUES ('$sinif_gezi', '$sube_gezi','$gezi_basligi','$gezi_icerigi','$gezi_tarihi')";
            if (mysqli_query($connection_gezi, $sqlGezi)) {
                echo "<script type='text/javascript'>alert('Gezi basariyla $sinif_gezi-$sube_gezi sinifina eklenmistir.');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Gezi eklenemedi. Lutfen tekrar deneyiniz.');</script>";
            }
        }
        echo '<script>window.location.href = "teacher.php";</script>';
    }
}
mysqli_free_result($result_gezi);
mysqli_close($connection_gezi);
?>

<!---**********************************************Body Page Content Begins ------------------------------------------------------------------------------------------------------------------------->

    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>AcadeMic</h3>
                </div>
                <ul class="list-unstyled components">
                  <p>Ogretmen Anasayfa</p>

<!---**********************************************'Duyurular' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                  <li>
                      <a href="#Duyurular" onclick="showAnnouncements(<?php echo $current_OgretmenId; ?>)">Duyurular</a>
                      <script>
                      function showAnnouncements(ogretmen_url) {

                        if (window.XMLHttpRequest) {
                          // code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                          if (this.readyState==4 && this.status==200) {
                            document.getElementById("teacherContent").innerHTML=this.responseText;
                          }
                        }
                        xmlhttp.open("GET","teacher_announcement.php?q="+ogretmen_url,true);
                        xmlhttp.send();
                      }
                      </script>
                  </li>

<!---**********************************************'Odevler' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                  <li class="active">
                        <a href="#Homework" data-toggle="collapse" aria-expanded="false">Odevler</a>
                        <script>
                        function showHomeworkField(ogretmen_url) {
                          if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                          } else { // code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange=function() {
                            if (this.readyState==4 && this.status==200) {
                              document.getElementById("teacherContent").innerHTML=this.responseText;
                            }
                          }
                          xmlhttp.open("GET","teacher_homework.php?q="+ogretmen_url,true);
                          xmlhttp.send();
                        }
                        </script>
                        <ul class="collapse list-unstyled" id="Homework">
                          <?php
                            $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
                            if ($connection) {
                                $sql = "SELECT s.sinif_id, s.sube_id
                                        FROM Sinif AS s, Ogretmen AS o
                                        WHERE o.ogretmen_id = $current_OgretmenId AND o.ogretmen_id = s.ogretmen_id";
                                $result = mysqli_query($connection, $sql);
                                while ($row_log = mysqli_fetch_row($result)) {
                                    $sinif_adi = $row_log[0];
                                    $sube_adi = $row_log[1];
                                    $sinif_sube = $sinif_adi."-".$sube_adi; ?>
                                    <li><a href="#" onclick="showHomeworkField(<?php echo $current_OgretmenId; ?>)" class="odev" id="<?php echo $sinif_adi."-".$sube_adi; ?>" name="<?php echo $sube_adi; ?>"><?php echo $sinif_adi."-".$sube_adi; ?></a></li>
                                    <?php
                                }
                            }
                            mysqli_free_result($result);
                            mysqli_close($connection);
                        ?>
                        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                        <script>
                            $( ".odev" ).click(function() {
                              var sinif_id = this.id;
                              document.cookie = "sinif_sube_id=" + sinif_id + ";";
                              $("#teacherContent").load('teacher_homework.php');
                            });

                        </script>
                      </ul>
                    </li>

<!---**********************************************'Quizler' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                   <li>
                        <a href="#Quiz" onclick="showQuizField(<?php echo $current_OgretmenId; ?>)">Quizler</a>
                        <script>
                        function showQuizField(ogretmen_url) {
                          if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                          } else { // code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange=function() {
                            if (this.readyState==4 && this.status==200) {
                              document.getElementById("teacherContent").innerHTML=this.responseText;
                            }
                          }
                          xmlhttp.open("GET","teacher_quiz.php?q="+ogretmen_url,true);
                          xmlhttp.send();
                        }
                        </script>
                   </li>

<!---**********************************************'Notlar' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li class="active">
                          <a href="#Notes" data-toggle="collapse" aria-expanded="false">Notlar</a>
                          <script>
                          function showNoteField(ogretmen_url) {
                            if (window.XMLHttpRequest) {
                              // code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp=new XMLHttpRequest();
                            } else { // code for IE6, IE5
                              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange=function() {
                              if (this.readyState==4 && this.status==200) {
                                document.getElementById("teacherContent").innerHTML=this.responseText;
                              }
                            }
                            xmlhttp.open("GET","teacher_note.php?q="+ogretmen_url,true);
                            xmlhttp.send();
                          }
                          </script>
                          <ul class="collapse list-unstyled" id="Notes">
                            <?php
                              $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
                              if ($connection) {
                                  $sql = "SELECT s.sinif_id, s.sube_id
                                          FROM Sinif AS s, Ogretmen AS o
                                          WHERE o.ogretmen_id = $current_OgretmenId AND o.ogretmen_id = s.ogretmen_id";
                                  $result = mysqli_query($connection, $sql);
                                  while ($row_log = mysqli_fetch_row($result)) {
                                      $sinif_adi = $row_log[0];
                                      $sube_adi = $row_log[1];
                                      $sinif_sube = $sinif_adi."-".$sube_adi; ?>
                                      <li><a href="#" onclick="showNoteField(<?php echo $current_OgretmenId; ?>)" class="not" id="<?php echo $sinif_adi."-".$sube_adi; ?>" name="<?php echo $sube_adi; ?>"><?php echo $sinif_adi."-".$sube_adi; ?></a></li>
                                      <?php
                                  }
                              }
                              mysqli_free_result($result);
                              mysqli_close($connection);
                          ?>
                          <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                          <script>
                              $( ".not" ).click(function() {
                                var sinif_id = this.id;
                                document.cookie = "sinif_sube_id=" + sinif_id + ";";
                                $("#teacherContent").load('teacher_note.php');
                              });

                          </script>
                        </ul>
                      </li>

<!---**********************************************'Toplantilar' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li>
                        <a href="#">Toplantilar</a>
                    </li>

<!---**********************************************'Geziler' Content Begins ------------------------------------------------------------------------------------------------------------------------->

              <li>
                <a href="#Gezi" onclick="showGeziler(<?php echo $current_OgretmenId; ?>)">Geziler</a>
                <script>
                function showGeziler(ogretmen_url) {
                  if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                  } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                      document.getElementById("teacherContent").innerHTML=this.responseText;
                    }
                  }
                  xmlhttp.open("GET","teacher_gezi.php?q="+ogretmen_url,true);
                  xmlhttp.send();
                }
                </script>
              </li>
                </ul>

            </nav>

<!--********************************************** Page Content Holder ********************************************************************************************************************************-->

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
                              <li><a href="#"><?php echo $ogretmen_adi." ".$ogretmen_soyadi; ?></a></li>
                              <li><a data-toggle = "modal" class="button" name="changepass" id="changepass" data-target = "#sifre_degistir_Modal">Sifremi degistir</a></li>
                              <li><a href="logout.php"><?php echo "Guvenli cikis"; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="teacherContent"></div>

                </ul>

            </nav>



              </div>
        </div>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    </body>
</html>

<!--********************************************** 'Sifre degistir' modal content ********************************************************************************************************************************-->

<div id='sifre_degistir_Modal' class='modal fade'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sifre Degistirme</h4>
      </div>
      <div class="modal-body">
        <form method='post' id='insert_form'>
          <label>Eski Sifre</label>
          <input type="password" name="eskipass" id="eskipass" class="form-control" placeholder="Eski sifre" />
          <br />
          <label>Yeni Sifre</label>
          <input type="password" name="yenipass" id="yenipass" class="form-control" placeholder="Yeni sifre" />
          <br />
          <label>Yeni Sifre(tekrar)</label>
          <input type="password" name="yenipasst" id="yenipasst" class="form-control" placeholder="Yeni sifre(tekrar)" />
          <br />
          <input type="submit" name="kayit" id="kayit" value="Kayit" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>

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
