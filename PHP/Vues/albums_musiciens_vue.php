<?php
    if(isset($_SESSION['msc'])){
        $msc = $_SESSION['msc'];
        
        
        echo '<h2>Séléctionnez un musicien :</h2>';
        echo '<table>';
        echo '<tr>
            <th>id</th>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>';
        foreach ($msc as $e){ 
            echo '<tr>';
            echo '<td>'.$e->id.'</td>'.'<td>'.$e->prenom.'</td>'.'<td>'.$e->nom.'</td>';
            echo '<td>
            <form action="./index.php" method="post">
                <input type="hidden" name="controleur" value="albums">
                <input type="hidden" name="action" value="find">

                <input type="hidden" name="prenom" value="'.$e->prenom.'">
                <input type="hidden" name="nom" value="'.$e->nom.'">

                <input type="submit" value="go">
            </form>
            </td>
            </tr>';
        }
            echo '</table>';
    }
    
    
  
    ?>
<style>
   
    td{
        border: solid 1px;
    }
</style>