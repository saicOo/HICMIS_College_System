<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
// ******** get method level id  ********//
if(isset($_GET['ref'])){
    $ref_id = $_GET['ref'];
    $subject = new Subject;
    $disblaySub = $subject->display($ref_id);
    $level = new Level;
    $levelRow = $level->show($ref_id);
    if(empty($levelRow)) header('location:/admin_panal/500/');
    $lev_name=$levelRow['name'];
    if(isset($_POST['submit'])){
        $request = array(
            'name'=> $_POST['name'],
            'lev_name'=> $lev_name,
            'lev_id'=> $ref_id,
        );
        $subject->store($request);
    }
    // If delete, delete a subject
if(isset($_GET['destroy'])){
    $sub_id = $_GET['destroy'];
    $dirName = $_GET['dirName'];
    $subject->destroy($sub_id,$dirName,$ref_id,$lev_name);
  }
}else{
    header('location:/admin_panal/500/');
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
                                            <li><span class="bread-blod"><?php echo $lev_name ?></span>
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
        <!-- end header area -->
        <!-- start aleart area -->
        <?php if(!empty($subject->messErrors)): ?>
                <div class="container">
                        <div class="alert alert-warning alert-success-style3 alert-success-stylenone">
                            <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                <span class="icon-sc-cl" aria-hidden="true">×</span>
                            </button>
                        <?php foreach($subject->messErrors as $errors): ?>
                        <i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-none" aria-hidden="true"></i>
                        <p class="message-alert-none text-center"><strong>Warning!</strong> <?php echo  $errors ?></p>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
        <!-- start aleart area -->
        <div class="product-status mg-b-15">
            <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="sparkline10-list mt-b-30">
                            <div class="sparkline10-hd">
                                <div class="main-sparkline10-hd">
                                    <h1>ADD <span class="basic-ds-n">Subject</span></h1>
                                </div>
                            </div>
                            <div class="sparkline10-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner inline-basic-form">
                                                <form method="POST">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="name" class="form-control basic-ele-mg-b-10 responsive-mg-b-10" placeholder="Name Subject" />
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="login-btn-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
																			<div class="login-horizental lg-hz-mg"><button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Add</button></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Departments List</h4>
                            <div class="add-product">
                               
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Name of description.</th>
                                        <th>Level</th>
                                        <th>show matiral</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php foreach($disblaySub as $item): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo $lev_name ?></td>
                                        <td><a href="/admin_panal/padges/material/?ref=<?php echo $item['id'] ?>"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> show</a></td>
                                        <td>
                                            <a  data-toggle="tooltip" title="delete"href="?ref=<?php echo $ref_id ."&destroy=".$item['id']."&dirName=".$item['name']?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
