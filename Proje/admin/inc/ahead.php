<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
if(!(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789")){
    header(header:"Location:index.php");
}

include('../inc/vt.php');


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Yönetim Paneli</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="onecikanlar.php">Yönetim Paneli</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Ara" aria-label="Ara" aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!--<li><a class="dropdown-item" href="#!">Ayarlar</a></li>-->
                        <!--<li><a class="dropdown-item" href="#!">Aktivasyon</a></li>-->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#LogoutModal">Çıkış</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Çıkış</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Çıkış Yapmak istediğinizden Emin Miziniz?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        <a href="logout.php" class="btn btn-danger">Çıkış</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Sayfalar</div>
                            <a class="nav-link collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Anasayfa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link " href="anasayfa.php">Anasayfa</a>
                                    <a class="nav-link " href="onecikanlar.php">Öne Çıkanlar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kategoriler
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                <?php 
                                        $sor = $baglanti->prepare("SELECT * FROM alt_kategori ");
                                        $sor->execute();
                                        foreach($sor->fetchAll() as $yaz){
                                            ?>
                                            <a class="nav-link " href="antrenmanodagi.php?id=<?=$yaz["id"];?>"><?=$yaz["baslik"];?></a>
                                            <?php
                                        }
                                    ?>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="kullanici.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kullanıcılar
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="iletisim.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                İletişim
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="yorum.php"  >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Yorumlar
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="favori.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Favoriler
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Giriş Yapan:</div>
                        <?=$_SESSION["kadi"] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">