<?php
    session_start();
    if(!isset($_SESSION['type']) || strtolower($_SESSION['type'])!='admin')
    {
        echo "Invalid request";
        die();
    }
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
    <title>My Articles</title>

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
                                    <a class="nav-link dropdown-toggle"  href="deleteaccount.php" >Delete an account<span class="sr-only">(current)</span></a>
                                    
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="varifyarticle.php"  style="color:#ff00f7;font-weight: bold;font-weight: 900;">Varify Article</a></li>
                                    
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
        <br>
        <br> 
            
            
            

            <div class="row">
                <div class="col-12 col-lg-9">
                <?php
            /*Fetch  userid,username,article id,article and posted date*/
            /*
            $conn = mysqli_connect("localhost","root","","db");
            if (!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM `article`,`account` WHERE userid=id";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<div class="feed">';
                    $userid=$row['userid'];
                    $article=$row['articleid'];
                    $_SESSION['articleid']=$article;
                    $username=$row['name'];
                    echo "<span>".$row['article']."</span><br>";
                    echo "<span>Posted Date : ".$row['posteddate']."</span><br>";
                    echo "<span>Posted by : ".$row['name']."</span><br>";
                    echo '<button type="button" onclick="loadDoc('.$article.')">Show Comments</button>';
                    echo '<form action="commentpost.php">
                    <textarea name="commentpost" style="width:99%; height:60px;"></textarea>
                    <input type="hidden" name="arid" value="'.$article.'">
                    <input type="submit" value="Comment">
                    </form>';
                    echo "<div id='comment".$article."'></div>";
                    echo "</div>";
                }
            }
            mysqli_close($conn); 
            */
            $c = oci_connect('system', 'system', 'localhost/orcl');
            /*$statement = "select * from ARTICLE,ACCOUNT where userid=id order by posteddate desc";*/
            $statement="select ARTICLE.USERID,ARTICLE.ARTICLEID,ACCOUNT.NAME,ARTICLE.POSTEDDATE,ARTICLE.ARTICLE,TOURLOCATIONBYAREA.NAME as PLACENAME from ARTICLE,ACCOUNT,TOURLOCATIONBYAREA where ARTICLE.userid=ACCOUNT.id and tourlocationid=TOURLOCATIONBYAREA.id and ARTICLE.VARIFY='no' order by ARTICLE.posteddate desc";
            $s = oci_parse($c, $statement);
            oci_execute($s);
            while (($row = oci_fetch_assoc($s)) != false) 
            {
                echo '<div class="single-feature-events-area align-items-center wow fadeInUpBig" data-wow-delay="0.2s">';
                echo '<div class="feature-events-content">';
                echo '<div class="feed">';
                $userid=$row['USERID'];
                $article=$row['ARTICLEID'];
                $_SESSION['articleid']=$article;
                $username=$row['NAME'];
                echo "<br><span><h5>".$row['NAME']."</h5></span>";
                echo "<span><h6>Place reference: ".$row['PLACENAME']."<h6></span><br>";
                echo "<span><h6>Posted Date : ".$row['POSTEDDATE']."</h6></span>";
                echo "<span><p>".$row['ARTICLE']."</P></span><br>";

                echo '<form action="varifyarticlevarification.php">
                <input type="hidden" name="arid" value="'.$article.'">
                <input type="submit" class="button-custom" value="Varify">
                </form>';
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            oci_close($c);
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
    
</body>

</html>