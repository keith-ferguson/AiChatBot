

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
				<form action="checklogin.php" method="POST">
				   Enter Username: <input type="text" name="username" required="required" /> <br/>
				   Enter Password: <input type="password" name="password" required="required" /> <br/>
				   <input type="submit" value="Login"/>
				</form><br />
				<a class="btn btn-primary btn-large" href="register.php"> Click here to register </a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 column">
		</div>
	</div>
</body>
</html>
