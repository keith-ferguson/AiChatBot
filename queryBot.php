<?php
	session_start();
/*
	http is a terrible protocol, well maybe its okay. It is what is called a statless protocol so it doesn't 
	remember anything unless we help it a bit. So we have some choices, we can use cookies or we can use 
	sessions. Sessions are simple...we simply start the session using the session_start(). This will start the 
	session and then we can use it like an array to store stuff for us in it. You can store stuff using the following
	syntax: 
	$_SESSION['lastQ'] = $input;
	This is placing whatever is stored in the $input variable into the session array with the key "lastQ". May not 
	be an original variable name but its short for last question. This will allow us to check if somebody is just repeating
	themselves...thats not good!
*/
	/*
		This gets the input from the ajax call. essentially we called the php file using a GET request and passing in 
		user entered input into a variable called text. We PHP to play with this data, so we set up a PHP variable
		using the $ symbol followed by some characters. The query is now stored in the PHP variable called $input.
	*/
	$input = $_GET['text'];
	/*
		If we want to make sure that somebody is not saying the same thing twice or if they are we respond with a 
		"Don't repeat yourself" response. We need to store the input in a session variable as explained above and then
		the second time somebody hits the page with a question we check to see if the new question is the same as the 
		old question.
	
		The first time somebody hits the page the expression isset($_SESSION['lastQ']) returns false as we have not yet stored
		anything in the variable lastQ. After the condition is where we store the variable, so when we hit the page again
		we enter into the IF condition.
	*/
	if(isset($_SESSION['lastQ'])){
		/*
			Here we are comparing the new input to the old input stored in the session variable. If we get a match we 
			echo out to the pipe that goes back to the ajax call and the success method the string "Don't repeat yourself"
			and because we don't want to do anything else we tell PHP to stop processing and send the data back using the
			exit.
		*/
		if($_SESSION['lastQ']==$input){
			echo "Don't repeat yourself";	
			exit;
		}
	}		
	$_SESSION['lastQ'] = $input;
	/*
		Okay so lets think about how we can ask the bot some specifics, for example the Computer knows what day it is. It has a
		system clock...a bit of quarts that resonates at a certain frequency...we call this Time! 
		If we where to ask the bot what day is it or what time is it? What should the bot do? 	
		
		Well PHP can help! First we set the timezone to be GMT and then invoke a call to the Date function passing in the parameter
		"l" which returns the day for us!		
		We can use the strpos() function in PHP to find out if a string contains a substring, however As strpos may return either 
		FALSE (substring absent) or 0 (substring at start of string), strict versus loose equivalency operators must be used very carefully.
		
		if a string is present we use !=== False which equates to true then we ask the user to ask properly and exit!
	*/
	date_default_timezone_set('GMT');
	if($input == "What day is it?"){
		echo "Today is ".date("l");
		exit;
	}
	else if (strpos($input,'day') !== false) {
		echo "I presume that you would like to know what day it is...ask properly";
		exit;
	}
	else if($input == "What time is it?"){
		echo "The time is displayed on my clock above, idiot";
	}
	else{
		/*
			We need to connect to the database and see if we have a suitable response stored that we can return to the user.
			As you have seen the database contains interactions that have a query followed by a response which is then rated.
			So when we get in a querywe need to check if the query already has a suitable answer, if it does that great and we can give 
			out that response...in this example we simple write out to say that "Happy Response Found". If we don't find a suitable 
			answer we need to think about how we are going to do something to create a new response.
		
			The connection below is connected to the database called "bot", running of the localhost with the user and password both 
			set as "root"

			$q1 = "SELECT `response` FROM interactions WHERE `query` = '$input' && `responsePerception` = 'great';";
		
			The query is a simple SELECT query that is running a query against the interactions table with the query field set to the
			input that was passed in and the responsePerception set as "great".
		
			Is there anything you would change in the database? How could you do more. Could you consider that a number of interactions make 
			up a conversation and possibly we get more context when considering multiple interactions together? Perhaps we could 
			run a query over a defined period of time?
		
			There are many tutorials to help you remember your databases module, http://www.tutorialspoint.com/mysql/index.htm is one 
			tutorial that may be of some help.
		*/
		@ $db = new mysqli('localhost', 'root', 'root', 'bot');
			if (mysqli_connect_errno()) {
				echo 'Error: Could not connect to database.  Please try again later.';
				exit;
			}
		$q1 = "SELECT `response` FROM interactions WHERE `query` = '$input' && `responsePerception` = 'great';";

		$result = $db->query($q1);		
		$row = mysqli_fetch_row($result);
		if($row){
			echo "Happy Response found";
		}
		else{
			echo "Batman: I couldn't find a happy response";
		}
	}	
?>