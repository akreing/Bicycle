<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>


<body>

<label for="stage2">第二階段資料</label>
<select name="stage2" id="stage2">
</select>
<input type="button" id="goto_stage2" onclick="goto_stage2()" value="送出"></br>
<label for="stage3">第三階段資料</label>
<select name="stage3" id="stage3">
</select>
<input type="button" id="goto_stage3" onclick="goto_stage3()" value="送出"></br>

========================================================
<label for="search">已完成資料查詢</label>
<select name="search" id="search">
</select>
<input type="button" id="search_data" onclick="goto_data()" value="送出"></br>
<script type="text/javascript">
stage2();
stage3();
search_data();
function stage2(){
 $.ajax({
      url:'?action=get_stage',
      data:{
        "stage":"2"
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        for(var items in data){
            $("#stage2").append('<option value="'+data[items].case_id+'">'+data[items].case_id+'</option>');
        }
        }
    });  
}
function stage3(){
 $.ajax({
      url:'?action=get_stage',
      data:{
        "stage":"3"
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        for(var items in data){
            $("#stage3").append('<option value="'+data[items].case_id+'">'+data[items].case_id+'</option>');
        }
        }
      
    });  
}
function goto_stage2(){
window.localStorage["stage2"]=$('select[name="stage2"]').val();
parent.location='?action=stage2';
}
function goto_stage3(){
window.localStorage["stage3"]=$('select[name="stage3"]').val();
parent.location='?action=stage3';
}

function search_data(){
 $.ajax({
      url:'?action=get_finish_data',
      data:{
        "stage":"OK"
      },
      dataType:"json",
      type:"POST",
      error: function(data){
        console.log(data);
          },        
      success: function(data){
        console.log(data);
        for(var items in data){
            $("#search").append('<option value="'+data[items].case_id+'">'+data[items].case_id+'</option>');
        }
        }
      
    });  
}
function goto_data(){
window.localStorage["complete"]=$('select[name="search"]').val();
parent.location='?action=complete';
}
</script>
</body>
