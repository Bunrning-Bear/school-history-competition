// JavaScript Document
//所有事件以及单次使用的简单函数。
window.onload = function()
{
	//以下是
	rate = 0.85;
	//以下是拼图的效果
	var imagine1 = null;
	var imagine2 = null;
	var oWrap = document.getElementById("wrapper");
	var oBox = document.getElementById("box");
	var w = document.documentElement.clientWidth;
	var oContainer2 = document.getElementById("container2");
	 
	oWrap.style.left =((w - 800) /2) + "px";
	window.onresize=function()
	{
		var oWrap = document.getElementById("wrapper");
		var w = document.documentElement.clientWidth;
		//oBox.innerHTML = w;
		oWrap.style.left =((w - 800) /2) + "px";
	}
	
	//begin();
	var choice = 5;
	var oCon = document.getElementById('container');
	var oCon2 = document.getElementById('container2');
	var oDraw = document.getElementById('draw');
	var oChoice = document.getElementById('choice');
	var choiceLeft = 20;
	var choiceTop = 20;
	
	if(oDraw.setCapture)
	{
		/*oCon2.runtimeStyle.background = imagine1;
		oDraw.runtimeStyle.background = imagine2;*/
	}
	else
	{
		oCon2.style.background = imagine1;
		oDraw.style.background = imagine2;
	}
	
	oChoice.style.left = choiceLeft + "px";
	oChoice.style.top = choiceTop + "px";

	if (oDraw.setCapture)//此语句用来适配ie6
	{
		oDraw.onmousedown = function(ev)
		{
			var oEvent = event||ev;
			var y =document.documentElement.scrollTop||document.body.scrollTop;
			disx = oEvent.clientX - oDraw.offsetLeft;
			disy = oEvent.clientY - oDraw.offsetTop;


			document.onmousemove = function(ev)
			{
				var oEvent = ev||event;
				oDraw.style.left = (oEvent.clientX - disx ) + "px";
				oDraw.style.top = (oEvent.clientY - disy )+"px";
				
				oDraw.onmouseup = function(ev)
				{
					var oEvent = ev||event;
					/*alert(parseInt(oDraw.style.left));
					alert(parseInt(oDraw.style.top));
*/					
					postx = parseInt(oDraw.style.left) - 204;
					posty = parseInt(oDraw.style.top);
					
					alert(postx);
					alert(posty);
					
					if( judge3 == 1 )
					{
						begin();
						oCon.runtimeStyle.display="none";
					}
					else
					{
						oDraw.style.left = "68px";
						oDraw.style.top = "68px";
					}

					oDraw.releaseCapture();
					
					document.onmousemove = null;
					oDraw.onmouseup = null;
				}
			}
			oDraw.setCapture();//要放在想要捕获的事件后面
		}
	}
	else
	{
		oDraw.onmousedown = function(ev)
		{
			var oEvent = event||ev;
			var y =document.documentElement.scrollTop||document.body.scrollTop;
			disx = oEvent.clientX - oDraw.offsetLeft;
			disy = oEvent.clientY - oDraw.offsetTop;


			document.onmousemove = function(ev)
			{
				var oEvent = ev||event;
				oDraw.style.left = (oEvent.clientX - disx ) + "px";
				oDraw.style.top = (oEvent.clientY - disy )+"px";
				
				oDraw.onmouseup = function(ev)
				{
					var oEvent = ev||event;
					/*alert(parseInt(oDraw.style.left));
					alert(parseInt(oDraw.style.top));
*/
					postx = parseInt(oDraw.style.left) - 204;
					posty = parseInt(oDraw.style.top);
					
					alert(postx);
					alert(posty);
					
					if( judge3 == 1 )
					{
						begin();
						oCon.style.display="none";
					}
					else
					{
						oDraw.style.left = "68px";
						oDraw.style.top = "68px";
					}
					document.onmousemove = null;
					oDraw.onmouseup = null;
				}
				
				return false;
			}
		}
	}
	//以上是拼图的效果

	/* 以下是文本框的出现和消失效果 */
	var oFalse = document.getElementById("false");
	var oInput = document.getElementById("inusername");
	var oInput2 = document.getElementById("inpassword");
	var oWarning = document.getElementById("warning");
	var oHelp = document.getElementById("help");
	oInput.visible = false;

	var timmer4 = null;

	oInput.onfocus = function()
	{
		oFalse.style.display = "none";
		oWarning.style.display = "block";
		
		clearTimeout(timmer4);
		
		timmer4 = setTimeout( function()
		{
			oWarning.style.display = "none";
		}, 3000);
	}

	oHelp.onmouseover = function()
	{
		oWarning.style.display = "block";
		
		clearTimeout(timmer4);
		
		timmer4 = setTimeout( function()
		{
			oWarning.style.display = "none";
		}, 3000);
	}
	/* 以下是文本框的出现和消失效果 */

	/*以下是点击登录后登录界面消失的样子*/
	var oNext = document.getElementById("next");
	var oLast = document.getElementById("last");
	var oLoginB = document.getElementById("logbutton");
	var oLogin = document.getElementById("login");
	//var oFalse = document.getElementById("false");
	var timmer5 = null;
	
	var t = 7;
	//var l = oLogin.offsetTop;
	var oQuestion = document.getElementById("question");
	
	oLoginB.onmouseover = function()
	{
		oLoginB.style.border="4px solid #000";
	}
	/*以上是点击登录后登录界面消失的样子*/
	oLoginB.onclick = function()
	{
		UserName = oInput.value;
		PassWord = oInput2.value;
		alert(UserName);
		alert(PassWord);
		if(judgeLogin == 0)
		{
			oFalse.innerHTML = False;
			oFalse.style.display = "block";
			shake(oLoginB);
		}
		else
		{
			getQuestion(questionnumber);
			var l = -1;
			arrange();
			setInterval(function(){ShowCountDown()},interval);
			oQuestion.style.display = "block";

			timmer5 = setInterval(function()
			{
				if (t <= 40)
				 {
					t = t + 0.5;
					/*oInput.value = t;*/
					oLogin.style.top = -125-(l - ( 20*t - 0.05*t*t*t )) + "px";
				}
				else
				{
					
					//oQuestion.style.display = "block";
					oNext.style.display = "block";
					oLast.style.display = "block";
					clearInterval(timmer5);
				}
			}
			, 30);
		}
	}
	/*以上是点击登录后登录界面消失的样子*/

	/*以下答题时的效果*/
	
	var oAns = document.getElementById("Ans");
	var aAns = oAns.getElementsByTagName("div");
	var objArray = new Array(90,110,90,110);
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	
	
	for(var i = 0 ; i<aAns.length ; i++)
	{
		aAns[i].onmousedown = function()
		{
			for(var j = 0 ; j < aAns.length ; j++ )
			{
				aAns[j].style.border = "6px dashed #CC6633";
			}
			
			this.style.border= "6px solid #CC6633";
			
			if(judgeArr[questionnumber] == 0)
			{
				judgeCount++;
			}
			judgeArr[questionnumber] = 1;
			
			if(questionnumber<=20)
			{
				aNumberzone[questionnumber - 1].style.color = "#00CC33";
			}
			else
			{
				aNumberzone[questionnumber - 21].style.color = "#00CC33";
			}
		}
	}
	
	for(var i = 0 ; i<aAns.length ; i++)
	{
		aAns[i].onmouseover = function()
		{
			var t = 1;
			for(var j = 0 ; j < aAns.length ; j++ )
			{
				//clearInterval(timmer7);
				aAns[j].style.left = objArray[j] + "px";
			}
			this.style.left = (this.offsetLeft + 20) + "px";
		}
	}
	/*以上答题时的效果*/
	
	/*以下是切换题目的效果*/
	var oNext = document.getElementById("next");
	var oLast = document.getElementById("last");
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	var oNote = document.getElementById("note");

	oNext.onclick = function()
	{	
		if(questionnumber== 40 && judgeCount!=40)
	  	{
			  var j = 0;
			  var Qnumber = new Array();
			  
			  for( var i = 1 ; i <= 40 ; i++ )
			  {
				  if( judgeArr[i] ==0 )
				  {
					  Qnumber[j] = i;
					  j++;
				  }
			  }//这里要输出还有哪些题没答
			  shake(oNext);
			  if(oDraw.setCapture)
			  {
				  oNote.innerHTML = Qnumber+"<br><br>以上题目还没有做，请及时完成";
			  	  oNote.style.display = "block";
				   setTimeout(function()
				  {
					  oNote.style.display = "none";
				  },2000);
			  }
			  else
			  {
				  alert(Qnumber+"    以上题目还没有做，请及时完成");
			  }
	  	}
		else if(judgeCount==40)
		{
			alert("答题完成");
			end();
		}
		else
		{
			gentrans();
		}
		
	}
	
	oLast.onclick = function()
	{
		if(questionnumber >21 )
		{
			questionnumber--;
			for(var j = 0 ; j < aNumberzone.length; j++)
			{
				aNumberzone[j].style.background = "";
			}
			
			aNumberzone[questionnumber-21].style.background="#999999";
			translatemove();
		}
		else if(questionnumber <= 21 && questionnumber >1 )
		{
			questionnumber--;
			transback();
			translatemove();
		}
		else
		{
			shake(oLast);
		}

	}
	
	/*以上是切换题目的效果*/
	/*以下是切换题号组的效果*/
	var oDown = document.getElementById("pagedown");//向后
	var oUp = document.getElementById("pageup");//向前

	oUp.onclick = function()
	{
		if(aNumberzone[0].innerHTML == "21")
		{
			shake(oUp);
		}
		transon();
	}
	
	oDown.onclick = function()
	{
		if(aNumberzone[0].innerHTML == "1")
		{
			shake(oDown);
		}
		transback();
	}
	
	var oRight = document.getElementById("right");
	var oWrong = document.getElementById("wrong");
	var Rtop = 300;
	var Wtop = 305;
	
	oRight.onmouseover = function()
	{
		oWrong.style.top = Wtop + "px";
		oRight.style.top = (Rtop + 5) + "px";
	}
	oWrong.onmouseover = function()
	{
		oWrong.style.top = (Wtop + 5) + "px";
		oRight.style.top = Rtop + "px";
	}
	oRight.onclick = function()
	{
		aNumberzone[questionnumber - 21].style.color = "#00CC33";
		oWrong.style.border = "6px dashed #CC6633";
		oRight.style.border = "6px solid #CC6633";
		if(judgeArr[questionnumber] == 0)
		{
			judgeCount++;
		}
		judgeArr[questionnumber] = 1;
	}
	oWrong.onclick = function()
	{
		aNumberzone[questionnumber - 21].style.color = "#00CC33";
		oRight.style.border = "6px dashed #CC6633";
		oWrong.style.border = "6px solid #CC6633";
		if(judgeArr[questionnumber] == 0)
		{
			judgeCount++;
		}
		judgeArr[questionnumber] = 1;
	}
}