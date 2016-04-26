<?php
require_once("resources/template.tpl.php");

$variables = array(
	'title' => "Test"
);

// Render
renderLayoutWithContentFile("test.tpl.php", $variables);

?>