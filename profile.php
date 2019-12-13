<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" class="-webkit- fa-events-icons-ready" lang="en">

<head>
    <meta charset="UTF-16">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" rel="mask-icon" type="" color="#111">
    <title>Signup</title>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Profile</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
	
    <style>
      body {
  font-family: Verdana, Geneva, sans-serif;
  font-size: 14px;
  background: #f2f2f2;
}

.clearfix:after {
  content: "";
  display: block;
  clear: both;
  visibility: hidden;
  height: 0;
}

.form_wrapper {
  background: #fff;
  width: 550px;
  max-width: 100%;
  box-sizing: border-box;
  padding: 25px;
  margin: 1% auto 0;
  position: relative;
  z-index: 1;
  border-top: 5px solid #c943e3;
  -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  -webkit-transform-origin: 50% 0;
  -ms-transform-origin: scale3d(1, 1, 1);
  transform-origin: 50% 0;
  -webkit-transform: scale3d(1, 1, 1);
  transform: scale3d(1, 1, 1);
  -webkit-transition: none;
  transition: none;
  -webkit-animation: expand 0.8s 0.6s ease-out forwards;
  animation: expand 0.8s 0.6s ease-out forwards;
  opacity: 0;
}
.form_wrapper h2 {
  font-size: 1.5em;
  line-height: 1.5em;
  margin: 0;
}
.form_wrapper .title_container {
  text-align: center;
  padding-bottom: 15px;
}
.form_wrapper h3 {
  font-size: 1.1em;
  font-weight: normal;
  line-height: 1.5em;
  margin: 0;
}
.form_wrapper label {
  font-size: 12px;
}
.form_wrapper .row {
  margin: 10px -15px;
}
.form_wrapper .row > div {
  padding: 0 15px;
  box-sizing: border-box;
}
.form_wrapper .col_half {
  width: 50%;
  float: left;
}
.form_wrapper .col_quarter {
  width: 25%;
  float: left;
}
.form_wrapper .input_field {
  position: relative;
  margin-bottom: 20px;
  -webkit-animation: bounce 0.6s ease-out;
  animation: bounce 0.6s ease-out;
}
.form_wrapper .input_field > span {
  position: absolute;
  left: 0;
  top: 0;
  color: #333;
  height: 100%;
  border-right: 1px solid #cccccc;
  text-align: center;
  width: 30px;
}
.form_wrapper .input_field > span > i {
  padding-top: 10px;
}
.form_wrapper .textarea_field > span > i {
  padding-top: 10px;
}
.form_wrapper input[type="text"], .form_wrapper input[type="email"], .form_wrapper input[type="password"] {
  width: 100%;
  padding: 8px 10px 9px 35px;
  height: 35px;
  border: 1px solid #cccccc;
  box-sizing: border-box;
  outline: none;
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  transition: all 0.30s ease-in-out;
}
.form_wrapper input[type="text"]:hover, .form_wrapper input[type="email"]:hover, .form_wrapper input[type="password"]:hover {
  background: #fafafa;
}
.form_wrapper input[type="text"]:focus, .form_wrapper input[type="email"]:focus, .form_wrapper input[type="password"]:focus {
  -webkit-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  -moz-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  border: 1px solid #f5ba1a;
  background: #fafafa;
}
.form_wrapper input[type="submit"] {
  background: #b349ff;
  height: 35px;
  line-height: 35px;
  width: 100%;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-size: 1.1em;
  margin-bottom: 10px;
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  transition: all 0.30s ease-in-out;
}
.form_wrapper input[type="submit"]:hover {
  background: #ab0ae1;
}
.form_wrapper input[type="submit"]:focus {
  background: #ab0ae1;
}
.form_wrapper input[type="checkbox"], .form_wrapper input[type="radio"] {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.form_container .row .col_half.last {
  border-left: 1px solid #cccccc;
}

.checkbox_option label {
  margin-right: 1em;
  position: relative;
}
.checkbox_option label:before {
  content: "";
  display: inline-block;
  width: 0.5em;
  height: 0.5em;
  margin-right: 0.5em;
  vertical-align: -2px;
  border: 2px solid #cccccc;
  padding: 0.12em;
  background-color: transparent;
  background-clip: content-box;
  transition: all 0.2s ease;
}
.checkbox_option label:after {
  border-right: 2px solid #000000;
  border-top: 2px solid #000000;
  content: "";
  height: 20px;
  left: 2px;
  position: absolute;
  top: 7px;
  transform: scaleX(-1) rotate(135deg);
  transform-origin: left top;
  width: 7px;
  display: none;
}
.checkbox_option input:hover + label:before {
  border-color: #000000;
}
.checkbox_option input:checked + label:before {
  border-color: #000000;
}
.checkbox_option input:checked + label:after {
  -moz-animation: check 0.8s ease 0s running;
  -webkit-animation: check 0.8s ease 0s running;
  animation: check 0.8s ease 0s running;
  display: block;
  width: 7px;
  height: 20px;
  border-color: #000000;
}

.radio_option {
  position: relative;
  width: 100%;
}
.radio_option div.radio_group {
  display: block;
  height: auto;
  padding: 5px 35px;
  border: 1px solid #cccccc;
}
.radio_option span {
  position: absolute;
  left: 0;
  top: 0;
  color: #333;
  height: 100%;
  border-right: 1px solid #CCC;
  width: -moz-fit-content;
  float: left;
}
.radio_option label {
  margin-right: 1em;
}
.radio_option label:before {
  content: "";
  display: inline-block;
  width: 0.5em;
  height: 0.5em;
  margin-right: 0.5em;
  border-radius: 100%;
  vertical-align: 3px;
  border: 2px solid #cccccc;
  padding: 0.15em;
  background-color: transparent;
  background-clip: content-box;
  transition: all 0.2s ease;
}
.radio_option input:hover + label:before {
  border-color: #000000;
}
.radio_option input:checked + label:before {
  background-color: #000000;
  border-color: #000000;
}

.select_option {
  position: relative;
  width: 100%;
}
.select_option select {
  display: inline-block;
  width: 100%;
  height: 35px;
  padding: 0px 15px;
  cursor: pointer;
  color: #7b7b7b;
  border: 1px solid #cccccc;
  border-radius: 0;
  background: #fff;
  -webkit-appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  transition: all 0.2s ease;
}
.select_option select::-ms-expand {
  display: none;
}
.select_option select:hover, .select_option select:focus {
  color: #000000;
  background: #fafafa;
  border-color: #000000;
  outline: none;
}

.select_arrow {
  position: absolute;
  top: calc(50% - 4px);
  right: 15px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-width: 8px 5px 0 5px;
  border-style: solid;
  border-color: #7b7b7b transparent transparent transparent;
}

.button {
  background: #c001ff;
  height: 35px;
  line-height: 35px;
  width: 100%;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-size: 1.1em;
  margin-bottom: 10px;
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  transition: all 0.30s ease-in-out;
}
.button:hover {
  background: #7403ba;
}
.button:focus {
  background: #e1a70a;
}

.select_option select:hover + .select_arrow, .select_option select:focus + .select_arrow {
  border-top-color: #000000;
}

.credit {
  display: none;
  position: relative;
  z-index: 1;
  text-align: center;
  padding: 15px;
  color: #7403ba;
}
.credit a {
  color: #7403ba;
}

@-webkit-keyframes check {
  0% {
    height: 0;
    width: 0;
  }
  25% {
    height: 0;
    width: 7px;
  }
  50% {
    height: 20px;
    width: 7px;
  }
}
@keyframes check {
  0% {
    height: 0;
    width: 0;
  }
  25% {
    height: 0;
    width: 7px;
  }
  50% {
    height: 20px;
    width: 7px;
  }
}
@-webkit-keyframes expand {
  0% {
    -webkit-transform: scale3d(1, 0, 1);
    opacity: 0;
  }
  25% {
    -webkit-transform: scale3d(1, 1.2, 1);
  }
  50% {
    -webkit-transform: scale3d(1, 0.85, 1);
  }
  75% {
    -webkit-transform: scale3d(1, 1.05, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
@keyframes expand {
  0% {
    -webkit-transform: scale3d(1, 0, 1);
    transform: scale3d(1, 0, 1);
    opacity: 0;
  }
  25% {
    -webkit-transform: scale3d(1, 1.2, 1);
    transform: scale3d(1, 1.2, 1);
  }
  50% {
    -webkit-transform: scale3d(1, 0.85, 1);
    transform: scale3d(1, 0.85, 1);
  }
  75% {
    -webkit-transform: scale3d(1, 1.05, 1);
    transform: scale3d(1, 1.05, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
    opacity: 1;
  }
}
@-webkit-keyframes bounce {
  0% {
    -webkit-transform: translate3d(0, -25px, 0);
    opacity: 0;
  }
  25% {
    -webkit-transform: translate3d(0, 10px, 0);
  }
  50% {
    -webkit-transform: translate3d(0, -6px, 0);
  }
  75% {
    -webkit-transform: translate3d(0, 2px, 0);
  }
  100% {
    -webkit-transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}
@keyframes bounce {
  0% {
    -webkit-transform: translate3d(0, -25px, 0);
    transform: translate3d(0, -25px, 0);
    opacity: 0;
  }
  25% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }
  50% {
    -webkit-transform: translate3d(0, -6px, 0);
    transform: translate3d(0, -6px, 0);
  }
  75% {
    -webkit-transform: translate3d(0, 2px, 0);
    transform: translate3d(0, 2px, 0);
  }
  100% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}
@media (max-width: 600px) {
  .form_wrapper .col_half {
    width: 100%;
    float: none;
  }

  .bottom_row .col_half {
    width: 50%;
    float: left;
  }

  .form_container .row .col_half.last {
    border-left: none;
  }

  .remember_me {
    padding-bottom: 20px;
  }
}

    </style>
    <script>
  window.console = window.console || function(t) {};
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


<link href="https://use.fontawesome.com/723b3db6c5.css" rel="stylesheet" media="all" data-inprogress="">

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
    <!-- ***** Header Area End ***** -->
    

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(imgr/p4.jpg);">
    <br>
    <br>    
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
                            <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Profile</a>
                            
                        </div>
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">

                                <div class="form_wrapper">
                                        <div class="form_container">
                                        <div class="title_container">
                                                <h2>Profile</h2>
                                                
                                            </div>
                                            
                <div>                          
            <?php
            $id=$_SESSION['id'];
            $email="fetch value";
            $name="fetch value";
            $address="fetch value";
            $gender="fetch value";
            $dob="fetch value";
            $phoneno="fetch value";
            $type="fetch value";

            $conn = oci_connect('system', 'system', 'localhost/orcl');
            $sql="begin selectaccount(:id,:email,:name,:address,:gender,:dob,:phoneno,:type); end;";
            $stid = oci_parse($conn,$sql);

            oci_bind_by_name($stid,':id',$id);
            oci_bind_by_name($stid,':email',$email);
            oci_bind_by_name($stid,':name',$name);
            oci_bind_by_name($stid,':address',$address);
            oci_bind_by_name($stid,':gender',$gender);
            oci_bind_by_name($stid,':dob',$dob);
            oci_bind_by_name($stid,':phoneno',$phoneno);
            oci_bind_by_name($stid,':type',$type);

            oci_execute($stid);
            
            oci_free_statement($stid);
            oci_close($conn);

            echo $id.'<br>';
            echo $email.'<br>';
            echo $name.'<br>';
            echo $address.'<br>';
            echo $gender.'<br>';
            echo $dob.'<br>';
            echo $phoneno.'<br>';
            echo $type.'<br>';
        ?>
        </div>
    </body>
   
                                            </div>
                                    </div>









                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
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
   
         
</body>

</html>