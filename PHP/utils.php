<?php
Class Utils{
    static function connect(){
        $identifiant = "root";
        $motdepasse ="";
        $serveur = "localhost";
        $base = "mobilite_etudiants";

     //Connexion
    $connexion = null;
    try{
        $connexion = new PDO("mysql:host=".$serveur.";dbname=".$base, $identifiant, $motdepasse);
        $connexion->exec('SET CHARACTER SET utf8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOEXCEPTION $e){
        echo 'echec de connexion : '.$e->getMessage();
    }
    return $connexion;
    }


    //Deconnexion
    static function disconnect($connexion){
    $connexion = null;
    }
    
    //Executer une requête SQL - pas de protection
    //Sans résultat : insert, update, delete
    static function execute ($connexion, $sql){
        $connexion->exec($sql);
    }

    //Exexuter une requete SQL qui retourne un résultat (SELECT)
    static function query($connexion, $sql){
        $result = null;
        try{
            //Pour protecger de l'injection sql
            $statement = $connexion->prepare($sql);
            //Executer la requête SQL
            $statement->execute();
            //Récuperer le résultat dans un tableau associatif
            $result = $statement->fetchAll();
        }
        catch(PDOException $e){
            echo 'Echec de query : '.$e->getMessage();
        }
        return $result;
    }


    static function queryDelete($connexion, $sql){
        $result = null;
        try{
            //Pour protecger de l'injection sql
            $statement = $connexion->prepare($sql);
            //Executer la requête SQL
            $statement->execute();
        }
        catch(PDOException $e){
            echo 'Echec de query : '.$e->getMessage();
        }
        return $result;
    }
}



?>