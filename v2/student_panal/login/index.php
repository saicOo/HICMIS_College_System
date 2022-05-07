<?php 

session_start();

function __autoload($class){
    require "../controllers/".$class.".php";
}
Auth::checkAuth();
$student = new Student;
// If Login, Login a new student
if(isset($_POST['login'])){
    $request = array(
        'code_st'=> $_POST['code_st'],
        'national'=> $_POST['national'],
    );
    
    $student->login($request);
}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img/fav.png" />
  <!-- Author Meta -->
  <meta name="author" content="colorlib" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>Eclipse Education</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
  <!--
      CSS
      =============================================
    -->
    <link rel="stylesheet" href="../assets/css/linearicons.css" />
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="../assets/css/owl.carousel.css" />
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <link rel="stylesheet" href="../assets/css/hexagons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body style="background: linear-gradient(293deg, #000, #7c32ff);">
 
 

  <!-- ================ Start Registration Area ================= -->
  <section class="registration-area">
    <div class="container">
      <div class="row align-items-end">
       
        <div class="offset-lg-3 col-lg-4 col-md-6">
          <div class="course-form-section">
            <h3 class="text-white">HICMIS</h3>
            <p class="text-white pb-3">welcome to e-learning</p>
            <form class="course-form-area contact-page-form course-form text-right" id="myForm" method="post">
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="code_st" name="code_st" placeholder="code student" onfocus="this.placeholder = ''"
                 onblur="this.placeholder = 'Code'">
                 <?php if(isset($student->messErrors['code'])): ?>
                  <div class="invalid-feedback d-block text-center">
                   <?php echo $student->messErrors['code'] ?>
                  </div>
                  <?php endif ?>
              </div>
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="national" name="national" placeholder="National Number" onfocus="this.placeholder = ''"
                 onblur="this.placeholder = 'National Number'">
                 <?php if(isset($student->messErrors['national'])): ?>
                  <div class="invalid-feedback d-block text-center">
                   <?php echo $student->messErrors['national'] ?>
                  </div>
                  <?php endif ?>
              </div>
              <?php if(isset($student->messErrors['worng'])): ?>
                  <div class="invalid-feedback d-block text-center">
                   <?php echo $student->messErrors['worng'] ?>
                  </div>
                  <?php endif ?>
              <div class="col-lg-12 text-center">
                <button name="login" class="btn text-uppercase">Sing in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ End Registration Area ================= -->

  <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="../assets/js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/parallax.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.sticky.js"></script>
  <script src="../assets/js/hexagons.min.js"></script>
  <script src="../assets/js/jquery.counterup.min.js"></script>
  <script src="../assets/js/waypoints.min.js"></script>
  <script src="../assets/js/jquery.nice-select.min.js"></script>
  <script src="../assets/js/main.js"></script>
</body>

</html>