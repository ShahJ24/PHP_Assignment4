<?php


require("mysqli_oop_connect.php");


$sql = "SELECT * FROM messages";

$result = $mysqli -> query($sql); //use the mysqli object's query method to run the query and store the results in $result
while($row = $result->fetch_array()) { //use the $result object's fetch_assoc method to store each row of the selection in the $row variable.
  echo "USERNAME <strong>".$row["username"]."</strong> have a MESSAGE <strong>".$row["message"]."</strong><br/>";
}


$mysqli -> close();
?>