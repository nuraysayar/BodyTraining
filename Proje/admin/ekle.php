<?php
include('inc/ahead.php');
$id = $_GET["id"];
if ($_POST) {
    // Formdan gelen verileri işleme
    
    $alt_kategori_id = $id ?? null;
    $baslik = $_POST["baslik"] ?? null;
    $aciklama = $_POST["aciklama"] ?? null;
    $sira = $_POST["sira"] ?? null;
    $aktif = isset($_POST["aktif"]) ? 1 : 0;

    // Hataları kontrol et
    if (is_null($alt_kategori_id) || is_null($baslik) || is_null($aciklama) || is_null($sira)) {
        die("Lütfen tüm alanları doldurun.");
    }

    // Görsel ve video dosyalarını yükleme işlemi
    $gorsel = $_FILES["gorsel"]["name"] ?? null;
    $video = $_FILES["video"]["name"] ?? null;

    if ($gorsel) {
        move_uploaded_file($_FILES["gorsel"]["tmp_name"], "../bs-starter/public/img/" . $gorsel);
    }
    if ($video) {
        move_uploaded_file($_FILES["video"]["tmp_name"], "../bs-starter/public/video/" . $video);
    }

    // Veritabanına ekleme
    $ekle = $baglanti->prepare("INSERT INTO antrenmanlar (alt_kategori_id, başlık, açıklama, sıra, aktif, görsel, video) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $ekle->execute([$alt_kategori_id, $baslik, $aciklama, $sira, $aktif, $gorsel, $video]);

    yonlendirUrl("antrenmanodagi.php?id=$id");
}

function yonlendirUrl($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}

?>

<!-- HTML Form Kısmı -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Yeni İçerik Ekle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Yeni İçerik Ekle</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Yeni İçerik
            </div>
            <div class="card-body">
                <form action="ekle.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="baslik" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" required>
                    </div>
                    <div class="mb-3">
                        <label for="aciklama" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="aciklama" name="aciklama" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sira" class="form-label">Sıra</label>
                        <input type="number" class="form-control" id="sira" name="sira" required>
                    </div>
                    <div class="mb-3">
                        <label for="gorsel" class="form-label">Görsel</label>
                        <input type="file" class="form-control" id="gorsel" name="gorsel"  required>
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" class="form-control" id="video" name="video"  required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="aktif" name="aktif">
                        <label class="form-check-label" for="aktif">Aktif</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include('inc/afooter.php');
?>
