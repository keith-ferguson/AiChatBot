

<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/site.css">
    <title>ChatBot</title>
</head>
  <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
   
<body>
    <div class="container chatwindow">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs column">
                <div class="jumbotron">
                    <h1>Chat Bot Program
                    </h1>
					<p>
						<?php echo "Chat away, ". $user . "<br/>";?>
						<a class="btn btn-primary btn-large pull-right" href="logout.php">Logout</a><br/>
					</p>
                </div>
            </div>
			<div class="hidden-lg hidden-md hidden-sm col-xs-12 column">
				<strong>Chat Bot Program</strong><br/>
				<p>
					<?php echo "Chat away, ". $user . "";?>
					<a class="btn btn-primary btn-small pull-right" href="logout.php">Logout</a><br/><br/>
				</p>
			</div>
		</div>
	</div>

	<div class="row clearfix">
		<div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 column">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 column">
			<div class="row chatlog">
				<?php
				mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysql_select_db("aichatbot") or die("Cannot connect to database"); //connect to database
				$result = mysql_query("SELECT l.details,
											  l.time_posted,
											  l.date_posted,
											  l.user
											  FROM list AS l
									  WHERE (l.user = '$user'
										 OR l.botreplyto = '$user')
										 and l.details <> ''
									  ORDER BY time_posted desc, date_posted desc
									  LIMIT 50"); // SQL Query
									  
				if($result === FALSE) { 
					die(mysql_error()); // TODO: better error handling
				}

				while($chat = mysql_fetch_array($result))
				{
					$convo = $chat['details'];
					$posted = $chat['time_posted'];
					$poster	= $chat['user'];
					$divclass = ($chat['user']) == 'bot' ? "'bot pull-right'" : "'human'";
					
					echo "<blockquote class=". $divclass .">";
					echo "<p>". $convo . "</p>";
					echo "-". $poster ."";
					echo "posted at ". $posted ."";
					echo "</blockquote>";
					
				}
			?>
			
			</div>
			<div class="row chatbox">
				<form action="add.php" method="POST">
					<div class="chattext col-lg-10 col-md-10 col-sm-10 col-xs-9 column">
						<input type="text" style="width: 80%; height: 100px;" name="details" /><br/>
					</div>
					<div class="chatbuttons col-lg-1 col-md-1 col-sm-1 col-xs-1 column">
						<input type="submit" class="chatsend btn btn-primary" type="button" value="Send"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-2 col-sm-1 column">
		</div>
	</div>
</body>
</html>
