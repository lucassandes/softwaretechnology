<?php
require_once("resources/template.tpl.php");

$vals = array();

if($_SESSION["has_error"] == true) {
	$vals = $_SESSION["vals"];
}
else {
	$vals =  array(
		'suggestion' => "",
		'moods' => "",
		'url' => ""	
	);
}

$sql = "select moodId as id, name from mood";
$result = $conn->query($sql);
if (!$result) {
    throw new Exception("Database Error.");
}

// Vars
$variables = array(
    'title' => "Give Suggestion",
    'has_error' => $_SESSION["has_error"],
    'errs' => $_SESSION["errs"],
    'vals' => $vals,
    'result' => $result
);

init_session_values();

// Render
renderLayoutWithContentFile("give_suggestions.tpl.php", $variables);
?>
