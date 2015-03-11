function chkAjaBrowser()
{
	var a, ua = navigator.userAgent;

	this.bw= {
		safari	:	((a=ua.split('AppleWebKit/')[1])?a.split('(')[0]:0)>=124,
		konqueror	:	((a=ua.split('Konqueror/')[1])?a.split(';')[0]:0)>=3.3,
		mozes	:	((a=ua.split('Gecko/')[1])?a.split(" ")[0]:0) >= 20011128,
		opera : (!!window.opera) && ((typeof XMLHttpRequest)=='function'),
		msie : (!!window.ActiveXObject)? (!!createHttpRequest()):false
	}
	return
(this.bw.safari||this.bw.konqueror||this.bw.mozes||this.bw.opera||this.bw.msie)
}

function createHttpRequest()
{
	if(window.ActiveXObject){
		try{
			return new ActiveXObject("Msxm12.XMLHTTP");
		}catch (e){
			try
			{
				return new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e2)
			{
				return null;
			}
		}
	} else if(window.XMLHttpRequest){
		return new XMLHttpRequest();
	} else {
		return null;
	}
}

function sendRequest(callback,data,method,url,async,sload,user,password)
{

	var oj = createHttpRequest();
	if(oj == null) return null;

	var sload = (!!sendRequest.arguments[5])?sload:false;
	if(sload || method.toUpperCase() == 'GET')url += "? ";
	if(sload)url=url+"t="+ (new Date() ).getTime();

	var bwoj=new chkAjaBrowser();
	var opera = bwoj.bw.opera;
	var safari = bwoj.bw.konqueror;
	var mozes = bwoj.bw.mozes;

	if(opera || safari || mozes){
		oj.onload = function (){callback(oj);}
	} else {
		oj.onreadystatechange = function()
		{
			if(oj.readyState == 4){
				callback(oj);
			}
		}
	}
	data = uriEncode(data)
	if(method.toUpperCase() == 'GET'){
		url +=data
	}

	oj.open(method,url,async,user,password);
	setEncHeader(oj)
	
	oj.send(data);

	function setEncHeader(oj){
		var contentTypeUrlenc = 'application/x-www-form-urlencoded; charset=URL-8';
		if(!window.opera){
			oj.setRequestHeader('Content-Type',contentTypeUrlenc);
		}else{
			if((typeof oj.setRequestHeader) == 'function')
				oj.setRequestHeader('Content-Type',contentTypeUrlenc);
		}
		return oj
	}

	function uriEncode(data){

		if(data!=""){
			var encdata = '';
			var datas = data.split('&');

			for(i=1;i<datas.length;i++)
			{
				var dataq = datas[i].split('=');
				encdata += '&'+encodeURIComponent(dataq[0])+'='+encodeURIComponent(dataq[1]);
			}
		} else {
			encdata = "";
		}
		return encdata;
	}
	return oj
}