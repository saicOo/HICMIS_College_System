<?php

session_start(); 
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
include PAGE_PATH."/../init.php";
   Auth::checkAuth();
 
$admin = new Admin;
// If Login, Login a new admin
if(isset($_POST['login'])){
    $request = array(
        'email'=> $_POST['email'],
        'password'=> $_POST['password'],
    );
    
    $admin->login($request);
}

include PAGE_PATH."/../init.php";

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>College System | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/font-awesome.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/normalize.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/responsive.css">
</head>

<body>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO APP</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
        
				<div class="hpanel">
          
                    <div class="panel-body">
                        <form method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="email">email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email"  value="" name="email" id="email" class="form-control">
                                <span class="help-block small">Your unique email to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******"  value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                              
                            </div>
                            <!-- start aleart area -->
        <?php if(!empty($admin->messErrors)): ?>
            
        <div class="alert alert-warning alert-success-style3 alert-success-stylenone">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">×</span>
				</button>
            <?php foreach($admin->messErrors as $errors): ?>
            <i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-none" aria-hidden="true"></i>
            <p class="message-alert-none text-center"><strong>Warning!</strong> <?php echo  $errors ?></p>
            <?php endforeach ?>
        </div>
       
        <?php endif ?>
        <!-- start aleart area -->
        <table class="table table-bordered">
          <thead>
            <th>Email</th>
            <th>Passowrd</th>
          </thead>
          <tbody>
            <tr>
              <td>admin@app.com</td>
              <td>123456789</td>
            </tr>
          </tbody>
        </table>
                            <button name="login" class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
			</div>
		</div>   
    </div>
    <!-- jquery
		============================================ -->
    <script src="<?php echo $assets ?>js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo $assets ?>js/bootstrap.min.js"></script>
</body>

</html>