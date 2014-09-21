<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>


<label for="case_id">案件編號</label>
<input type="textbox" id="case_id" readonly></input></br>

<label for="case_price">案件金額</label>
<input type="textbox" id="case_price"></input></br>
<label for="pay_type">付款方式</label>
<input type="textbox" id="pay_type"></input></br>

<label for="apply_elecfile">申請電子檔</label>
<input type="textbox" id="apply_elecfile"></input></br>

<label for="r_elecfile">R版電子檔</label>
<input type="textbox" id="r_elecfile"></input></br>
<label for="report_error">報告錯誤次數</label>
<input type="textbox" id="report_error"></input></br>
<label for="tfa">是否蓋TFA章</label>
<input type="textbox" id="tfa"></input></br>
<label for="cht_version">中文版</label>
<input type="textbox" id="cht_version"></input></br>
<label for="eng_version">英文版</label>
<input type="textbox" id="eng_version"></input></br>
<label for="remark">備註</label>
<input type="textbox" id="remark"></input></br>

<input type="button" id="new_goods" onclick="add_stage3()" value="送出">
<script type="text/javascript">
var aa=document.getElementById('case_id').value=window.localStorage["stage3"];

get_test_item();

function add_stage3(){
 $.ajax({
      url:'?action=add_stage3',
      data:{
        "case_id":$("#case_id").val(),
        "case_price":$("#case_price").val(),
        "pay_type":$("#pay_type").val(),
        "apply_elecfile":$("#apply_elecfile").val(),
        "r_elecfile":$("#r_elecfile").val(),            
        "report_error":$("#report_error").val(),
        "tfa":$("#tfa").val(),
        "cht_version":$("#cht_version").val(),
        "eng_version":$("#eng_version").val(),
        "remark":$("#remark").val(),
         },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        alert("三階段皆已完成");
        location.href="?action=stage_progress";
        }
      
    });  
}
</script>