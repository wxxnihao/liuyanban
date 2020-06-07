	//【回复】的a标签
	var oA = document.getElementsByClassName("reply-click");
	
	//每一条记录的div父级元素
	var oItem = document.getElementsByClassName("item");
	
    //记录列表的索引值
	var index = 0;
	//form表单的父元素
	var oDiv = document.createElement("div");
	oDiv.className = "textarea";
	
	oDiv.innerHTML = '<form class="submit-reply" action="" method="post"><textarea class="reply-content" name="reply" rows="5" cols="80"></textarea><input  type="submit" value="回复"/></form>';
	
	//回复的第几条记录
	var replyItem = document.getElementsByClassName("reply-item");
	
	
	/**
	 * 点击A标签显示输入框，填写回复内容
	 */
	for (var i = 0; i < oA.length; i++) {
	    oA[i].index = i;
		oA[i].onclick = function(){
			//添加输入框到每一条记录的最底部
			oItem[this.index].appendChild(oDiv);
			//得到form表单元素
			var submitReply = document.getElementsByClassName("submit-reply")[0];
			/**
			 * 回复的记录在数组中的id
			 */
			index = this.index;
			submitReply.onsubmit = function(){
				//回复内容
			    var replyContent  = document.getElementsByClassName("reply-content")[0].value.trim();
			    //alert(replyContent);
				if (replyContent == "") {
					return false;
				} else{
					//alert(replyItem[index].innerText);
					this.action = "insertReply.php?id="+replyItem[index].innerText+"&reply_content="+replyContent;
					return true;
				}
			}
		}	
	}
	
	
	

	
	
	
	

