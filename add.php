<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $details = mysql_real_escape_string($_POST['details']);
       $time = strftime("%X"); //time
       $date = strftime("%B %d, %Y"); //date
	   $user = $_SESSION['user'];
   
       mysql_connect("localhost","root","") or die(mysql_error()); //Connect to server
       mysql_select_db("aichatbot") or die("Cannot connect to database"); //Connect to database
       
       mysql_query("INSERT INTO list(details, date_posted, time_posted, user) VALUES ('$details','$date','$time','$user')"); //SQL query
	   header("location:reply.php");	   
    }
    else
    {
       header("location:chatbox.php");
    }
?>