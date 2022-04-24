<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un instrument</title>
</head>
<?php

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];

?>
    <body>
        <form class="" action="./index.php" method="POST">
            <input type="hidden" name="controleur" value="instruments">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            Nouveau nom : <input type="text" name="newNom"><br>               
            <input type="submit" value="Valider" onclick="updateInstrument(event)">   
        </form>
    </body>
</html>
<?php
    echo'<script>
                    function updateInstrument(e) {
                        if (!confirm("Voulez vous vraiment modifier le nom de cet instrument '.$nom.' ?")){
                            e.preventDefault();
                        }
                    }
        </script>';
} else {
    echo 'Erreur';
}

 
?>
