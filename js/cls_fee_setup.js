function ck(id)
 {
		
	if(document.getElementById(id).checked==true)
	{
		
		toggleDisabled1(document.getElementById("amt"+id));
		
			var k=((12*id))
			var j=((k-12)+1);
			
		
		for(var i=j;i<=k;i++)
		{
			toggleDisabled1(document.getElementById("cc"+ i));
			document.getElementById("cc"+ i).checked=true;
			$.uniform.update(document.getElementById("cc"+ i));
		}
	}
	else
	{
		
		toggleDisabled11(document.getElementById("amt"+id));
		var k=((12*id))
		var j=((k-12)+1);
			
		for(var i=j;i<=k;i++)
		{
			toggleDisabled11(document.getElementById("cc"+ i));
			document.getElementById("cc"+ i).checked=false;
			$.uniform.update(document.getElementById("cc"+ i));
		}
	}
}


function ckk(id) 
{
	
	var str = id;
	var res = str.substr(1,5);	
	if(document.getElementById("a"+res).checked==true)
	{
		toggleDisabled1(document.getElementById("amtt"+res));
	}
	else {
		toggleDisabled11(document.getElementById("amtt"+res));
	}
}
function ckk_once(id) 
{
	
	var res = id;
	
	if(document.getElementById("once"+res).checked==true)
	{
		toggleDisabled1(document.getElementById("once_amtt"+res));
	}
	else {
		toggleDisabled11(document.getElementById("once_amtt"+res));
	}
}

function toggleDisabled1(el) {
try {
el.disabled =false;
}
catch(E){
}
if (el.childNodes && el.childNodes.length > 0) {
for (var x = 0; x < el.childNodes.length; x++) {
toggleDisabled1(el.childNodes[x]);
}
}
}
function toggleDisabled11(el) {
try {
el.disabled =true;
}
catch(E){
}
if (el.childNodes && el.childNodes.length > 0) {
for (var x = 0; x < el.childNodes.length; x++) {
toggleDisabled11(el.childNodes[x]);
}
}
}