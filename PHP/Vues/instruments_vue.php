<?php
if (isset($_SESSION['instru'])){
    $instru = $_SESSION['instru'];

    echo '<table>';
    echo '<tr>
            <th>id</th>
            <th>Nom</th>
        </tr>';
    foreach ($instru as $e){
        echo '<tr>';
        echo '<td>'.$e->id.'</td>'.'<td>'.$e->nom.'</td>';
       // Modifier un instrument
        echo '<td>
            <form class="" action="./modifInstrument.php" method="POST">
                <input type="hidden" name="id" value="'.$e->id.'">
                <input type="hidden" name="nom" value="'.$e->nom.'">
                <input type="submit" name="newValue" value="Modifier">
            </form>
        </td>';
                    
        
        // Supprimer un musicien
        echo '<td>
        <form action="./index.php" method="post">
            <input type="hidden" name="controleur" value="instruments">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="'.$e->id.'">
            <input type="hidden" name="nom" value="'.$e->nom.'">

            <input type="submit" value="supprimer" onclick="supprimerInstrument(event)">

        </form>
        
        <script>
            function supprimerInstrument(e) {
                           
                if (!confirm("Voulez vous vraiment supprimer l\'instrument '.$e->nom.' ?")){
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