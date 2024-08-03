
<?php
$sayfa="Kullanıcılar";
include('inc/ahead.php');



?>
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kullanıcı Güncelleme</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kullanıcılar</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <!-- Ekle Butonu -->
                                <button type="button" class="btn btn-primary float-end" onclick="window.location.href='kullaniciekle.php'">Ekle</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <?php
                                        $sorgu=$baglanti->prepare(query: "SELECT * FROM kayıtformu");
                                        $sorgu->execute();
                                        while($sonuc=$sorgu->fetch()){

                                        
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Ad</th>
                                                <th>Soyad</th>
                                                <th>Doğum Tarihi</th>
                                                <th>E-posta</th>
                                                <th>Kullanıcı Adı</th>
                                                <th>Şifre</th>
                                                <th>Kayıt Tarihi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc["id"]?></td>
                                                <td><?=$sonuc["ad"]?></td>
                                                <td><?=$sonuc["soyad"]?></td>
                                                <td><?=$sonuc["dogumtarihi"]?></td>
                                                <td><?=$sonuc["eposta"]?></td>
                                                <td><?=$sonuc["kullaniciadi"]?></td>
                                                <td><?=$sonuc["sifre"]?></td>
                                                <td><?=$sonuc["tarih"]?></td>
                                                <td class="text-center" ><a href="kullaniciGuncelle.php?id=<?=$sonuc["id"]?>">
                                                    <span class="fa fa-edit fa-2x" >
                                                    </span></a>
                                                </td>
                                                <td class="text-center" >
                                                        
                                                    
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
                                                                    <a href="kullanicisil.php?id=<?=$sonuc["id"]?> &tablo=onecikanlar" class="btn btn-danger">Sil</a>
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
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
    </main>

<?php
include('inc/afooter.php');
?>
