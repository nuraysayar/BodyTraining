
<?php

include('inc/ahead.php');

if($_SESSION["yetki"]!="1"){
    //ERROR ALERT EKLE
}
if ($_POST) {
    $query = "UPDATE anasayfa 
              SET 
              `İÇGSY` = ?, 
              `İÇGSY_alt` = ?,
              `İÇGSY_görsel` = ?, 
              `KY`= ?, 
              `KY_alt` = ?, 
              `KY_görsel` = ?, 
              `SÖEAP` = ?, `ÖÇAK` = ?, 
              `BizeKatıl` = ?, 
              `BizeKatıl_alt` = ?, 
              `BizeKatıl_görsel` = ?, 
              `SSS` = ?, `SSS_görsel` =?, 
              `SSS1` = ?, `SSS1_alt` = ?, 
              `SSS2` = ?, `SSS2_alt` = ?, 
              `SSS3` = ?, `SSS3_alt` = ? 
              WHERE `id`= ?";
    
    $stmt = $baglanti->prepare($query);
    
    $guncelle = $stmt->execute([
        $_POST["İÇGSY"],
        $_POST["İÇGSY_alt"],
        $_POST["İÇGSY_görsel"],
         $_POST["KY"],
        $_POST["KY_alt"],
        $_POST["KY_görsel"],
         $_POST["SÖEAP"],
        $_POST["ÖÇAK"],
         $_POST["BizeKatıl"],
         $_POST["BizeKatıl_alt"],
        $_POST["BizeKatıl_görsel"],
        $_POST["SSS"],
         $_POST["SSS_görsel"],
         $_POST["SSS1"],
         $_POST["SSS1_alt"],
        $_POST["SSS2"],
         $_POST["SSS2_alt"],
         $_POST["SSS3"],
        $_POST["SSS3_alt"],
        $_GET["id"]
    ]);
    
    if ($guncelle) {
        echo '<script>Swal.fire("Başarılı", "Güncelleme Başarılı.", "success");</script>';
    }
}

$sorgu=$baglanti->prepare(query: "SELECT * FROM anasayfa WHERE id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();
?>
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Anasayfa Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Anasayfa Güncelle</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <lable>İÇGSY</lable>
                                        <input type="text" name="İÇGSY" required class="form-control" value="<?=$sonuc["İÇGSY"]?>">
                                    </div>
                                    <div class="form-group">
                                        <lable>İÇGSY_alt</lable>
                                        <input type="text" name="İÇGSY_alt" required class="form-control" value="<?=$sonuc["İÇGSY_alt"]?>">
                                    </div><div class="form-group">
                                        <lable>İÇGSY_görsel</lable>
                                        <input type="text" name="İÇGSY_görsel" required class="form-control" value="<?=$sonuc["İÇGSY_görsel"]?>">
                                    </div><div class="form-group">
                                        <lable>KY</lable>
                                        <input type="text" name="KY" required class="form-control" value="<?=$sonuc["KY"]?>">
                                    </div><div class="form-group">
                                        <lable>KY_alt</lable>
                                        <input type="text" name="KY_alt" required class="form-control" value="<?=$sonuc["KY_alt"]?>">
                                    </div><div class="form-group">
                                        <lable>KY_görsel</lable>
                                        <input type="text" name="KY_görsel" required class="form-control" value="<?=$sonuc["KY_görsel"]?>">
                                    </div><div class="form-group">
                                        <lable>SÖEAP</lable>
                                        <input type="text" name="SÖEAP" required class="form-control" value="<?=$sonuc["SÖEAP"]?>">
                                    </div><div class="form-group">
                                        <lable>ÖÇAK</lable>
                                        <input type="text" name="ÖÇAK" required class="form-control" value="<?=$sonuc["ÖÇAK"]?>">
                                    </div><div class="form-group">
                                        <lable>BizeKatıl</lable>
                                        <input type="text" name="BizeKatıl" required class="form-control" value="<?=$sonuc["BizeKatıl"]?>">
                                    </div><div class="form-group">
                                        <lable>BizeKatıl_alt</lable>
                                        <input type="text" name="BizeKatıl_alt" required class="form-control" value="<?=$sonuc["BizeKatıl_alt"]?>">
                                    </div><div class="form-group">
                                        <lable>BizeKatıl_görsel</lable>
                                        <input type="text" name="BizeKatıl_görsel" required class="form-control" value="<?=$sonuc["BizeKatıl_görsel"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS</lable>
                                        <input type="text" name="SSS" required class="form-control" value="<?=$sonuc["SSS"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS_görsel</lable>
                                        <input type="text" name="SSS_görsel" required class="form-control" value="<?=$sonuc["SSS_görsel"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS1</lable>
                                        <input type="text" name="SSS1" required class="form-control" value="<?=$sonuc["SSS1"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS1_alt</lable>
                                        <input type="text" name="SSS1_alt" required class="form-control" value="<?=$sonuc["SSS1_alt"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS2</lable>
                                        <input type="text" name="SSS2" required class="form-control" value="<?=$sonuc["SSS2"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS2_alt</lable>
                                        <input type="text" name="SSS2_alt" required class="form-control" value="<?=$sonuc["SSS2_alt"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS3</lable>
                                        <input type="text" name="SSS3" required class="form-control" value="<?=$sonuc["SSS3"]?>">
                                    </div><div class="form-group">
                                        <lable>SSS3_alt</lable>
                                        <input type="text" name="SSS3_alt" required class="form-control" value="<?=$sonuc["SSS3_alt"]?>">
                                    </div>
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
