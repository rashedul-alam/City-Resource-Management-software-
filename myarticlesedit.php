<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-16">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>index</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
	

</head>

<body>
	
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

   

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">GObar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item active">
                                    <a class="nav-link dropdown-toggle" href="index.php">Home </a>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:#ff00f7;font-weight: bold;font-weight: 900;">Articles<span class="sr-only">(current)</span></a>
                                    
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="myarticles.php">My Articles</a></li>
                                    
                                </li>
                                <li class="nav-item dropdown">
                                    <?php
                                    if(isset($_SESSION['type']))
                                    {
                                        if(strtolower($_SESSION['type'])=='host')
                                        {
                                        echo "<ul>
                                            <li><a class='nav-link' href='hostatour.php'>Host a tour</a></li>
                                            
                                        </ul>";
                                        }
                                    }
                                    ?>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                           
                            
                            <!-- Sign out btn -->
                            <div class="dorne-add-listings-btn">
                                <div >
                                <?php
                                    if(isset($_SESSION['name']))
                                    {
                                                    echo "<a  href='profile.php'>".$_SESSION['name']."</a> ";
                                                    
                                                    

                                      echo "<a  href='signout.php'>|          Sign out</a>";
                                    }
                                    else
                                    {
                                      echo "<a href='signin.php'>Sign in</a>";
                                    }
                                  ?>


                                </div>
                                
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    
    

    

   <!-- ***** Features Events Area Start ***** -->
   <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(img/bg-img/hero-3.jpg)">
        <div class="container">
            <div class="row">
                <!-- ***** Contact Area Start ***** -->
                <div class="dorne-contact-area " id="contact">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area equal-height">
                        
                        <div class="contact-form">
                            <div class="contact-form-title">
                                <h6>Edit your post :</h6>
                            </div>
                            <form  action="myarticleseditcrud.php">
		                                <div class="row">
		                                    <div class="col-12">
		                                        
												<?php
									                $articleid=$_GET['arid'];
									                /*$connection = mysqli_connect("localhost","root","","db");
									                if (!$connection)
									                {
									                    die("Connection failed: " . mysqli_connect_error());
									                }
									                $query = "SELECT * FROM article where articleid=".$articleid;
									                $execute = mysqli_query($connection, $query);
									                
									                if (mysqli_num_rows($execute) > 0)
									                {
									                    while($row = mysqli_fetch_assoc($execute))
									                    {
									                        echo '<textarea name="articlepost" style="width:99%; height:60px;" required>';
									                        echo $row['article'];
									                        echo '</textarea>';
									                    }
									                }
									                mysqli_close($connection); 
									                */
									                $db = oci_connect('system', 'system', 'localhost/orcl');
									                if(!$db)
									                {
									                    echo "can't connect to database";
									                }
									                $sql = "SELECT * FROM ARTICLE WHERE articleid=".$articleid;
									                $result = oci_parse($db, $sql);
									                oci_execute($result);
									                while (($row = oci_fetch_assoc($result)) != false) 
									                {
									                    echo '<textarea name="articlepost"  class="form-control" id="Message" cols="90" rows="10"  required>';
									                    
									                    echo $row['ARTICLE'];
									                    echo '</textarea>';
									                }
									                oci_close($db);
									                echo '<input type="hidden" name="arid" value="'.$articleid.'">';
									            ?>
												
												
												
												
		                                    </div>
		                                    
		                                   
		                                    <div class="col-12 ">
		                                        <br>
		                                    <input type="submit" class="btn dorne-btn" value="Post">
		                                    </div>

		                                    
		                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- ***** Contact Area End ***** -->

            </div>
            
            
            


   

    

   

    

    

    

    

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
    <script>
        function loadDoc(str)
        {
            if (str.length == 0)
            { 
                document.getElementById("comment"+str).innerHTML = "";
                return;
            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("comment"+str).innerHTML = this.responseText;
                }
            };
            xhttp.open("GET.html", "comment.php?q="+str, true);
            xhttp.send();   
        }
    </script>
</body>

</html>
