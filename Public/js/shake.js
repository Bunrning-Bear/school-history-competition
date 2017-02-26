// JavaScript Document
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