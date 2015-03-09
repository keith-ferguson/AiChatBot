

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
				<blockquote class="bot pull-right">
					<p>
						Lorem ipsum dolor sit amet
					</p>
					<small><cite>Bot</cite></small>
				</blockquote>
				<br />
				<blockquote class="human">
					<p>
						Consectetur adipiscing elit. 
					</p>
					<small><cite>Me</cite></small>
				</blockquote>
				<br />
				<blockquote class="bot pull-right">
					<p>
						Lorem ipsum dolor sit amet
					</p>
					<small><cite>Bot</cite></small>
				</blockquote>
				<br />
				<blockquote class="human">
					<p>
						Consectetur adipiscing elit. 
					</p>
					<small><cite>Me</cite></small>
				</blockquote>
				<br />
				<blockquote class="bot pull-right">
					<p>
						Consectetur adipiscing elit.
						Integer posuere erat a ante.
					</p>
					<small><cite>Bot</cite></small>
				</blockquote>
				</div>
				<div class="row chatbox">
					<p class="text-primary">
						Aliquam eget sapien sapien. 
					</p>
				</div>
				<div class="row chatbuttons">
					<a href="#" class="btn btn-lg btn-primary" type="button">Send</a>
					<button type="button" class="btn btn-primary">Clear</button>
				</div>
			</div>
		<div class="col-lg-3 col-md-3 col-sm-2 col-sm-1 column">
		</div>
	</div>
</body>
</html>
