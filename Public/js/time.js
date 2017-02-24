// JavaScript Document
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