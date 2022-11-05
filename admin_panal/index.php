<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require "controllers/".$class.".php";
}
include "init.php";
new Auth;
$home = new Home;
    $stdsCount = $home->stdsCount();
    $stdsLevCount = $home->stdsLevCount();
    $levCount = $home->levCount();
    $subLevCount = $home->subLevCount();
#########################################
 require_once "./layouts/head.php";
        // <!-- Start Left menu area -->
require_once "./layouts/sidebar.php"; 
        // <!-- start header area -->
require_once "./layouts/header.php"; 
        // <!-- end header area -->
##########################################

?>
<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu" style="text-align: left;">
                                            <li><span class="bread-blod">Home</span>
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
        <!-- end breadcome -->
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($stdsLevCount as $count): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>number of students in level</h5>
                                <h2><span class="counter"><?php echo $count['c'] ?></span> <span class="tuition-fees"><?php echo $count['name'] ?></span></h2>
                                <span class="text-danger"><?php echo $count['c'] / 20 *100 ?>%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $count['c'] / 20 *100 ?>%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="analytics-sparkle-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($subLevCount as $count): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info-cs">
                            <h3 class="box-title">number of subjects in level</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                <h5><?php echo $count['name'] ?></h5>                                
                            </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success"><?php echo $count['c'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="traffic-analysis-area  mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu">
                            <i class="fa fa-user"></i>
                            <div class="social-edu-ctn">
                                <h3><?php echo $stdsCount['c'] ?> number of students</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                            <i class="fa fa-book"></i>
                            <div class="social-edu-ctn">
                                <h3><?php echo $levCount['c'] ?> number of grades</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start footer area -->
        <?php  require_once "./layouts/footer.php"; ?>
        <!-- end footer area -->
