<?php
$sayfa="Favoriler";
include("../../inc/vt.php");
include("../../inc/head.php");
$kullanici_adi= $_SESSION["kullaniciadi"];
?>
    <div class="container">
        <section class="pt-3">
                <div>
                    <header>
                        <br><br><h3>Favorilerim</h3> <br>
                    </header>
                    <div class="row">
                        <?php

                            $sorgu2=$baglanti->prepare(query: "SELECT * FROM antrenmanlar WHERE id IN (
                                SELECT antrenman_id FROM favoriler WHERE kullanici_adi='$kullanici_adi'
                                )");
                            $sorgu2->execute();
                            while($sonuc2=$sorgu2->fetch())
                            {
                        ?>

                        <div class="col-3">
                            <div class="card">
                                <img src="img/<?= $sonuc2["görsel"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <span class="topbar">
                                        <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg" ></i>
                                        </a>
                                    </span>
                                    <a href="details.php?id=<?=$sonuc["id"] ?>" class="title text-truncate"><h5><?=$sonuc2["başlık"] ?></h5></a>
                                <p class="card-text"><?= $sonuc2["açıklama"] ?></p>
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






<?php
include("../../inc/footer.php");
?>