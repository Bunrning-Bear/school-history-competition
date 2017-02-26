// JavaScript Document
var questionnumber = 1;//存储题号的变量,可能会在有些环境下变为字符串类型
	//要注意装有题号的div数组的下标和题号的区别，二者差一
//以下是一个一开始div的动画函数
var judgeArr = new Array(41);
var judgeCount = 0;
var Question = new Array(41);//从1开始存；
var ChA = new Array(21)
var ChB = new Array(21);
var ChC = new Array(21);
var ChD = new Array(21);
var postx = 0;
var posty = 0;
var False = "";
//以下是初始化
for(var i  =0 ; i < 41 ; i++ )
{
	judgeArr[i] = 0;
}

for(var i = 1 ; i < 41 ; i++ )
{
	Question[i] = "第" + i + "题没有获取到";
}

for(var i = 1 ; i < 21 ; i++ )
{
	ChA[i] = "A";
	ChB[i] = "B";
	ChC[i] = "C";
	ChD[i] = "D";
}