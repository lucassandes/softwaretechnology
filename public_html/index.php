<?php 	include 'resources/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.inc.php'); ?>
    <title>Today Elte is Feeling...</title>
</head>

<body>
		<div id="index" class="container col-lg-6">
	    <!-- <div class="col-lg-6"> -->


            <h1 class="text-center">Today ELTE is feeling ...</h1>
            <div>
				<?php				
				
					
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



            <a class="btn btn-primary btn-block btn-lg" href="mood-meter.php" role="button">I want to participate!</a>
            <a class="btn btn-default btn-block btn-lg" href="give-suggestions.php" role="button">I want to suggest!</a>
        <!-- </div> -->
        </div>

    <?php require_once('includes/body_footer.inc.php'); ?>
    <?php require_once('includes/scripts.inc.php'); ?>
</body>

</html>
