<?php

header('Content-type: application/json');

   $mysqli = new mysqli('localhost', 'root', '', 'aichatbot');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    
/* Create the prepared statement */
if ($stmt === $mysqli->prepare("INSERT INTO `interactions`(`query`, `response`, `responsePerception`, `date`) values (?, ?, ?, ?)")) {
	
	/* Bind our params */
	$stmt->bind_param($talk, $botchat, $evaluation, CURRENT_TIMESTAMP );
	
	/* Set our params */


        $talk = filter_input(INPUT_POST, 'message');
        $botchat = filter_input(INPUT_POST, 'marvinSaid');
        $evaluation = filter_input(INPUT_POST, 'rating');

	
	/* Execute the prepared Statement */
	$stmt->execute();
	
	/* Echo results */
	console.log("Inserted {$lastName},{$firstName},{$evaluation}, {CURRENT_TIMESTAMP} into database\n");
	
	
	/* Close the statement */
	$stmt->close();	
        }
        else {
                /* Error */
                printf("Prepared Statement Error: %s\n", $mysqli->error);
        }


        /* Create the prepared statement */
        if ($stmt === $mysqli->prepare("SELECT query, response, responsePerception FROM interactions ORDER BY date")) {	
                /* Execute the prepared Statement */
                $stmt->execute();

                /* Bind results to variables */
                $stmt->bind_result($talk, $botchat, $evaluation);

                /* fetch values */
            while ($stmt->fetch()) {
                printf("%s %s\n", $talk, $botchat, $evaluation);
            }

            /* Close the statement */
            $stmt->close();

        }
        else {
                /* Error */
                printf("Prepared Statement Error: %s\n", $mysqli->error);
        }

        /* close our connection */
        $mysqli->close();