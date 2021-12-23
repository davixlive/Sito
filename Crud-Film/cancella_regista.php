
<?
	include "connessione.php";
    $IDRegista = $_GET['IDRegista'];
    $la_query="SELECT * FROM `Film` WHERE `IDRegista` = $IDRegista";
    $la_query.=";";
    $Continuare = false ;
    if(!$risultati=$connessione->query($la_query)) {
        echo("Errore nell'esecuzione della query: ".$connessione->error.".");
        exit();
    } else {
        //echo("Dalla tabella ho estratto ".$risultati->num_rows." record<br/>");
        if ($risultati->num_rows > 0) {
            echo "Ci sono dei film in archivio, eliminando il regista eliminerai anche i film";
        }
    }

?>
<script>
    var answer = window.confirm("Vuoi procedere?");
    if (answer) {
        <? $Continuare= true; ?>
    }
</script>
<?php
    if($Continuare){
        $query = "DELETE FROM `Registi` WHERE `IDRegista`= ".$IDRegista.";";

        //echo $query."<br>";
        $result= mysqli_query($connessione, $query);
        if (!$result)
            echo"window.alert('ERRORE');";
        else{
            header('Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php');
            echo"window.alert('eliminato!');";
        }
    }else{
        header('Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php');
        echo"window.alert('Non è stata effettuata nessuna modifica!');";
    }

?>