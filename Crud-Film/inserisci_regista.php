<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inserisci regista</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<form ACTION="inserisci_regista.php"  METHOD="POST">
	<INPUT TYPE="Text" NAME="Nome"> Nome <BR>
	<INPUT TYPE="Text" NAME="Cognome"> Cognome <BR>
	<INPUT TYPE="submit" VALUE="invia">
	<INPUT TYPE="Reset" VALUE="cancella">
</form>
</body>
</html>
<?
	include "connessione.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Nome = $_POST['Nome'];
	$Cognome = $_POST['Cognome'];
	$query = "INSERT INTO `Registi`(`IDRegista`, `Nome`, `Cognome`) VALUES (NULL, '$Nome', '$Cognome')";
	if ($connessione->query($query)) {
		//echo "Record aggiunto!<br/>";
		//echo "Il suo id e' " . $connessione->insert_id;
		header('Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php');
	} else
		echo "Errore: " . $query . "<br/>" . $connessione->error;
	$connessione->close();
}
?>
