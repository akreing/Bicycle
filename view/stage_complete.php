<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<title></title>
</head>
<body onload="search();">
<!--View-->
STAGE 1
<table border="1" id="stage1">
  <thead>
    <th>案件編號</th><th>合約進度</th><th>執行進度</th><th>業務人員</th><th>客戶基本資料</th>
    <th>測試方法資料</th><th>執行人員</th><th>簽核人員</th><th>投案日期</th><th>預計完成日期</th>
    <th>原價</th>
  </thead>
  <tbody>
 </tbody>
</table>
STAGE 2
<table border="1" id="stage2">
  <thead>
    <th>受測件資料</th><th>測試日期</th><th>實際完成日期</th><th>機台</th><th>治具</th><th>量具</th><th>測試時間</th><th>操作工時</th><th>實際工時</th><th>測試結果</th><th>測試數據</th><th>電子檔位址</th>
  </thead>
  <tbody>
 </tbody>
</table>
STAGE 3
<table border="1" id="stage3">
  <thead>
    <th>案件金額</th><th>付款方式</th><th>申請電子檔</th><th>R版電子檔</th><th>報告錯誤次數</th>
    <th>是否蓋TFA章</th><th>中文版</th><th>英文版</th><th>註備</th>
  </thead>
  <tbody>
 </tbody>
</table>
<script>
function search(){
var search=window.localStorage["complete"];
 $.ajax({
      url:'?action=get_stage_data',
      data:{
        'case_id':search
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        for(var items in data){
            $("#stage1 tbody").append('<tr><td>'+data[items].case_id+
                                '</td><td>'+data[items].contract_progress+
                                '</td><td>'+data[items].run_progress+
                                '</td><td>'+data[items].businese_people+
                                '</td><td>'+data[items].company_information_id+
                                '</td><td>'+data[items].test_method_id+
                                '</td><td>'+data[items].executor+
                                '</td><td>'+data[items].signoff_people+
                                '</td><td>'+data[items].take_case_date+
                                '</td><td>'+data[items].expected_complete_date+
                                '</td><td>'+data[items].amount_price+
                                '</td></tr>'
                                );
            $("#stage2 tbody").append('<tr><td>'+data[items].accept_testitem_id+
                                '</td><td>'+data[items].test_date+
                                '</td><td>'+data[items].actual_complete_date+
                                '</td><td>'+data[items].machine_id+
                                '</td><td>'+data[items].fixture_id+
                                '</td><td>'+data[items].measure_id+
                                '</td><td>'+data[items].test_time+
                                '</td><td>'+data[items].operate_time+
                                '</td><td>'+data[items].actual_time+
                                '</td><td>'+data[items].test_result+
                                '</td><td>'+data[items].test_data+
                                '</td><td>'+data[items].elec_file_location+
                                '</td></tr>'
                                );
            $("#stage3 tbody").append('<tr><td>'+data[items].case_price+
                                '</td><td>'+data[items].pay_type+
                                '</td><td>'+data[items].apply_elec_file+
                                '</td><td>'+data[items].r_elec_file+
                                '</td><td>'+data[items].report_error+
                                '</td><td>'+data[items].tfa+
                                '</td><td>'+data[items].cht_version+
                                '</td><td>'+data[items].eng_version+
                                '</td><td>'+data[items].remark+
                                '</td></tr>'
                                );



        }
        }
    });  
}
</script>
</body>
</html>		