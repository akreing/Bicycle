<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>


<label for="case_id">案件編號</label>
<input type="textbox" id="case_id"></input></br>
<label for="progress">合約進度</label>
<input type="textbox" id="progress"></input></br>
<label for="run">執行進度</label>
<input type="textbox" id="run"></input></br>

<label for="people">業務人員</label>
<select name="people" id="people">
</select></br>

<label for="company">客戶基本資料</label>
<select name="company" id="company">
</select></br>

<label for="test_method">測試方法資料</label>
<select name="test_method" id="test_method">
　<option value="03">03</option>
</select></br>
<label for="executor">執行人員</label>
<input type="textbox" id="executor"></input></br>
<label for="sign">簽核人員</label>
<input type="textbox" id="sign"></input></br>
<label for="case_date">接案日期</label>
<input type="textbox" id="case_date"></input></br>
<label for="complete_date">預計完成日期</label>
<input type="textbox" id="complete_date"></input></br>
<label for="amount_price">原價</label>
<input type="textbox" id="amount_price"></input></br>

<input type="button" id="new_goods" onclick="add_stage1()" value="送出">


<script type="text/javascript">
get_people();
get_company();
get_method();
function get_people(){
 $.ajax({
      url:'?action=get_people',
      data:{
        "people":'1',
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        //console.log(data);
        for(var items in data){
            $("#people").append('<option value="'+data[items].employee_id+'">'+data[items].employee_id+'</option>');
        }

      }
    });
}
function get_company(){
 $.ajax({
      url:'?action=get_company',
      data:{
        "company":'1',
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        //console.log(data);
        for(var items in data){
            $("#company").append('<option value="'+data[items].company_id+'">'+data[items].company_id+'</option>');
        }

      }
    });
}
function get_method(){
 $.ajax({
      url:'?action=get_method',
      data:{
        "method":'1',
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        for(var items in data){
            $("#test_method").append('<option value="'+data[items].test_id+'">'+data[items].test_id+'</option>');
        }
      }
    });
}

function add_stage1(){
 $.ajax({
      url:'?action=add_stage1',
      data:{
        "case_id":$("#case_id").val(),
        "progress":$("#progress").val(),
        "run":$("#run").val(),
        "people":$('select[name="people"]').val(),
        "company":$('select[name="company"]').val(),
        "test_method":$('select[name="test_method"]').val(),
        "executor":$("#executor").val(),
        "sign":$("#sign").val(),
        "case_date":$("#case_date").val(),
        "complete_date":$("#complete_date").val(),
        "amount_price":$("#amount_price").val()
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        alert("第一階段新增成功，即將跳轉至下階段");
        location.href="?action=stage_progress";
        }
      
    });  
}
</script>