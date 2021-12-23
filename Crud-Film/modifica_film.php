<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifica film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
include "connessione.php";

$ID = $_GET["IDFilm"];
if(isset($_POST["Titolo"]))
{
    $IDFilm = $_POST["IDFilm"];
    $IDRegista = $_POST["IDRegista"];
    $Titolo = $_POST["Titolo"];
    $DataUscita = $_POST["Data-Uscita"];
    $table = "Film";
    $query = "UPDATE $table SET IDFilm='".$IDFilm."', Titolo='".$Titolo."', `Data-Uscita`='".$DataUscita."', IDRegista=".$IDRegista." WHERE IDFilm = $IDFilm";
    if ($connessione->query($query))
    {
        echo "<p>Dati aggiornati correttamente!</p><br/>";
        header('Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php');
    }
    else
        echo ("<p>Errore: ".$query."<br/>".$connessione->error."</p>");

    $connessione->close();
}else
{
    $table = "Film";
    $query1 = "SELECT * FROM $table WHERE `IDFilm` = ".$ID;
    //echo $query1;
    if(!$risultati=$connessione->query($query1))
    {
        echo("Errore nell'esecuzione della query1: ".$connessione->error.".");
        exit();
    }
    else
    {
        while($recordset = $risultati->fetch_array(MYSQLI_ASSOC))
        {
            $Titolo = $recordset["Titolo"];
            $DataUscita = $recordset["Data-Uscita"];
            $IDRegista = $recordset["IDRegista"];

        }
    }


    echo("<form method='post' action='http://cardillodavide.altervista.org/Crud-Film/modifica_film.php'>");
    echo("<input style='display:none;' type='text' id='IDFilm' name='IDFilm' value='".$ID."'>");
    echo("<input style='display:none;' type='text' id='IDRegista' name='IDRegista' value='".$IDRegista."'>");
    echo("Titolo film");
    echo("<input type='text' id='Titolo' name='Titolo' value='".$Titolo."' required ><br><br>");
    echo("Data uscita film");
    echo("<input type='text' id='Data-Uscita' name='Data-Uscita' value='".$DataUscita."' required><br><br>");
    echo("<input type='reset' value='Cancella'>  <input  type='submit' value='Invia'>");
    echo("</form>");

}


?>
</body>
</html>