<?php
  //Nettoyer $_POST et $_SESSION
  unset($_POST);
  unset($_SESSION);
 ?>

<h1>Choisissez une action :</h1>
<!-- cours -->
<form class="" action="./layout.php" method="post">
  Gestion des cours
  <input type="hidden" name="controleur" value="cours">
  <input type="hidden" name="action" value="gestion">
  <input type="submit" value="Go">
</form>
<br>
