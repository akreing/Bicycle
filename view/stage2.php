<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>


<label for="case_id">案件編號</label>
<input type="textbox" id="case_id" readonly></input></br>

<label for="test_item">受測件資料</label>
<select name="test_item" id="test_item">
</select></br>

<label for="test_date">測試日期</label>
<input type="textbox" id="test_date"></input></br>
<label for="actual_date">實際完成日期</label>
<input type="textbox" id="actual_date"></input></br>

<label for="machine">機台</label>
<select name="machine" id="machine">
</select></br>

<label for="fixture">治具</label>
<select name="fixture" id="fixture">
</select></br>

<label for="measure">量具</label>
<select name="measure" id="measure">
</select></br>

<label for="test_time">測試時間</label>
<input type="textbox" id="test_time"></input></br>
<label for="operate_time">操作工時</label>
<input type="textbox" id="operate_time"></input></br>
<label for="actual_time">實際工時</label>
<input type="textbox" id="actual_time"></input></br>
<label for="test_result">測試結果</label>
<input type="textbox" id="test_result"></input></br>
<label for="test_data">測試數據</label>
<input type="textbox" id="test_data"></input></br>
<label for="elec_file_location">電子檔位置</label>
<input type="textbox" id="elec_file_location"></input></br>

<input type="button" id="new_goods" onclick="add_stage2()" value="送出">
<script type="text/javascript">
var aa=document.getElementById('case_id').value=window.localStorage["stage2"];

get_test_item();
get_machine();
get_fixture();
get_measure();
function get_test_item(){
 $.ajax({
      url:'?action=get_testitem',
      data:{
        "test_item":'1',
        "case_id":aa
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        //console.log(data);
        for(var items in data){
            $("#test_item").append('<option value="'+data[items].item_id+'">'+data[items].item_id+'</option>');
        }

      }
    });
}
function get_machine(){
 $.ajax({
      url:'?action=get_machine',
      data:{
        "machine":'1',
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        //console.log(data);
        for(var items in data){
            $("#machine").append('<option value="'+data[items].machine_id+'">'+data[items].machine_id+'</option>');
        }

      }
    });
}
function get_fixture(){
 $.ajax({
      url:'?action=get_fixture',
      data:{
        "fixture":'1',
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        for(var items in data){
            $("#fixture").append('<option value="'+data[items].fixture_id+'">'+data[items].fixture_id+'</option>');
        }
      }
    });
}
function get_measure(){
 $.ajax({
      url:'?action=get_measure',
      data:{
        "measure":'1',
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        for(var items in data){
            $("#measure").append('<option value="'+data[items].measure_id+'">'+data[items].measure_id+'</option>');
        }
      }
    });
}
function add_stage2(){
 $.ajax({
      url:'?action=add_stage2',
      data:{
        "case_id":$("#case_id").val(),
        "test_item":$('select[name="test_item"]').val(),
        "test_date":$("#test_date").val(),
        "actual_date":$("#actual_date").val(),
        "machine":$('select[name="machine"]').val(),
        "fixture":$('select[name="fixture"]').val(),
        "measure":$('select[name="measure"]').val(),
        "test_time":$("#test_time").val(),
        "operate_time":$("#operate_time").val(),
        "actual_time":$("#actual_time").val(),
        "test_result":$("#test_result").val(),
        "test_data":$("#test_data").val(),
        "file_location":$("#elec_file_location").val(),
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        alert("第二階段新增成功，即將跳轉至下階段");
        location.href="?action=stage_progress";
        }
      
    });  
}
</script>