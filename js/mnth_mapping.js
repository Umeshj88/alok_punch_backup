// JavaScript Document// JavaScript Document
function show() 
{	
	toggleDisabled(document.getElementById("content"));	
	toggleDis(document.getElementById("strm"));	  
}
function toggleDisabled(el) {
try {
el.disabled =false ;
}
catch(E){
}
if (el.childNodes && el.childNodes.length > 0) {
for (var x = 0; x < el.childNodes.length; x++) {
toggleDisabled(el.childNodes[x]);
}
}
	}
	
function hide() {
	
     toggleDis(document.getElementById("content"));
	 toggleDis(document.getElementById("strm"));
}

function toggleDis(e) {
try {
e.disabled =true;
}
catch(E){
}
if (e.childNodes && e.childNodes.length > 0) {
for (var x = 0; x < e.childNodes.length; x++) {
toggleDis(e.childNodes[x]);
}
}
}

function show1() {
	
			  s(document.getElementById("content"));
			  s(document.getElementById("strm"));
}

function s(el) {
try {
el.disabled =false ;
}
catch(E){
}
if (el.childNodes && el.childNodes.length > 0) {
for (var x = 0; x < el.childNodes.length; x++) {
s(el.childNodes[x]);
}
}
	}
function month_mapping(column,row) 
{
	
	column=column.toString(); 
	var id=column + ',' + row;
	var all_id;
	
 	if(document.getElementById(id).checked)
    {
		for(var i=1; i<=12; i++)
		{
			all_id=column + ',' + i;
			
			if(all_id != id)
			{
    			document.getElementById(all_id).disabled=true; /// Disabled
			}
		}
	}
	else 
	{
		for(var i=1; i<=12; i++)
		{
			all_id=column + ',' + i;
    		document.getElementById(all_id).disabled=false; /// Enabled
		}
	}
	
}
function month_mapping_noevent(column,row) 
{
	
	column=column.toString(); 
	var id=column + ',' + row;
	var all_id;
 	var ii=0;
		for(var i=1; i<=12; i++)
		{
			all_id=column + ',' + i;
			if(document.getElementById(all_id).checked)
    		{
    			
			}
			else
			{
				ii++; 
				
			}
		}
		
		for(var i=1; i<=12; i++)
		{
			all_id=column + ',' + i;
			if(ii==12)
			{
				document.getElementById(all_id).disabled=false;  /// Enabled
			}
			else
			{
				if(document.getElementById(all_id).checked)
				{
					document.getElementById(all_id).disabled=false;  /// Enabled
				}
				else
				{
					document.getElementById(all_id).disabled=true;  /// Disabled.style.backgroundColor='#fff'
				}
			}
		}
	
}



