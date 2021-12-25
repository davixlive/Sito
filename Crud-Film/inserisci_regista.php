<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>Inserisci regista</title>
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
                                <a class="nav-link" href="https://github.com/davixlive/Sito/blob/main/Crud-Film/inserisci_regista.php"><span class="bi bi-github">Sorgente</a>
                            </li>
						</ul>
					</div>
				</div>
	</nav>
<br><br>
<form action="inserisci_regista.php" method="post">
    <div class="mb-3">
        <label for="Nome" class="form-label">Nome Regista</label>
        <input type="text" class="form-control" id="Nome" aria-describedby="Nome" placeholder="Nome" name="Nome">

    </div>
    <div class="mb-3">
        <label for="Cognome" class="form-label">Cognome Regista</label>
        <input type="text" class="form-control" id="Cognome" placeholder="Cognome" name="Cognome">
    </div>
    <button type="submit" class="btn btn-success">Invia</button>
</form>
<!--<button  style="background-color: purple ; color: white" onclick="location.href='https://github.com/davixlive/Sito/blob/main/Crud-Film/inserisci_regista.php'"><span class="bi bi-github"></span>Sorgente</button>-->
</body>
</html>
<?
	include "connessione.php";
    if (isset($_POST["Nome"])) {
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
