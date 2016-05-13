<?php 
require_once("resources/template.tpl.php");

$_SESSION["has_error"] = false;

$errors = array();

$suggestion = $_POST['suggestion'];

if(isset($_POST['mood'])) {
	$moods = $_POST['mood'];
}
else {
	$moods = array();
}
$sugg_url = $_POST['url'];

// Valid URL
if(!empty($sugg_url)) {

	if(substr($sugg_url, 0, 4) != "http") {
		$sugg_url = "http://".$sugg_url;
	}

	if (!filter_var($sugg_url, FILTER_VALIDATE_URL)) {
		array_push($errors, "Invalid URL");
	}
}

// Size of moods.
if(sizeof($moods) < 1) {
	array_push($errors, "Select at least one mood.");
}

if(sizeof($errors) > 0) {
	

	$vals = array(
		'suggestion' => $suggestion,
		'moods' => $moods,
		'url' => $sugg_url	
	);

	$_SESSION["has_error"] = true;
	$_SESSION["errs"] = $errors;
	$_SESSION["vals"] = $vals;

	header("Location: give_suggestions.php");
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

foreach ($moods as &$mood) {
	$sql = "INSERT INTO suggestion_markers (idSuggestion, idMood) 
	VALUES (" . $new_id . ", ". $mood . ");";

	$result = $conn->query($sql);
	if (!$result) {
		throw new Exception("Database Error.");
	}
}

// Vars
$variables = array(
    'title' => 'Give Suggestion',
    'errs' => $errors
);

// Render
renderLayoutWithContentFile("upload_suggestion.tpl.php", $variables);
?>