
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
    include "connessione.php";

    if (isset($_POST["Titolo"])){
        $Titolo=$_POST['Titolo'];
        $Data_Uscita=$_POST['Data-Uscita'];
        $ID=$_POST['IDRegista'];
        $query = "INSERT INTO `Film`(`IDFilm`, `Titolo`, `Data-Uscita`, `IDRegista`) VALUES (NULL, '$Titolo', '$Data_Uscita','$ID')";
        echo $query;

        if ($connessione->query($query)) {
            echo "Record aggiunto!<br/>";
            echo "Il suo id e' " . $connessione->insert_id;
            header("Location: http://cardillodavide.altervista.org/Crud-Film/elenca_film.php/?IDRegista=$ID");
        } else{
            echo "Errore: " . $query . "<br/>" . $connessione->error;
            echo $query;
        }


        $connessione->close();
    }
    else{
        $IDRegista=$_GET['IDRegista'];

        echo "<form action='inserisci_film.php/' method='post'>";
        echo"<input class='form-control' style='display:none;' type='text' id='IDRegista' name='IDRegista' value='".$IDRegista."'>";
        echo '<div class="mb-3">';
        echo '<label for="Titolo" class="form-label" ">Titolo del film</label>';
        echo '<input type="text" class="form-control" id="Titolo" aria-describedby="Titolo" name = "Titolo" placeholder="Titolo del film">';
        echo '';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="Data-Uscita" class="form-label" >Data di uscita del film</label>';
        echo '<input type="date" class="form-control" id="Data-Uscita" name = "Data-Uscita">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-success">Invia</button>';
        echo '</form>';
    }
?>
<!--        <div class="mb-3">
            <label for="Titolo" class="form-label" name = "Titolo">Titolo del film</label>
            <input type="text" class="form-control" id="Titolo" aria-describedby="Titolo" placeholder="Titolo del film">

        </div>
        <div class="mb-3">
            <label for="Data-Uscita" class="form-label" name = "Data-Uscita">Data di uscita del film</label>
            <input type="date" class="form-control" id="Data-Uscita" placeholder="14/03/2002">
        </div>
        <button type="submit" class="btn btn-success">Invia</button>
        </form>
-->
</body>
</html>