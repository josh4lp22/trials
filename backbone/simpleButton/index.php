<html lang="en" data-framework="backbonejs">
	<head>
		<title>Simple Backbone Button</title>
		<script src="js/jquery.js"></script>
        <script src="js/underscore.js"></script>
        <script src="js/backbone.js"></script>
	</head>
	<body>
		<div id="search_container"></div>
		<script type="text/template" id="search_template">
			<label>Search</label>
			<input type="text" id="search_input" />
			<input type="button" id="search_button" value="Search" />
		</script>
		<script src="js/view/view.js"></script>
		<script>
			var search_view = new SearchView({ el: $("#search_container") });
		</script>
	</body>
</html>