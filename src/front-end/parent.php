<?php
  session_start(); // start the session

  if($_SESSION['status']!="Active")
  {
    header("location:login.php");
  }

  $current_parentID = $_SESSION['user_id'];

  $connection = mysqli_connect('localhost','root','root','db_academic','8889','/Applications/MAMP/tmp/mysql/mysql.sock');
  if($connection){
    $sql_log = "SELECT p.veli_id, k.kisi_adi, k.kisi_soyadi, ku.kullanici_parolasi FROM Veli AS p, Kisi AS k, Kullanici AS ku
    WHERE p.veli_id = $current_parentID AND kisi_id = $current_parentID AND kullanici_id = $current_parentID";
    $result = mysqli_query($connection, $sql_log);
    while($row_log = mysqli_fetch_row($result)) {
        $veli_adi = $row_log[1];
        $veli_soyadi = $row_log[2];
        $veli_parola = $row_log[3];
    }
    if(isset($_POST['kayit'])) {
      $eskiPass = $_POST['eskipass'];
      $yeniPass = $_POST['yenipass'];
      $yeniPassT = $_POST['yenipasst'];
      if($eskiPass == "")
      {
       echo "<script type='text/javascript'>alert('Eski sifrenizi giriniz');</script>";
      }
      else if($yeniPass == "")
      {
       echo "<script type='text/javascript'>alert('Yeni sifre giriniz');</script>";
      }
      else if($eskiPass != $veli_parola)
      {
       echo "<script type='text/javascript'>alert('Eski sifrenizi dogru giriniz');</script>";
      }
      else if($yeniPass != $yeniPassT)
      {
       echo "<script type='text/javascript'>alert('Yeni sifreyi ayni girdiginizden emin olun');</script>";
      }
      else
      {
        $sql = "UPDATE Kullanici SET kullanici_parolasi='$yeniPass' WHERE kullanici_id=$current_parentID";
        if (mysqli_query($connection, $sql)) {
            echo "<script type='text/javascript'>alert('Sifreniz degistirilmistir');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Hata lutfen tekrar deneyiniz');</script>";
        }

      }
    }
  }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Academic Veli Sayfasi</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/src/css/template.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>AcadeMic</h3>
                </div>
                <ul class="list-unstyled components">
                    <p>Veli Anasayfa</p>

<!---**********************************************'Duyurular' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li>
                        <a href="#" onclick="showAnnouncements(<?php echo $current_parentId; ?>)">Duyurular</a>
                        <script>
                        function showAnnouncements(parent_url) {

                          if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                          } else { // code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange=function() {
                            if (this.readyState==4 && this.status==200) {
                              document.getElementById("parentContent").innerHTML=this.responseText;
                            }
                          }
                          xmlhttp.open("GET","parent_announcement.php?q="+parent_url,true);
                          xmlhttp.send();
                        }
                        </script>
                    </li>

<!---**********************************************'Toplantilar' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li>
                      <a href="#Toplanti" onclick="showToplanti(<?php echo $current_parentID; ?>)">Toplantilar</a>
                      <script>
                      function showToplanti(veli_url) {
                        if (window.XMLHttpRequest) {
                          // code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                          if (this.readyState==4 && this.status==200) {
                            document.getElementById("parentContent").innerHTML=this.responseText;
                          }
                        }
                        xmlhttp.open("GET","parent_toplanti.php?q="+veli_url,true);
                        xmlhttp.send();
                      }
                      </script>
                    </li>

<!---**********************************************'Geziler' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li>
                      <a href="#Geziler" onclick="showGeziler(<?php echo $current_parentID; ?>)">Geziler</a>
                      <script>
                      function showGeziler(veli_url) {
                        if (window.XMLHttpRequest) {
                          // code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                          if (this.readyState==4 && this.status==200) {
                            document.getElementById("parentContent").innerHTML=this.responseText;
                          }
                        }
                        xmlhttp.open("GET","parent_classTrip.php?q="+veli_url,true);
                        xmlhttp.send();
                      }
                      </script>
                    </li>

<!---**********************************************'Not Dokumu' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li>
                      <a href="#NotDokumu" onclick="showGradesParent(<?php echo $current_ogrenciId; ?>)">Not Dokumu</a>
                      <script>
                      function showGradesParent(ogrenci_url) {

                        if (window.XMLHttpRequest) {
                          // code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                          if (this.readyState==4 && this.status==200) {
                            document.getElementById("parentContent").innerHTML=this.responseText;
                          }
                        }
                        xmlhttp.open("GET","parent_grades.php?q="+ogrenci_url,true);
                        xmlhttp.send();
                      }
                      </script>
                    </li>

<!---**********************************************'Ders Programi' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                    <li>
                      <a href="#DersProg" onclick="showClassSchedule(<?php echo $current_ogrenciId; ?>)">Ders Programi</a>
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
                            document.getElementById("parentContent").innerHTML=this.responseText;
                          }
                        }
                        xmlhttp.open("GET","parent_classSchedule.php?q="+ogrenci_url,true);
                        xmlhttp.send();
                      }
                      </script>
                    </li>

<!---**********************************************'Ogrenci Durumu' Content Begins ------------------------------------------------------------------------------------------------------------------------->

          <li class="active">
                <a href="#OgrenciDurumu" data-toggle="collapse" aria-expanded="false">????renci Durumu</a>
                <script>
                function showOgrenciDurumu(veli_url) {
                  if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                  } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                      document.getElementById("parentContent").innerHTML=this.responseText;
                    }
                  }
                  xmlhttp.open("GET","parent_evaluation.php?q="+veli_url,true);
                  xmlhttp.send();
                }
                </script>
                <ul class="collapse list-unstyled" id="OgrenciDurumu">
                  <?php
                    $connection = mysqli_connect('localhost', 'root', 'root', 'db_academic', '8889', '/Applications/MAMP/tmp/mysql/mysql.sock');
                    if ($connection) {
                        $sql = "SELECT d.ders_adi
                                FROM Veli AS v, Ogrenci AS o, Sinif_Ders_Programi AS sdp, Ders d
                                WHERE v.veli_id = $current_parentID AND v.ogrenci_id = o.ogrenci_id AND o.sinif_id = sdp.sinif_id AND o.sube_id = sdp.sube_id AND sdp.ders_id = d.ders_id";
                        $result = mysqli_query($connection, $sql);
                        while ($row_log = mysqli_fetch_row($result)) {
                            $ders_adi = $row_log[0];
                            ?>
                            <li><a href="#" onclick="showOgrenciDurumu(<?php echo $current_parentID; ?>)" class="OgrenciDurumu" id="<?php echo $ders_adi; ?>" name="<?php echo $ders_adi; ?>"><?php echo $ders_adi; ?></a></li>
                            <?php
                        }
                    }
                    mysqli_free_result($result);
                    mysqli_close($connection);
                ?>
                <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                <script>
                    $( ".OgrenciDurumu" ).click(function() {
                      var ders_adi = this.id;
                      document.cookie = "ders_adi=" + ders_adi + ";";
                      $("#parentContent").load('parent_evaluation.php');
                    });

                </script>
              </ul>
            </li>

<!---**********************************************'Iletisim' Content Begins ------------------------------------------------------------------------------------------------------------------------->

                          <li>
                            <a href="#Iletisim" onclick="showIletisim(<?php echo $current_parentID; ?>)">Iletisim</a>
                            <script>
                            function showIletisim(veli_url) {
                              if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp=new XMLHttpRequest();
                              } else { // code for IE6, IE5
                                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                              }
                              xmlhttp.onreadystatechange=function() {
                                if (this.readyState==4 && this.status==200) {
                                  document.getElementById("parentContent").innerHTML=this.responseText;
                                }
                              }
                              xmlhttp.open("GET","parent_iletisim.php?q="+veli_url,true);
                              xmlhttp.send();
                            }
                            </script>
                          </li>

                        </ul>
                    </nav>

<!---********************************************** Page Content Holder ------------------------------------------------------------------------------------------------------------------------->

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
                                <li><a href="#"><?php echo $veli_adi." ".$veli_soyadi; ?></a></li>
                                <li><a data-toggle = "modal" class="button" name="changepass" id="changepass" data-target = "#sifre_degistir_Modal">Sifremi degistir</a></li>
                                <li><a href="logout.php"><?php echo "Guvenli cikis"; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                    <div id="parentContent"><b></b></div>

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
