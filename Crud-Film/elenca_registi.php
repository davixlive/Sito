<?
include "connessione.php";

$la_query="SELECT * FROM Registi";
$la_query.=";";

//echo("La mia query [".$la_query."]<br/>");

if(!$risultati=$connessione->query($la_query)) {
    echo("Errore nell'esecuzione della query: ".$connessione->error.".");
    exit();
} else {
    echo("Dalla tabella ho estratto ".$risultati->num_rows." record<br/>");
    if($risultati->num_rows>0)
    {
        ?>
        <!DOCTYPE html>
        <html lang="it" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>Visualizza Registi</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        </head>
        <body>
        <script>
            function elimina(IDRegista) {

                var answer = window.confirm("Eliminare il regista con id ["+IDRegista+"]?");
                if (answer) {
                    window.location.href = "http://cardillodavide.altervista.org/Crud-Film/cancella_regista.php/?IDRegista="+IDRegista;
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
        <div class="container-lg">
            <br><br><br>
            <h1 class="display-1">ELENCO REGISTI</h1>
            <button type='button' class='btn btn-successful'onclick='inserisci()'>Inserisci regista</button>
            <div class="table-responsive">

            <table class="table table-info">
                <thead>
                <tr>
                    <th scope="col" class="text-center">ID Regista</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th  scope="col"class="text-center">Cognome</th>
                    <th scope="col" class="text-center">Elimina</th>
                    <th scope="col" class="text-center">Elenca film</th>
                    <th scope="col" class="text-center">Modifica</th>
                </tr>
                </thead>
                <tbody>

        <?
            while($recordset = $risultati->fetch_array(MYSQLI_ASSOC))
            {
                echo"<tr>";
                echo "<td class='text-center'>".$recordset["IDRegista"]."</td>";
                echo "<td class='text-center'>".$recordset["Nome"]."</td>";
                echo "<td class='text-center'>".$recordset["Cognome"]."</td>";
                echo "<td class='text-center'><button type='button' class='btn btn-danger' data-toggle='modal' onclick='elimina(".$recordset["IDRegista"].")'>elimina</button></td>";
                echo "<td class='text-center'><button type='button' class='btn btn-primary'onclick='elenca(".$recordset["IDRegista"].")'>elenca film</button></td>";
                echo "<td class='text-center'><button type='button' class='btn btn-primary'onclick='modifica(".$recordset["IDRegista"].")'>Modifica regista</button></td>";
                echo"</tr>";
            }
            $risultati->close();
        }
    }
    $connessione->close();
    ?>
            </div>
        </div>
        </body>
</html>