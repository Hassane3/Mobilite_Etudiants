<?php
class albumsControleur{

    public function show(){
        // Utiliser le modéle pour obtenir la liste des albums
        require_once('./Modeles/albums_modele.php');
        $alb = Albums::show();
        // Stocker la liste en session
        $_SESSION['alb'] = $alb;
        // Rediriger vers la vue
        require_once('./Vues/albums_vue.php');
    }

    public function show_musiciens(){
        require_once('./Modeles/musiciens_modele.php');
        $msc = Musiciens::show();
        $_SESSION['msc'] = $msc;
        // Rediriger vers la vue
        require_once('./Vues/albums_musiciens_vue.php');
    }

    public function show_instruments(){
        require_once('./Modeles/instruments_modele.php');
        $instru = Instruments::show();
        $_SESSION['instru'] = $instru;
        // Rediriger vers la vue
        require_once('./Vues/albums_instruments_vue.php');
    }

    

    public function find(){
        // Trouver un album à partir d'un "id" :
        // Recuperer le matricule dans la requete
        if(isset($_POST['id']) && $_POST['id'] != null) {
            $id = $_POST['id'];
            //à compléter...
        }
        
        // Trouver des albums à partir d'un musicien :
        else if(isset($_POST['prenom']) && isset($_POST['nom'])) {
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];

            require_once('./Modeles/albums_modele.php');
            $alb = Albums::find_By_musiciens($prenom, $nom);

            $_SESSION['alb'] = $alb;
            require_once('./Vues/albums_vue.php');
        
        }

        // Trouver des albums à partir d'un instrument :
        else if(isset($_POST['nomInstrument'])) {
            $nomInstrument = $_POST['nomInstrument'];

            require_once('./Modeles/albums_modele.php');
            $alb = Albums::find_By_instruments($nomInstrument);

            $_SESSION['alb'] = $alb;
            require_once('./Vues/albums_vue.php');
        
        }

        else {
            require_once('./Controleurs/route.php');
            $_SESSION['msg'] = "Matricule manquant";
            return Route::routage('demarrage', 'erreur');
        }
    }




    public function find_byMusician() {
        require_once('./Modeles/albums_modele.php');
        $msc = Albums::find_ByMusician();
        
        $_SESSION['alb_ByMusician'] = 'alb_ByMusician';
        require_once('./Vues/albums_vue.php');
    }

    public function find_byInstrument() {
        $_SESSION['alb_ByInstrument'];
        require_once('./Vues/albums_vue.php');
    }
    
    
}
?>