<?php
require 'config.php';
require 'model/stage1.php';
require 'model/stage2.php';
require 'model/stage3.php';
$stage1 = new stage1($db);
$stage2 = new stage2($db);
$stage3 = new stage3($db);
if(isset($_GET['action'])){
    switch($_GET['action']){
            /*店家*/
        case 'stage_progress':
            require 'view/stage_type.php';
            break;
        case 'stage1':           /*店家列表*/
            require 'view/stage1.php';
            break;
        case 'stage2':
            require 'view/stage2.php';
            break;
        case 'stage3':
            require 'view/stage3.php';
            break;
        case 'get_stage':
            if(isset($_POST['stage'])&&$_POST['stage']=='2'){
                $data = $stage1->get_stage($_POST);
            }elseif(isset($_POST['stage'])&&$_POST['stage']=='3'){
                $data = $stage1->get_stage($_POST);
            }
            echo json_encode($data,JSON_HEX_TAG);
            break;

        /*第一階段*/
        case 'get_people':
            if(isset($_POST['people'])){
                $data = $stage1->get_people();
            }
            echo json_encode($data,JSON_HEX_TAG);
            break;
        case 'get_company':
            if(isset($_POST['company'])){
                $data = $stage1->get_company();
            }
            echo json_encode($data,JSON_HEX_TAG);            
            break;
        case 'get_method':
            if(isset($_POST['method'])){
                $data = $stage1->get_method();
            }
            echo json_encode($data,JSON_HEX_TAG);    
            break;
        case 'add_stage1':
            if(isset($_POST['case_id'])&&$_POST['case_id'] != ""){
                $data = $stage1->add_stage1($_POST);
            }else{
                $data ="資料輸入不完整，請重新輸入";
            }
            echo json_encode($data,JSON_HEX_TAG);    
            break;

        /*第二階段*/
        case 'get_testitem':
            if(isset($_POST['test_item']))
            {
                $data = $stage2->get_testitem($_POST);
            }     
            echo json_encode($data,JSON_HEX_TAG);    
            break;   
        case 'get_machine':
            if(isset($_POST['machine'])){
                $data = $stage2->get_machine();
            }
            echo json_encode($data,JSON_HEX_TAG);    
            break;  
        case 'get_fixture':
            if(isset($_POST['fixture'])){
                $data = $stage2->get_fixture();
            }
            echo json_encode($data,JSON_HEX_TAG);    
            break;  
        case 'get_measure':
            if(isset($_POST['measure'])){
                $data = $stage2->get_measure();
            }
            echo json_encode($data,JSON_HEX_TAG);    
            break;
        case 'add_stage2':
            if(isset($_POST['case_id'])&&isset($_POST['test_item'])){
                $data = $stage2->add_stage2($_POST);
            }else{
                $data ="資料輸入不完整，請重新輸入";
            }
            echo json_encode($data, JSON_HEX_TAG);  
            break;
        /*第三階段*/
        case 'add_stage3':
            if(isset($_POST['case_id'])&&isset($_POST['case_price'])){
                $data = $stage3->add_stage3($_POST);
            }else{
                $data ="資料輸入不完整，請重新輸入";
            }
            echo json_encode($data, JSON_HEX_TAG);  
            break;
        case 'get_finish_data':
            if(isset($_POST['stage'])&&$_POST['stage']=='OK'){
                $data = $stage3->get_data($_POST);
            }    
            echo json_encode($data, JSON_HEX_TAG);  
            break;
        case 'complete':
            require 'view/stage_complete.php';
            break;
        case 'get_stage_data':
            if(isset($_POST['case_id'])){
                $data=$stage3->get_stage_data($_POST);
            }
            echo json_encode($data,JSON_HEX_TAG);
            break;
        default: /*參數錯誤處理，回到首頁*/
            include 'view/index.html';
        }
    }
