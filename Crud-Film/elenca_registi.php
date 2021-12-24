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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        </head>
        <body>

        <script>
            function elimina(IDRegista) {

                var answer = window.confirm("Eliminare il regista con id ["+IDRegista+"]?");
                if (answer) {

                    <?


                    ?>

                    var continuare = window.confirm("Vuoi procedere?");
                    if (continuare) {
                        window.location.href = "http://cardillodavide.altervista.org/Crud-Film/cancella_regista.php/?IDRegista=" + IDRegista;
                    }
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

        </div>
        </body>
</html>