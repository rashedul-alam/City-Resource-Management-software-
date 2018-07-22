<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>News Site</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="summernote.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="summernote.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">News Site</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="viewdata.php">view Data</a></li>
                    <li class="active"><a href="listdata.php">List Data</a></li>
                    <li><a href="#">category 3</a></li>
                </ul>
            </div>
        </nav>
        <form name="summernote" method="post" action="edited.php">
<?php

            require 'config.php';
            $_SESSION['id']=$_GET['id'];
            $id=$_GET['id'];
            $statement="select * from test where id='".$_GET['id']."'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $heading=$row['heading'];
                    $summertext=$row['summertext'];
                }
            }
            else
            {
                echo "Nothing found in db";
            }
            mysqli_close($conn);
        ?>
        <div class="container">
        
            
                News Headline:<br/><input type="text" class="form-control" name="heading" value="<?php echo $heading; ?>"/><br/>
                News Body:<br/><textarea name="newsbody" id="summernote" class="summernote"><?php echo $summertext; ?></textarea><br/>
                
                <input type="submit" class="btn btn-success" value="Edited"/>
            </form>
            <a href ="edited">
        </div>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
        <br><br>
        <div class="container">
            <p>History:</p>
            <?php
                require 'config.php';

                $statement="select * from edited where id='$id'";
                $result = mysqli_query($conn, $statement);

                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<div class='panel-group'><div class='panel panel-primary'><div class='panel-heading'><b>".$row['heading']."</b> -By Admin at " .$row['datetime']."</div><div class='panel-body'>".$row['summertext'] ."</div></div></div>";
                    }
                }
                else
                {
                    echo "Nothing found in db";
                }
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>