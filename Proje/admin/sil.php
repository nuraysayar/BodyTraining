<?php
include('inc/ahead.php');

if($_SESSION["yetki"]!="1"){
    //ERROR ALERT EKLE
    
}
if($_GET){

    $id=(int)$_GET["id"];
    $kat_id=(int)$_GET["kat_id"];

    $sorgu=$baglanti->prepare(query:"DELETE FROM antrenmanlar WHERE id=:id ");
    $sonuc=$sorgu->execute(["id"=>$id]);
    if($sonuc){
    ?>
    <script> location.replace("antrenmanodagi.php?id=<?=$kat_id?>"); </script>
    <?php
    }

}

include('inc/afooter.php');