<h1 class="text-center">How do you feel today?</h1>

<form role="form" action="upload_feeling.php" method="post">
    <div class="radio">
    <?php


    $sql = "Select name FROM mood;";
    $result = $conn->query($sql);
    if (!$result) {
    throw new Exception("Database Error ");
    }

    while($row = $result->fetch_assoc()) 
    {
    echo "
      <div class='btn btn-default btn-lg btn-padding'>
    <label class='radio-inline'><input type='radio' required name='mood' value=".$row["name"].">".$row["name"]."</label></div>";
    }
    ?>
    </div>
    <br/><br/>

    <button type="submit" class="btn btn-default btn-lg btn-block btn-primary">Submit</button>
</form>

