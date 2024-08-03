<?php
$sayfa="Kullanıcı Profili";
include("../../inc/vt.php");
include("../../inc/head.php");
?>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="profilecard">
          <div class="card-body">
            <h4 class="card-title">Profil Bilgileri Güncelleme</h4>
            <form>
              <div class="form-group">
                <label for="inputFirstName">Ad</label>
                <input type="text" class="form-control" id="inputFirstName" placeholder="Adınız">
              </div>
              <div class="form-group">
                <label for="inputLastName">Soyad</label>
                <input type="text" class="form-control" id="inputLastName" placeholder="Soyadınız">
              </div>
              <div class="form-group">
                <label for="inputDOB">Doğum Tarihi</label>
                <input type="date" class="form-control" id="inputDOB">
              </div>
              <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email adresiniz">
              </div>
              <div class="form-group">
                <label for="inputUsername">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="inputUsername" placeholder="Kullanıcı adınız">
              </div>
              <div class="form-group">
                <label for="inputPassword">Şifre</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Şifreniz">
              </div>
              <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Bilgileri Güncelle</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Bootstrap JS ve Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<br><br><br><br>
<?php
include("../../inc/footer.php");
?>
