<?php
if (isset($_SESSION['msc'])){
    $msc = $_SESSION['msc'];

    echo '<table>';
    echo '<tr>
            <th>id</th>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>';
    foreach ($msc as $e){
        echo '<tr>';
        echo '<td>'.$e->id.'</td>'.'<td>'.$e->prenom.'</td>'.'<td>'.$e->nom.'</td>';
        // Modifier un musicien
        echo '<td>
            <form class="" action="./modifArtiste.php" method="POST">
                <input type="hidden" name="id" value="'.$e->id.'">
                <input type="hidden" name="prenom" value="'.$e->prenom.'">
                <input type="hidden" name="nom" value="'.$e->nom.'">
                <input type="submit" name="newValue" value="Modifier">
            </form>
        </td>';
      
        // Supprimer un musicien
        echo '<td>
            <form action="./index.php" method="post">
                <input type="hidden" name="controleur" value="musiciens">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="'.$e->id.'">
                <input type="hidden" name="prenom" value="'.$e->prenom.'">
                <input type="hidden" name="nom" value="'.$e->nom.'">
                
                <input type="submit" value="supprimer" onclick="supprimerMusicien(event)">
            </form>
            
            <script>
                function supprimerMusicien(e) {
                   
                    if (!confirm("Voulez vous vraiment supprimer le musicien '.$e->prenom.' '.$e->nom.' ?")){
                        e.preventDefault();
                    }
                }
            </script>

            </td>';
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