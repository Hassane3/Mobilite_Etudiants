<?php
Class Albums{
    public $id;
    public $titre;
    public $annee;


    //Constructeur
    public function __construct($id, $titre, $annee){
        $this->id = $id;
        $this->titre = $titre;
        $this->annee = $annee;
    }

    public static function show(){
        $list = array();
        include_once('utils.php');
        $conn = Utils::connect();
        $sql = 'select * from albums';
        $result = Utils::query($conn, $sql);

        foreach($result as $alb){
            // On remplie la liste.
            $list[] = new Albums($alb['id'], $alb['titre'],  $alb['annee']);
        }

        Utils::disconnect($conn);
        return $list;
    }
    
    public static function show_musiciens() {
        $list = array();
        include_once('utils.php');
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

    public static function find_By_Musiciens($prenom, $nom){
        $list = array();
        include_once('utils.php');
        $conn = Utils::connect();
        $sql = 'SELECT  albums.id, albums.titre, albums.annee
                FROM    albums, participer, musiciens
                WHERE   albums.id = participer.id_album
                AND     musiciens.id = participer.id_musicien
                AND     prenom = "'. $prenom .'"
                AND     nom = "'. $nom .'"';
        $result = Utils::query($conn, $sql);

        foreach($result as $alb){
            // On remplie la liste.
            $list[] = new Albums($alb['id'], $alb['titre'],  $alb['annee']);
        }

        Utils::disconnect($conn);
        return $list;
    }
    
    public static function find_By_Instruments($nom){
        $list = array();
        include_once('utils.php');
        $conn = Utils::connect();
        $sql = 'SELECT  albums.id, albums.titre, albums.annee
                FROM    albums, participer, instruments
                WHERE   albums.id = participer.id_album
                AND     instruments.id = participer.id_instrument
                AND     nom = "'. $nom .'"';
        $result = Utils::query($conn, $sql);

        foreach($result as $alb){
            // On remplie la liste.
            $list[] = new Albums($alb['id'], $alb['titre'],  $alb['annee']);
        }

        Utils::disconnect($conn);
        return $list;
    }


}

?>