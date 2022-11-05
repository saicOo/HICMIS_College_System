<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
include PAGE_PATH."/../init.php";
new Auth;
if(isset($_GET['ref'],$_GET['code'])){
    $exam_id = $_GET['ref'];
    $student_id = $_GET['code'];
    $exam = new Exam;
    $examRow =  $exam->show($exam_id);
    $question = new Question;
    $questions =  $question->display($exam_id);
    $revision = new Revision;
    $revisions =  $revision->resultStudent($exam_id,$student_id);
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
                                            <li><a href="/admin_panal/padges/exam/">Exams</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod"><?php echo $examRow['exam_title'] ?></span>
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
                                        <th>Question Title</th>
                                        <th>Your Answar</th>
                                        <th>Mark</th>
                                    </tr>
                                    <?php
                                     foreach($revisions as $item): 
                                        $option =$question->displayOption($item['question_id']);
                                        $answar = isset($option[$item['answar_option']-1]['option_title'])? $option[$item['answar_option']-1]['option_title'] : "No answar"
                                     ?>
                                    <tr>
                                        <td><?php echo $item['question_title'] ?></td>
                                        <td><?php echo $answar ?></td>
                                        <td><?php echo $item['marks'] ?></td>
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
