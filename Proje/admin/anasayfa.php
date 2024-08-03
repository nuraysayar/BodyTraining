<?php
include('inc/ahead.php');
$sayfa="Anasayfa";
$sorgu=$baglanti->prepare(query: "SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();

?>
    <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Anasayfa Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Anasayfa</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <tr>
                                                <th>İÇGSY</th>
                                                <th>İÇGSY-alt</th>
                                                <th>İÇGSY-görsel</th>
                                                <th>KY</th>
                                                <th>KY-alt</th>
                                                <th>KY-görsel</th>
                                                <th>SÖEAP</th>
                                                <th>ÖÇAK</th>
                                                <th>BizeKatıl</th>
                                                <th>BizeKatıl-alt</th>
                                                <th>BizeKatıl-görsel</th>
                                                <th>SSS</th>
                                                <th>SSS-görsel</th>
                                                <th>SSS1</th>
                                                <th>SSS1-alt</th>
                                                <th>SSS2</th>
                                                <th>SSS2-alt</th>
                                                <th>SSS3</th>
                                                <th>SSS3-alt</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?=$sonuc["İÇGSY"]?></td>
                                                <td><?=$sonuc["İÇGSY_alt"]?></td>
                                                <td><?=$sonuc["İÇGSY_görsel"]?></td>
                                                <td><?=$sonuc["KY"]?></td>
                                                <td><?=$sonuc["KY_alt"]?></td>
                                                <td><?=$sonuc["KY_görsel"]?></td>
                                                <td><?=$sonuc["SÖEAP"]?></td>
                                                <td><?=$sonuc["ÖÇAK"]?></td>
                                                <td><?=$sonuc["BizeKatıl"]?></td>
                                                <td><?=$sonuc["BizeKatıl_alt"]?></td>
                                                <td><?=$sonuc["BizeKatıl_görsel"]?></td>
                                                <td><?=$sonuc["SSS"]?></td>
                                                <td><?=$sonuc["SSS_görsel"]?></td>
                                                <td><?=$sonuc["SSS1"]?></td>
                                                <td><?=$sonuc["SSS1_alt"]?></td>
                                                <td><?=$sonuc["SSS2"]?></td>
                                                <td><?=$sonuc["SSS2_alt"]?></td>
                                                <td><?=$sonuc["SSS3"]?></td>
                                                <td><?=$sonuc["SSS3_alt"]?></td>
                                                <td class="text-center" ><a href="anasayfaGuncelle.php?id=<?=$sonuc["id"]?>">
                                                    <span class="fa fa-edit fa-2x" >
                                                    </span></a>
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
