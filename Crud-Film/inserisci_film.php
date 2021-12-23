
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Inserisci regista</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?
    $IDRegista=$_GET['IDRegista'];
    echo "<form METHOD='POST' ACTION='inserisci_film.php'>";
    echo"<input style='display:none;' type='text' id='IDRegista' name='IDRegista' value='".$IDRegista."'>";
    echo"<INPUT TYPE='Text' NAME='Titolo'> Titolo <BR>";
    echo "<INPUT TYPE='date' NAME='Data-Uscita'> Data di uscita <BR>";
    echo "<INPUT TYPE='submit' VALUE='invia'>";
    echo "<INPUT TYPE='Reset' VALUE='cancella'>";
    echo "</form>";

    include "connessione.php";
    $Titolo=$_POST['Titolo'];
    $Data_Uscita=$_POST['Data-Uscita'];
    $ID=$_POST['IDRegista'];
    if (isset($_POST["Titolo"])) {
        $query = "INSERT INTO `Film`(`IDFilm`, `Titolo`, `Data-Uscita`, `IDRegista`) VALUES (NULL, '$Titolo', '$Data_Uscita','$ID')";
        header("Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php/");

        if ($connessione->query($query)) {
            echo "Record aggiunto!<br/>";
            echo "Il suo id e' " . $connessione->insert_id;

        } else{
            echo "Errore: " . $query . "<br/>" . $connessione->error;
            echo $query;
        }


        $connessione->close();
    }
?>
</body>
</html>