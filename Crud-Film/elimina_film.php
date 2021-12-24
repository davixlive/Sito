<?
    include "connessione.php";
    $IDFilm = $_GET['IDFilm'];

    $query = "DELETE FROM `Film` WHERE `IDFilm`= ".$IDFilm.";";
    echo $query."<br>";
    $result= mysqli_query($connessione, $query);
    if (!$result)
        echo"window.alert('ERRORE');";
    else{
        header("Location: http://cardillodavide.altervista.org/Crud-Film/elenca_registi.php");
        echo"window.alert('eliminato!');";
    }
?>