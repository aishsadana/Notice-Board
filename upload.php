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
include('session.php');

$usrname;
$id;
$sql="Select Name,userid from user where username='".$login_session."'";
			
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
	while($row=mysqli_fetch_assoc($result)){
	$usrname=$row["Name"];
	$id=$row["userid"];
	}
}

if(isset($_POST['submit'])) {
$target_dir = "Notices/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Allow certain file formats
if($FileType != "pdf") {
    $_SESSION['msg']="Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}
// Check if file already exists
else if (file_exists($target_file)) {
    $_SESSION['msg']="Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $path="../../Notices/".basename( $_FILES["fileToUpload"]["name"]);
		$sql="Insert into notices values('".$id."','".$_POST['subject']."','".$_POST['branch']."','".$_POST['sem']."','".date("Y-m-d")."','".$path."')";
		if(mysqli_query($conn,$sql)){
			$_SESSION['msg']="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			unset($_FILES["fileToUpload"]["name"]);
		}
    } else {
        $_SESSION['msg']="Sorry, there was an error uploading your file.";
    }
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
     <!-- Google Fonts -->
    <link href="css/font.css" rel="stylesheet" type="text/css">
    <link href="css/font2.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

   
    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue">
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
                    <div class="name">
					<?php 
					
					echo "Welcome ".$usrname;
					?>
					</div>
					<div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="logout.php"><i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
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
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						<div class="header">
                            <h2>
                                Upload a New Notice
                            </h2>
						</div>
						
                        <div class="body">
						<form name="f1" method="POST" action=""  enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h2 class="card-inside-title">Subject</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="subject" type="text" class="form-control" placeholder="Please provide subject of notice" autocomplete="off" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
							 <div class="row clearfix">
                                <div class="col-sm-6">
									<h2 class="card-inside-title">Branch</h2>
									<div class="form-group">
                                    <select name="branch" class="form-control show-tick" required>
                                        <option value="">-- Please select Branch --</option>
                                        <option value="BTech">B.Tech</option>
                                        <option value="MTech">M.Tech</option>
                                        <option value="MCA">MCA</option>
                                        <option value="PhD">PhD</option>
                                    </select>
									</div>
                                </div>
                                <div class="col-sm-6">
									<h2 class="card-inside-title">Semester</h2>
									<div class="form-group">
                                    <select name="sem" class="form-control form-group-lg" required>
                                        <option value="">-- Please select Semester --</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
                                    </select>
									</div>
                                </div>
                            </div>
							<div class="row clearfix">
								<div class="col-sm-4">
									<h2 class="card-inside-title">Date</h2>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="<?php echo date("Y-m-d"); ?>" disabled />
                                        </div>
                                    </div>
                                </div>
							</div>
							<input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary m-t-15 waves-effect" required ><br>
							<input type="submit" value="Upload" name="submit" class="btn btn-primary m-t-15 waves-effect">
						</form>
						<?php
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
						?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
           
        </div>
    </section>

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


