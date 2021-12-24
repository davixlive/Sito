<?
	include "connessione.php";
    $IDRegista = $_GET['IDRegista'];
    $controllo = "SELECT * FROM Film WHERE IDRegista =  $IDRegista;";
    $risultati = mysqli_query($connessione, $controllo);
    if (!$risultati) {
        echo("Errore nell'esecuzione della query: " . $connessione->error . ".");
        echo $controllo;
        exit();
    } else {
        if ($risultati->num_rows > 0) {
            echo "Il regista ha dei film collegati a lui! Eliminali prima di eliminare il regista?";
            echo "<br><button type='button' class='btn btn-success' onclick=location.href='http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php'>Torna alla home page</button> ";
        } else {
            $query = "DELETE FROM `Registi` WHERE `IDRegista`= " . $IDRegista . ";";
            $result = mysqli_query($connessione, $query);
            if (!$result)
                echo '<script>alert("Eliminato")</script>';
            else {
                header('Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php');
            }
        }

    }
?>
