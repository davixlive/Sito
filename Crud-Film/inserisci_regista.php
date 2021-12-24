<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>Inserisci regista</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<form action="inserisci_regista.php" method="post">
    <div class="mb-3">
        <label for="Nome" class="form-label">Nome Regista</label>
        <input type="text" class="form-control" id="Nome" aria-describedby="Nome" placeholder="Nome">

    </div>
    <div class="mb-3">
        <label for="Cognome" class="form-label">Cognome Regista</label>
        <input type="text" class="form-control" id="Cognome" placeholder="Cognome">
    </div>
    <button type="submit" class="btn btn-success">Invia</button>
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
