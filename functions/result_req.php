<?php 
function Contenu_FETCH_ASSOC_Formules(PDOStatement $st){
    try{
    //Boucle fetch pour récupérer le résultat du SELECT
    //La méthode fetch() disposed'un paramètres PDO::FETCH_ASSOC
    //qui retourne un tableau indexé par le nom de la colonne
        echo'<table>';
            echo '<tr>';
            echo '<th style="width:10%;">Formules</th>';
            echo'<th style="width:10%;">Nom</th>';
            echo'<th style="width:10%;">Tarifs</th>';
            echo'<th style="width:10%;">Clients</th>';
            echo '</tr>';
        while ($ligne=$st->fetch(PDO::FETCH_ASSOC)){
            $couleur=null;
            if (isset($_GET['nos']) && $_GET['nos'] == $ligne['id_formules']){
                $couleur='#FFFF00';
            }
            echo'<tr style= "background-color:'.$couleur.'";>';
            echo'<td style="width:10%;"><a href="Tarifs.php?formules='.$ligne['id_formules'].'">'.$ligne['id_formules'].'</a></td>';
            echo'<td style="width:70%;">'.utf8_encode($ligne['NOM']).'&nbsp;</a></td>';
            echo'<td style="width:10%;">'.$ligne['Tarif'].'&nbsp;</a></td>';
            echo'<td style="width:10%;">'.$ligne['id_clients'].'&nbsp;</a></td>';
            echo'</tr>';
        }
        echo'</table>';
        return(true);
    }  catch(PDOException $message){
        //Gérer les message liées au exceptions
        echo'Erreur:'.$message->getMessage().'<br/>';

    }
    
}