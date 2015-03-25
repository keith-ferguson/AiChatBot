<?php

function pg_connection_string() {
  return "dbname=d2cda3df5m1lok host=ec2-107-20-244-39.compute-1.amazonaws.com port=5432 user=jmnbdtcvtrmijv password=tKVu4N2X
U3cdBPd46lNfOS2t7f sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if ($db->connect_error) {
    console.log("Connection Failed");
    die("Connection failed: " . $conn->connect_error);
} else {
    console.log("Connection Establised");
}

$query = "SELECT ID FROM interactions";
$result = mysqli_query($dbConnection, $query);

if(empty($result)) {
                $query = "CREATE TABLE interactions (
                          ID int(11) AUTO_INCREMENT,
                          query varchar(500) NOT NULL,
                          response varchar(500) NOT NULL,
                          responsePerception varchar(50),
                          date DATE
                          )";
                $result = mysqli_query($dbConnection, $query);
}

/* Create the prepared statement */
if ($stmt === $mysqli->prepare("INSERT INTO `interactions`(`query`, `response`, `responsePerception`, `date`) values (?, ?, ?, ?)")) {
	
	/* Bind our params */
	$stmt->bind_param($talk, $botchat, $evaluation, CURRENT_TIMESTAMP );
	
	/* Set our params */


    $talk = filter_input(INPUT_POST, 'query');
    $botchat = filter_input(INPUT_POST, 'botchat');
    $evaluation = filter_input(INPUT_POST, 'response');

	
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