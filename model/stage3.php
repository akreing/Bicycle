<?php
class stage3{ 
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

    function add_stage3($data){
        $db=$this->db;
        $stmt=$db->prepare("UPDATE case_information SET `case_price`=:price,`pay_type`=:pay_type,".
                           "`apply_elec_file`=:file,`r_elec_file`=:r_file,`report_error`=:report_error,".
                           "`tfa`=:tfa,`cht_version`=:cht,`eng_version`=:eng,`remark`=:remark WHERE `case_id`=:id");
        $stmt->execute(array(
                        ':price'=>$data['case_price'],
                        ':pay_type'=>$data['pay_type'],
                        ':file'=>$data['apply_elecfile'],
                        ':r_file'=>$data['r_elecfile'],
                        ':report_error'=>$data['report_error'],
                        ':tfa'=>$data['tfa'],
                        ':cht'=>$data['cht_version'],
                        ':eng'=>$data['eng_version'],
                        ':remark'=>$data['remark'],
                        ':id'=>$data['case_id']
                        ));
        $next=$db->prepare("UPDATE case_progress SET `now_type`=:now,`next_type`=:next WHERE `case_id`=:id");
        $next->execute(array(
                        ':id'=>$data['case_id'],
                        ':now'=>"3",
                        ':next'=>"OK"
                        ));
        return "OK";

    }
    function get_data(){
        $db=$this->db;
        $stmt=$db->prepare("SELECT `case_id` FROM case_progress WHERE `next_type`=:id");
        $stmt->execute(array(':id'=>"OK"));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
    function get_stage_data($data){
        $db=$this->db;
        $stmt=$db->prepare("SELECT * FROM case_information WHERE `case_id`=:id");
        $stmt->execute(array(':id'=>$data['case_id']));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//回傳全部資料
    }
}