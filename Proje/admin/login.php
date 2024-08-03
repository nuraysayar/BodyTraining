<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Kullanıcı Girişi</h3></div>
                                    <div class="card-body">

                                    <?php
                                    session_start();
                                    include("../inc/vt.php");

                                    if(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789"){
                                        header(header:"Location:anasayfa.php");
                                    }
                                    elseif(isset($_COOKIE["çerez"])){
                                        $sorgu=$baglanti->prepare(query: "select kadi,yetki from kullanici where aktif=1 ");
                                        $sorgu->execute();
                                        while($sonuc=$sorgu->fetch()){
                                            if($_COOKIE["çerez"]==$sonuc["yetki"]){
                                                $_SESSION["Oturum"]="6789";
                                                $_SESSION["kadi"]=$sonuc["kadi"];
                                                $_SESSION["yetki"]=$sonuc["yetki"];
                                                header(header:"Location:anasayfa.php");
                                            }
                                        }

                                    }


                                    if($_POST){

                                        $kadi=$_POST["txtKadi"];
                                        $parola=$_POST["txtParola"];

                                    }

                                    ?>

                                        <form method="post" action="login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="txtKadi" value="<?=@$kadi?>" placeholder="Kullanıcı Adı" />
                                                <label for="inputEmail">Kullanıcı Adı</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="txtParola" placeholder="Parola" />
                                                <label for="inputPassword">Parola</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" name="cbHatırla" />
                                                <label class="form-check-label" for="inputRememberPassword">Beni Hatırla</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                               <!-- <a class="small" href="password.html">Parolanızı mı Unuttunuz?</a>-->
                                                <input type="submit" class="btn btn-primary" value="Giriş" />
                                            </div>
                                        </form>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                        <?php

                                        if($_POST){
                                            $sorgu=$baglanti->prepare(query: "select parola,yetki from kullanici where kadi=:kadi and aktif=1 ");
                                            $sorgu->execute(['kadi'=>htmlspecialchars($kadi)]);
                                            $sonuc=$sorgu->fetch();

                                            if($parola==$sonuc["parola"]) {

                                                $_SESSION["Oturum"]="6789";
                                                $_SESSION["kadi"]=$kadi;
                                                $_SESSION["yetki"]=$sonuc["yetki"];

                                                if(isset($_POST["cbHatırla"])){
                                                    setcookie("çerez", $kadi, time()+(60+60+24+7));
                                                }

                                                header(header:"Location:anasayfa.php");

                                            }
                                            else{
                                                echo '<script> Swal.fire({ text: "Kullanıcı Adı veya Şifre Hatalı", icon: "error" }); </script>';
                                            }
                                            
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>
                                <a>Body Training Yönetim Paneli</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
