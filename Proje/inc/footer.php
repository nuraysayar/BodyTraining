<?php
include("../../inc/vt.php");

if(isset($_POST["gönder"])) {
    if(isset($_POST["txtileti"])) {
        // txtileti değeri post edildiğinde yapılacak işlemler
        $sorgu = $baglanti->prepare("INSERT INTO iletisim (ileti) VALUES (:ileti)");
        $ekle = $sorgu->execute(
            [
              'ileti' => htmlspecialchars($_POST["txtileti"]),
            ]);
        if($ekle) {
            echo '<script> Swal.fire({ title: "İleti İşlemi Başarılı", icon: "success" }); </script>';
        } else {
            echo "İleti gönderilemedi";
        }
    }
}


?>
<footer class="py-4 bg-primary">
        <div class="container">
            <div class="row gy-3">
                <div class="col-md-4">
                    <form method="post">
                        <div class="input-group">
                            <input type="text" name="txtileti" class="form-control" placeholder="Bizimle İletişime Geçin">
                            <button class="btn btn-outline-warning" name="gönder"  >Gönder</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <nav class="text-center text-md-end">
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </nav>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-white">
                        @2024 Body Training, Tüm Hakları Saklıdır.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/fslightbox/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/dataTables.demo.js"></script>

    
</body>
</html>