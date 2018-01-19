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
                        <a href="#">Duyurular</a>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Derslerim</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Matematik</a></li>
                            <li><a href="#">Turkce</a></li>
                            <li><a href="#">Fen Bilgisi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Ders Programim</a>
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
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2>Baslik</h2>
                <p> Icerik </p>
                <div class="line"></div>

                <h2>Baslik2</h2>
                <p> Icerik2</p>
                <div class="line"></div>

                <h2>Baslik3</h2>
                <p> Icerik3 </p>
                <div class="line"></div>

                <h3>Baslik4</h3>
                <p> Icerik4</p>
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
