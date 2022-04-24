<?php

    if(isset($_SESSION['alb'])){
        $alb = $_SESSION['alb'];

        if(isset($_POST['prenom']) && isset($_POST['nom'])){
            echo '<h2>Les albums dont lesquels le musiciens '.$_POST['prenom'].' '.
            $_POST['nom'].' y a participé :</h2>';
        }else if(isset($_POST['nomInstrument'])){
            echo '<h2>Les albums dont lesquels l\'instrument '.$_POST['nomInstrument'].' y a été joué :</h2>';
        }

        echo '<table>';
        echo '<tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Année</th>
            </tr>';
        foreach($alb as $e){
            echo '<tr>';
            echo '<td>'.$e->id.'</td>'.'<td>'.$e->titre.'</td>'.'<td>'.$e->annee.'</td>';
            echo '</tr>';
        }
        echo '</table>';
  
    }
?>
<style>
   
   td{
       border: solid 1px;
   }
</style>