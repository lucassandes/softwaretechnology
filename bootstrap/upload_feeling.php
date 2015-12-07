<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Give your suggestion</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="index" class="container">
        <div class="col-md-12">

			<h1 class="text-center">Here are a suggestions what you should do:</h1>
			
			<?php
			    $mood = $_POST['mood'];

				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "example_database";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $database);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql = "SELECT moodId FROM mood WHERE name = '$mood'";
				$result = $conn->query($sql);
				if (!$result) 
				{
					throw new Exception("Database Error ");
				}
				$mood_id = $result->fetch_assoc()["moodId"];
				
				$sql = "INSERT INTO mood_vote (idMood) VALUES ('$mood_id')";
				$result = $conn->query($sql);
				if (!$result) 
				{
					throw new Exception("Database Error ");
				}
				
				$sql = "Select idSuggestion FROM suggestion_markers WHERE idMood = '$mood_id'";
				$result = $conn->query($sql);
				if (!$result) 
				{
					throw new Exception("Database Error ");
				}
				if (mysqli_num_rows($result) != 0)
				{
					$r = rand(0, mysqli_num_rows($result) - 1);
					for ($x = 0; $x < $r - 1; $x++) 
					{
						$result->fetch_assoc()["idSuggestion"];
						if (!$result) 
						{
							throw new Exception("Database Error ");
						}
					} 
					
					$suggestion_id = $result->fetch_assoc()["idSuggestion"];
					
					$sql = "Select titleSuggestion FROM suggestion WHERE suggestionId = '$suggestion_id'";
					$result = $conn->query($sql);
					if (!$result) 
					{
						throw new Exception("Database Error ");
					}
					echo "<h3 class='text-center'>" .$result->fetch_assoc()["titleSuggestion"]. "</h3>";
				}
				else
				{
					echo "<h3 class='text-center'> No suggestion yet! </h3>";
				}
			?>
			
			<a class="btn btn-primary btn-block btn-lg" href="index.php" role="button">Thanks!</a>
	    </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html> 