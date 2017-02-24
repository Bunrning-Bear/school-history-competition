// JavaScript Document
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