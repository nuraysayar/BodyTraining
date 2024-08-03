
<?php

include('inc/ahead.php');

if($_SESSION["yetki"]!="1"){
    //ERROR ALERT EKLE
}
if ($_POST) {
    $query = "UPDATE kayıtformu 
              SET 
              `ad` = ?, 
              `soyad` = ?,
              `eposta` = ?, 
              `dogumtarihi`= ?, 
              `kullaniciadi` = ?, 
              `sifre` = ?, 
              `tarih` = ?
              WHERE `id`= ?";
    
    $stmt = $baglanti->prepare($query);
    $currentDate = date('Y-m-d H:i:s');
    $guncelle = $stmt->execute([
        $_POST["ad"],
        $_POST["soyad"],
        $_POST["eposta"],
        $_POST["dogumtarihi"],
        $_POST["kullaniciadi"],
        $_POST["sifre"],
        $currentDate,  
        $_GET["id"]
    ]);
    
    if ($guncelle) {
        echo '<script>Swal.fire("Başarılı", "Güncelleme Başarılı", "success");</script>';
    }
}

$sorgu=$baglanti->prepare(query: "SELECT * FROM kayıtformu WHERE id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
?>
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kullanıcı Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kullanıcı Güncelle</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <lable>Ad</lable>
                                        <input type="text" name="ad" required class="form-control" value="<?=$sonuc["ad"]?>">
                                    </div>
                                    <div class="form-group">
                                        <lable>Soyad</lable>
                                        <input type="text" name="soyad" required class="form-control" value="<?=$sonuc["soyad"]?>">
                                    </div><div class="form-group">
                                        <lable>E-posta</lable>
                                        <input type="text" name="eposta" required class="form-control" value="<?=$sonuc["eposta"]?>">
                                    </div><div class="form-group">
                                        <lable>Doğum Tarihi</lable>
                                        <input type="text" name="dogumtarihi" required class="form-control" value="<?=$sonuc["dogumtarihi"]?>">
                                    </div><div class="form-group">
                                        <lable>Kullanıcı Adı</lable>
                                        <input type="text" name="kullaniciadi" required class="form-control" value="<?=$sonuc["kullaniciadi"]?>">
                                    </div><div class="form-group">
                                        <lable>Şifre</lable>
                                        <input type="text" name="sifre" required class="form-control" value="<?=$sonuc["sifre"]?>">
                                    </div><div class="form-group">
                                        <input type="submit" value="Güncelle" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </main>

<?php
include('inc/afooter.php');
?>
