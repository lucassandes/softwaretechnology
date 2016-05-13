<?php
require_once("resources/template.tpl.php");

$sql = "select moodId as id, name from mood";
$result = $conn->query($sql);
if (!$result) {
    throw new Exception("Database Error.");
}
 
// Vars
$variables = array(
    'title' => "Give Suggestion",
    'result' => $result
);

// Render
renderLayoutWithContentFile("give_suggestions.tpl.php", $variables);
?>
