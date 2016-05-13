
<h1 class="text-center">Give your suggestion</h1>

<?php

if($has_error) {
    echo <<<HTML
        <div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <ul>
HTML;
    
    foreach ($errs as &$error) {
        echo "<li>" . $error . "</li>";
    }

    echo "</ul> </div>"; 
}
?>

<form role="form" action="upload_suggestion.php" method="post">
    
    <div class="form-group">

        
        <input type="text" class="form-control input-lg" name="suggestion" required="required" placeholder="Type here what people should do" value="<?php echo $vals['suggestion']; ?>">
        
        <br/>

        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="url-addon">
                <i class="glyphicon glyphicon-link"></i>
            </span>
            <input type="text" class="form-control" name="url" placeholder="http://" aria-describedby="url-addon">
        </div>

        <br/>
        <div class="input-group input-group-lg">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">Upload Image
                    <input type="file"  >
                </span>
            </span>
            <input type="text" class="form-control" readonly placeholder="">
        </div>
    </div>

    <h3>People should do this when they're...</h3>
    
    <div class="checkbox moods">
    <?php
        
        while($row = $result->fetch_assoc()) 
        {
            echo "
            <div class='btn btn-default btn-lg btn-padding'>
            <label class='checkbox-inline'><input type='checkbox' class='btn btn-default' name='mood[]' value=".$row["id"].">".$row["name"]."</label></div>";
        }
    ?>               
    </div>
    
    <br/><br/>
    
    <p class="small">* You can select more than one</p>

      <button type="submit" class="btn btn-default btn-lg btn-block btn-primary ">Submit</button>
</form>

<script type="text/javascript">
    

</script>
