<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifica Regista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
    include "connessione.php";

    $ID = $_GET["IDRegista"];
    if(isset($_POST["Nome"]))
    {
        $IDRegista = $_POST["IDRegista"];
        $Nome = $_POST["Nome"];
        $Cognome = $_POST["Cognome"];
        $table = "Registi";
        $query = "UPDATE $table SET IDRegista='".$IDRegista."', Nome='".$Nome."', Cognome='".$Cognome."' WHERE IDRegista = $IDRegista";
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
        $table = "Registi";
        $query1 = "SELECT * FROM $table WHERE `IDRegista` = ".$ID;
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
                $NomeRegista = $recordset["Nome"];
                $CognomeRegista = $recordset["Cognome"];

            }
        }


        echo("<form method='post' action='http://cardillodavide.altervista.org/Crud-Film/modifica_regista.php'>");
        echo("<input style='display:none;' type='text' id='IDRegista' name='IDRegista' value='".$ID."'>");
        echo("Nome regista");
        echo("<input type='text' id='Nome' name='Nome' value='".$NomeRegista."' required ><br><br>");
        echo("Cognome");
        echo("<input type='text' id='Cognome' name='Cognome' value='".$CognomeRegista."' required><br><br>");
        echo("<input type='reset' value='Cancella'>  <input  type='submit' value='Invia'>");
        echo("</form>");

    }


?>
</body>
</html>