<?
include "connessione.php";

$la_query="SELECT * FROM Registi";
$la_query.=";";

//echo("La mia query [".$la_query."]<br/>");

if(!$risultati=$connessione->query($la_query)) {
    echo("Errore nell'esecuzione della query: ".$connessione->error.".");
    exit();
} else {
    //echo("Dalla tabella ho estratto ".$risultati->num_rows." record<br/>");
    if($risultati->num_rows>0)
    {
        ?>
        <!DOCTYPE html>
        <html lang="it" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>Visualizza Registi</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        </head>
        <body>

        <script>
            function elimina(IDRegista) {

                var answer = window.confirm("Eliminare il regista con id ["+IDRegista+"]?");
                if (answer) {
                    window.location.href = "http://cardillodavide.altervista.org/Crud-Film/cancella_regista.php/?IDRegista=" + IDRegista;
                    /*var continuare = window.confirm("Vuoi procedere?");
                    if (continuare) {
                        window.location.href = "http://cardillodavide.altervista.org/Crud-Film/cancella_regista.php/?IDRegista=" + IDRegista;
                    }*/
                }
            }
            function elenca(IDRegista){
                window.location.href = "http://cardillodavide.altervista.org/Crud-Film/elenca_film.php/?IDRegista="+IDRegista;
            }
            function inserisci(){
                window.location.href = "http://cardillodavide.altervista.org/Crud-Film/inserisci_regista.php";
            }
            function modifica(IDRegista){
                window.location.href = "http://cardillodavide.altervista.org/Crud-Film/modifica_regista.php/?IDRegista="+IDRegista;
            }
        </script>
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
                          <a class="nav-link" href="https://github.com/davixlive/Sito/blob/main/Crud-Film/elenca_registi.php"><span class="bi bi-github">Sorgente</a>
                      </li>
                  </ul>
                </div>
              </div>
        </nav>
        <div class="container-large">
            <div class="page-header">
                <p class="display-1" >ELENCO REGISTI</p>

            </div>
            <div class="table-responsive">

            <table class="table table-striped">

                <thead>
                <button type='button' class="btn btn-success" onclick='inserisci()'><span class="bi bi-plus-square"></span> INSERISCI</button>
                <tr>
                    <th scope="col" class="text-center">ID Regista</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col"class="text-center">Cognome</th>
                    <th scope="col" class="text-center">Azioni</th>
                </tr>
                </thead>
                <tbody>

        <?
            while($recordset = $risultati->fetch_array(MYSQLI_ASSOC))
            {
                echo"<tr>";
                echo "<th scope='row' class='text-center'>".$recordset["IDRegista"]."</th>";
                echo "<td class='text-center'>".$recordset["Nome"]."</td>";
                echo "<td class='text-center'>".$recordset["Cognome"]."</td>";
                echo "<div class='d-grid gap-2'>";
                echo "<td class='text-center'><button type='button' class='btn btn-danger'  data-toggle='modal' onclick='elimina(".$recordset["IDRegista"].")'><span class='bi bi-trash'></span></button> <button type='button' class='btn btn-info'onclick='elenca(".$recordset["IDRegista"].")'><span class='bi bi-card-list'></span></button> <button type='button' class='btn btn-primary'onclick='modifica(".$recordset["IDRegista"].")'><span class='bi bi-pencil-square'></span></button></td> ";
                echo"</div>";
                echo"</tr>";
            }
            $risultati->close();
        }
    }
    $connessione->close();
    ?>

                </tbody>
            </table>

            </div>
            <!--<button  style="background-color: purple ; color: white" onclick="location.href='https://github.com/davixlive/Sito/blob/main/Crud-Film/elenca_registi.php'"><span class="bi bi-github"></span>Sorgente</button>-->
        </div>
        </body>
</html>
