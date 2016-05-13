<?php
require_once("resources/template.tpl.php");

$sql = "select name FROM mood;";
$result = $conn->query($sql);

if (!$result) {
    throw new Exception("Database Error ");
}   

    // Vars
$variables = array(
    'title' => "Mood meter",
    'names' => $result->fetch_array()
);

// Render
renderLayoutWithContentFile("mood-meeter.tpl.php", $variables);

?>