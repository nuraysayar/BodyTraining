<?php
$sayfa="Body Training";
include("../../inc/head.php");

$sorgu=$baglanti->prepare(query: "SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();

?>

    <section class="background">
        <div>
            <main class="back">
                <div id="homepage" class="showcase">
                </div>
            </main>
        </div>
    </section>
    <br>
    <div class="container">
        <section class="d-flex ">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <img src="img/<?= $sonuc["İÇGSY_görsel"] ?>" class="home-img" alt="">
                        <br><br>
                        <div>
                            <a class="title text-truncate"><h4><?= $sonuc["İÇGSY"] ?></h4></a>
                            <p class="card-text"><?= $sonuc["İÇGSY_alt"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <section class="d-flex ">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <img src="img/<?= $sonuc["KY_görsel"] ?>" class="home-img" alt="">
                        <br><br>
                        <div>
                            <a class="title text-truncate"><h4><?= $sonuc["KY"] ?></h4></a>
                            <p class="card-text">"
                                Evde 8 haftalık enerjik spor salonu planını yaptım ve harika oldu! Spor aletlerim sınırlı olsa da (dambıllar, slam ball ve barfiks çubuğuyla halletmeye çalıştım) antrenmanlar tekrara kaçmayacak ve sonuna kadar eğlenceli ve ilginç olacak çeşitliliğe sahipti."
                                <br><br>
                                "Uygulamanın ücretsiz olduğu düşünülünce, her ay ücret alan uygulamalar kadar iyi olduğunu söyleyebilirim. Uygulamayı kullanmak ve antrenman planını güne, haftaya veya 8 haftanın tamamına göre görmek çok kolay. Plan kapanmalar sırasında motivasyonumu korudu ve formda kalmamı sağladı."
                                <br><br>
                                "Bu uygulama, bulduğum evde antrenman uygulamalarının en iyisi. Boyun, kilon ve fitness hedeflerine göre sana özel günlük bir plan oluşturuyor. Planın zorluğu için geri bildirim vererek daha iyi kişiselleştirilmiş antrenmanlar arasından seçim yapabiliyorsun. Hatta antrenman sırasında uygulamadan kendi müziklerini çalabiliyorsun. Üstelik tüm bunlar ücretsiz."
                                <br><br>
                                "Yeni başlıyorsan veya orta (hatta ileri) düzeydeysen bundan daha iyi bir uygulama yok. Uygulamayı bu yılın Şubat ayında, telefonumu yeniledikten sonra kullanmaya başladım ve bundan daha iyi bir hediye isteyemezdim. Bilgi ve yardımı ÜCRETSİZ sunması çok güzel."
                                <br><br>
                                "En iyi planlar başlangıç planı, vücut ağırlığı planı ve formunu koruma planı. Kardiyo ve kas yapma çalışmaları bir arada. Nasıl ve ne kadar iyi çalıştığına dikkat ediyor ve plan ilerledikçe bütün vücudunu çalıştırıyor. Bu uygulamayı antrenmana başlamak ve motivasyonunu korumak için yardım isteyen herkese öneririm. Sana gerçekten yardımcı oluyor. En azından bana oldu. Teşekkürler BT"
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <section class="d-flex ">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <img src="img/katıl.jpg" class="home-img" alt="">
                        <br><br>
                        <div>
                            <a class="title text-truncate"><h4><?= $sonuc["BizeKatıl"] ?></h4></a>
                            <p class="card-text"><?= $sonuc["BizeKatıl_alt"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <section class="d-flex ">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <img src="img/SSS.jpg" class="home-img" alt="">
                        <br><br>
                        <div>
                            <a class="title text-truncate"><h4><?= $sonuc["SSS"] ?></h4></a>
                            <p class="card-text"><h5><?= $sonuc["SSS1"] ?></h5>
                            <?= $sonuc["SSS1_alt"] ?></p>
                            <p class="card-text"><h5><?= $sonuc["SSS2"] ?></h5>
                            <?= $sonuc["SSS2_alt"] ?></p>
                            <p class="card-text"><h5><?= $sonuc["SSS3"] ?></h5>
                            <?= $sonuc["SSS3_alt"] ?></p>
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br><br>

<?php
include("../../inc/footer.php");
?>