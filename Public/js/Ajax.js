function Ajax(recvType)
//recvType can be HTML or XML
{
	var aj = new Object();
	aj.recvType = recvType ? recvType.toUpperCase():"HTML";
	//如果没传recvType  则结果就是 HTML 否则 返回传入参数的大写字母
	aj.targetUrl = '';
	aj.sendString = '';
	aj.resultHandle = null;
	aj.createAjax = function()
	{
		var request = false;
		//window 中有 XMLHttpRequest 存在就是非IE， 包括IE7 IE8
		//如果有ActiveXObject 存在 就是 IE浏览器
		if(window.XMLHttpRequest)
		{//for all new browsers
			request = new XMLHttpRequest();
			if (request.overrideHimeType) 
				{
					request.overrideMimeType("text/xml");
				};
		}
		else if(window.ActiveXObject)
		{

			var versions = ["Microsoft.XMLHTTP","MSXML.XMLHTTP","Msxml2.HMLHTTP.7.0","Msxml2.XMLHTTP.6.0",
			"Msxml2.XMLHTTP.5.0","Msxml2.XMLHTTP.4.0","Msxml2.XMLHTTP.3.0","Msxml2.XMLHTTP"];
			for(var i = 0 ; i <versions.length;i++)
			{

				try{
						request = new ActiveXObject(versions[i]);
						if (request) 
							{
								break;
							};
					}
					catch(e)
					{
						request = false;
					}
			}
		
	}

		return request;
	}

	
	aj.XMLHttpRequest = aj.createAjax();	
	//aj.XMLhttpResquest 是一个ajax对象

	aj.processHandle = function()
	//回调函数
	{
		if(aj.XMLHttpRequest.readyState == 4)
		{
			if (aj.XMLHttpRequest.status == 200) 
				{
					if (aj.recvType == "HTML") {
						aj.resultHandle(aj.XMLHttpRequest.responseText);
					}
					//XML的情况，回调XML文档
					else aj.resultHandle(aj.XMLHttpRequest.responseXML);
				};
		}
	}

	aj.get = function(targetUrl,resultHandle)
	//resultHandle must be an function with one parameter as data to return,
	// if you don't input this function , that means you needn't get any static from get function
	//the first is URL is the .html/.xml/.php..... that you want to request to get statics
	//get method
	{
		aj.targetUrl = targetUrl;
		if (resultHandle != null) 
			{//传递毁掉函数
						aj.XMLHttpRequest.onreadystatechange = aj.processHandle;
						//判断状态，当成功请求服务器的时候，调用回调函数 processHandle
						aj.resultHandle = resultHandle; 
						//引用传递!
						//设置回调方法；
						//如果resultHandle==null 就不需要回调数据
			};
			if (window.XMLHttpRequest) {//非ie浏览器
					aj.XMLHttpRequest.open("get",aj.targetUrl);
					aj.XMLHttpRequest.send(null);
			}else
			{
				aj.XMLHttpRequest.open("get",aj.targetUrl,true);
				aj.XMLHttpRequest.send();
			}
		
	}
	aj.post = function(targetUrl,sendString,resultHandle)
// targetUrl and resultHandle are the same to the get function
//
	{

			aj.targetUrl = targetUrl;
			if (typeof(sendString)=="object")
			{//判断传入的是不是对象
				var str = " ";
				for (var pro in sendString)
				{//pro 是属性名；
				// sendString[pro] 属性内容 
					str += pro+"="+sendString[pro]+"&";
				}
				aj.sendString = str.substr(0,str.length - 1 );
				//减去最后一个 &;
			}
			else 
				aj.sendString = sendString;

			if (resultHandle != null) 
			{//传递回调函数
						aj.XMLHttpRequest.onreadystatechange = aj.processHandle;
						//判断状态，当成功请求服务器的时候，调用回调函数 processHandle
						aj.resultHandle = resultHandle; 
						//引用传递!
						//设置回调方法；
						//如果resultHandle==null 就不需要回调数据
			};
			aj.XMLHttpRequest.open("post",targetUrl);
			aj.XMLHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			//头信息设置表单编码方式
			//变量：文本类型；值：表单传输的编码方式
			aj.XMLHttpRequest.send(aj.sendString);

	}

return aj;
}