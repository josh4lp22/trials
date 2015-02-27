<HTML>
<HEAD>
<TITLE>Rectangle</TITLE>
<SCRIPT>
	document.onmousemove = updateImgPosition;
	function updateImgPosition(e)
	{
		var avatar = document.getElementById("shape");
		avatar.style.left =(window.Event) ? e.pageX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);

		avatar.style.top =(window.Event) ? e.pageY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);

	}


</SCRIPT>
</HEAD>
<BODY>
	<IMG src="<?php echo $_POST['selShape'];  ?>" height="140" width="140" id="shape" style="position:absolute;">
	<A href="Home.html">Home</A>


</BODY>
</HTML>



<?php



?>