<?
	include "connessione.php";

	$la_query="SELECT * FROM Film";
/*	if(isset($_GET["ordinata"]))
		$la_query.=" ORDER BY RAG_SOCIALE";
	
	//	Al termine della query aggiungo il ;
	*/
	$la_query.=";";
	
	echo("La mia query [".$la_query."]<br/>");
	
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
    <title>Visualizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <br><br><br>
    <h1 class="display-1">ELENCO FILM</h1>
    <table class="table table-info">
        <thead>
        <tr>
            <th class="text-center">ID Film</th>
            <th class="text-center">Titolo</th>
            <th class="text-center">Data Uscita</th>
            <th class="text-center">Regista</th>
        </tr>
        </thead>
        <tbody>
<?
			while($recordset = $risultati->fetch_array(MYSQLI_ASSOC))  
			{
				 echo"<tr>";
                            echo "<td class='text-center'>".$recordset["IDFilm"]."</td>";
                            echo "<td class='text-center'>".$recordset["Titolo"]."</td>";
                            echo "<td class='text-center'>".$recordset["Data-Uscita"]."</td>";
                            echo "<td class='text-center'>".$recordset["IDRegista"]."</td>";
                 echo"</tr>";
			}
			$risultati->close();
		}
	}
	$connessione->close();
?>
