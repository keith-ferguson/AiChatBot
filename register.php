<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/site.css">
    <title>ChatBot</title>
</head>

   
<body>
    <div class="container chatwindow">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs column">
                <div class="jumbotron">
                    <h1>Chat Bot Program
                    </h1>
                    <p>
                        Chat away
                    </p>
                </div>
            </div>
			<div class="hidden-lg hidden-md hidden-sm col-xs-12 column">
				<h1>Chat Bot Program
				</h1>
			</div>
		</div>
	</div>
	<div class="row clearfix">
	<div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 column">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 column">
			<div class="Login">
				<h2>Register here</h2>
				<a class="btn btn-primary btn-large" href="index.php">Back</a><br/><br/>
				<form action="register.php" method="POST">
				   Enter Username: <input type="text" name="username" required="required" /> <br/>
				   Enter Password: <input type="password" name="password" required="required" /> <br/>
				   <input type="submit" value="Register"/>
				</form>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 column">
		</div>
	</div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$bool = true;
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("aichatbot") or die("Can't connect to the bot");
	$query = mysql_query("SELECT * FROM users");
	while($row = mysql_fetch_array($query))
	{
		$table_users = $row['username'];
		if($username == $table_users)
		{
			$bool = false;
			Print '<script>alert("Username has been taken");</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}
	}
	
	if($bool)
	{
		mysql_query("INSERT INTO users (username, password) values ('$username', '$password')");
		Print '<script>alert("Username has been registered");</script>';
		Print '<script>window.location.assign("register.php");</script>';
	}
}
?>