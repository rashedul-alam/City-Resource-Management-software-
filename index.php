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
                                    <a class="nav-link" href="index.php">Home </a>
                                </li>
                               
                                <?php
                                    if(isset($_SESSION['type']))
                                    {
                                        if(strtolower($_SESSION['type'])=='host')
                                        {
                                        echo "<ul class='navbar-nav mr-auto' id='dorneMenu'>
                                            <li>  </li>
                                            <li><a class='nav-link' href='hostatour.php'>Host a tour</a></li>
                                            <li>  </li>
                                            <li><a class='nav-link' href='articles.php'>Articles</a></li>
                                            <li>  </li>
                                            <li><a class='nav-link' href='seehostedtour.php'>See hosted tour</a></li>
                                            <li>  </li>
											<li><a class='nav-link' href='showfacebookarticle.php'>Show facebook article</a></li>
                                            <li>  </li>
                                            <li><a class='nav-link' href='contact.php'>Contact</a></li>
                                        </ul>";
                                        }
                                        if(strtolower($_SESSION['type'])=='admin')
                                        {
                                        echo "<ul class='navbar-nav mr-auto' id='dorneMenu'>
                                            
                                            <li><a class='nav-link' href='deleteaccount.php'>Delete an account</a></li>
                                            
                                            <li><a class='nav-link' href='varifyarticle.php'>Varify Article</a></li>
											
                                            <li><a class='nav-link' href='showfacebookarticle.php'>Show facebook article</a></li>
                                            
                                            <li><a class='nav-link' href='showhostedtouradmin.php'>Show hosted tour</a></li>

                                            <li><a class='nav-link' href='contact.php'>Contact</a></li>
                                        </ul>";
                                        }
                                        if(strtolower($_SESSION['type'])=='traveller' || strtolower($_SESSION['type'])=='traveler')
                                        {
                                        echo "<ul class='navbar-nav mr-auto' id='dorneMenu'>
                                            <li>  </li>
                                            <li><a class='nav-link' href='articles.php'>Articles</a></li>
                                            <li>  </li>
                                            <li><a class='nav-link' href='seehostedtour.php'>See hosted tour</a></li>
											<li>  </li>
											<li><a class='nav-link' href='showfacebookarticle.php'>Show facebook article</a></li>
                                            <li>  </li>
                                            <li><a class='nav-link' href='contact.php'>Contact</a></li>
                                        </ul>";
                                        }
                                       
                                        
                                    }
                                    else
                                    {
                                        echo "<ul class='navbar-nav mr-auto' id='dorneMenu'>
                                        
                                        <li><a class='nav-link' href='contact.php'>Contact</a></li>
                                        
                                    </ul>";
                                    }
                                   
                                ?>
                                


                                
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

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(imgr//p2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="hero-content">
                        <h2>Discover Yourself</h2>
                        <h4>Find your next tour meets</h4>
                    </div>
                     <!-- Hero Search Form -->
                     <div class="hero-search-form">
                        <!-- Tabs -->
                        <div class="nav nav-tabs" id="heroTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">search</a>
                            <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Finder</a>
                        </div>
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h6>What are you looking for?</h6>
                                
                                <form class="col-12" action="searchresults.php" method="get">
                                       
                                        <input type="text"  class="form-control"  id="txt1" onkeyup="showHint(this.value)" list="hint" name="place" placeholder="Where do you want to go">
                                        
                                        <datalist id="hint"></datalist>
                                        <br>
                                        <br>
                                        <input class="btn dorne-btn" type="submit" value="Search"><i  aria-hidden="true"></i></input>
                                        <button type="" ><i aria-hidden="true"></i></button>
                                    
                                        
                                    
                                   

                                    <script>
                                            function showHint(str)
                                            {
                                                var xhttp;
                                                if (str.length == 0)
                                                { 
                                                document.getElementById("hint").innerHTML = "";
                                                return;
                                                }
                                                xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function()
                                                {
                                                if (this.readyState == 4 && this.status == 200)
                                                {
                                                    document.getElementById("hint").innerHTML = this.responseText;
                                                }
                                                };
                                                xhttp.open("GET.html", "gethintname.php?q="+str, true);
                                                xhttp.send();   
                                            }
                                            </script>
                                        
                                    
                                   
                                   
                                     
                                    
                                    
                                </form>






                            </div>
                            <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                                <h6>What are you looking for?</h6>
                                <form action="#" method="get">
                                    <select class="custom-select">
                                        <option selected>Your Destinations</option>
                                        <option value="1">New York</option>
                                        <option value="2">Latvia</option>
                                        <option value="3">Dhaka</option>
                                        <option value="4">Melbourne</option>
                                        <option value="5">London</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>All Catagories</option>
                                        <option value="1">Catagories 1</option>
                                        <option value="2">Catagories 2</option>
                                        <option value="3">Catagories 3</option>
                                    </select>
                                    <select class="custom-select">
                                        <option selected>Price Range</option>
                                        <option value="1">$100 - $499</option>
                                        <option value="2">$500 - $999</option>
                                        <option value="3">$1000 - $4999</option>
                                    </select>
                                    <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Social Btn -->
        <div class="hero-social-btn">
            <div class="social-title d-flex align-items-center">
                <h6>Follow us on Social Media</h6>
                <span></span>
            </div>
            <div class="social-btns">
                <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
            </div>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    

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