<!DOCTYPE html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Notice";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form 
  
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']); 
								  
  $sql = "SELECT userid FROM user WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];
				  
  $count = mysqli_num_rows($result);
	//$count=1;							  
  // If result matched $myusername and $mypassword, table row must be 1 row
									
  if($count == 1) {
	 //session_register("username");
	 $_SESSION['login_user'] = $username;
									 
     header("location: upload.php");
  }
  else {
	$_SESSION['error'] = "Your Username or Password is invalid or you are not authorized to upload notices.";
  }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Notice Board CSED | MNNIT Allahabad</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="css/font.css" rel="stylesheet" type="text/css">
    <link href="css/font2.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	
</head>

<body class="theme-blue">
<script>

    var imageslide = ['images/c.jpg', 'images/d.jpg', 'images/e.png'];

    var x = 0;

    var imgs = document.getElementById('slide');

    setInterval(slider, 2000);


    function slider() {

      if (x < imageslide.length) {
        x = x + 1;
      } else {
        x = 1;
      }


      imgs.innerHTML = "<img class='slide1' src='" + imageslide[x - 1] + "'>";


    }


  </script>


  <style type="text/css">
    .slider {
      width: 90%;
      height: 500px;
      margin: 20px auto;
      box-sizing: border-box;
      overflow: hidden;
      box-shadow: 5px 5px 10px grey;

    }

    .slide1 {
      width: 100%;
      height: 100%;
      animation: ani 2s linear;

    }

    @keyframes ani {
      0% {
        transform: scale(1.2);
      }
      10% {
        transform: scale(1);
      }
      100% {
        transform: scale(1);
      }
    }
  </style>

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"> CSED NOTICE BOARD - MNNIT ALLAHABAD </a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/college_logo.png" width="48" height="48" alt="Logo" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notice Board</div>
                    <div class="name">Comp. Sc. & Engg. Department</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="./index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/tables/All.php">
                            <i class="material-icons">text_fields</i>
                            <span>All Notices</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/tables/BTech.php">
                            <i class="material-icons">layers</i>
                            <span>B.Tech</span>
                        </a>
                    </li>

                    <li>
                        <a href="pages/tables/MTech.php">
                            <i class="material-icons">layers</i>
                            <span>M.Tech</span>
                        </a>
                    </li>

                    <li>
                        <a href="pages/tables/MCA.php">
                            <i class="material-icons">layers</i>
                            <span>MCA</span>
                        </a>
                    </li>

                    
                    <li>
                        <a href="pages/tables/PhD.php">
                            <i class="material-icons">layers</i>
                            <span>Ph.D</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);"> MNNIT ALLAHABAD</a>.
                </div>
               
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

	 <section class="content">
        <div class="container-fluid">
			<div class="slider">

				<div id="slide">
				  <img class="slide1" src="images/e.png">
				</div>

			</div>
		    <button type="button" data-color="blue" data-toggle="modal" data-target="#loginModal" class="btn bg-blue waves-effect">Upload</button><br><br>
			<div style="color:red;">
			<?php
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			?>
			</div>
        </div>
    </section>

			<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" style="margin-top:150px;">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Log In to Upload Notice</h4>
                        </div>
                        <div class="modal-body">
                             <form id="sign_in" method="POST" action="">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">person</i>
									</span>
									<div class="form-line">
										<input type="text" class="form-control" name="username" placeholder="Username" required autofocus autocomplete="off">
									</div>
								</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock</i>
									</span>
									<div class="form-line">
										<input type="password" class="form-control" name="password" placeholder="Password" required>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<button class="btn btn-block bg-blue waves-effect" type="submit">LOG IN</button>
									</div>
								</div>
								
							</form>
							
                        </div>
                    </div>
                </div>
            </div>		
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
