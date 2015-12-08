<?php 	include 'connect.php'; ?>
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

			<?php
			   $mood = $_POST['mood'];
				
				
				
				$mood_ids = array();
				foreach ($mood as $mood=>$value) 
				{
					$sql = "SELECT moodId FROM mood WHERE name = '$value'";
					$result = $conn->query($sql);
					if (!$result) 
					{
						throw new Exception("Database Error ");
					}
					$mood_ids[] = $result->fetch_assoc()["moodId"];
				}
				$suggestion = $_POST['suggestion'];
				$sql = "INSERT INTO suggestion (titleSuggestion) VALUES ('$suggestion')";
				$result = $conn->query($sql);
				if (!$result) 
				{
					throw new Exception("Database Error ");
				}
				$id = $conn->insert_id;
				for ($x = 0; $x < sizeof($mood_ids); $x++) 
				{
					$mood_id = $mood_ids[$x];
					$sql = "INSERT INTO suggestion_markers (idSuggestion, idMood) VALUES ('$id', '$mood_id')";
					$result = $conn->query($sql);
					if (!$result) 
					{
						throw new Exception("Database Error ");
					}
				} 
			?>

			<h1 class="text-center">Thank you for giving us your suggestion!</h1>
			
			<a class="btn btn-primary btn-block btn-lg" href="index.php" role="button">Ok!</a>

	    </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html> 