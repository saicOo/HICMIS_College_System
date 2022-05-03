<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
// ******** get method subject id  ********//
if(isset($_GET['ref'])){
    try{
    // ref_id =======> supject id
    $ref_id = $_GET['ref'];
// ********** display all data Material index of Subject ***********//
    $material = new Material;
    $disblaymaterial = $material->display($ref_id);
// *********** get data  Subject and Level index of Material ***************//
    $subject = new Subject;
    $subjectRow = $subject->show($ref_id);
    if(empty($subjectRow)) header('location:/admin_panal/500/');
    $sub_name = $subjectRow['name'];
    $lev_name = $subjectRow['lev_name'];
    $lev_id = $subjectRow['lev_id'];
// **********************************************************//
// *********** add new Material ***************//
    if(isset($_POST['submit'])){
        $request = array(
            'description'=> $_POST['description'],
            'date_mat'=> $_POST['date_mat'],
            'sub_id'=> $ref_id,
            'sub_name'=> $sub_name,
            'lev_name'=> $lev_name,
        );
        $material->store($request);
    }
// If delete, delete a material
if(isset($_GET['destroy'])){
    $material_id = $_GET['destroy'];
    $material_name = $_GET['name'];
    $material->destroy($material_id,$material_name,$ref_id,$sub_name,$lev_name);
  }
}
catch(Exception $e) {
    header('location:/admin_panal/500/');
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
                                            <li><a href="/admin_panal/padges/subjects/?ref=<?php echo $lev_id ?>"><?php echo $lev_name ?></a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod"><?php echo $sub_name ?></span>
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
<?php if(!empty($material->messErrors)): ?>
            <div class="container">
        <div class="alert alert-warning alert-success-style3 alert-success-stylenone">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">×</span>
				</button>
            <?php foreach($material->messErrors as $errors): ?>
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
                                    <h1>ADD <span class="basic-ds-n">material</span></h1>
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
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                                <input type="text" name="description" class="form-control basic-ele-mg-b-10 responsive-mg-b-10" placeholder="Name material" />
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <div class="form-group data-custon-pick" id="data_3">
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input name="date_mat" type="text" class="form-control" placeholder="Enter the date the material was published" value="<?php echo date("d/m/Y") ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
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
                                        <th>Name of material.</th>
                                        <th>date</th>
                                        <th>subject</th>
                                        <th>show Lecture</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php foreach($disblaymaterial as $item): ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $item['description'] ?></td>
                                        <td><?php echo $item['date_mat'] ?></td>
                                        <td><?php echo $sub_name ?></td>
                                        <td><a href="/admin_panal/padges/lecture/?ref=<?php echo $item['id']?>"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> show</a></td>
                                        <td>
                                            <a  data-toggle="tooltip" title="delete"href="?ref=<?php echo $ref_id .'&destroy='.$item['id'].'&name='.$item['description'] ?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
