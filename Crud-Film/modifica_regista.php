<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifica Regista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://cardillodavide.altervista.org/index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://cardillodavide.altervista.org/ProgettiGO/go.html">Progetti GO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://cardillodavide.altervista.org/Appunti/appunti.html">Appunti</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php">Registi</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/davixlive/Sito/blob/main/Crud-Film/modifica_regista.php"><span class="bi bi-github">Sorgente</a>
                </li>
            </ul>
          </div>
        </div>
  </nav>
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


        echo("<form action='modifica_regista.php' method='post' >");
        echo("<input style='display:none;' type='text' id='IDRegista' name='IDRegista' value='".$ID."'>");
        echo '<div class="mb-3">';
        echo '<label for="Nome" class="form-label" ">Nome del regista</label>';
        echo '<input type="text" class="form-control" id="Nome" value='.$NomeRegista.' name = "Nome">';
        echo '';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="Cognome" class="form-label" ">Cognome del regista</label>';
        echo '<input type="text" class="form-control" id="Cognome" value='.$CognomeRegista.' name = "Cognome">';
        echo '<button type="submit" class="btn btn-success">Invia</button>';
        echo("</form>");

    }


?>
<!--<button  style="background-color: purple ; color: white" onclick="location.href='https://github.com/davixlive/Sito/blob/main/Crud-Film/modifica_regista.php'"><span class="bi bi-github"></span>Sorgente</button>-->
</body>
</html>
