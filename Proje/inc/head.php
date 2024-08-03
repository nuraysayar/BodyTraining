<?php
include("../../inc/vt.php");

$sorgu=$baglanti->prepare(query: "SELECT * FROM kategoriler");
$sorgu->execute();
$sonuc=$sorgu->fetch();
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title><?= $sayfa ?></title>
</head>
<body class="bg-light">
    <header>
        <section class="top-bar">
            <div class="container">
                <div class="row gy-3 align-items-center">
                    <div class="col-md-3">
                        <a href="index.php" class="navbar-brand"> <img src="img/logo.png" alt="", class="col-lg-3 col-sm-3 col-3"></a>
                    </div>
                    <div class="col-5">
                        <nav class="navbar">
                            <ul class="navbar-list">
                                <li><a href="anasayfa.php">Anasayfa</a></li>
                                <li class="dropdown">
                                    <ul class="demo-dropdown">
                                        <li><a href="">Kategoriler</a>
                                            <ul>
                                            <?php 
                                            $kategori=$baglanti->prepare(query: "SELECT * FROM kategori WHERE aktif=1 ORDER BY sıra ");
                                            $kategori->execute();
                                            while($kategori_sonuc=$kategori->fetch())
                                            {
                                            
                                            ?>
                                            <li><a class="main-category" ><?= $kategori_sonuc["baslik"] ?></a>
                                            <?php 
                                            $alt_kategori=$baglanti->prepare(query: "SELECT * FROM alt_kategori WHERE aktif=1 and kategori_id=".$kategori_sonuc['id']." ORDER BY sıra ");
                                            $alt_kategori->execute();
                                            while($alt_kategori_sonuc=$alt_kategori->fetch())
                                            {
                                            
                                            ?>
                                            <a href="antrenmanlar.php?kategori=<?=$kategori_sonuc["id"]?>&alt=<?=$alt_kategori_sonuc["id"]?>" ><?php  echo $alt_kategori_sonuc["baslik"];?></a>
                                            <?php }?>
                                        </li>
                                            <?php }?>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="onecikanlar.php">Öne Çıkanlar</a></li>
                            </ul>
                        </nav>

                    </div>
                    <div class="order-lg-last col-1">
                        <div class="text-end">
                            <div class="login-dropdown">
                                <?php if(isset($_SESSION["kullaniciadi"])) { ?>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light"><i class="fa fa-user"></i><?php echo $_SESSION["kullaniciadi"];?></a>
                                        <ul class="login-dropdown-menu">
                                            <?php 
                                            $giris_kategori=$baglanti->prepare(query: "SELECT * FROM giris_buton WHERE aktif=1 ORDER BY sıra ");
                                            $giris_kategori->execute();
                                            while($kategori_sonuc=$giris_kategori->fetch())
                                            {
                                            ?>
                                            <li><a href="<?=$kategori_sonuc["link"]?>" class="main-category"><?=$kategori_sonuc["alt_baslik"]?></a></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <a href="giris.php" class="btn btn-light"><i class="fa fa-user"></i> <span class="ms-1 d-none d-sm-inline-block">Giriş</span></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-12">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Ara">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </header>