

var form = document.getElementsByTagName('form')[0];
//var hobby = "";
//for (var i = 0; i <oGender.length;i++) {
//	if (oGender[0].checked) {
//		hobby = oGender[0].value;
//	} else if(oGender[i].checked && i!==0 ){
//		hobby += "|"+oGender[i].value;
//	}else{
//		continue;
//	}
//}
form.onsubmit = function(){
	var username = document.getElementsByClassName('username')[0].value.trim();
	var password = document.getElementsByClassName('password')[0].value.trim();
	var oGender = document.getElementsByClassName('gender');
	var oHobby = document.getElementsByClassName('hobby');
	var iconhead = document.getElementsByClassName('iconhead')[0];
	var position = document.getElementsByClassName('position')[0].value;
	var input_position = document.getElementById('position');
	var summary = document.getElementsByClassName('textarea')[0].value.trim();
	
	input_position.value = position;
//	console.log(username);
//	console.log(password);
//	console.log(oGender);
//	console.log(oHobby);
//	console.log(iconhead);
//	console.log(summary);
	console.log(position);
	var gender = "男";
	
	if (oGender[0].checked) {
		gender = "男";
	} else{
		gender = "女";
	}
	if (username=="") {
		alert("用户名不能为空！！！");
		return false;
	} else if(password==""){
		alert("用户密码不能为空");
		return false;
	}else if(summary ==""){
		alert("个人简介不能为空");
		return false;
	}else{
		return true;
	}
}


