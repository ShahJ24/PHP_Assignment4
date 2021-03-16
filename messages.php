<?php


require("mysqli_oop_connect.php");


$sql = "SELECT * FROM messages";

$result = $mysqli -> query($sql); //use the mysqli object's query method to run the query and store the results in $r
while($row = $result->fetch_array()) { //use the $r object's fetch_assoc method to store each row of the selection in the $row variable.
  echo "<div>{$row["username"]}</div>";
  echo "<div>{$row["message"]}</div>";
}


$mysqli -> close();
?>