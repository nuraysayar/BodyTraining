<?php
$sayfa="Dayanıklılık";
include("../../inc/head.php");
$alt= $_GET["alt"];
$kategori = $_GET["kategori"];
$alt_kategori = $baglanti->prepare(query:"SELECT * FROM alt_kategori WHERE id =".$alt);
$detay=$baglanti->prepare(query: "SELECT * FROM antrenmanlar WHERE aktif=1 and alt_kategori_id=".$alt." ORDER BY sıra ");
$detay->execute();
$alt_kategori->execute();
$alt_kategori_sonuc = $alt_kategori->fetch();

if (isset($_POST["favori"])) {
    if (isset($_SESSION["kullaniciadi"])) {
        $antrenman_id = $_POST["antrenman_id"];
        $kullanici_adi = $_SESSION["kullaniciadi"];
        $sorgu = $baglanti->prepare("INSERT INTO favoriler (kullanici_adi, antrenman_id) VALUES (:kullanici_adi, :antrenman_id)");
        $ekle = $sorgu->execute([
            'kullanici_adi' => $kullanici_adi,
            'antrenman_id' => htmlspecialchars($_POST["antrenman_id"])
        ]);
    } else {
        echo "<script>alert('Lütfen giriş yapınız');</script>";
    }
}
?>

      
<div class="container">
    <section class="pt-3">
    <div>
            <header>
                <br><br><h3 class="mb-md-3 mb-0"><?=$alt_kategori_sonuc["baslik"];?></h3> <br>
            </header>
            <div class="row">
                <?php
                    while($sonuc=$detay->fetch())
                    {
                ?>

                <div class="col-3 pt-3">
                    <div class="card ">
                        <img  src="img/<?= $sonuc["görsel"] ?>" class="card-img-top" alt="..." >
                        <div class="card-body">
                                <span class="topbar">
                                    <form method="post">
                                        <input type="hidden" name="antrenman_id" value="<?=$sonuc["id"]?>">
                                        <button type="submit" name="favori"  class="float-end"><i class="fa fa-regular fa-heart fa-lg"></i></button>
                                    </form>
                                </span>
                            <a href="details.php?id=<?=$sonuc["id"] ?>" class="title text-truncate"><h5><?=$sonuc["başlık"] ?></h5></a>
                          <p class="card-text"><?= $sonuc["açıklama"] ?></p>
                        </div>
                      </div>
                </div>

                <?php
                }
                ?>
                
            </div>
    </section>
</div>
    <br><br>

<?php
include("../../inc/footer.php");
?>