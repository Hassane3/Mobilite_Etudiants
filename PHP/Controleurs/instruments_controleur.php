<?php
class instrumentsControleur{
    public function show(){
        require_once('./Modeles/instruments_modele.php');
        $instru = Instruments::show();

        $_SESSION['instru'] = $instru;
        require_once('./Vues/instruments_vue.php');
    }

    public function delete(){
        if (isset($_POST['nom'])) {
            
            $nom = $_POST['nom'];
        
            require_once('./Modeles/instruments_modele.php');
            $instru = Instruments::delete($nom);

            $instru = Instruments::show();
            $_SESSION['instru'] = $instru;
            require_once('./Vues/instruments_vue.php');
        }
    }

    public function update(){
        // if (isset($_POST['prenom']) && isset($_POST['nom'] )){
        if (isset($_POST['id']) && isset($_POST['newNom'])) {
            
            $newNom = $_POST['newNom'];
            $id = $_POST['id'];

            require_once('./Modeles/instruments_modele.php');
            $instru = Instruments::update($id,$newNom);

            $instru = Instruments::show();
            $_SESSION['instru'] = $instru;
            require_once('./Vues/instruments_vue.php');
        }
    }
}


?>