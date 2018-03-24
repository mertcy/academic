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
        $connection_dersID = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
        if($connection_dersID) {
            $sql_log_dersID = "SELECT d.ders_id
                               FROM Ders AS d, Ogretmen AS o
                               WHERE d.ders_adi = o.brans AND o.ogretmen_id = $current_OgretmenId";
            $result_dersID = mysqli_query($connection_dersID, $sql_log_dersID);

            while($row_log_dersID = mysqli_fetch_row($result_dersID)) {
                $ders_id_sql = $row_log_dersID[0];
            }
            mysqli_free_result($result_dersID);
            mysqli_close($connection_dersID);
        }

        $connection_quiz = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
        if ($connection_quiz) {
            $control_quiz = 1;
            if (isset($_POST['gonder'])) {
                $sinif_quiz = $_POST['sinif_quiz'];
                $sube_quiz = $_POST['sube_quiz'];
                $link_quiz = $_POST['quizlink'];
                if ($sinif_quiz == "" || $sinif_quiz < 1 || $sinif_quiz > 12) {
                    echo "<script type='text/javascript'>alert('Sinifi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
                    $control_quiz = 0;
                } elseif ($sube_quiz == "" || strlen($sube_quiz) > 1) {
                    echo "<script type='text/javascript'>alert('Subeyi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
                    $control_quiz = 0;
                } elseif ($link_quiz == "") {
                    echo "<script type='text/javascript'>alert('Quiz linkini giriniz.');</script>";
                    $control_quiz = 0;
                } elseif ($control_quiz == 1) {
                    $sqlQuiz = "INSERT INTO `Quiz` (`quiz_id`, `ders_id`, `sinif_id`, `sube_id`, `duyuru_tipi`, `quiz_no`, `quiz_tarihi`, `notlandirma_tipi`, `not_yuzdesi`, `link`) VALUES ('', '$ders_id_sql', '$sinif_quiz', '$sube_quiz', '1', '', '2018-02-08', '5', '5', '$link_quiz')";
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

//********************************************** teacher_note.php page form modal functions ********************************************************************************************

        session_start();
        $connection_note = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
        if ($connection_note) {
            // BURADA HER OGRENCI ICIN DATABASEDE BIRER TABLO OLUSTURUP 48 COLOMNLU TABLOLAR GEREKECEK,
            // GEREKSIZ DB ISLERI OLDUGU ICIN FONKSIYON ASAMASI SUANLIK ASKIYA ALINMISTIR.
        }
        mysqli_free_result($result_quiz);
        mysqli_close($connection_note);


//********************************************** teacher_meeting.php page form modal functions ********************************************************************************************
        session_start();
        $connection_toplanti = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
        if ($connection_toplanti) {
            $control_meeting = 1;
            if (isset($_POST['toplanti_gonder'])) {
                $toplanti_tarihi = $_POST['toplanti_tarihi'];
                $toplanti_sinif = $_POST['sinif_toplanti'];
                $toplanti_sube = $_POST['sube_toplanti'];
                $toplanti_baslik = $_POST['toplanti_baslik'];
                $toplanti_icerik = $_POST['toplanti_icerik'];

                if ($toplanti_sinif == "" || $toplanti_sinif < 1 || $toplanti_sinif > 12) {
                    echo "<script type='text/javascript'>alert('Sinifi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
                    $control_meeting = 0;
                } elseif ($toplanti_sube == "" || strlen($toplanti_sube) > 1) {
                    echo "<script type='text/javascript'>alert('Subeyi yanlis girdiniz. Lutfen tekrar deneyin.');</script>";
                    $control_meeting = 0;
                }  elseif ($control_meeting == 1) {
                    $sqlToplanti = "INSERT INTO `Toplanti` (`toplanti_id`, `duyuru_tipi`, `sinif_id`, `sube_id`, `toplanti_tipi`, `toplanti_no`, `toplanti_tarihi`, `katilim_durumu`, `toplanti_baslik`, `toplanti_icerik`,`ogretmen_id` ) VALUES ('', '', '$toplanti_sinif', '$toplanti_sube', '', '', '$toplanti_tarihi', '', '$toplanti_baslik', '$toplanti_icerik','$current_OgretmenId')";
                    if (mysqli_query($connection_toplanti, $sqlToplanti)) {
                        echo "<script type='text/javascript'>alert('Toplantiniz basariyla $toplanti_sinif-$toplanti_sube sinifina eklenmistir.');</script>";
                    } else {
                        echo "<script type='text/javascript'>alert('Toplanti eklenemedi. Lutfen tekrar deneyiniz.');</script>";
                    }
                }
                echo '<script>window.location.href = "teacher.php";</script>';
            }
        }
        mysqli_free_result($result_toplanti);
        mysqli_close($connection_toplanti);

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
            $sqlGezi = "INSERT INTO `geziler` (`sinif_id`, `sube_id`, `gezi_basligi`, `gezi_icerigi`, `gezi_tarihi`,`ogretmen_id` ) VALUES ('$sinif_gezi', '$sube_gezi','$gezi_basligi','$gezi_icerigi','$gezi_tarihi','$current_OgretmenId')";
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

//********************************************** teacher_announcement.php page form modal functions ********************************************************************************************

session_start();
date_default_timezone_set('Europe/Istanbul');
$connection_announcement = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');

if (isset($_POST['sendAnnouncement'])) {
  $sinif = $_POST['sinif_id'];
  $sube = $_POST['sube_id'];
  $duyuru = $_POST['duyuru_id'];
  $ilgili = $_POST['ilgili'];
  $baslik = $_POST['baslik'];
  $icerik = $_POST['icerik'];

  $date = date("Y-m-d H:i:s");

  if ($connection_announcement) {

    $sql = "INSERT INTO Duyuru (sinif_id, sube_id, ilgili, duyuru_tipi,
                                duyuru_basligi, duyuru_icerigi, duyuru_tarihi, ogretmen_id)
            VALUES ('$sinif', '$sube', '$ilgili', '$duyuru', '$baslik', '$icerik', '$date', '$current_OgretmenId')";

    if (mysqli_query($connection_announcement, $sql)) {
        echo "<script type='text/javascript'>alert('Duyuru başarıyla eklenmiştir.');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Duyuru eklenemedi. Lütfen tekrar deneyiniz.');</script>";
    }

  }
  mysqli_close($connection_announcement);
}

//********************************************** teacher_evaluation.php page functions ********************************************************************************************

session_start();
date_default_timezone_set('Europe/Istanbul');
$connection_evaluation = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');

if (isset($_POST['sendEvaluation'])) {
  if ($connection_evaluation) {
    $ders_id = 0;
    $sql_dersID = "SELECT d.ders_id FROM Ders AS d, Ogretmen AS o
                   WHERE d.ders_adi = o.brans AND o.ogretmen_id = $current_OgretmenId";
    $result_dersID = mysqli_query($connection_evaluation, $sql_dersID);

    while($row_dersID = mysqli_fetch_row($result_dersID)) {
        $ders_id = $row_dersID[0];
    }
    mysqli_free_result($result_dersID);

    $ogrenci_id = $_POST['ogrenci_id'];
    $e1 = $_POST['e1'];
    $e2 = $_POST['e2'];
    $e3 = $_POST['e3'];
    $e4 = $_POST['e4'];
    $e5 = $_POST['e5'];
    $e6 = $_POST['e6'];
    $e7 = $_POST['e7'];
    $e8 = $_POST['e8'];
    $e9 = $_POST['e9'];
    $e10 = $_POST['e10'];
    $e11 = $_POST['e11'];

    /*
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $txt = $ders_id . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    */

    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 1, $e1)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 2, $e2)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 3, $e3)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 4, $e4)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 5, $e5)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 6, $e6)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 7, $e7)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 8, $e8)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 9, $e9)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 10, $e10)";
    mysqli_query($connection_evaluation, $sql);
    $sql = "INSERT INTO Ogrenci_Degerlendirme (hafta_id, ogrenci_id, ders_id, degerlendirme_tipi, degerlendirme_puani)
            VALUES (1, $ogrenci_id, $ders_id, 11, $e11)";
    mysqli_query($connection_evaluation, $sql);

  }

  mysqli_close($connection_evaluation);
}

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

<!---**********************************************'Ogrenci Degerlendirme' Content Begins ------------------------------------------------------------------------------------------------------------------------->

<li class="active">
      <a href="#Evaluation" data-toggle="collapse" aria-expanded="false">Öğrenci Değerlendirme</a>
      <script>
      function showEvaluationField(ogretmen_url) {
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
        xmlhttp.open("GET","teacher_evaluation.php?q="+ogretmen_url,true);
        xmlhttp.send();
      }
      </script>
      <ul class="collapse list-unstyled" id="Evaluation">
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
                  <li><a href="#" onclick="showEvaluationField(<?php echo $current_OgretmenId; ?>)" class="evaluation" id="<?php echo $sinif_adi."-".$sube_adi; ?>" name="<?php echo $sube_adi; ?>"><?php echo $sinif_adi."-".$sube_adi; ?></a></li>
                  <?php
              }
          }
          mysqli_free_result($result);
          mysqli_close($connection);
      ?>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script>
          $( ".evaluation" ).click(function() {
            var sinif_id = this.id;
            document.cookie = "sinif_sube_id=" + sinif_id + ";";
            $("#teacherContent").load('teacher_evaluation.php');
          });

      </script>
    </ul>
  </li>



<!---**********************************************'Toplantilar' Content Begins ------------------------------------------------------------------------------------------------------------------------->

              <li>
                <a href="#Toplanti" onclick="showMeetingField(<?php echo $current_OgretmenId; ?>)">Toplantilar</a>
                <script>
                function showMeetingField(ogretmen_url) {
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
                  xmlhttp.open("GET","teacher_meeting.php?q="+ogretmen_url,true);
                  xmlhttp.send();
                }
                </script>
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
