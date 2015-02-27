<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<link rel="stylesheet" href="backgrid/lib/backgrid.css"/>
<link rel="stylesheet" href="backgrid/lib/backgrid-paginator.css"/>
<link rel="stylesheet" href="backgrid/lib/backgrid-filter.css"/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/underscore-min.js"></script>
<script src="js/backbone-min.js"></script>
<script src="js/backbone-pageable.js"></script>
<script src="backgrid/lib/backgrid.js"></script>
<script src="backgrid/lib/backgrid-paginator.js"></script>
<script src="backgrid/lib/backgrid-filter.js"></script>
</head>
<body>
<div id="grid">
    <script type="text/javascript">
        var Territory = Backbone.Model.extend({});

        var PageableTerritories = Backbone.PageableCollection.extend({
            model: Territory,
            //url: '[{"per_page": 15, "total_entries": 241, "total_pages": 17, "page": 1}, [{"name": "Afghanistan", "url": "http://en.wikipedia.org/wiki/Afghanistan", "pop": 25500100, "date": "2013-01-01", "percentage": 0.36, "id": 1}]]',
            url: 'temp.json',
			state: {
              pageSize: 15
            },
            mode: "client" // page entirely on the client side
          });
        
        var pageableTerritories = new PageableTerritories();
        
          // Set up a grid to use the pageable collection
          var pageableGrid = new Backgrid.Grid({
          columns : [{
                  name: "name",
                  label: "Name",
                  // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
                  cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
              }, {
                  name: "pop",
                  label: "Population",
                  cell: "integer" // An integer cell is a number cell that displays humanized integers
              }, {
                  name: "percentage",
                  label: "% of World Population",
                  cell: "number" // A cell type for floating point value, defaults to have a precision 2 decimal numbers
              }, {
                  name: "date",
                  label: "Date",
                  cell: "date"
              }, {
                  name: "url",
                  label: "URL",
                  cell: "uri" // Renders the value in an HTML anchor element
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
            fields: ['name']
          });

          // Render the filter
          $example2.before(filter.render().el);

          // Add some space to the filter and move it to the right
          $(filter.el).css({float: "right", margin: "20px"});

          // Fetch some data
          pageableTerritories.fetch({reset: true});
    </script>
</div>
</body>
</body>
</html>