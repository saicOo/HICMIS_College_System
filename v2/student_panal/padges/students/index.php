<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$student = new Student; 
$students =  $student->display();

if(isset($_POST['not-accept'])){
    $code_std = $_POST['code'];
    $accepted = "not accept";
    $student->accepted($code_std,$accepted);
}
if(isset($_POST['accept'])){
    $code_std = $_POST['code'];
    $accepted = "accept";
    $student->accepted($code_std,$accepted);
}

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $resultSearch =  $student->search($search);
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
                                            <li><span class="bread-blod">all students</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                            <form method="GET" role="search" class="sr-input-func" style="margin-left:auto;">
                                                <input name="search" type="text" placeholder="Search..." class="search-int form-control">
                                                <button style="position: absolute;top: 8px;right: -5px;color: #999;transition: .5s ease-out;font-size:14px;background: transparent;border: transparent;"><i class="fa fa-search"></i></button>
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
        <!-- end header area -->
        <div class="product-status mg-b-15">
            <div class="container-fluid">
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
                                        <th>code student</th>
                                        <th>national</th>
                                        <th>Name of description.</th>
                                        <th>Level</th>
                                        <th>show profile</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php $result = isset($_GET['search']) ? $resultSearch : $students;
                                     foreach($result as $item): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $item['code_st'] ?></td>
                                        <td><?php echo $item['national'] ?></td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo $item['lev_name'] ?></td>
                                        <td><a href="/admin_panal/padges/students/profile.php?ref=<?php echo $item['code_st'] ?>"><i class="fa fa-user edu-avatar" aria-hidden="true"></i> show</a></td>
                                        <td>
                                            <form method="post">

                                                <?php if($item['status'] == "accept"): ?>
                                                    <input type="hidden" name="code" value="<?php echo $item['code_st'] ?>">
                                                    <button name="not-accept" class="btn btn-custon-rounded-three btn-success" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> accept</button>
                                                    <?php else: ?>
                                                        <input type="hidden" name="code" value="<?php echo $item['code_st'] ?>">
                                                        <button name="accept" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> not accept</button>
                                                        <?php endif ?>
                                            </form>
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
