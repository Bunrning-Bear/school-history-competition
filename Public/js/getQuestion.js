// JavaScript Document
//将某个选择题推到网页上
function getQuestion(number)
{
	var oQblock = document.getElementById("Qblock");
	var oAns = document.getElementById("Ans");
	var aAns = oAns.getElementsByTagName("div");
	
	oQblock.innerHTML = Question[number];
	aAns[0].innerHTML = ChA[number];
	aAns[1].innerHTML = ChB[number];
	aAns[2].innerHTML = ChC[number];
	aAns[3].innerHTML = ChD[number];
}