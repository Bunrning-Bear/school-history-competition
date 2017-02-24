// JavaScript Document
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