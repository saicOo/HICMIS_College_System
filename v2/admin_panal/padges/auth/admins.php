<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$admin = new Admin; 
$admins =  $admin->display();

if(isset($_POST['not-accept'])){
    $id = $_POST['id'];
    $accepted = "not accept";
    $admin->accepted($id,$accepted);
}
if(isset($_POST['accept'])){
    $id = $_POST['id'];
    $accepted = "accept";
    $admin->accepted($id,$accepted);
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
                                            <li><span class="bread-blod">all admins</span>
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
                                        <th>id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>role</th>
                                        <th>show profile</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php 
                                     foreach($admins as $item): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $item['id'] ?></td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo $item['email'] ?></td>
                                        <td><?php echo $item['role'] ?></td>
                                        <td><a href="/admin_panal/padges/auth/profile.php?ref=<?php echo $item['id'] ?>"><i class="fa fa-user edu-avatar" aria-hiden="true"></i> show</a></td>
                                        <td>
                                            <form method="post">
                                                <?php if($item['status'] == "accept"): ?>
                                                    <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                                                    <button name="not-accept" class="btn btn-custon-rounded-three btn-success" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> accept</button>
                                                    <?php else: ?>
                                                        <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                                                        <button name="accept" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hiden="true"></i> not accept</button>
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
