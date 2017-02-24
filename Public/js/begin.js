// JavaScript Document
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
	