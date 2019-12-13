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
                                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                               
                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                            
                            
                            <!-- Add listings btn -->
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(imgr/p9.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="hero-content">
                        <h2></h2>
                        <h4></h4>
                    </div>
                    <!-- Hero Search Form -->
                    <div class="hero-search-form">
                        <!-- Tabs -->
                        <div class="nav nav-tabs" id="heroTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Log In</a>
                            
                        </div>
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">

                                     <form action="signinvarification.php" method="post">
                                            <table>
                                                <tr>
                                                    <td style="color:white;font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 18px; "><span>Email : </span></td>
                                                    <td><input  class="form-control" type="email" name="em" required></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:white;font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 18px; "><span>Password : </span></td>
                                                    <td><input  class="form-control" type="password" name="pw" required></td>
                                                </tr>
                                                <?php
                                                    if(isset($_SESSION['varification']))
                                                    { 
                                                        echo "<tr>";
                                                        echo "<td colspan='2'><span>User Email or Password invalid</span></td>";
                                                        echo "<tr>";
                                                        session_unset();
                                                        session_destroy();
                                                    }
                                                ?>
                                                

                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>

                                                <tr>
                                                    <td colspan='2'><input class="btn dorne-btn" type="submit" value="Sign in"></td>
                                                </tr>

                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>

                                                <tr>
                                                    <td colspan='2'> <a class="p" href="signup.php">Don't have an account ? Sign up here.</a></td>
                                                </tr>



                                            </table>
                                            <br>
                                            <br>
                                            
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    

   

   

    

   

    

    

    

    

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
</body>

</html>