<?php
session_start();
include 'vt.php'; // Veritabanı bağlantısı dosyasını dahil edin

if (isset($_POST['antrenman_id']) && isset($_SESSION['kullanici_id'])) {
    $egzersiz_id = $_POST['antrenman_id'];
    $kullanici_id = $_SESSION['kullanici_id'];

    // Favori kontrolü
    $check_sql = "SELECT * FROM favoriler WHERE kullanici_id = :kullanici_id AND antrenman_id = :antrenman_id";
    $check_stmt = $baglanti->prepare($check_sql);
    $check_stmt->execute(['kullanici_id' => $kullanici_id, 'antrenman_id' => $egzersiz_id]);
    
    if ($check_stmt->rowCount() == 0) {
        $sql = "INSERT INTO favoriler (kullanici_id, antrenman_id) VALUES (:kullanici_id, :antrenman_id)";
        $stmt = $baglanti->prepare($sql);
        if ($stmt->execute(['kullanici_id' => $kullanici_id, 'antrenman_id' => $egzersiz_id])) {
            echo "Favorilere eklendi";
        } else {
            echo "Hata: Favori eklenemedi.";
        }
    } else {
        echo "Bu egzersiz zaten favorilerinizde.";
    }
} else {
    echo "Lütfen giriş yapın.";
}
?>