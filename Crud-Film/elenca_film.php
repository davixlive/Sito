<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Visualizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function inserisci(IDRegista){
            window.location.href = "http://cardillodavide.altervista.org/Crud-Film/inserisci_film.php/?IDRegista="+IDRegista;
        }
        function elimina(IDFilm) {

            var answer = window.confirm("Eliminare il film con id ["+IDFilm+"]?");
            if (answer) {
                window.location.href = "http://cardillodavide.altervista.org/Crud-Film/elimina_film.php/?IDFilm="+IDFilm;
            }

        }
        function modifica(IDFilm){
            window.location.href = "http://cardillodavide.altervista.org/Crud-Film/modifica_film.php/?IDFilm="+IDFilm;
        }
    </script>
</head>
<body>

<?
include "connessione.php";
$IDRegista = $_GET['IDRegista'];
$la_query="SELECT * FROM `Film` WHERE `IDRegista` = $IDRegista ORDER BY `IDFilm` ASC";
$la_query.=";";

//echo("La mia query [".$la_query."]<br/>");

if(!$risultati=$connessione->query($la_query)) {
    echo("Errore nell'esecuzione della query: ".$connessione->error.".");
    exit();
} else {
//echo("Dalla tabella ho estratto ".$risultati->num_rows." record<br/>");
?>


<div class="container-large">
    <br><br><br>
    <h1 class="display-1">ELENCO FILM</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <?

            echo "<button type='button' class='btn btn-success' data-toggle='modal' onclick='inserisci(".$IDRegista.")'><span class='bi bi-plus-square'></span> INSERISCI</button>";

            ?>
            <tr>
                <th scope="col" class="text-center">ID Film</th>
                <th scope="col" class="text-center">Titolo</th>
                <th scope="col" class="text-center">Data Uscita</th>
                <th scope="col" class="text-center">Azioni</th>
            </tr>
            </thead>
            <tbody>
            <?

                while($recordset = $risultati->fetch_array(MYSQLI_ASSOC)){
                echo"<tr>";
                echo "<th scope='row' class='text-center'>".$recordset["IDFilm"]."</th>";
                echo "<td class='text-center'>".$recordset["Titolo"]."</td>";
                echo "<td class='text-center'>".$recordset["Data-Uscita"]."</td>";
                echo "<td class='text-center'><button type='button' class='btn btn-danger' data-toggle='modal' onclick='elimina(".$recordset["IDFilm"].")'><span class='bi bi-trash'></span></button> <button type='button' class='btn btn-primary'onclick='modifica(".$recordset["IDFilm"].")'><span class='bi bi-pencil-square'></span></button></td>";
                //echo "<td class='text-center'><button type='button' class='btn btn-primary'onclick='modifica(".$recordset["IDFilm"].")'>Modifica</button></td>";
                echo"</tr>";
                }
                $risultati->close();
            }
            $connessione->close();
            ?>

            </tbody>
        </table>
        </div>
    <button  style="background-color: purple ; color: white" onclick="location.href='https://github.com/davixlive/Sito/blob/main/Crud-Film/elenca_film.php'"><span class="bi bi-github"></span>Sorgente</button>
</div>
</body>
</html>