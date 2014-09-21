<?php
class stage1{ 
  /**
   * 初始化shop物件並連結db
   * 
   * @param PDO $db
   * @return void
   */
    function __construct( PDO $db) //導入資料庫
    {
        $this->db = $db;
    }
    function get_stage($data){
        $db=$this->db;
        $stmt=$db->prepare("SELECT `case_id` FROM  case_progress WHERE `next_type`=:type");
        $stmt->execute(array( ':type'=>$data['stage'] ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function get_people(){
        $db=$this->db;
        $stmt=$db->prepare("SELECT `employee_id` FROM employee");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function get_company(){
        $db=$this->db;
        $stmt=$db->prepare("SELECT `company_id` FROM company_information");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function get_method(){
        $db=$this->db;
        $stmt=$db->prepare("SELECT `test_id` FROM test_method");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function add_stage1($data) {
                $db=$this->db;
    $s=$db->prepare("SELECT `case_id` FROM case_information WHERE `case_id`=:id");
    $s->execute(array(':id'=>$data['case_id']));
    if($s->fetchAll(PDO::FETCH_ASSOC)==false){
        $stmt=$db->prepare("INSERT INTO case_information (`case_id`,`contract_progress`,`run_progress`,`businese_people`,`company_information_id`,`test_method_id`,".
                            "`executor`,`signoff_people`,`take_case_date`,`expected_complete_date`,`amount_price`)".
                            "VALUES(:id,:c_pro,:r_pro,:people,:company_id,:method_id,:executor,:sign,:case_date,:complete_date,:price)");
        $stmt->execute(array(
                        ':id'=>$data['case_id'],
                        ':c_pro'=>$data['progress'],
                        ':r_pro'=>$data['run'],
                        ':people'=>$data['people'],
                        ':company_id'=>$data['company'],
                        ':method_id'=>$data['test_method'],
                        ':executor'=>$data['executor'],
                        ':sign'=>$data['sign'],
                        ':case_date'=>$data['case_date'],
                        ':complete_date'=>$data['complete_date'],
                        ':price'=>$data['amount_price']
                        ));
        $next=$db->prepare("INSERT INTO case_progress (`case_id`,`now_type`,`next_type`) VALUES (:id,:now,:next)");
        $next->execute(array(
                        ':id'=>$data['case_id'],
                        ':now'=>"1",
                        ':next'=>"2"
                        ));
            return $db -> lastInsertId();
    }
    else
        return "已有此案件，請重新輸入編號";
}
}