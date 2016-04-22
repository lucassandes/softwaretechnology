<?php 
	include 'resources/connect.php'; 

	$moods = $_POST['mood'];
	$suggestion = $_POST['suggestion'];
	$sugg_url = $_POST['url'];

	// Valid URL
	if(!empty($sugg_url)) {

		if(substr($sugg_url, 0, 4) != "http") {
			$sugg_url = "http://".$sugg_url;
		}

		if (!filter_var($sugg_url, FILTER_VALIDATE_URL) === false) {
			print("$url is a valid URL");
		} else {
			print("$url is not a valid URL");
			header("Location: give-suggestions.php");
		}
	}

	// Insert new suggestion
	$sql = "INSERT INTO suggestion (titleSuggestion, linkSuggestion) 
			VALUES ('$suggestion', '$sugg_url')";

	$result = $conn->query($sql);
	if (!$result) {
		throw new Exception("Database Error");
	}

	// ID of the new suggestion.
	$new_id = $conn->insert_id;
?>

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
  			foreach ($moods as $mood) {
  				$sql = "INSERT INTO suggestion_markers (idSuggestion, idMood) 
  						VALUES ('$new_id', '$mood')";
  				$result = $conn->query($sql);
  				if (!$result) 
  				{
  					throw new Exception("Database Error.");
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