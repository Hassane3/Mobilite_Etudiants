<?php
class musiciensControleur{
    public function show(){
        require_once('./Modeles/musiciens_modele.php');
        $msc = Musiciens::show();

        $_SESSION['msc'] = $msc;
        require_once('./Vues/musiciens_vue.php');
    }
    public function delete(){
        // if (isset($_POST['prenom']) && isset($_POST['nom'] )){
        if (isset($_POST['prenom']) && isset($_POST['nom'])) {
            
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
        
            require_once('./Modeles/musiciens_modele.php');
            $msc = Musiciens::delete($prenom,$nom);

            $msc = Musiciens::show();
            $_SESSION['msc'] = $msc;
            require_once('./Vues/musiciens_vue.php');
        }
    }

    public function update(){
        // if (isset($_POST['prenom']) && isset($_POST['nom'] )){
        if (isset($_POST['id']) && isset($_POST['newPrenom']) && isset($_POST['newNom'])) {
            
            $newPrenom = $_POST['newPrenom'];
            $newNom = $_POST['newNom'];
            $id = $_POST['id'];

            require_once('./Modeles/musiciens_modele.php');
            $msc = Musiciens::update($id,$newPrenom,$newNom);

            $msc = Musiciens::show();
            $_SESSION['msc'] = $msc;
            require_once('./Vues/musiciens_vue.php');
        }
    }
}


?>