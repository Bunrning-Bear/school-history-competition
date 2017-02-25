// JavaScript Document
function translatemove()
{
	/*alert(questionnumber);*/
	/*alert(judgeCount);*/
	//在答题过程中跳转动画的函数
	var oQuestion = document.getElementById("question");
	var timmer7 = null;
	var timmer8=null;
	var timer10=null;
	var judge4 = 0;
	var count = 0;
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
		if( judge4 == 1 && count == 0)
		{
			count = 1;
			var oNext = document.getElementById("next");
			oQuestion.style.top = "718px";
			var t = 30;
			oQuestion.style.display='block';
			clearInterval(timmer8);
			
			if(questionnumber>=21&&questionnumber<=40)//选择题与判断题变化的操作,并在这一步初始化答题界面
			{
				getPanduan(questionnumber);
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
				
				switch(Student[questionnumber])
				{
					case "a":
					aPanduan[0].style.border = "6px solid #CC6633";
 					break;
					
					case "b":
					aPanduan[1].style.border = "6px solid #CC6633";
					break;
                }
				
			}
			else
			{
				getQuestion(questionnumber);
				var oPanduan = document.getElementById("panduanti");
				var aPanduan = oPanduan.getElementsByTagName("div");
				
				oPanduan.style.display = "none";
				oAns.style.display = "block";
				
				for( var i = 0 ; i < aAns.length ; i++ )
				{
					aAns[i].style.border="";
					aAns[i].style.display = "block";
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