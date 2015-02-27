<?php //require_once ("operations.php");

?>
<html>
<head>
<link rel="stylesheet" href="backgrid/lib/backgrid.css"/>
<link rel="stylesheet" href="backgrid/lib/backgrid-paginator.css"/>
<link rel="stylesheet" href="backgrid/lib/backgrid-filter.css"/>
<link rel="stylesheet" href="backgrid/lib/backgrid-select2-cell.css"/>
<link rel="stylesheet" href="select2/select2.css"/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/underscore-min.js"></script>
<script src="js/backbone-min.js"></script>
<script src="js/backbone-pageable.js"></script>
<script src="backgrid/lib/backgrid.js"></script>
<script src="backgrid/lib/backgrid-paginator.js"></script>
<script src="backgrid/lib/backgrid-filter.js"></script>
<script src="backgrid/lib/backgrid-select2-cell.min.js"></script>
<script src="select2/select2.js"></script>
</head>
<body>
<div id="grid">
    <script type="text/javascript">
        var lncData = Backbone.Model.extend({});

        var PageableTerritories = Backbone.PageableCollection.extend({
            model: lncData,
            url: 'http://localhost:81/trials/Backgrid/operations.php?fun=track',
            state: {
              pageSize: 15
            },
            mode: "client" // page entirely on the client side
        });
        
        var pageableTerritories = new PageableTerritories();
		//console.log(pageableTerritories);

		var optValue = [{name: "Select One", values: [["Yes", 1], ["No", 2]]}];
		var masterRightsCell = Backgrid.Extension.Select2Cell.extend({
		  select2Options: {
			minimumResultsForSearch: -1,
			//data: [{id:0,text:'Yes'},{id:1,text:'No'}],
			openOnEnter: false
		  },
		  optionValues: optValue
		});

		// Set up a grid to use the pageable collection
		var pageableGrid = new Backgrid.Grid({
		columns : [{
			  name: "id",
			  label: "Id",  
			  cell: "string",
			  editable: false
		  }, {
			  name: "track_name",
			  label: "Track",
			  cell: "string"
		  }, {
			  name: "release_name",
			  label: "Release",
			  cell: "string"
		  }, {
			  name: "name",
			  label: "Artist",
			  cell: "string"
		  }, {
			  name: "is_owner",
			  label: "Master Rights",
			  cell: masterRightsCell
		  }, {
			  name: "country_name",
			  label: "Country of Recording",
			  cell: "string"
		  }],
		  collection: pageableTerritories
		});
		// Render the grid
		var $example2 = $("#grid");
		$example2.append(pageableGrid.render().el);

		// Initialize the paginator
		var paginator = new Backgrid.Extension.Paginator({
			collection: pageableTerritories
		});
		// Render the paginator
		$example2.after(paginator.render().el);

		// Initialize a client-side filter to filter on the client
		// mode pageable collection's cache.
		var filter = new Backgrid.Extension.ClientSideFilter({
			collection: pageableTerritories,
			fields: ['track_name']
		});

		// Render the filter
		$example2.before(filter.render().el);

		// Add some space to the filter and move it to the right
		//$(filter.el).css({float: "right", margin: "20px"});
		
		// Fetch some data
		pageableTerritories.fetch({reset: true});
    </script>
</div>
</body>
</html>