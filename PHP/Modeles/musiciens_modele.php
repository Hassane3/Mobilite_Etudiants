<?php
Class Musiciens{
    public $id;
    public $prenom;
    public $nom;

    //Constructeur
    public function __construct($id, $prenom, $nom){
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public static function show(){
        $list = array();
        include_once('./utils.php');
        $conn = Utils::connect();
        $sql = 'select * from musiciens';
        $result = Utils::query($conn, $sql);
       
        foreach($result as $msc){
            // On remplie la liste.
            $list[] = new Musiciens($msc['id'], $msc['prenom'], $msc['nom']);
        }

        Utils::disconnect($conn);
        return $list;
    }


    public static function delete($prenom, $nom){
        include_once('./utils.php');
        $conn = Utils::connect();
        $sql = 'DELETE FROM musiciens WHERE prenom = "'.$prenom.'" AND nom = "'.$nom.'"';
        $result = Utils::queryDelete($conn, $sql);
        Utils::disconnect($conn);
    }

    public static function update($id, $newPrenom, $newNom){
        include_once('utils.php');
        $conn = Utils::connect();
        $sql = 'UPDATE musiciens SET prenom = "'.$newPrenom.'", nom = "'.$newNom.'" WHERE id = "'.$id.'"';
        $result = Utils::queryDelete($conn, $sql);
        Utils::disconnect($conn);
    }
}

?>