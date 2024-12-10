function register()

{ 
  
 var username=document.getElementById('username').value;
 var password=document.getElementById('password').value;
 var name=document.getElementById('name').value;
 var dob=document.getElementById('dob').value;
 var contact=document.getElementById('contact').value;

 
	xmlHttp_ajax=GetXmlHttpObject_ajax()

	if (xmlHttp_ajax==null)

	{

	alert ("Browser does not support HTTP Request")

	return

	}  

 var url="js/register.php"

url=url+"?username="+username+"&password="+password+"&name="+name+"&dob="+dob+"&contact="+contact;
 


url=url+"&sid="+Math.random()



xmlHttp_ajax.onreadystatechange=stateChanged_ajax 

xmlHttp_ajax.open("GET",url,true)

xmlHttp_ajax.send(null)

}



function stateChanged_ajax() 

{ 

 

	if (xmlHttp_ajax.readyState==4 || xmlHttp_ajax.readyState=="complete")

	{  
 
	  alert(xmlHttp_ajax.responseText);
 

  		

    } 

}



function GetXmlHttpObject_ajax()

{

	var xmlHttp_ajax=null;

	try

	{

	// Firefox, Opera 8.0+, Safari

	xmlHttp_ajax=new XMLHttpRequest();

	}

	catch (e)

	{

	//Internet Explorer

			try

			{

			xmlHttp_ajax=new ActiveXObject("Msxml2.XMLHTTP");

			}

			catch (e)

			{

			xmlHttp_ajax=new ActiveXObject("Microsoft.XMLHTTP");

			}

	}

return xmlHttp_ajax;

}