
<?
	include "connessione.php";
	$Nome=$_POST['Nome'];
	$Cognome=$_POST['Cognome'];
	$query = "INSERT INTO Registi(IDRegista, Nome, Cognome) VALUES (NULL, '$Nome', '$Cognome')";
	if ($connessione->query($query))
	{
		echo "Record aggiunto!<br/>";
		echo "Il suo id e' ".$connessione->insert_id;
	}
	else
		echo "Errore: ".$query."<br/>".$connessione->error;
	$connessione->close();
?>
