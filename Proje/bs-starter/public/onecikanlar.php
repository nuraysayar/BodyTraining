<?php
$sayfa="Öne Çıkanlar";
include("../../inc/vt.php");
include("../../inc/head.php");

$sorgu=$baglanti->prepare(query: "SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>

      
<div class="container">
    <section class="pt-3">
        <div>
            <header>
                <br><br><h3 class="mb-md-3 mb-0"><?= $sonuc["SÖEAP"] ?></h3> <br>
            </header>
            <div class="row">
                <?php

                    $sorgu2=$baglanti->prepare(query: "SELECT * FROM söeap WHERE aktif=1 ORDER BY sıra ");
                    $sorgu2->execute();
                    while($sonuc2=$sorgu2->fetch())
                    {
                ?>

                <div class="col-3">
                    <div class="card">
                        <img src="img/<?= $sonuc2["görsel"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <span class="topbar">
                                    <form method="post">
                                        <input type="hidden" name="antrenman_id" value="<?=$sonuc["id"]?>">
                                        <button type="submit" name="favori"  class="float-end"><i class="fa fa-regular fa-heart fa-lg"></i></button>
                                    </form>
                                </span>
                            <a href="details.php?id=<?=$sonuc2["id"] ?>" class="title text-truncate"><h5><?=$sonuc2["başlık"] ?></h5></a>
                          <p class="card-text"><?= $sonuc2["açıklama"] ?></p>
                        </div>
                      </div>
                </div>

                <?php
                }
                ?>
                
            </div>
        </div>
        <div>
            <header>
                <br><br><h3 class="mb-md-3 mb-0"><?= $sonuc["ÖÇAK"] ?></h3> <br>
            </header>
            <div class="row">
                <?php

                    $sorgu3=$baglanti->prepare(query: "SELECT * FROM öçak WHERE aktif=1 ORDER BY sıra ");
                    $sorgu3->execute();
                    while($sonuc3=$sorgu3->fetch())
                    {
                ?>

                <div class="col-3">
                    <div class="card">
                        <img src="img/<?= $sonuc3["görsel"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <span class="topbar">
                                    <form method="post">
                                        <input type="hidden" name="antrenman_id" value="<?=$sonuc["id"]?>">
                                        <button type="submit" name="favori"  class="float-end"><i class="fa fa-regular fa-heart fa-lg"></i></button>
                                    </form>
                                </span>
                            <a href="details.php?id=<?=$sonuc3["id"] ?>" class="title text-truncate"><h5><?=$sonuc3["başlık"] ?></h5></a>
                          <p class="card-text"><?= $sonuc3["açıklama"] ?></p>
                        </div>
                      </div>
                </div>

                <?php
                }
                ?>
                
            </div>
        </div>
        <div>
            <header>
                <br><br><h3 class="mb-md-3 mb-0">Senin İçin Seçtiklerimiz</h3> <br>
            </header>
            <div class="row">
                <?php

                    $sorgu4=$baglanti->prepare(query: "SELECT * FROM sis WHERE aktif=1 ORDER BY sıra ");
                    $sorgu4->execute();
                    while($sonuc4=$sorgu4->fetch())
                    {
                ?>

                <div class="col-3">
                    <div class="card">
                        <img src="img/<?= $sonuc4["görsel"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <span class="topbar">
                                    <form method="post">
                                        <input type="hidden" name="antrenman_id" value="<?=$sonuc["id"]?>">
                                        <button type="submit" name="favori"  class="float-end"><i class="fa fa-regular fa-heart fa-lg"></i></button>
                                    </form>
                                </span>
                            <a href="details.php?id=<?=$sonuc4["id"] ?>" class="title text-truncate"><h5><?=$sonuc4["başlık"] ?></h5></a>
                          <p class="card-text"><?= $sonuc4["açıklama"] ?></p>
                        </div>
                      </div>
                </div>

                <?php
                }
                ?>
                
            </div>
        </div>
        <div>
            <header>
                <br><br><h3 class="mb-md-3 mb-0">Ev İçin İdeal</h3> <br>
            </header>
            <div class="row">
                <?php

                    $sorgu5=$baglanti->prepare(query: "SELECT * FROM eia WHERE aktif=1 ORDER BY sıra ");
                    $sorgu5->execute();
                    while($sonuc5=$sorgu5->fetch())
                    {
                ?>

                <div class="col-3">
                    <div class="card">
                        <img src="img/<?= $sonuc5["görsel"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <span class="topbar">
                                    <form method="post">
                                        <input type="hidden" name="antrenman_id" value="<?=$sonuc["id"]?>">
                                        <button type="submit" name="favori"  class="float-end"><i class="fa fa-regular fa-heart fa-lg"></i></button>
                                    </form>
                                </span>
                            <a href="details.php?id=<?=$sonuc["id"] ?>" class="title text-truncate"><h5><?=$sonuc5["başlık"] ?></h5></a>
                          <p class="card-text"><?= $sonuc5["açıklama"] ?></p>
                        </div>
                      </div>
                </div>

                <?php
                }
                ?>
                
            </div>
        </div>
    </section>
</div>
    <br><br>

<?php
include("../../inc/footer.php");
?>