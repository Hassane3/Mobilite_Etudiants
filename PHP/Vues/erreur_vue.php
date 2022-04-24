<?php
  if (isset($_SESSION['msg'])){
    echo "ERREUR : ".$_SESSION['msg'];
  }
  else{
    echo "il y a un problème ...";
  }
?>
