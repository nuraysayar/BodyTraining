
<?php
$sayfa="Egzersiz Zamanı";
include("../../inc/head.php");
//include("../../inc/vt.php");
//$id = $_GET["id"];
//$detay=$baglanti->prepare(query: "SELECT * FROM antrenmanlar WHERE aktif=1 and id=".$id);
//$detay->execute();
//$detay_sonuc = $detay->fetch();

?>
<?php
// Antrenman ID'sini alın
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Videonun detaylarını çek
$detay = $baglanti->prepare("SELECT * FROM antrenmanlar WHERE aktif=1 and id=:id");
$detay->bindParam(':id', $id, PDO::PARAM_INT);
$detay->execute();
$detay_sonuc = $detay->fetch(PDO::FETCH_ASSOC);

// Yorumları çek
$yorumlar = [];
try {
    $sorgu = $baglanti->prepare("SELECT * FROM yorum WHERE antrenman_id = :antrenman_id ORDER BY tarih DESC");
    $sorgu->bindParam(':antrenman_id', $id, PDO::PARAM_INT);
    $sorgu->execute();
    $yorumlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Sorgu hatası: " . $e->getMessage();
}


// Yorum gönderme işlemi
if (isset($_POST['yorumgonder'])) {
    $yorum = htmlspecialchars($_POST['txtyorum']);
    try {
        $sorgu = $baglanti->prepare("INSERT INTO yorum (antrenman_id, yorum, tarih) VALUES (:antrenman_id, :yorum, NOW())");
        $sorgu->bindParam(':antrenman_id', $id, PDO::PARAM_INT);
        $sorgu->bindParam(':yorum', $yorum);
        $sorgu->execute();
        // Sayfayı yenileyerek yorumların görünmesini sağla
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id);
        exit;
    } catch (PDOException $e) {
        echo "Yorum ekleme hatası: " . $e->getMessage();
    }
}
?>



<div class="container">
    <!-- Video -->
    <video id="exerciseVideo" class="w-100" controls>
        <source src="video/<?= htmlspecialchars($detay_sonuc['video']) ?>" type="video/mp4">
    </video>

    <!-- Yorumlar -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Yorumlar</h5>
            <?php if (count($yorumlar) > 0): ?>
                <ul class="list-group">
                    <?php foreach ($yorumlar as $yorum): ?>
                        <li class="list-group-item">
                            <p><?= htmlspecialchars($yorum['yorum']) ?></p>
                            <small class="text-muted"><?= $yorum['tarih'] ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Henüz yorum yapılmamış.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Yorum formu -->
    <div class="row mt-4">
        <div class="col-md-6">
            <form method="post">
                <div class="mb-3">
                    <label for="comment" class="form-label">Yorumunuz</label>
                    <textarea class="form-control" name="txtyorum" id="comment" rows="3"></textarea>
                </div>
                <button type="submit" name="yorumgonder" class="btn btn-primary">Yorum Yap</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <section class="py-4">
        <div class="container">
            <header class="section-heading">
                <h4 class="mb-3">İlgini Çekebilecek Antrenmanlar</h4>
            </header>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="img/iça1.jpg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Sıkı Karın Kasları
                                <br><br>
                                <a href="#" class="btn btn-outline-primary w-100">Egzersizi İzle</a>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="img/iça2.jpg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                10 Dakikalık Yüksek Younluklu Antrenman: Bacaklar ve Karın
                                <a href="#" class="btn btn-outline-primary w-100">Egzersizi İzle</a>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="img/iça3.jpg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Kalça ve Kalça Kası Kuvveti
                                <br><br>
                                <a href="#" class="btn btn-outline-primary w-100">Egzersizi İzle</a>
                            </a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="img/iça4.jpg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Masabaşı Çalışanlara Özel, Tüm Vücudu Çalıştıran 7 Dakikalık Detoks
                                <a href="#" class="btn btn-outline-primary w-100">Egzersizi İzle</a>
                            </a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <br><br>
  

<?php
include("../../inc/footer.php");
?>