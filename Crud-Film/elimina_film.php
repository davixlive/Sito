<?
include "connessione.php";
$IDFilm = $_GET['IDFilm'];

$query = "DELETE FROM `Film` WHERE `IDFilm`= ".$IDFilm.";";
//$query2 = "SELECT `IDRegista` FROM `Film` WHERE `IDFilm`= ".$IDFilm.";";
echo $query."<br>";
//$IDRegista = mysqli_query($connessione)
$result= mysqli_query($connessione, $query);
if (!$result)
    echo"window.alert('ERRORE');";

else{
    header("Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php");
    echo"window.alert('eliminato!');";
}
?>