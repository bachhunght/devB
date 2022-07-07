function updateGonzales(type, plugin, what, dependency, set)
{
	var current = document.getElementById(type+'_'+plugin+'_'+what);

	var visibility = current.style.visibility;
	current.style.visibility = (visibility == 'hidden') ? 'visible' : hidden;
	set_dest = (visibility == 'hidden') ? 1 : 0;

	//checks for dependency
	var deps = (dependency.length) ? dependency.split(',') : [];
	//console.log(deps);

	var args;
	switch(what)
	{
		case 'enable-here':
		case 'disable-everywhere':
			document.getElementById(type+'_'+plugin+'_enable-everywhere').style.visibility = 'hidden';
			document.getElementById(type+'_'+plugin+'_disable-here').style.visibility = 'hidden';
			args = what+"="+set_dest+"&enable-everywhere=0&disable-here=0&here="+encodeURI(gonzalesObject.currenturl);
			break;
		case 'disable-here':
		case 'enable-everywhere':
			document.getElementById(type+'_'+plugin+'_enable-here').style.visibility = 'hidden';
			document.getElementById(type+'_'+plugin+'_disable-everywhere').style.visibility = 'hidden';
			args = what+"="+set_dest+"&enable-here=0&disable-everywhere=0&here="+encodeURI(gonzalesObject.currenturl);
			break;
	}

	var or=new XMLHttpRequest();
	or.open("POST", gonzalesObject.ajaxurl, true);
	or.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	or.send("action=gonzales_ajax&type="+type+"&plugin="+plugin+"&"+args);
}

//if list is higher than window height, unstick WordPress menu from top and make it "scrollable"
document.addEventListener("DOMContentLoaded", function(event) {
	document.getElementsByClassName("gonzales-object")[0].onmouseenter = gonzalesAbsolute
	document.getElementsByClassName("gonzales-object")[0].onmouseleave = gonzalesFixed;
});

function gonzalesAbsolute()
{
	setTimeout(function(){
		var menuHeight = parseInt(document.getElementsByClassName("gonzales-scripts-height")[0].offsetHeight) + parseInt(document.getElementsByClassName("gonzales-styles-height")[0].offsetHeight) + 20;
		var windowHeight = window.innerHeight;

		if(menuHeight > windowHeight)
		{
			if(document.body.className.search("wp-admin") >= 0) {
				document.body.style.position = "absolute";
				document.body.style.top = 0;
			}

			document.getElementById("wpadminbar").style.position = "absolute";
			window.scroll(0,0);
		}
	}, 250);
}

function gonzalesFixed()
{
	document.getElementById("wpadminbar").style.position = "";

	if(document.body.className.search("wp-admin") >= 0) {
		document.body.style.position = "";
	}
}