<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Today Elte is Feeling...</title>

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
            <h1 class="text-center">Today ELTE is feeling...</h1>
            <div class="">
				<?php				
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
					
					$sql = "Select idMood,count(*) FROM mood_vote GROUP BY idMood ORDER BY count(*) DESC";
					$result = $conn->query($sql);
					if (!$result) 
					{
						throw new Exception("Database Error ");
					}
					if (mysqli_num_rows($result) != 0)
					{
						$mood_id = $result->fetch_assoc()["idMood"];
					}
					else
					{
						$mood_id = 1;
					}
					$sql = "SELECT pictureMoodDirectory FROM mood WHERE moodId = '$mood_id'";
					$result = $conn->query($sql);
					if (!$result) 
					{
						throw new Exception("Database Error ");
					}
					
					echo "<img src='".$result->fetch_assoc()["pictureMoodDirectory"]."' alt='mood' class='img-responsive center-block' />";
				?>
            </div>
			
            <h3 class="text-center">Lorem ipsum dolor sit amet, consectetur adielit. Etiam eget ligula eu lectus lobortis.</h3>

            <a class="btn btn-primary btn-block btn-lg" href="mood-meter.php" role="button">I want to participate!</a>
            <a class="btn btn-default btn-block btn-lg" href="give-suggestions.php" role="button">I want to suggest!</a>
        </div>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
