
<?php
$sayfa="Öne Çıkanlar";
include('inc/ahead.php');



?>
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Öne Çıkanlar Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Öne Çıkanlar</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <?php
                                        $sorgu=$baglanti->prepare(query: "SELECT * FROM söeap");
                                        $sorgu->execute();
                                        while($sonuc=$sorgu->fetch()){

                                        
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Görsel</th>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Sıra</th>
                                                <th>Aktif</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc["id"]?></td>
                                                <td><img src="../bs-starter/public/img/<?=$sonuc["görsel"]?>" alt="" width="200" height="200" >
                                                </td>
                                                <td><?=$sonuc["başlık"]?></td>
                                                <td><?=$sonuc["açıklama"]?></td>
                                                <td><?=$sonuc["sıra"]?></td>
                                                <td><span class="fa fa-2x fa-<?=$sonuc["aktif"]=="1" ?"check text-success ":"times text-danger" ?>"></span>
                                                </td>
                                                <td class="text-center" ><?php if($_SESSION["yetki"]){
                                                    ?>

                                                        <a href="onecikanlarGuncelle.php?id=<?=$sonuc["id"]?>">
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
                                                                    <a href="sil.php?id=<?=$sonuc["id"]?> &tablo=onecikanlar" class="btn btn-danger">Sil</a>
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
                                        <?php
                                        
                                        $sorgu1=$baglanti->prepare(query: "SELECT * FROM öçak");
                                        $sorgu1->execute();
                                        while($sonuc1=$sorgu1->fetch()){
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Görsel</th>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Sıra</th>
                                                <th>Aktif</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc1["id"]?></td>
                                                <td><img src="../bs-starter/public/img/<?=$sonuc1["görsel"]?>" alt="" width="200" height="200" ></td>
                                                <td><?=$sonuc1["başlık"]?></td>
                                                <td><?=$sonuc1["açıklama"]?></td>
                                                <td><?=$sonuc1["sıra"]?></td>
                                                <td><span class="fa fa-2x fa-<?=$sonuc1["aktif"]=="1" ?"check text-success ":"times text-danger" ?>"></span>
                                                </td>
                                                <td class="text-center" ><?php if($_SESSION["yetki"]){
                                                    ?>

                                                        <a href="onecikanlarGuncelle.php?id=<?=$sonuc1["id"]?>">
                                                        <span class="fa fa-edit fa-2x" ></span></a>
                                                        <?php
                                                }
                                                    ?></td>
                                                    <td class="text-center" >
                                                        
                                                    <?php if($_SESSION["yetki"]){
                                                    ?>
                                                    <a href="#" data-toggle="modal" data-target="#silModal<?=$sonuc1["id"]?>"><span class="fa fa-trash fa-2x" ></span></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="silModal<?=$sonuc1["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                    <a href="sil.php?id=<?=$sonuc1["id"]?> &tablo=onecikanlar" class="btn btn-danger">Sil</a>
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
                                        <?php
                                        
                                        $sorgu2=$baglanti->prepare(query: "SELECT * FROM sis");
                                        $sorgu2->execute();
                                        while($sonuc2=$sorgu2->fetch()){
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Görsel</th>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Sıra</th>
                                                <th>Aktif</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc2["id"]?></td>
                                                <td><img src="../bs-starter/public/img/<?=$sonuc2["görsel"]?>" alt="" width="200" height="200" ></td>
                                                <td><?=$sonuc2["başlık"]?></td>
                                                <td><?=$sonuc2["açıklama"]?></td>
                                                <td><?=$sonuc2["sıra"]?></td>
                                                <td><span class="fa fa-2x fa-<?=$sonuc2["aktif"]=="1" ?"check text-success ":"times text-danger" ?>"></span>
                                                </td>
                                                <td class="text-center" ><?php if($_SESSION["yetki"]){
                                                    ?>

                                                        <a href="onecikanlarGuncelle.php?id=<?=$sonuc2["id"]?>">
                                                        <span class="fa fa-edit fa-2x" ></span></a>
                                                        <?php
                                                }
                                                    ?></td>
                                                    <td class="text-center" >
                                                        
                                                    <?php if($_SESSION["yetki"]){
                                                    ?>
                                                    <a href="#" data-toggle="modal" data-target="#silModal<?=$sonuc2["id"]?>"><span class="fa fa-trash fa-2x" ></span></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="silModal<?=$sonuc2["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                    <a href="sil.php?id=<?=$sonuc2["id"]?> &tablo=onecikanlar" class="btn btn-danger">Sil</a>
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
                                        <?php
                                        
                                        $sorgu3=$baglanti->prepare(query: "SELECT * FROM eia");
                                        $sorgu3->execute();
                                        while($sonuc3=$sorgu3->fetch()){

                                        ?>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Görsel</th>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th>Sıra</th>
                                                <th>Aktif</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc3["id"]?></td>
                                                <td><img src="../bs-starter/public/img/<?=$sonuc3["görsel"]?>" alt="" width="200" height="200" ></td>
                                                <td><?=$sonuc3["başlık"]?></td>
                                                <td><?=$sonuc3["açıklama"]?></td>
                                                <td><?=$sonuc3["sıra"]?></td>
                                                <td><span class="fa fa-2x fa-<?=$sonuc3["aktif"]=="1" ?"check text-success ":"times text-danger" ?>"></span>
                                                </td>
                                                <td class="text-center" ><?php if($_SESSION["yetki"]){
                                                    ?>

                                                        <a href="onecikanlarGuncelle.php?id=<?=$sonuc3["id"]?>">
                                                        <span class="fa fa-edit fa-2x" ></span></a>
                                                        <?php
                                                }
                                                    ?></td>
                                                    <td class="text-center" >
                                                    <?php if($_SESSION["yetki"]){
                                                    ?>
                                                    <a href="#" data-toggle="modal" data-target="#silModal<?=$sonuc3["id"]?>"><span class="fa fa-trash fa-2x" ></span></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="silModal<?=$sonuc3["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                                    <a href="sil.php?id=<?=$sonuc3["id"]?> &tablo=onecikanlar" class="btn btn-danger">Sil</a>
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
