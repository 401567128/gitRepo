$(document).ready(function() {
	/**
	 * changeRule提交
	 */
	$("#ruleBtn").click(function(event) {
		/* Act on the event */
		$content = ue.getContentTxt() ;

		$.post( ruleURL,
				    {content:$content},
    				function(data){
      				if(data == "1"){
      					alert("修改成功！");
                window.location.reload();
      				}else if(data == "0"){
      					alert("修改失败");
      				}else{
      					alert("未知的错误");
      				}
    				},
  				  "text");
		});
});