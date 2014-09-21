<?php
class stage2{ 
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
    function get_testitem($data){
        $db=$this->db;
        $stmt=$db->prepare("SELECT `item_id` FROM accept_testitem WHERE `case_id`=:id");
        $stmt->execute(array(':id'=>$data['case_id']));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function get_machine() {
        $db=$this->db;
        $stmt=$db->prepare("SELECT `machine_id` FROM machine");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function get_fixture() {
        $db=$this->db;      
        $stmt=$db->prepare("SELECT `fixture_id` FROM fixture");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function get_measure() {
        $db=$this->db;        
        $stmt=$db->prepare("SELECT `measure_id` FROM measure");
        $stmt->execute(array());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function add_stage2($data){
        $db=$this->db;
        $stmt=$db->prepare("UPDATE case_information SET `accept_testitem_id`=:test_item,`test_date`=:test_date,`actual_complete_date`=:actual_date,".
                           "`machine_id`=:machine_id,`fixture_id`=:fixture_id,`measure_id`=:measure_id,`test_time`=:test_time,`operate_time`=:operate_time,".
                          "`actual_time`=:actual_time,`test_result`=:test_result,`test_data`=:test_data,`elec_file_location`=:file_location WHERE `case_id`=:id");
        $stmt->execute(array(':test_item'=>$data['test_item'],
                             ':test_date'=>$data['test_date'],
                             ':actual_date'=>$data['actual_date'],
                             ':machine_id'=>$data['machine'],
                             ':fixture_id'=>$data['fixture'],
                             ':measure_id'=>$data['measure'],
                             ':test_time'=>$data['test_time'],
                             ':operate_time'=>$data['operate_time'],
                             ':actual_time'=>$data['actual_time'],
                             ':test_result'=>$data['test_result'],
                             ':test_data'=>$data['test_data'],
                             ':file_location'=>$data['file_location'],
                             ':id'=>$data['case_id']
                        ));
        $next=$db->prepare("UPDATE case_progress SET `now_type`=:now,`next_type`=:next WHERE `case_id`=:id");
        $next->execute(array(
                        ':id'=>$data['case_id'],
                        ':now'=>"2",
                        ':next'=>"3"
                        ));
        return "OK";
    }
}