// JavaScript Document
function arrange()
{
	//这个是对题号进行设置的函数
	var oNumber = document.getElementById("number");
	var aNumberzone = oNumber.getElementsByTagName('div');
	for( var i = 0 ; i < aNumberzone.length; i++ )
	{
		aNumberzone[i].style.left = (34.5*i+52)+"px";
		aNumberzone[i].onclick = function()
		{
			for(var j = 0 ; j < aNumberzone.length; j++)
			{
				aNumberzone[j].style.background = "";
			}
			this.style.background="#999999";
			questionnumber = parseInt(this.innerHTML);
			//alert(questionnumber);
			translatemove();
		}
	}
}