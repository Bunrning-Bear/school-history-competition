<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="/SHCS/Public/Css/AllCss.css" />
</head>
<script>
var questionnumber = 1;//存储题号的变量,可能会在有些环境下变为字符串类型
    //要注意装有题号的div数组的下标和题号的区别，二者差一
//以下是一个一开始div的动画函数
var judgeArr = new Array(41);
var judgeLogin = 1;//判断是否可以登录
var judge3 = 1;//判断验证码是否正确
var judgeCount = 0;
var Question = new Array(41);//从1开始存；
var ChA = new Array(21);
var ChB = new Array(21);
var ChC = new Array(21);
var ChD = new Array(21);
var UsedTime ;
var timeUsed;
var postx = 0;
var posty = 0;
var False = "";
var UserName = "";
var PassWord = "";
var Student = new Array(41);//答案
var grade = 100;
//var token = "<?php echo (session('token')); ?>";

//以下是初始化
for(var i = 1 ; i <= 20 ;i++)
{
    Student[i] = "E";
}
for(var i = 21 ; i <= 39 ; i++)
{
    Student[i] = "2";
}
for(var i  =0 ; i < 41 ; i++ )
{
    judgeArr[i] = 0;
}

for(var i = 1 ; i < 41 ; i++ )
{
    Question[i] = "第" + i + "题没有获取到";
}

for(var i = 1 ; i < 21 ; i++ )
{
    ChA[i] = "A";
    ChB[i] = "B";
    ChC[i] = "C";
    ChD[i] = "D";
}
function RunOnBeforeUnload() {window.onbeforeunload = function(){ return '将丢失未保存的数据!';} }
</script>
<script type="text/javascript" src="/SHCS/Public/oriAnswer.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/Ajax.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/getPanduan.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/getQuestion.js"></script>
<!--import type='js' file='Js.end' /-->
<script>
    function end(mark)
    {
        grade = mark;
        window.onbeforeunload = null;
        var timmer = null;
        var oDoor1 = document.getElementById('door1');
        var oDoor2 = document.getElementById('door2');
        var oGrade = document.getElementById("grade");
        var oExit = document.getElementById("exit");
        var oGradenumber = document.getElementById("gradenumber");
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
                    if (oDoor1.offsetWidth  <=370)
                    {
                        oDoor1.runtimeStyle.width = (oDoor1.offsetWidth + t) + "px";
                        oDoor2.runtimeStyle.width = (oDoor2.offsetWidth + t) + "px";

                        t = t * (12/11);
                    }
                    else
                    {
                        oDoor1.runtimeStyle.width =  "400px";
                        oDoor2.runtimeStyle.width =  "400px";
                        judge2 = 1;
                        //alert(judge);
                        clearInterval(timmer);
                    }
                },15);
            }
        }
        else
        {
            if (judge == 1)
            {
                timmer = setInterval( function()
                {
                    if (oDoor1.offsetWidth  <=370)
                    {
                        oDoor1.style.width = (oDoor1.offsetWidth +t) + "px";
                        oDoor2.style.width = (oDoor2.offsetWidth + t) + "px";

                        t = t * (12/11);
                    }
                    else
                    {
                        oDoor1.style.width =  "400px";
                        oDoor2.style.width =  "400px";
                        judge2 = 1;
                        //alert(judge);
                        clearInterval(timmer);
                        //end();
                    }
                },30);
            }
        }

        setTimeout(function()
        {
            oGrade.style.display = "block";
            oGradenumber.innerHTML = grade;
        },2100);

        oExit.onclick = function()
        {
            window.location.href="/SHCS/index.php/Home/Login/Logoff";
        }
    }

</script>
<script type="text/javascript" src="/SHCS/Public/Js/gentrans.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/transon.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/transback.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/shake.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/arrange.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/translatemove.js"></script>
<script type="text/javascript" src="/SHCS/Public/Js/begin.js"></script>

﻿<script type="text/javascript" src="/SHCS/Public/Js/Ajax.js"></script>
<script>
var tokenLogin = "<?php echo ($tokenLogin); ?>";
window.onload = function() 
{
//以下是拼图的效果
	var imagine1 = null;
	var imagine2 = null;
	var oWrap = document.getElementById("wrapper");
	var oBox = document.getElementById("box");
	var w = document.documentElement.clientWidth;
	var oContainer2 = document.getElementById("container2");

	oWrap.style.left = ((w - 800) / 2) + "px";
	window.onresize = function () 
	{
		var oWrap = document.getElementById("wrapper");
		var w = document.documentElement.clientWidth;
//oBox.innerHTML = w;
		oWrap.style.left = ((w - 800) / 2) + "px";
	}

//begin();
	var choice = 5;
	var oCon = document.getElementById('container');
	var oCon2 = document.getElementById('container2');
	var oDraw = document.getElementById('draw');
	var oChoice = document.getElementById('choice');
	var choiceLeft = 20;
	var choiceTop = 20;

	if (oDraw.setCapture) {
		/*oCon2.runtimeStyle.background = imagine1;
		 oDraw.runtimeStyle.background = imagine2;*/
	}
	else {
		oCon2.
				style.background = imagine1;
		oDraw.
				style.background = imagine2;
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
				l = oEvent.clientX - disx ;
				t = oEvent.clientY - disy; 
				if( t <= 0)
				{
					t = 0;
				}else if(t > oCon.offsetHeight - oDraw.offsetHeight + 15)
				{
					t =oCon.offsetHeight - oDraw.offsetHeight + 15;
				}
				if( l <= 0)
				{
					l = 0;
				}else if( l > oCon.offsetWidth - oDraw.offsetWidth + 10 )
				{
					l = oCon.offsetWidth - oDraw.offsetWidth + 10;
				}
				
				oDraw.style.left =l+ "px";
				oDraw.style.top =t+"px";

				document.onmouseup = function(ev)
				{
					var oEvent = ev||event;
					/*alert(parseInt(oDraw.style.left));
					 alert(parseInt(oDraw.style.top));
					 */
					postx = parseInt(oDraw.style.left) - 204;
					posty = parseInt(oDraw.style.top);

					alert(postx);
					alert(posty);
					ajax = Ajax();

					ajax.post('/SHCS/index.php/Home/Check/toCheck',"postX="+postx+"&postY="+posty,function(data)
					{
						judge3 = data;
						judge3 = 1;
						if (judge3 == 1)
						{
							begin();
							RunOnBeforeUnload();
							oCon.runtimeStyle.display = "none";
						}
						else 
						{
							oDraw.style.left = "68px";
							oDraw.style.top = "68px";
						}

						oDraw.releaseCapture();

						document.onmousemove = null;
						document.onmouseup = null;
					});
				}

			}
			oDraw.setCapture();//要放在想要捕获的事件后面
		}
	}
	else 
	{
		oDraw.onmousedown = function (ev) 
		{
			var oEvent = event || ev;
			var  y = document.documentElement.scrollTop || document.body.scrollTop;
			disx = oEvent.clientX - oDraw.offsetLeft;
			disy = oEvent.clientY - oDraw.offsetTop;


			document.onmousemove =function (ev) 
			{
				var oEvent = ev || event;
				l = oEvent.clientX - disx ;
				t = oEvent.clientY - disy; 
				if( t <= 0)
				{
					t = 0;
				}else if(t > oCon.offsetHeight - oDraw.offsetHeight)
				{
					t =oCon.offsetHeight - oDraw.offsetHeight;
				}
				if( l <= 0)
				{
					l = 0;
				}else if( l > oCon.offsetWidth - oDraw.offsetWidth )
				{
					l = oCon.offsetWidth - oDraw.offsetWidth;
				}
				
				oDraw.style.left = l + "px";
				oDraw.style.top = t + "px";

				document.onmouseup = function (ev) 
				{
					var oEvent = ev || event;
					/*alert(parseInt(oDraw.style.left));
					 alert(parseInt(oDraw.style.top));
					 */
					postx = parseInt(
							oDraw.style.left) - 204;
					posty =
							parseInt(oDraw.style.top);

					ajax = Ajax();
				  //  alert(postx);
				   // alert(posty);
					ajax.post('/SHCS/index.php/Home/Check/toCheck',"postX="+postx+"&postY="+posty,function(data)
					{
						judge3 = data;
				  //  alert(judge3);
				   // judge3 = 1;

						if (judge3 == 1) 
						{
							begin();
							RunOnBeforeUnload();
							oCon.style.display = "none";
						}
						else {
							oDraw.style.left = "68px";
							oDraw.style.top = "68px";
						}
						document.onmousemove = null;
						document.onmouseup = null;
					})
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
		}, 6000);
	}
	/* 以下是文本框的出现和消失效果 */

	/*以下是点击登录后登录界面消失的样子*/
	var oNext = document.getElementById("next");
	var oLast = document.getElementById("last");
	var oLoginB = document.getElementById("logbutton");
	var oLogin = document.getElementById("login");
	var timmer5 = null;

	var oQuestion = document.getElementById("question");

	oLoginB.onmouseover = function()
	{
		oLoginB.style.border="4px solid #000";
	}
	
	oLoginB.onmouseout = function()
	{
		oLoginB.style.border="4px dashed #CC6633";
	}
	/*以上是点击登录后登录界面消失的样子*/
    oLoginB.onclick = function()
    {

        UserName = oInput.value;
        PassWord = oInput2.value;

        // U ANS P 的格式验证，如果不符合格式，不能再往下执行
        //   正则  /^\w{8}$/
        // /^\w{9}$/
        //记得提醒我，最后正则要加上15级同学的判定
//            alert(tokenLogin);
        ajax = Ajax();
        ajax.post('/SHCS/index.php/Home/Login/toLogin', "xuehao=" + UserName + "&yikatong=" + PassWord+"&tokenLogin=" + tokenLogin, function (dataJ)
        {
        	//alert(JSON.stringify(dataJ));
            eval("var data = " + dataJ);

            data['output'] = decodeURI(data['output']);
            //alert("here data is :"+data['output']);
            judgeLogin = data['result'];
            // token = data['token'];

            tokenLogin = data['tokenLogin'];
            var judgeContinue = 0;
            if (judgeLogin == 0)
            {//无法登录

                False = data['output'];
                oFalse.innerHTML = False;
                oFalse.style.display = "block";
                shake(oLoginB);
            }
            else if (judgeLogin == 2)	
            {//成功登录，开始答题
                if(confirm("上次未正常注销，如果您正在答题，继续登录讲导致上次打开的页面无法提交成绩,是否继续登录"))
                {
                    judgeContinue = 1;
                }
                else
                {
                    judgeContinue = 0;
                }
                //1为确定再登陆；
            }
            else if(judgeLogin == 3 )
            {
                end(data['mark']);
            }

            if (judgeContinue == 1 || judgeLogin == 1)
            {

                ajax.get('/SHCS/index.php/Home/Login/judgeStatue', function (dataJ)
                {
                	// alert(JSON.stringify(dataJ));
                    eval("var data=" + dataJ);
                    tokenLogin = data['tokenLogin'];
                    Question = data['question'];
                    ChA = data['choiceA'];
                    ChB = data['choiceB'];
                    ChC = data['choiceC'];
                    ChD = data['choiceD'];

                    timeUsed = data['timeUsed'];

                    ajaxTime = Ajax();
                    ajaxTime.post("/SHCS/index.php/Home/Time/toSubmit", '', function (data)
                    {
                    	alert(data);
                    	eval("var data=" + data);
                        if (data['result'] == 1)
                        {
                            alert("强制结束答题");
                            ajaxMark = Ajax();
                            ajaxMark.post("/SHCS/index.php/Home/Question/toCount","result="+Student,function(data) {
                            	alert(Student);
                            	alert(data);
                                if (data == -1) {
                                    alert("非法提交成绩");
                                }
                                else {
                                    end(data);
                                }
                            });
                        }
                        else {
                            //不会出错
                            alert("出错！");
                        }
                    });

                    getQuestion(questionnumber);

                    var l = -1;
                    var t = 7;
                    arrange();
                    //setInterval(function () {
                    //    ShowCountDown()
                    // }, interval);


                    oQuestion.style.display = "block";
                    timmer5 = setInterval(function () {

                        if (t <= 40) {
                            t = t + 0.5;
                            /*oInput.value = t;*/
                            oLogin.style.top = -125 - (l - ( 20 * t - 0.05 * t * t * t )) + "px";
                        }
                        else {
                            //oQuestion.style.display = "block";
                            oNext.style.display = "block";
                            oLast.style.display = "block";
                            clearInterval(timmer5);
                        }
                    }, 30);

                });
                setInterval(function () {
                    ShowCountDown()
                 }, interval);
                //ajaxTime end
            };
            //ajaxStatue end
        });//ajax first judge end
    }

    /*以上是点击登录后登录界面消失的样子*/

	/*以下答题时的效果*/

	var oAns = document.getElementById("Ans");
	var aAns = oAns.getElementsByTagName("div");
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	var answer;

	for(var i = 0 ; i<aAns.length ; i++)
	{
		aAns[i].onmousedown = function()
		{
			for(var j = 0 ; j < aAns.length ; j++ )
			{
				aAns[j].style.border = "";
			}

			this.style.border= "6px solid #CC6633";
			Student[questionnumber] = this.className;//获取答案。

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
			
			for( var i = questionnumber ; i <= 40 ; i++ )
			{
				if(judgeArr[i] == 0)
				{
					var transtime = null;
					questionnumber = i;
					transtime = setTimeout(translatemove,300);
					break;
				}
			}
		}
	}

	for(var i = 0 ; i<aAns.length ; i++)
	{
		aAns[i].onmouseover = function()
		{
			for(var j = 0 ; j < aAns.length ; j++ )
			{
				aAns[j].style.border = "";
			}
			switch(Student[questionnumber])
			{
				case "a":
				aAns[0].style.border = "6px solid #CC6633";
				break;
				
				case "b":
				aAns[1].style.border = "6px solid #CC6633";
				break;
				
				case "c":
				aAns[2].style.border = "6px solid #CC6633";
				break;
				
				case "d":
				aAns[3].style.border = "6px solid #CC6633";
				break;
			}
			this.style.border = "6px dashed #CC6633";
		}
		aAns[i].onmouseout = function()
		{
			for(var j = 0 ; j < aAns.length ; j++ )
			{
				aAns[j].style.border = "";
			}
			
			switch(Student[questionnumber])
			{
				case "a":
				aAns[0].style.border = "6px solid #CC6633";
				break;
				
				case "b":
				aAns[1].style.border = "6px solid #CC6633";
				break;
				
				case "c":
				aAns[2].style.border = "6px solid #CC6633";
				break;
				
				case "d":
				aAns[3].style.border = "6px solid #CC6633";
				break;
			}
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
			ajaxMark = Ajax();
			ajaxMark.post("/SHCS/index.php/Home/Question/toCount","result="+Student,function(data)
			{
            if(data == -1 )
            {
                alert("非法提交成绩");
            }
                else
            {
            	alert(data);
                end(data);
            }
               // data 是成绩提交的反馈结果
			   //后端需要做一个encode 否则汉字回事乱码

			})

		}
		else if(judgeCount==39)
		{
			shake(oNext);
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
		Student[questionnumber] = this.className;
		if(judgeArr[questionnumber] == 0)
		{
			judgeCount++;
		}
		judgeArr[questionnumber] = 1;
		
		for( var i = questionnumber ; i <= 40 ; i++ )
		{
			if(judgeArr[i] == 0)
			{
				var transtime = null;
				questionnumber = i;
				transtime = setTimeout(translatemove,300);
				
				break;
			}
		}
	}
	
	oWrong.onclick = function()
	{
		aNumberzone[questionnumber - 21].style.color = "#00CC33";
		oRight.style.border = "6px dashed #CC6633";
		oWrong.style.border = "6px solid #CC6633";
		Student[questionnumber] = this.className;
		if(judgeArr[questionnumber] == 0)
		{
			judgeCount++;
		}
		judgeArr[questionnumber] = 1;
		
		for( var i = questionnumber ; i <= 40 ; i++ )
		{
			if(judgeArr[i] == 0)
			{
				var transtime = null;
				questionnumber = i;
				transtime = setTimeout(translatemove,300);
				break;
			}
		}
	}


}


</script>
<script type="text/javascript" src="/SHCS/Public/Js/time.js"></script>

<body>
<div id="wrapper">
  <div id="box">
      <div id="login">
          <div id="studentNote">
              学生须知：<br>
              1.推荐使用分辨率在720p的计算机浏览此网页;<br>
              2.如果网页大小不合适可以通过ctrl+或ctrl-来获得最佳效果;<br>
              3.一共45分钟，中途退出答题，计时不会停止;<br>
              4.一共20到选择题和20道判断题；<br>
              5.用户名为学号，密码为一卡通号;
          </div>
          <div id="line"></div>
          <div id="false"></div>
          <div id="photo"></div>
          <div id="username">用户名
              <input type="text" id="inusername">
          </div>
          <div id="password">密码
              <input type="password" id="inpassword">
          </div>
          <div id="logbutton">登陆</div>
          <div id="help">?</div>
          <div id="warning"></div>
      </div>
  
      <div id="question" oncontextmenu="return false">
          <div id="next" onselectstart="return false">下一题</div>
          <div id="last" onselectstart="return false">上一题</div>
          <div id="count">
              <div id="pagedown">←</div>
              <div id="pageup">→</div>
              <div id="number" onselectstart="return false">
                  <div class="numberzone" style="background:#999999">1</div>
                  <div class="numberzone">2</div>
                  <div class="numberzone">3</div>
                  <div class="numberzone">4</div>
                  <div class="numberzone">5</div>
                  <div class="numberzone">6</div>
                  <div class="numberzone">7</div>
                  <div class="numberzone">8</div>
                  <div class="numberzone">9</div>
                  <div class="numberzone">10</div>
                  <div class="numberzone">11</div>
                  <div class="numberzone">12</div>
                  <div class="numberzone">13</div>
                  <div class="numberzone">14</div>
                  <div class="numberzone">15</div>
                  <div class="numberzone">16</div>
                  <div class="numberzone">17</div>
                  <div class="numberzone">18</div>
                  <div class="numberzone">19</div>
                  <div class="numberzone">20</div>
              </div>
          </div>
          <div id="Qblock" onselectstart="return false">这个是题目</div>
          <div id="Ans">
            <div id="AnsA" class="a" onselectstart="return false">这个是选项A</div>
            <div id="AnsB" class="b" onselectstart="return false">这个是选项B</div>
            <div id="AnsC" class="c" onselectstart="return false">这个是选项C</div>
            <div id="AnsD" class="d" onselectstart="return false">这个是选项D</div>
          </div>
          <div id="panduanti" onselectstart="return false">
              <div id="right" class="a" onselectstart="return false">√</div>
              <div id="wrong" class="b" onselectstart="return false">×</div>
          </div>
          <div id="divdown" onselectstart="return false"></div>
          <div id="note"></div>
      </div>  
  </div>
  <div id="door1">
      <div id="title">校史知识竞赛</div>
  </div>
  <div id="door2"></div>
  <div id="container">
          <!--<div class="div1" style="background:#000"></div>-->
          <div class="div1" id="draw">
              <img src = '/SHCS/Public/check/<?php echo ($cutURL); ?>' />
          </div>
          <div id="container2">
              <div class="div2" id="choice"></div>
              <img src = '/SHCS/Public/check/<?php echo ($coverURL); ?>'/>
          </div>
  </div>
  <div id="grade" style="display:none">
    <div id="show">
        <div id="yougrade">你的成绩是：</div>
        <div id="gradenumber"></div>
        <div id="zhuxiao"></div>
        <div id="exit">注销登录</div>
    </div>
  </div>
</div>
</body>
</html>