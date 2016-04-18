<?php 	include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Give your suggestion</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: red;
            cursor: inherit;
            display: block;
        }
    </style>

</head>

<body>

    <div id="index" class="container">
        <div class="col-md-12">
            <h1 class="text-center">Give your suggestions</h1>

			<form role="form" action="upload_suggestion.php" method="post">
				
                <div class="form-group">

                    <input type="text" class="form-control input-lg" name="suggestion" required="required" placeholder="Type here what people should do">

                    <br/>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="link-addon">
                            <i class="glyphicon glyphicon-link"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="http://" aria-describedby="link-addon">
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

    				$sql = "select name from mood";
    				$result = $conn->query($sql);
    				if (!$result) 
    				{
    					throw new Exception("Database Error.");
    				}
    				
    				while($row = $result->fetch_assoc()) 
    				{
    					echo "
                        <div class='btn btn-default btn-lg btn-padding'>
                        <label class='checkbox-inline'><input type='checkbox' class='btn btn-default' name='mood[]' value=".$row["name"].">".$row["name"]."</label></div>";
    				}
				?>				 
				</div>
                
                <br/><br/>
                
                <p class="small">* You can select more than one</p>

				  <button type="submit" class="btn btn-default btn-lg btn-block btn-primary ">Submit</button>
			</form>

        </div>
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        
        $(document).on('change', '.btn-file :file', function() {

            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);


        });

        $(document).ready( function() {

            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            });
        });
    </script>
</body>

</html>