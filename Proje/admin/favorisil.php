<?php
include('inc/ahead.php');

if($_SESSION["yetki"] != "1"){
    //die("Bu işlemi yapma yetkiniz yok.");
}

if($_GET){

    $id = (int)$_GET["id"];

    $sorgu = $baglanti->prepare("DELETE FROM favoriler WHERE id = :id");
    $sonuc = $sorgu->execute(["id" => $id]);

    if($sonuc){
    ?>
    <script> location.replace("favori.php"); </script>
    <?php
    }

}

include('inc/afooter.php');
?>