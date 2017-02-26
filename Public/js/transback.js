// JavaScript Document
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