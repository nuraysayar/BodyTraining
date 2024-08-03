<?php
include('inc/ahead.php');
if ($_POST) {
    // Formdan gelen verileri işleme
    
    $ad = $_POST["ad"] ?? null;
    $soyad = $_POST["soyad"] ?? null;
    $email = $_POST["eposta"] ?? null;
    $dogum_tarihi = $_POST["dogumtarihi"] ?? null;
    $kullanici_adi = $_POST["kullaniciadi"] ?? null;
    $sifre = $_POST["sifre"] ?? null;

    // Hataları kontrol et
    if (is_null($ad) || is_null($soyad) || is_null($email) || is_null($dogum_tarihi) || is_null($kullanici_adi) || is_null($sifre)) {
        die("Lütfen tüm alanları doldurun.");
    }

    // Şifreyi hashleme
    //$hashed_password = password_hash($sifre, PASSWORD_DEFAULT);

    // Veritabanına ekleme
    $ekle = $baglanti->prepare("INSERT INTO kayıtformu (ad, soyad, eposta, dogumtarihi, kullaniciadi, sifre, tarih) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $ekle->execute([$ad, $soyad, $email, $dogum_tarihi, $kullanici_adi, $sifre,]);

    yonlendirUrl("kullanici.php");
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
        <h1 class="mt-4">Yeni Kullanıcı Ekle</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Yeni Kullanıcı Ekle</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Yeni İçerik
            </div>
            <div class="card-body">
                <form action="kullaniciekle.php?" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ad" class="form-label">Ad</label>
                        <input type="text" class="form-control" id="ad" name="ad" required>
                    </div>
                    <div class="mb-3">
                        <label for="soyad" class="form-label">Soyad</label>
                        <input type="text" class="form-control" id="soyad" name="soyad" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="email" class="form-control" id="email" name="eposta" required>
                    </div>
                    <div class="mb-3">
                        <label for="dogum_tarihi" class="form-label">Doğum Tarihi</label>
                        <input type="date" class="form-control" id="dogum_tarihi" name="dogumtarihi" required>
                    </div>
                    <div class="mb-3">
                        <label for="kullanici_adi" class="form-label">Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="kullanici_adi" name="kullaniciadi" required>
                    </div>
                    <div class="mb-3">
                        <label for="sifre" class="form-label">Şifre</label>
                        <input type="password" class="form-control" id="sifre" name="sifre" required>
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
