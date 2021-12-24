
<?
	include "connessione.php";
    $IDRegista = $_GET['IDRegista'];
    $controllo = "SELECT * FROM `Film` WHERE `IDRegista` = ". $IDRegista . ";" ;
    $risultati = mysqli_query($connessione, $controllo);
    if (!$risultati) {
        echo("Errore nell'esecuzione della query: " . $connessione->error . ".");
        exit();
    } else {
        if ($risultati->num_rows > 0) {
            header("Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php");
            echo "<script type='text/javascript''>window.alert('Ci sono dei film! Elimina i film prima del regista');</script>";
        } else {
            $query = "DELETE FROM `Registi` WHERE `IDRegista`= " . $IDRegista . ";";
            //echo $query."<br>";
            $result = mysqli_query($connessione, $query);
            if (!$result)
                echo "window.alert('ERRORE');";
            else {
                header('Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php');

                echo "window.alert('eliminato!');";
            }
        }
    }
?>