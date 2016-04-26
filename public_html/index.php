<?php
require_once("resources/template.tpl.php");

$sql = "Select idMood,count(*) FROM mood_vote GROUP BY idMood ORDER BY count(*) DESC";

$result = $conn->query($sql);
if (!$result) {
	throw new Exception("Database Error ");
}

if (mysqli_num_rows($result) != 0) {
	$mood_id = $result->fetch_assoc()["idMood"];
}
else {
	$mood_id = 1;
}

$sql = "SELECT pictureMoodDirectory as dic FROM mood WHERE moodId = '$mood_id'";

$result = $conn->query($sql);
if (!$result)  {
	throw new Exception("Database Error ");
}

$dic = $result->fetch_assoc()["dic"];

// Vars
$variables = array(
	'title' => "Home",
	'dic' => $dic
);

// Render
renderLayoutWithContentFile("index.tpl.php", $variables);
?>

