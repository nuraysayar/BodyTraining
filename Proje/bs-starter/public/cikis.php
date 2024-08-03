<?php
session_start();
session_destroy();
setcookie("çerez","",time()-1);
header(header:"location:giris.php");

?>