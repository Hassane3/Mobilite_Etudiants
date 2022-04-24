<?php

class Route{
    // controleur de routage, il contient les fonctions permettant de diriger
    // les requêtes vers les controleur ciblés.

    // Fonction qui appelle le controleur ciblé et l'action ciblée
    static function call($controleur, $action){
        //Etablie la correspendance entre $controleur et la classe correspondante
        include('Controleurs/'.$controleur.'_controleur.php');

        //Créer une instance du controleur ciblé
        switch($controleur){
            case 'demarrage' :
                $ctrl = new demarrageControleur();
                break;
            case 'cours' :
                $ctrl = new coursControleur();
                break;
            case 'instruments' :
                $ctrl = new instrumentsControleur();
                break;
            case 'albums' :
                $ctrl = new albumsControleur();
                break;
        }
        //Executer l'action ciblée du Controleur
        $ctrl->{$action}();
    }
    // Fonction pour faire le routage -
    // 1 : Verifier la validité de $controleur et $action
    // 2 : utiliser la fonction d'appel du controleur
    static function routage($controleur, $action){
        //Registre des controleurs disponnible et de leurs actions
        static $controleurs = array('demarrage'=>['accueil', 'erreur'], 
                                    'albums'=>['show']);

        // Vérifier la validité du controleur
        if(array_key_exists($controleur, $controleurs)){
            // Vérifier la validité de l'action
            if(in_array($action, $controleurs[$controleur])){
                Route::call($controleur, $action);
            }else{
                // Erreur sur l'action
                $_SESSION['msg'] = "Action ".$action. "n'existe pas.";
                Route::call('demarrage', 'erreur');
            }
        }else{
            // Erreur sur le controleur
            $_SESSION['msg'] = "Controleur ".$controleur. "n'existe pas.";
            Route::call('demarrage', 'erreur');
        }
    }

}