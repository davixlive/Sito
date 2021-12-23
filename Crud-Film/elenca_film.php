<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Visualizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
$la_query="SELECT * FROM `Film` WHERE `IDRegista` = $IDRegista";
/*	if(isset($_GET["ordinata"]))
		$la_query.=" ORDER BY RAG_SOCIALE";

	//	Al termine della query aggiungo il ;
	*/
$la_query.=";";

//echo("La mia query [".$la_query."]<br/>");

if(!$risultati=$connessione->query($la_query)) {
    echo("Errore nell'esecuzione della query: ".$connessione->error.".");
    exit();
} else {
echo("Dalla tabella ho estratto ".$risultati->num_rows." record<br/>");
?>


<div class="container">
    <br><br><br>
    <h1 class="display-1">ELENCO FILM</h1>
    <?

        echo "<button type='button' class='btn btn-successful' data-toggle='modal' onclick='inserisci(".$IDRegista.")'>Inserisci film</button>";

    ?>
    <table class="table table-info">
        <thead>
        <tr>
            <th class="text-center">ID Film</th>
            <th class="text-center">Titolo</th>
            <th class="text-center">Data Uscita</th>

            <th scope="col" class="text-center">Elimina</th>
        </tr>
        </thead>
        <tbody>
        <?

            while($recordset = $risultati->fetch_array(MYSQLI_ASSOC)){
            echo"<tr>";
            echo "<td class='text-center'>".$recordset["IDFilm"]."</td>";
            echo "<td class='text-center'>".$recordset["Titolo"]."</td>";
            echo "<td class='text-center'>".$recordset["Data-Uscita"]."</td>";
            echo "<td class='text-center'><button type='button' class='btn btn-danger' data-toggle='modal' onclick='elimina(".$recordset["IDFilm"].")'>elimina</button></td>";
            echo "<td class='text-center'><button type='button' class='btn btn-primary'onclick='modifica(".$recordset["IDFilm"].")'>Modifica</button></td>";
            echo"</tr>";
            }
            $risultati->close();
        }
        $connessione->close();
        ?>



        </tbody>
        </table>
    </div>
    </body>
</html>