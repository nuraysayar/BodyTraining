<!--ALT KATEGORİ İÇERİK EKRANI-->

<?php
include('inc/ahead.php');

$id = $_GET["id"];
$sor = $baglanti->prepare("SELECT a.id AS alt_kat_id,a.baslik AS alt_baslik,k.baslik AS kat_baslik,k.id AS kat_id from alt_kategori a inner join kategori k on a.kategori_id=k.id WHERE a.id=".$id);
$sor->execute();
$yaz = $sor->fetch();

?>
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?=$yaz['alt_baslik'] ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?=$yaz['kat_baslik'] ?></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 <!-- Ekle Butonu -->
                                <button type="button" class="btn btn-primary float-end" onclick="window.location.href='ekle.php?id=<?=$id?>'">Ekle</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <?php
                                        $sorgu=$baglanti->prepare(query: "SELECT * FROM antrenmanlar where alt_kategori_id=".$id);
                                        $sorgu->execute();
                                        while($sonuc=$sorgu->fetch()){
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Görsel</th>
                                                <th>Video</th>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Sıra</th>
                                                <th>Aktif</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc["id"]?></td>
                                                <td><img src="../bs-starter/public/img/<?=$sonuc["görsel"]?>" alt="" width="200" height="200">
                                                </td>
                                                <td><video width="200" height="200" controls>
                                                    <source src="../bs-starter/public/video/<?=$sonuc["video"]?>" type="video/mp4">
                                                    </video>
                                                </td>
                                                <td><?=$sonuc["başlık"]?></td>
                                                <td><?=$sonuc["açıklama"]?></td>
                                                <td><?=$sonuc["sıra"]?></td>
                                                <td><span class="fa fa-2x fa-<?=$sonuc["aktif"]=="1" ?"check text-success ":"times text-danger" ?>"></span>
                                                </td>
                                                <td class="text-center" ><?php if($_SESSION["yetki"]){
                                                    ?>

                                                        <a href="altkategoriguncelle.php?id=<?=$sonuc["id"]?>">
                                                        <span class="fa fa-edit fa-2x" ></span></a>
                                                        <?php
                                                }
                                                    ?></td>
                                                    <td class="text-center" >
                                                        
                                                    <?php if($_SESSION["yetki"]){
                                                    ?>
                                                    <a href="#" data-toggle="modal" data-target="#silModal<?=$sonuc["id"]?>"><span class="fa fa-trash fa-2x" ></span></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="silModal<?=$sonuc["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Sil</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Silmek İstediğinizden Emin Miziniz?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                                                    <a href="sil.php?id=<?=$sonuc["id"]?>&kat_id=<?=$id?>" class="btn btn-danger">Sil</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                     }
                                                    ?>
                                                    </td>
                                            </tr>
                                            
                                        </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
    </main>

<?php
include('inc/afooter.php');
?>
