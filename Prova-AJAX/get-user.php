<?php
include "connessione.php";
$id = $_GET['id'];
$la_query="select first_name, last_name, email, phone from users where id = $id ;";
if(!$risultati=$connessione->query($la_query))
{
    echo("Errore nell'esecuzione della query: .$la_query. ".$connessione->error.".");
    exit();
}
while($recordset = $risultati->fetch_array(MYSQLI_ASSOC)){
    $first_name = $recordset['first_name'];
    $last_name = $recordset['last_name'];
    $email = $recordset['email'];
    $phone = $recordset['phone'];
}
echo "<table>";
echo "<tr>";
echo "<th>Nome</th>";
echo "<td>" . $first_name . "</td>";
echo "<th>Cognome</th>";
echo "<td>" . $last_name . "</td>";
echo "<th>Email</th>";
echo "<td>" . $email . "</td>";
echo "<th>Telefono</th>";
echo "<td>" . $phone . "</td>";
echo "</tr>";
echo "</table>";