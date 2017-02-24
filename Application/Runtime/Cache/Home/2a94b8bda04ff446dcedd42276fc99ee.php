<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
window.onload = function()
{
	//以下是
	rate = 0.80;
	//以下是拼图的效果
	//URL 地址
	var imagine1 = "/xiaoshi/Public/check/check_<?php echo ($pNumber); ?>.jpg";
	var imagine2 = null;
	var oWrap = document.getElementById("wrapper");
	var oBox = document.getElementById("box");
	var w = document.documentElement.clientWidth;
	var oContainer2 = document.getElementById("container2");
	 
	//oBox.innerHTML = w;
	oWrap.style.left =(((w - 1024) /2)/rate) + "px";
	window.onresize=function()
	{
		var oWrap = document.getElementById("box");
		var w = document.documentElement.clientWidth;
		//oBox.innerHTML = w;
		oWrap.style.left =(((w - 1024) /2)/rate) + "px";
	}
	var judge3 = 1;
	//begin();
	var choice = 5;
	var oCon = document.getElementById('container');
	var oCon2 = document.getElementById('container2');
	var oDraw = document.getElementById('draw');
	var oChoice = document.getElementById('choice');
	
	//给前端的图片位置; 
	var choiceLeft = 20;
	var choiceTop = 20;
	
	if(oDraw.setCapture)
	{
		oCon2.runtimeStyle.background = imagine1;
		oDraw.runtimeStyle.background = imagine2;
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


			oDraw.onmousemove = function(ev)
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
					oDraw.onmousemove = null;
					oDraw.onmouseup = null;
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


			oDraw.onmousemove = function(ev)
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
					oDraw.onmousemove = null;
					oDraw.onmouseup = null;
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
				}
				
				return false;
			}
		}
	}
	//以上是拼图的效果
</script>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="/xiaoshi/Public/Css/AllCss.css" />
</head>
<script type="text/javascript" src="/xiaoshi/Public/Js/AllJs.js"></script> 
<body>
<div id="wrapper">
<div id="box">
    <div id="login">
        <div id="line"></div>
        <div id="false"></div>
        <div id="title">校史知识竞赛</div>
        <div id="photo"></div>
        <div id="username">用户名
            <input type="text" id="inusername" >
        </div>
        <div id="password">密码
            <input type="text" id="inpassword" >
        </div>
        <div id="logbutton">登陆</div>
        <div id="help">?</div>
        <div id="warning"></div>
    </div>

    <div id="question">
    	<div id="next">下一题</div>
    	<div id="last">上一题</div>
    	<div id="count">
            <div id="pagedown">←</div>
            <div id="pageup">→</div>
            <div id="number">
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
        <div id="Qblock">这个是题目</div>
        <div id="Ans">
            <div id="AnsA">这个是选项A</div>
            <div id="AnsB">这个是选项B</div>
            <div id="AnsC">这个是选项C</div>
            <div id="AnsD">这个是选项D</div>
        </div>
        <div id="panduanti">
            <div id="right">√</div>
            <div id="wrong">×</div>
		</div>
        <div id="divdown"></div>
        <div id="divdown1"></div>
        <div id="note"></div>
    </div>
    <div id="container">
        <!--<div class="div1" style="background:#000"></div>-->
        <div class="div1" id="draw"></div>
        <div id="container2" padding:0px; >
            <div class="div2" id="choice">
			<img src = "/xiaoshi/Public/check/<?php echo ($coverURL); ?>" />
            </div>
        </div>
    </div>
    <div id="door1"></div>
    <div id="door2"></div>
</div>
</div>
</body>
</html>