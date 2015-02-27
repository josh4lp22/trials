
<HTML>
<HEAD>
	<TITLE>Movie Listings</TITLE>
	 <link rel="stylesheet" href="jquery-ui.css" />
	<script src="jquery-1.8.3.js"></script>
	<script src="jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css" />	

	 <script>
		$(function() {
		$( "#tabs" ).tabs({
		collapsible: true
		});
		});
</script>
</HEAD>
<BODY>
<?php
	
?>
	<H2>Movie Listing</H2> 
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">All Movies</a></li>
		<li><a href="#tabs-2">Current Week Movies</a></li>

		</ul>
		<div id="tabs-1">
		<p><strong>Listing all the movies.</strong></p>
		<p>  
			<?php
			session_start();
				include "ClassGetMovies.php";

			?>
		</p>
		</div>
		<div id="tabs-2">
		<p><strong>Listing movies running this week.</strong></p>
		<p> 
			<?php
				include "ClassGetCurMovies.php";

			?>

		</p>
		</div>

	</div>

	

	<br>
	<br>
	<a href="Logout.php">Logout</a>
</BODY>
</HTML>