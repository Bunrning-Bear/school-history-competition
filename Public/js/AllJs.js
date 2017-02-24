var questionnumber = 1;//存储题号的变量,可能会在有些环境下变为字符串类型
	//要注意装有题号的div数组的下标和题号的区别，二者差一
//以下是一个一开始div的动画函数
var judgeArr = new Array(41);
var judgeCount = 0;

for(var i  =0 ; i < 41 ; i++ )
{
	judgeArr[i] = 0;
}

function end()
{
	var timmer = null;
	var oDoor1 = document.getElementById('door1');
	var oDoor2 = document.getElementById('door2');
	var timmer2 = null;
	var timmer3 = null;
	var t = 0.1;
	var judge = 1;
	var judge2 = 0;

//以下是开

	if(oDoor1.currentStyle && oDoor2.currentStyle)
	{
		if (judge == 1) 
		{
			timmer = setInterval( function()
			{
				if (oDoor1.offsetWidth  <= 500) 
				{
					oDoor1.runtimeStyle.width = (oDoor1.offsetWidth + t) + "px";
					oDoor2.runtimeStyle.width = (oDoor2.offsetWidth + t) + "px";
	
					t = t * (12/11);
				}
				else
				{
					oDoor1.runtimeStyle.width =  "506px";
					oDoor2.runtimeStyle.width =  "518px";
					judge2 = 1;
					//alert(judge);
					clearInterval(timmer);
				}
			},5);	
		}
	}
}
function gentrans()
{
	//这个函数用来统一所有的点击向下跳转效果
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	if(questionnumber < 20)
	{	
		questionnumber++;
		
		for(var j = 0 ; j < aNumberzone.length; j++)
		{
			aNumberzone[j].style.background = "";
		}
		
		aNumberzone[questionnumber-1].style.background="#999999";
		translatemove();
	}
	else if(questionnumber >= 20)
	{
		questionnumber++;
		transon();
		translatemove();
	}
}

function transon()
{
	//这个函数是用来将1-20换到21-40的
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	var j = 21;
	for( var i = 0; i < aNumberzone.length ; i++ )
	{
		aNumberzone[i].innerHTML = j;
		aNumberzone[i].style.color = "#000000";
		j++;
	}
	
	for(var j = 0 ; j < aNumberzone.length; j++)
	{
		aNumberzone[j].style.background = "";
	}
	if(questionnumber >= 21 && questionnumber <= 40)
	{
		aNumberzone[questionnumber - 21].style.background = "#999999";
	}
	
	for(var i = 21; i <= 40 ; i++)
	{
		if(judgeArr[i] == 1)
		{
			aNumberzone[i - 21].style.color = "#00CC33";
		}
	}
}

function transback()
{
	//这个函数是用来将题号21-40换到1-20的
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	for( var i = 0 ; i < aNumberzone.length ; i++ )
	{
		aNumberzone[i].innerHTML = i+1;
		aNumberzone[i].style.color = "#000000";
	}
	for(var j = 0 ; j < aNumberzone.length; j++)
	{
		aNumberzone[j].style.background = "";
	}
	if(questionnumber >= 1 && questionnumber <= 20)
	{
		aNumberzone[questionnumber - 1].style.background = "#999999";
	}
	
	for(var i = 1; i <= 20 ; i++)
	{
		if(judgeArr[i] == 1)
		{
			aNumberzone[i - 1].style.color = "#00CC33";
		}
	}
}


function shake(obj)
{
	//这个是按钮抖动的函数
	var first = obj.offsetLeft;
	var lcount = 0;
	var l = -1;
	var timmer6 = null;
	clearInterval(timmer6);
	timmer6 = setInterval(function()
	{
		if( lcount <= 10 )
		{
			obj.style.left = first + 2*l + "px";
			l = l*(-1);
			lcount++;
		}
		else
		{
			clearInterval(timmer6);
			obj.style.left = first + "px";
		}
	},30)
}
function arrange()
{
	//这个是对题号进行设置的函数
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	for( var i = 0 ; i < aNumberzone.length; i++ )
	{
		aNumberzone[i].style.left = (45*i+60)+"px";
		aNumberzone[i].onclick = function()
		{
			for(var j = 0 ; j < aNumberzone.length; j++)
			{
				aNumberzone[j].style.background = "";
			}
			this.style.background="#999999";
			questionnumber = parseInt(this.innerHTML);
			//alert(questionnumber);
			translatemove();
		}
	}
}

function translatemove()
{
	/*alert(questionnumber);*/
	/*alert(judgeCount);*/
	//在答题过程中跳转动画的函数
	var oQuestion = document.getElementById("question");
	var timmer7 = null;
	var timmer8=null;
	var timmer9 = null;
	var timer10=null;
	var judge4 = 0;
	var oAns = document.getElementById("Ans");
	var aAns =oAns.getElementsByTagName("div");
	var oPanduan = document.getElementById("panduanti");
	var aPanduan = oPanduan.getElementsByTagName("div");
	clearInterval(timmer7);
	clearInterval(timmer8);
	clearInterval(timer10);
	var t = 7;
	var l = -1;
	
	if(questionnumber<=20)
	{
		transback();
	}
	else
	{
		transon();
	}
	timmer7 = setInterval(function()
	{
		if (t <= 40)
		 {
			t = t + 1;
			oQuestion.style.top = -125-(l - ( 20*t - 0.05*t*t*t )) + "px";
		}
		else
		{
			clearInterval(timmer7);
			oQuestion.style.display = "none";
			judge4 = 1;
			//oQuestion.style.display = "block";
		}
	}
	, 15);
	var asd=0;
	timer10= setInterval( function()
	{
		if( judge4 == 1 )
		{
			var oNext = document.getElementById("next");
			oQuestion.style.top = "718px";
			var t = 30;
			oQuestion.style.display='block';
			clearInterval(timmer8);
			
			if(questionnumber>=21&&questionnumber<=40)//选择题与判断题变化的操作,并在这一步初始化答题界面
			{
				var oPanduan = document.getElementById("panduanti");
				var aPanduan = oPanduan.getElementsByTagName("div");
				
				oPanduan.style.display = "block";
				oAns.style.display = "none";
				
				for( var i = 0 ; i < aAns.length ; i++ )
				{
					aAns[i].style.display = "none";
				}
				
				for( var i = 0 ; i < aPanduan.length ; i++ )
				{
					aPanduan[i].style.border="6px dashed #CC6633";
					aPanduan[i].style.display = "block";
				}
			}
			else
			{
				var oPanduan = document.getElementById("panduanti");
				var aPanduan = oPanduan.getElementsByTagName("div");
				
				oPanduan.style.display = "none";
				oAns.style.display = "block";
				
				for( var i = 0 ; i < aAns.length ; i++ )
				{
					aAns[i].style.border="6px dashed #CC6633";
					aAns[i].style.display = "block";
				}
				
				for( var i = 0 ; i < aPanduan.length ; i++ )
				{
					aPanduan[i].style.display = "none";
				}
			}
			
			if(questionnumber== 40||judgeCount==39)
			{
				oNext.innerHTML = "成绩查看";
			}
			else
			{
				oNext.innerHTML = "下一题";
			}
			
			timmer8=setInterval(function (){
				t = t - 1;
				oQuestion.style.top =  -( 20*t - 0.05*t*t*t )+124.5+ "px";
				
				if(t==7)
				{
					clearInterval(timmer8);
				}
			},30);
		}asd++;
		if(asd==2)
		{
			clearInterval(timer10);
		}
		
	}, 390);
}

function begin()
{
	var timmer = null;
	var oDoor1 = document.getElementById('door1');
	var oDoor2 = document.getElementById('door2');
	var timmer2 = null;
	var timmer3 = null;
	var t = 0.1;
	var judge = 1;
	var judge2 = 0;

//以下是开

	if(oDoor1.currentStyle && oDoor2.currentStyle)
	{
		if (judge == 1) 
		{
			timmer = setInterval( function()
			{
				if (oDoor1.offsetWidth  >= 70) 
				{
					oDoor1.runtimeStyle.width = (oDoor1.offsetWidth - t) + "px";
					oDoor2.runtimeStyle.width = (oDoor2.offsetWidth - t) + "px";
	
					t = t * (12/11);
				}
				else
				{
					oDoor1.runtimeStyle.width =  "0px";
					oDoor2.runtimeStyle.width =  "0px";
					judge2 = 1;
					//alert(judge);
					clearInterval(timmer);
				}
			},1);	
		}
	}
	else
	{
		if (judge == 1) 
		{
			timmer = setInterval( function()
			{
				if (oDoor1.offsetWidth  >= 70) 
				{
					oDoor1.style.width = (oDoor1.offsetWidth - t) + "px";
					oDoor2.style.width = (oDoor2.offsetWidth - t) + "px";
	
					t = t * (12/11);
				}
				else
				{
					oDoor1.style.width =  "0px";
					oDoor2.style.width =  "0px";
					judge2 = 1;
					//alert(judge);
					clearInterval(timmer);
				}
			},13);	
		}
	}
}
	

//以上是第二次开合
//以上是一个div的动画函数




	/* 以下是文本框的出现和消失效果 */
	var oFalse = document.getElementById("false");
	var oInput = document.getElementById("inusername");
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
	
	var judgeLogin = 1;//判断是否可以登录
	
	oLoginB.onmouseover = function()
	{
		oLoginB.style.border="4px solid #000";
	}
	/*以上是点击登录后登录界面消失的样子*/
	oLoginB.onclick = function()
	{
		if(judgeLogin == 0)
		{
			oFalse.style.display = "block";
			shake(oLoginB);
		}
		else
		{
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
	var objArray = new Array(157,180,157,180);
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
			alert();
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
	var Rtop = 350;
	var Wtop = 350;
	
	oRight.onmouseover = function()
	{
		oWrong.style.top = Wtop + "px";
		oRight.style.top = (Rtop + 10) + "px";
	}
	oWrong.onmouseover = function()
	{
		oWrong.style.top = (Wtop + 10) + "px";
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

//进度条
var interval = 1000; 
var nowww = new Date(); 
var leftTimet=nowww.getTime(); 
var minute=0;
var second =0;

function ShowCountDown() 
{ 
	var now = new Date(); 
	var k=(leftTimet+30*60*1000-now.getTime())/1000; 
	minute=k/60;
	minute=Math.floor(minute);
	second=k%60;
	second=Math.floor(second);
	var oDiv2=document.getElementById('divdown1');
	var oDiv3=document.getElementById("divdown")
	k=k/1800;
	oDiv2.style.width=k*778+"px";

  	if (k<=0) 
	{   
  		oDiv3.innerHTML="逾期,倒计时已经失效";   
	}   
 	else
	{   
 		if (minute<10) 
		{
			minute="0"+minute;
		}   
		if (second<10) 
		{
			second="0"+second;
		}   
 		if (k>0) 
		{   
            oDiv3.innerHTML=minute+":"+second;   
        }   
     } 
}