<?php
Class instruments{
    public $id;
    public $nom;

    //Constructeur
    public function __construct($id, $nom){
        $this->id = $id;
        $this->nom = $nom;
    }

    public static function show(){
        $list = array();
        include_once('./utils.php');
        $conn = Utils::connect();
        $sql = 'select * from instruments';
        $result = Utils::query($conn, $sql);

        foreach($result as $instru){
            // On remplie la liste.
            $list[] = new Instruments($instru['id'], $instru['nom']);
        }

        Utils::disconnect($conn);
        return $list;
    }

    public static function delete($nom){
        include_once('./utils.php');
        $conn = Utils::connect();
        $sql = 'DELETE FROM instruments WHERE nom = "'.$nom.'"';
        $result = Utils::queryDelete($conn, $sql);
        Utils::disconnect($conn);
    }

    public static function update($id, $newNom){
        include_once('utils.php');
        $conn = Utils::connect();
        $sql = 'UPDATE instruments SET nom = "'.$newNom.'" WHERE id = "'.$id.'"';
        $result = Utils::queryDelete($conn, $sql);
        Utils::disconnect($conn);
    }
}

?>