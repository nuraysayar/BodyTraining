<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$sayfa="Giriş";
include("../../inc/vt.php");
include("../../inc/head.php");

$name_err=$lastname_err=$mail_err=$date_err=$username_err=$password_err=$passwordtkr_err="";

$giris_password_err=$giris_username_err="";

        //giriş Kontrolü
        if(isset($_POST["login"])){

          //Kullanıcı Adı Sorgusu
          if(empty($_POST["username"])){

            $giris_username_err="Kullanıcı adı boş geçilemez.";
          }
          else{
            $giris_username=$_POST["username"];
          }

          //Parola Sorgusu
          if(empty($_POST["password"])){

            $giris_password_err="Şifre boş geçilemez.";
          }
          else{
            $giris_password=$_POST["password"];
          }


          $secim= "SELECT * FROM kayıtformu WHERE kullaniciadi = '$giris_username'";
          $kayitsayisi= $baglanti->query($secim);

          if($kayitsayisi-> rowCount() > 0)
          {
            $ilgilikayit = $kayitsayisi->fetch();
            $hashlisifre= $ilgilikayit["sifre"];
              
            if($giris_password == $hashlisifre)
            {
              $_SESSION["kullaniciadi"]=$ilgilikayit["kullaniciadi"];
              $_SESSION["eposta"]=$ilgilikayit["eposta"];
              

            }
            else{
              echo '<script> Swal.fire({ text: "Şifre Yanlış", icon: "error" }); </script>';
            }
          }
          else{
            echo '<script> Swal.fire({ text: "Kullanıcı adı mevcut değil.", icon: "error" }); </script>';
          }

        
        
        }

         $value =0; 
        //Kullanıcı Kaydı 
        if(isset($_POST["kaydet"])){

          //Ad Sorgusu
          if(empty($_POST["txtAd"])){
            $name_err="Ad boş geçilemez.";
            $value++;
          }
          else{
            $name=$_POST["txtAd"];
          }

          //Soyad Sorgusu
          if(empty($_POST["txtSoyad"])){
            $value++;
            $lastname_err="Soyad boş geçilemez.";
          }
          else{
            $lastname=$_POST["txtSoyad"];
          }

          //Eposta Sorgusu
          if(empty($_POST["txtEposta"])){
            $value++;
            $mail_err="E-posta boş geçilemez.";
          }
          elseif (!filter_var($_POST["txtEposta"], FILTER_VALIDATE_EMAIL)) {
            $value++;
            $mail_err = "Geçersiz E-posta formatı.";
          }
          else{
            $mail=$_POST["txtEposta"];
          }

          //Doğum Tarihi Sorgusu
          if(empty($_POST["txtDogumTarihi"])){
            $value++;
            $date_err="Doğum tarihi boş geçilemez.";
          }
          else{
            $date=$_POST["txtDogumTarihi"];
          }

          //Kullanıcı Adı Sorgusu
          if(empty($_POST["txtKullaniciAdi"])){
            $value++;
            $username_err="Kullanıcı Adı boş geçilemez.";
          }
          elseif(strlen($_POST["txtKullaniciAdi"])<6){
            $value++;
            $username_err="Kullanıcı adı en az 6 karakterden oluşmalıdır.";
          }
          else{
            $username=$_POST["txtKullaniciAdi"];
          }

          //Parola Sorgusu
          if(empty($_POST["txtSifre"])){
            $value++;
            $password_err="Şifre boş geçilemez.";
          }
          elseif(strlen($_POST["txtSifre"])>11){
            $password_err="Şifre en fazla 10 karakterden oluşmalıdır.";
          }
          else{
            $password=$_POST["txtSifre"];
          }

          //Parola Tekrar Sorgusu
          if(empty($_POST["txtSifreTkr"])){
            $value++;
            $passwordtkr_err="Şifre boş geçilemez.";
          }
          elseif($_POST["txtSifre"]!=$_POST["txtSifreTkr"]){
            $value++;
            $passwordtkr_err="Şifreler eşleşmiyor.";
          }
          else{
            $password=$_POST["txtSifreTkr"];
          }


          
      if($value==0){
          $sorgu = $baglanti->prepare("INSERT INTO kayıtformu (ad, soyad, eposta, dogumtarihi, kullaniciadi, sifre) VALUES (:ad, :soyad, :eposta, :dogumtarihi, :kullaniciadi, :sifre)");
          $ekle=$sorgu->execute(
            [
              'ad'=>htmlspecialchars($_POST["txtAd"]),
              'soyad'=>htmlspecialchars($_POST["txtSoyad"]),
              'eposta'=>htmlspecialchars($_POST["txtEposta"]),
              'dogumtarihi'=>htmlspecialchars($_POST["txtDogumTarihi"]),
              'kullaniciadi'=>htmlspecialchars($_POST["txtKullaniciAdi"]),
              //'sifre'=>password_hash(htmlspecialchars($_POST["txtSifre"]),PASSWORD_DEFAULT) ,// ŞİFRELENMİŞ ŞİFRE (!!şifreleri kaydetmeyi unutma!!)
              'sifre'=>(htmlspecialchars($_POST["txtSifre"])) ,
            ]
            );

            if($ekle){
              echo '<script> Swal.fire({ text: "Kayıt İşlemi Başarılı", icon: "success" }); </script>';
              
            }else{
              echo '<script> Swal.fire({ text: "Kayıt İşlemi Başarısız", icon: "erros" }); </script>';
            }

        }
      }



?>

    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="giriscard">
              <div class="card-header">
                <ul class="nav nav-tabs" id="myTabs">
                  <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login-form">Giriş Yap</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-form">Kayıt Ol</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="login-form">
                    <form method="post">
                      <div class="form-group">
                        <label for="login-username">Kullanıcı Adı:</label>
                        <input type="text"  name="username" class="form-control" id="login-username" placeholder="Kullanıcı Adı">
                      </div>
                      <div class="form-group">
                        <label for="login-password">Şifre:</label>
                        <input type="password" name="password" class="form-control" id="login-password" placeholder="Şifre">
                      </div>
                      <div class="text-right mt-3">
                        <a href=""></a>
                        <i>
                            <button type="submit" name="login" class="btn btn-primary">Giriş Yap</button>
                        </i>
                        
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="register-form">
                    <form id="contactForm" method="post" >
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="register-firstname">Ad:</label>
                          <input type="text" name="txtAd" value="<?php echo @$_POST["txtAd"]; ?>" class="form-control 
                          
                          <?php
                          if(!empty($name_err))
                          {
                            echo "is-invalid";
                          }
                          ?>
                          
                          " id="register-firstname" placeholder="Ad">
                          <div id="validationServer03Feedback" class="invalid-feedback">
                          <?php
                          echo $name_err;
                          ?>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="register-lastname">Soyad:</label>
                          <input type="text" name="txtSoyad" value="<?php echo @$_POST["txtSoyad"]; ?>"  class="form-control 
                          
                          <?php
                          if(!empty($lastname_err))
                          {
                            echo "is-invalid";
                          }
                          ?>

                          " id="register-lastname" placeholder="Soyad">
                          <div id="validationServer03Feedback" class="invalid-feedback">
                          <?php
                          echo $lastname_err;
                          ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="register-email">E-posta:</label>
                        <input type="text" name="txtEposta" value="<?php echo @$_POST["txtEposta"]; ?>" class="form-control 
                        
                        <?php
                          if(!empty($mail_err))
                          {
                            echo "is-invalid";
                          }
                          ?>
                        
                        " id="register-email" placeholder="E-posta">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                          echo $mail_err;
                        ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="register-birthdate">Doğum Tarihi:</label>
                        <input type="date" name="txtDogumTarihi" value="<?php echo @$_POST["txtDogumTarihi"]; ?>" class="form-control 
                        
                        <?php
                          if(!empty($date_err))
                          {
                            echo "is-invalid";
                          }
                          ?>
                        
                        " id="register-birthdate">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                          echo $date_err;
                        ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="register-username">Kullanıcı Adı:</label>
                        <input type="text" name="txtKullaniciAdi" value="<?php echo @$_POST["txtKullaniciAdi"]; ?>" class="form-control 
                        
                        <?php
                          if(!empty($username_err))
                          {
                            echo "is-invalid";
                          }
                          ?>
                        
                        " id="register-username" placeholder="Kullanıcı Adı" maxlength="20">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                          echo $username_err;
                        ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="register-password">Şifre (Maksimum 10 Karakter):</label>
                        <input type="password" name="txtSifre" value="<?php echo @$_POST["txtSifre"]; ?>" class="form-control 
                        
                        <?php
                          if(!empty($password_err))
                          {
                            echo "is-invalid";
                          }
                          ?>
                        
                        " id="register-password" placeholder="Şifre" maxlength="10">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                          echo $password_err;
                        ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="register-password">Şifre (Maksimum 10 Karakter):</label>
                        <input type="password" name="txtSifreTkr" value="<?php echo @$_POST["txtSifreTkr"]; ?>" class="form-control 
                        
                        <?php
                          if(!empty($passwordtkr_err))
                          {
                            echo "is-invalid";
                          }
                          ?>
                        
                        " id="register-password" placeholder="Şifre" maxlength="10">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                          echo $passwordtkr_err;
                        ?>.
                        </div>
                      </div>
                      <div class="text-right mt-3">
                        <button type="submit" name="kaydet" class="btn btn-success">Kayıt Ol</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        

    </div>

      <script>
        // Aktif Sekme Seçicisi 
        $(document).ready(function(){
          $('#myTabs a').click(function(e){
            e.preventDefault();
            $(this).tab('show');
          });
        });
      </script>

  <div class="space-between"></div>

<br><br><br><br><br>
<script src="../node_modules/fslightbox/index.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>



<?php
include("../../inc/footer.php");
?>
