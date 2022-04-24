<?php
    if(isset($_SESSION['instru'])){
        $instru = $_SESSION['instru'];

        echo '<table>';
        echo '<tr>
            <th>id</th>
            <th>Nom</th>
        </tr>';
        foreach ($instru as $e){
            echo '<tr>';
            echo '<td>'.$e->id.'</td>'.'<td>'.$e->nom.'</td>';
            echo '<td>
            <form action="./index.php" method="post">
                <input type="hidden" name="controleur" value="albums">
                <input type="hidden" name="action" value="find">

                <input type="hidden" name="nomInstrument" value="'.$e->nom.'">

                <input type="submit" value="go">
            </form>
            </td>
            </tr>';
        }
    }
    
    
  
    ?>
<style>
   
    td{
        border: solid 1px;
    }
</style>