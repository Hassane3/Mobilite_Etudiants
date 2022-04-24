<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
</head>
<body>
    <?php
    if(isset($_POST['controleur']) && isset($_POST['action'])){
        $controleur = $_POST['controleur'];
        $action = $_POST['action'];
        // echo $controleur.' & '.$action;
    }else{
        $controleur = 'demarrage';
        $action = 'accueil';
    }
    include_once('Controleurs/route.php');
    Route::call($controleur, $action);

    ?>
</body>
</html>
