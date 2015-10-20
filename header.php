
<?php
session_start();
include("db_info.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="javacode.js"></script>	
	<link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider-20.mini.js"></script>
    <!-- use jssor.slider-20.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 1,
                $Align: 0
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 01 css */
        /*
        .jssorb01 div           (normal)
        .jssorb01 div:hover     (normal mouseover)
        .jssorb01 .av           (active)
        .jssorb01 .av:hover     (active mouseover)
        .jssorb01 .dn           (mousedown)
        */
        .jssorb01 {
            position: absolute;
        }
        .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
            position: absolute;
            /* size of bullet elment */
            width: 12px;
            height: 12px;
            filter: alpha(opacity=70);
            opacity: .7;
            overflow: hidden;
            cursor: pointer;
            border: #000 1px solid;
        }
        .jssorb01 div { background-color: gray; }
        .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
        .jssorb01 .av { background-color: #fff; }
        .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 09 css */
        
        .jssort09-600-45 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 600px;
            height: 45px;
        }
        
        .jssort09-600-45 .t {
            font-family: verdana;
            font-weight: normal;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            color:#fff;
            line-height: 45px;
            font-size: 20px;
            padding-left: 10px;
        }
        
    </style>
<title>Melbourne food hunter</title>
</head>

<body >
<!-- home page section -->
<section id="home" data-role="page">
<!-- panel used for navigation (I used as a menu)-->
<div data-role="panel" id="mypanel" data-display="overlay" style="background-color:black;">
    <!-- panel content  -->
  <a href="index.php" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-home">Home</a>
  

<!-- to call in one-touch 
<a href="tel:+0392446333" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-phone">Call us</a>
<!--/ to call in one-touch  -->

 
<a href="register.php" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-user">Become a member!</a>
<a href="about.php" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-info">About Us!</a>
<a href="#https://www.youtube.com/watch?v=SaVdNNGzppQ" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-video">Video presentation</a>

</div>
<!-- / panel content -->

<!-- navbar of menu -->
<div class="welcome">
<a href="#mypanel" style="background-color:black; margin: .0em 0;border: 0px; border-radius: 0; color: #649B3D; "  class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-bars">&nbsp;</a>
</div>
<!--/ navbar of menu -->

<!-- header -->
  <header data-role="header">
  	<img src="images/header1.jpg" class="img-responsive" alt="Yaz Resturanut" />
<!--navbar -->  
       <nav class="navbar navbar-default" style="margin-bottom:0px">
  <div class="container-fluid">  
      <?php
      $check = true;
      if(!isset($_SESSION['username'])){
        
          echo '<form class="form-inline" method="post" action="'.basename($_SERVER['REQUEST_URI']).'">
                <div class="form-group" style="float: left;">
                <label class="sr-only" for="exampleInputEmail3">Username</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail3" placeholder="Username">
              </div>
              <div class="form-group" style="float: left;">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                </div>
                <div class="checkbox" style="float: left;">
              <button name="login" type="submit" class="btn btn-default">Sign in</button></div>
              <p class="navbar-text navbar-right"><a href="register.php" class="navbar-link">Sign up</a></p>
            </form>';
        }else{
            echo '<div class="alert alert-success" role="alert">Hey, '.$_SESSION['username'].' welcome  </div>
            <form method="post" action="'.basename($_SERVER['REQUEST_URI']).'" enctype="text/plain">
<input type="submit" class="btn btn-danger" name="logout" style="float: right;" value="logout"/>
</form>';
        }
        
        if(isset($_REQUEST['login']))
        {
        //get information from user who want sign in and check if he already registered or not
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        /* build sql statement using form data */
        $query ="SELECT * FROM ACCOUNTUSER WHERE USERNAME ='".$username."' AND PASSWORD ='".$password."'";
        
        /* check the sql statement for errors and if errors report them */
        $stmt = oci_parse($connect, $query);
        
        if(!$stmt) {
        echo "An error occurred in parsing the sql string.\n";
        exit;
        }
        oci_execute($stmt);
        $nrows = oci_fetch_all($stmt, $res);
        			if ($nrows == 1) {
        				$_SESSION['username'] = $username;   
                        echo '<meta http-equiv=\"refresh\" content=\"0;URL=\'http://thetudors.example.com/\'\" />';                     
                        }else{
                            $check = false;
                        }
       }
        
        if(isset($_REQUEST['logout'])){
            session_destroy();
            echo '<meta http-equiv=\"refresh\" content=\"0;URL=\'http://thetudors.example.com/\'\" />';
        }                
    ?>
    
  
</div></nav>
<!--/navbar -->
  </header>
<!--/ header -->

<!-- content -->
  <div role="main" class="ui-content" >     
       
   <br />
<?php
   if(!$check)
    echo '<p style="color: red;">The username or password you entered is incorrect.</p>';
?>

