<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
// ******** get method material id  ********//
if(isset($_GET['ref'])){
    try{
// ********** display all data Lecture index of Material ***********//
    $material_id = $_GET['ref'];
    $lecture = new Lecture;
    $disblaylecture = $lecture->display($material_id);
// *********** get data  Material and Subject index of Lecture ***************//
    $material = new Material;
    $materialRow = $material->show($material_id);
    if(empty($materialRow)) header('location:/HICMIS/admin_panal/500/');
    $sub_name = $materialRow['name'];
    $material_name = $materialRow['description'];
    $sub_id = $materialRow['sub_id'];
    $lev_id = $materialRow['lev_id'];
// *********** get data  Level index of level ***************//
    $level = new Level;
    $levelRow = $level->show($lev_id);
    $lev_name=$levelRow['name'];
// **********************************************************//
// *********** add new Lecture ***************//
    if(isset($_POST['add'])){
        $request = array(
          'material_id'=> $material_id,
          'sub_name'=> $sub_name,
          'material_name'=> $material_name,
          'lev_name'=> $lev_name,
          'type'=> $_POST['type'],
          'lecture_type'=> $_FILES['lecture']['type'],
          'lecture_name'=> $_FILES['lecture']['name'],
          'lecture_tmp'=> $_FILES['lecture']['tmp_name'],
      );
      $lecture->store($request);
      }
// **********************************************************//
// ******** If delete, delete a lecture ******** //
if(isset($_GET['destroy'])){
    $lecture_name = $_GET['destroy'];
    $lecture->destroy($lecture_name,$material_id,$material_name,$sub_name,$lev_name);
}
}
catch(Exception $e) {
    header('location:/HICMIS/admin_panal/500/');
}
}else{
    header('location:/HICMIS/admin_panal/500/');
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
                                            <li><a href="/HICMIS/admin_panal/">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="/HICMIS/admin_panal/padges/subjects/?ref=<?php echo $lev_id ?>"><?php echo $lev_name ?></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="/HICMIS/admin_panal/padges/material/?ref=<?php echo $sub_id ?>"><?php echo $sub_name ?></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod"><?php echo $material_name ?></span>
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
<?php if(!empty($lecture->messErrors)): ?>
            <div class="container">
        <div class="alert alert-warning alert-success-style3 alert-success-stylenone">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">×</span>
				</button>
            <?php foreach($lecture->messErrors as $errors): ?>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Lecture List</h4>
                            <div class="add-product">
                            <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">ADD Lecture</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Name of lecture.</th>
                                        <th>date</th>
                                        <th>type</th>
                                        <th>material</th>
                                        <th>subject</th>
                                        <th>level</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php foreach($disblaylecture as $item): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $item['lecture_name'] ?></td>
                                        <td><?php echo $item['date_lec'] ?></td>
                                        <td><?php echo $item['type'] ?></td>
                                        <td><?php echo $material_name ?></td>
                                        <td><?php echo $sub_name ?></td>
                                        <td><?php echo $lev_name ?></td>
                                        <td>
                                            <a data-toggle="tooltip" title="delete"href="?destroy=<?php echo $item['lecture_name'].'&ref='.$material_id?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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


        <!-- modal -->
        <div id="zoomInDown1" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-close-area modal-close-df">
                                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>ADD Lecture</h3>
                                                                            <form method="POST" enctype="multipart/form-data" autocomplete="off">
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Lecture Path</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-big-btn">
                                                                        <label class="icon-right" for="prepend-big-btn">
																				<i class="fa fa-download"></i>
																			</label>
                                                                        <div class="file-button">
                                                                            Browse
                                                                            <input name="lecture" type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                        </div>
                                                                        <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="login-btn-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <label>
																									<input type="radio" name="type" value="1" class="i-checks" checked> محاضرة </label>
                                                                                            <label>
																									<input type="radio" name="type" value="2" class="i-checks"> سكشن </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="login-horizental">
                                                                                                <button class="btn btn-sm btn-primary login-submit-cs" name="add" type="submit">Add</button>
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

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->

        