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
   
   <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-color: url(img/bg-img/hero-3.jpg)">
        <div class="container">
        <br>
        <br> 
            
            
            
        <?php
            if(isset($_SESSION['type']))
            {
                if(strtolower($_SESSION['type'])=='host')
                {
                    echo "<ul>
                        <li><a href='myhostedtour.php'>My hosted tour</a></li>
                    </ul>";
                }
                else if(strtolower($_SESSION['type'])=='traveller' || strtolower($_SESSION['type'])=='traveler')
                {
                    echo "<ul>
                        <li><a href='myjoinedtour.php'>My tour</a></li>
                    </ul>";
                }
            }
            $c = oci_connect('system', 'system', 'localhost/orcl');
            $statement = "SELECT ACCOUNT.ID,ACCOUNT.NAME,ACCOUNT.ADDRESS,ACCOUNT.PHONENO,TOURHOSTID.* from TOURHOSTID,ACCOUNT where TOURHOSTID.HOSTID=ACCOUNT.ID order by TOURHOSTID.POSTEDDATE desc";
            $s = oci_parse($c, $statement);
            oci_execute($s);
            while (($row = oci_fetch_assoc($s)) != false) 
            {
                echo '<div class="single-feature-events-area align-items-center wow fadeInUpBig" data-wow-delay="0.2s">';
                echo '<div class="feature-events-content">';
                echo '<div class="text-custom">';
                echo '<table>';
                echo '<div class="feedhost">';
                $tourid=$row['TOURID'];
                $userid=$row['ID'];
                $address=$row['ADDRESS'];
                $budget=$row['BUDGET'];
                $username=$row['NAME'];
                $gender=$row['GENDER'];
                $maxage=$row['MAXAGE'];
                $minage=$row['MINAGE'];
                $maxpeople=$row['MAXPEOPLE'];
                $minpeople=$row['MINPEOPLE'];
                $peoplecount=$row['PEOPLECOUNT'];
                $startdate=$row['STARTDATE'];
                $enddate=$row['ENDDATE'];
                $posteddate=$row['POSTEDDATE'];
                $phoneno=$row['PHONENO'];
                $tourplan=$row['TOURPLAN'];
                
                echo '<tr>';
                echo  '<td> Host Name : </td><td>'.$username."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Host phone no : </td><td>'.$phoneno."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Address : </td><td>'.$address."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Gender requirement : </td><td>'.$gender."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour budget : </td><td>'.$budget."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Maximum age requirement : </td><td>'.$maxage."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Minimum age requirement : </td><td>'.$minage."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Maximum people joined : </td><td>'.$maxpeople."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Minimum people joined : </td><td>'.$minpeople."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Number of people joined : </td><td>'.$peoplecount."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour start date : </td><td>'.$startdate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour end date : </td><td>'.$enddate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Posted date : </td><td>'.$posteddate."</td>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tour Plan : </td><td>'.$tourplan."</td>";
                echo '</tr>';                

                /*Fetch place names by placeid*/
                echo '<tr><td>Place Names : </td><td>';

                $commaflag=0;
                $conn=oci_connect('system', 'system', 'localhost/orcl');
                $sql="SELECT NAME from TOURHOSTPLACE,TOURLOCATIONBYAREA where TOURHOSTPLACE.PLACEID=TOURLOCATIONBYAREA.ID and TOURHOSTPLACE.TOURID=:tourid";
                $compiled = oci_parse($conn, $sql);
                oci_define_by_name($compiled, 'NAME', $placename);
                oci_bind_by_name($compiled, ':tourid', $tourid);
                oci_execute($compiled);
                while (($arr = oci_fetch_assoc($compiled)) != false)
                {
                    if($commaflag!=0)
                    {
                        echo ",";
                    }
                    echo $placename;
                    $commaflag++;
                }
                oci_close($conn);
                echo '<td></tr>';


                $flagshowbutton=TRUE;
                if(strtolower($_SESSION['type'])=='host')
                {
                    $flagshowbutton=FALSE;
                }
                $connection=oci_connect('system', 'system', 'localhost/orcl');
                $query="SELECT TRAVELLERID from TOURJOIN where TOURID=:tourid";
                $compile = oci_parse($connection, $query);
                oci_define_by_name($compile, 'TRAVELLERID', $userid);
                oci_bind_by_name($compile, ':tourid', $tourid);
                oci_execute($compile);
                while (($arr = oci_fetch_assoc($compile)) != false)
                {
                    if($arr['TRAVELLERID']==$_SESSION['id'])
                    {
                        $flagshowbutton=FALSE;
                    }
                }
                oci_close($connection);
                if(date('Y-m-d')>dateToPhpFormat($startdate))
                {
                    $flagshowbutton=FALSE;
                }
                if(strtolower($gender)!=strtolower($_SESSION['gender']) && strtolower($gender)!='mixed')
                {
                    $flagshowbutton=FALSE;
                }
                if($peoplecount>=$maxpeople)
                {
                    $flagshowbutton=FALSE;
                }
                if($flagshowbutton==TRUE)
                {
                    echo '<tr>
                    <td colspan=2><button type="button'.$tourid.'" id="join" onclick=location.href="jointour.php?q="+'.$tourid.';>JOIN</button></td>
                    </tr>';
                }
                echo '</table>';

                echo '<hr>';
                echo"</div>";
                echo"</div>";
                echo"</div>";
            }
            
            oci_close($c);
            function dateToPhpFormat($date)
            {
                $newdate='';
                $newdate=$newdate.'20'.$date[7].$date[8];
                $newdate=$newdate.'-';
                if($date[3]=='J' && $date[4]=='A' && $date[5]=='N')
                {
                    $newdate=$newdate.'01-';
                }
                if($date[3]=='F' && $date[4]=='E' && $date[5]=='B')
                {
                    $newdate=$newdate.'02-';
                }
                if($date[3]=='M' && $date[4]=='A' && $date[5]=='R')
                {
                    $newdate=$newdate.'03-';
                }
                if($date[3]=='A' && $date[4]=='P' && $date[5]=='R')
                {
                    $newdate=$newdate.'04-';
                }
                if($date[3]=='M' && $date[4]=='A' && $date[5]=='Y')
                {
                    $newdate=$newdate.'05-';
                }
                if($date[3]=='J' && $date[4]=='U' && $date[5]=='N')
                {
                    $newdate=$newdate.'06-';
                }
                if($date[3]=='J' && $date[4]=='U' && $date[5]=='L')
                {
                    $newdate=$newdate.'07-';
                }
                if($date[3]=='A' && $date[4]=='U' && $date[5]=='G')
                {
                    $newdate=$newdate.'08-';
                }
                if($date[3]=='S' && $date[4]=='E' && $date[5]=='P')
                {
                    $newdate=$newdate.'09-';
                }
                if($date[3]=='O' && $date[4]=='C' && $date[5]=='T')
                {
                    $newdate=$newdate.'10-';
                }
                if($date[3]=='N' && $date[4]=='O' && $date[5]=='V')
                {
                    $newdate=$newdate.'11-';
                }
                if($date[3]=='D' && $date[4]=='E' && $date[5]=='C')
                {
                    $newdate=$newdate.'12-';
                }
                $newdate=$newdate.$date[0].$date[1];
                return($newdate);
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
    
</body>

</html>