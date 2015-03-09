<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

	   $thinking = rand(1,4);
	   sleep($thinking);
	   
	   
       $bottime = strftime("%X"); //time
       $botdate = strftime("%B %d, %Y"); //date
	   $userr = "bot";
	   $replyto = $_SESSION['user'];
	   	   
	   $random = rand(1,4);

		switch ($random) {
			case "1":
				$reply = "Well, $replyto, right back at you!";
				break;
			case "2":
				$reply = "Han shot first, everyone knows that!";
				break;
			case "3":
				$reply = "Im sorry $replyto. I cant do that!";
				break;
			case "4":
				$reply = "Daisy, Daisy...";
				break;
			default:
				$reply = "That's very interesting, what makes you say that?";
		}

       mysql_connect("localhost","root","") or die(mysql_error()); //Connect to server
       mysql_select_db("aichatbot") or die("Cannot connect to database"); //Connect to database
       
       mysql_query("INSERT INTO list(details, date_posted, time_posted, user, botreplyto) VALUES ('$reply','$botdate','$bottime','$userr','$replyto')"); //SQL query
       header("location:chatbox.php");
 
?>