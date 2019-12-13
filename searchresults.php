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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Show facebook Article</title>

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
    
    

    

   <!-- ***** Features Events Area Start ***** -->
   
   <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(img/bg-img/hero-3.jpg)">
        <div class="container">
        <br>
        <br> 
            
            
            

            <div class="row">
                <div class="col-12 col-lg-9">
                <?php
            if($_GET['place']=="")
            {
                header('Location:index.php');
            }
            $datafound=0;
            $placename='%'.strtoupper($_GET['place']).'%';
            $c = oci_connect('system', 'system', 'localhost/orcl');
            $statement = "select ARTICLE.USERID,ARTICLE.ARTICLEID,ACCOUNT.NAME,ARTICLE.POSTEDDATE,ARTICLE.ARTICLE,TOURLOCATIONBYAREA.NAME as PLACENAME from ARTICLE,ACCOUNT,TOURLOCATIONBYAREA where ARTICLE.userid=ACCOUNT.id and tourlocationid=TOURLOCATIONBYAREA.id and TOURLOCATIONBYAREA.name like :place order by posteddate desc";
            $s = oci_parse($c, $statement);
            oci_bind_by_name($s, ':place', $placename);
            oci_execute($s);
            while (($row = oci_fetch_assoc($s)) != false) 
            {
                echo '<div class="single-feature-events-area align-items-center wow fadeInUpBig" data-wow-delay="0.2s">';
                    echo '<div class="feature-events-content">';
                    echo '<div class="text-custom">';
                $datafound=1;
                echo '<div class="feed">';
                $userid=$row['USERID'];
                $article=$row['ARTICLEID'];
                $_SESSION['articleid']=$article;
                $username=$row['NAME'];
                echo "<span>".$row['ARTICLE']."</span><br>";
                echo "<span>Posted Date : ".$row['POSTEDDATE']."</span><br>";
                echo "<span>Posted by : ".$row['NAME']."</span><br>";
                echo "<span>Place referrence : ".$row['PLACENAME']."</span><br>";
                echo '<button type="button" onclick="loadDoc('.$article.')">Show Comments</button>';
                echo '<form action="commentpost.php">
                <textarea name="commentpost" style="width:99%; height:60px;"></textarea>
                <input type="hidden" name="arid" value="'.$article.'">
                <input type="submit" value="Comment">
                </form>';
                echo "<div id='comment".$article."'></div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                
            }
            oci_close($c);
            if($datafound==0)
            {
                echo 'Sorry.No data found <br>
                <a href="index.php">Go to homepage</a>';
            }
        ?>
                    
                </div>
               
                
                
            </div>
        </div>
    </section>
    <!-- ***** Features Events Area End ***** -->

   

    

   

    

    

    

    

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