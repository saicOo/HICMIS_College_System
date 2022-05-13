<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$Lev = new Level;
$displayLev = $Lev->display();
$student = new Student;
if(isset($_POST['submit'])){

    $request = array(
        'code'=>  $_POST['code'],
        'confirm_code'=>  $_POST['confirm_code'],
        'national'=>  $_POST['national'],
        'confirm_national'=>  $_POST['confirm_national'],
        'name'=> $_POST['name'],
        'phone'=>  $_POST['phone'],
        'birthday'=>  $_POST['birthday'],
        'address'=>  $_POST['address'],
        'gender'=>  $_POST['gender'],
        'lev_id'=>  $_POST['level'],
    );

 $student->register($request);

}
#########################################################
// <!-- Start head area -->
require_once PAGE_PATH."/../layouts/head.php";
    // <!-- Start Left menu area -->
require_once PAGE_PATH."/../layouts/sidebar.php"; 
        // <!-- start header area -->
require_once PAGE_PATH."/../layouts/header.php"; 
############################################################
?>

<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu" style="text-align: left;">
                                            <li><a href="/admin_panal/">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">add student</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start aleart area -->
        <?php if(!empty($student->messErrors)): ?>
            <div class="container">
        <div class="alert alert-warning alert-success-style3 alert-success-stylenone">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">×</span>
				</button>
            <?php foreach($student->messErrors as $errors): ?>
            <i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-none" aria-hidden="true"></i>
            <p class="message-alert-none text-center"><strong>Warning!</strong> <?php echo  $errors ?></p>
            <?php endforeach ?>
        </div>
        </div>
        <?php endif ?>
        <!-- start aleart area -->
        <!-- end header area -->
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Basic Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" autocomplete="off">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="code" id="code" type="text" class="form-control" placeholder="code" value="<?php if(isset($_POST['code']))echo $_POST['code'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="national" id="national" type="text" class="form-control" placeholder="national" value="<?php if(isset($_POST['national']))echo $_POST['national'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="name" type="text" class="form-control" placeholder="Full Name" value="<?php if(isset($_POST['name']))echo $_POST['name'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="address" type="text" class="form-control" placeholder="Address" value="<?php if(isset($_POST['address']))echo $_POST['address'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="phone" type="number" class="form-control" placeholder="Mobile no." value="<?php if(isset($_POST['phone']))echo $_POST['phone'] ?>">
                                                                </div>
                                                                <div class="form-group data-custon-pick" id="data_3">
                                                                    <label>Birthday</label>
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input name="birthday" type="text" class="form-control" value="10/11/1999">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                    <input name="confirm_code" id="confirm_code" type="text" class="form-control" placeholder="confirm code" value="<?php if(isset($_POST['confirm_code']))echo $_POST['confirm_code'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="confirm_national" id="confirm_national" type="text" class="form-control" placeholder="confirm national" value="<?php if(isset($_POST['confirm_national']))echo $_POST['confirm_national'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="gender" class="form-control">
																		<option value="">Select Gender</option>
																		<option value="male">Male</option>
																		<option value="female">Female</option>
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="level" class="form-control">
                                                                    <option value="">Select Level</option>
                                                                    <?php foreach($displayLev as $item): ?>
                                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                        <?php endforeach ?>																			
																		</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
