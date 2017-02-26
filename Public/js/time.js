// JavaScript Document
//进度条
var interval = 1000; 
var nowww = new Date(); 
var leftTimet= nowww.getTime();
var minute=0;
var second =0;
var timePri = nowww.getTime();
function ShowCountDown() 
{ 
	var now = new Date();
    var k= (60*60*1000 - timeUsed * 1000 - (now.getTime() - timePri) )/1000;
    minute=k/60;
    minute=Math.floor(minute);
    second=k%60;
    second=Math.floor(second);
    var oDiv3=document.getElementById("divdown");
    

  	if (k<= 2 )
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

            oDiv3.innerHTML= minute+":"+second;

     } 
}