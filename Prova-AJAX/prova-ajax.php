<!DOCTYPE html>
<html>
<style>
    table,th,td {
        border : 1px solid black;
        border-collapse: collapse;
    }
    th,td {
        padding: 5px;
    }
</style>
<body>

<h1>Prova AJAX</h1>

<form action="">
    <select name="users" onclick="showNames()" onchange="showUser(this.value)">
        <option>Seleziona opzione</option>
        <?
            include "connessione.php";
            $la_query="select id,first_name, last_name from users;";
            if(!$risultati=$connessione->query($la_query))
            {
                echo("Errore nell'esecuzione della query: .$la_query. ".$connessione->error.".");
                exit();
            }else{
                if($risultati->num_rows>0){
                   //echo ' <select name="users" onclick="showNames()" onchange="showUser(this.value)">';
                   while ($recordset = $risultati->fetch_array(MYSQLI_ASSOC)){
                       echo "<option value=".$recordset['id'].">".$recordset["first_name"]. " ".$recordset["last_name"]."</option>";
                   }

                }
            }
            $connessione->close();
        ?>
    </select>
</form>
<br>
<div id="txtHint">User info will be listed here...</div>

<script>
    function showUser(str) {
        var xhttp;
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                user_info = JSON.parse(this.responseText);
                format_data = "<table><tr><th>Nome</th>";
                for(record=0;record<user_info.length;record++){
                    format_data+="<td>";
                        format_data+=user_info[record]["first_name"];
                    format_data+="</td><th>Cognome</th><td>";
                        format_data+=user_info[record]["last_name"];
                    format_data+="</td><th>Email</th><td>";
                        format_data+=user_info[record]["email"];
                    format_data+="</td><th>Telefono</th><td>";
                        format_data+=user_info[record]["phone"];
                    format_data+="</td></tr></table>";
                }
                document.getElementById("txtHint").innerHTML = format_data;
            }
        };
        xhttp.open("GET", "http://cardillodavide.altervista.org/Prova-AJAX/get-user.php?id="+str, true);
        xhttp.send();
    }
</script>

</body>
</html>