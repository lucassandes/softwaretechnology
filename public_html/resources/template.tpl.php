<?php
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Include conf file.
    require_once(realpath(dirname(__FILE__) . "/../resources/config.conf.php"));

    // Include connection file.
    require_once(realpath(dirname(__FILE__) . "/../resources/connect.php"));

    // Render any page using some template.
    function renderLayoutWithContentFile($contentFile, $variables = array()) {

        $contentFileFullPath = TEMPLATES_PATH . "/" . $contentFile;
     
        // making sure passed in variables are in scope of the template
        // each key in the $variables array will become a variable
        if (count($variables) > 0) {
            foreach ($variables as $key => $value) {
                if (strlen($key) > 0) {
                    ${$key} = $value;
                }
            }
        }

        
        // --------------
        // Render
        // --------------

        echo "<!DOCTYPE html>\n";
        echo "<html lang=\"en\">\n";

        $class = "container col-lg-6 col-md-6 col-sm-12 
        col-lg-offset-3 col-md-offset-3";

        echo "<div id='container' class='" . $class ."'>\n";

        require_once("includes/header.inc.php");
        
        echo "<body>\n";

        if (file_exists($contentFileFullPath)) {
            require_once($contentFileFullPath);
        } else {
            print "page_not_found.php";
        }
     
        // close container div
        echo "</div>\n";

        require_once("includes/footer.inc.php");

        echo "</body>\n";
        echo "</html>\n";
    }

    function init_session_values() {

        $_SESSION["has_error"] = false;
        $_SESSION["errs"] = array();            
        $_SESSION["vals"] = array();
        
    }
?>