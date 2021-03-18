<?php
	
	require("mysqli_oop_connect.php");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {


         $username = strip_tags($_POST['username']);
         $message = strip_tags($_POST['message']);
  
        // Make the query:
        $q = 'INSERT INTO messages (username,message) VALUES (?, ?)';

        // Prepare the statement:
        $stmt = $mysqli->prepare($q);

        
        //Check whether the username or password is empty or not

        if(empty($_POST['username'])){
            echo 'Please Enter Username <br>';
        }
        else {
            $un = $username;
        }

        if(empty($_POST['message'])){
            echo 'Please Enter Message<br>';
        }
        else {
            $msg =  $message;
        }

        // Bind the variables:
        $stmt->bind_param('ss', $un, $msg);

        // Execute the query:
        $stmt->execute();
        
        //store result	
        $stmt->store_result();

        // Print a message based upon the result:
        if ($stmt->affected_rows == 1) {
            echo '<h1>Success</h1>';
        } else {
            echo '<p style="font-weight: bold; color: #C00">Failure</p>';
            // echo '<p>' . $stmt->error . '</p>';
        }

        // Close the statement:
        $stmt->close();
        unset($stmt);
            
     }
	
?>

