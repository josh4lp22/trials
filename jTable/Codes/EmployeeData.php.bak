<html>
  <head>

    <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="Scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	
  </head>
  <body>
	<div id="PeopleTableContainer" style="width: 600px;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				title: 'Employee Data',
				paging: true,
				pageSize: 5,
				sorting: true,
				defaultSorting: 'empFName ASC',
				actions: {
					listAction: 'ModelEmployee.php?action=list'
					//createAction: 'ModelEmployee.php?action=create',
					//updateAction: 'ModelEmployee.php?action=update',
					//deleteAction: 'ModelEmployee.php?action=delete'
				},
				fields: {
					empID: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					empFName: {
						title: 'First Name',
						width: '40%'
					},
					empLName: {
						title: 'Last Name',
						width: '40%'
					},
					empEmail: {
						title: 'Email ID',
						width: '40%'
					},
					empDob: {
						title: 'DOB',
						width: '30%',
						type: 'date'
					},
					empCity: {
						title: 'City',
						width: '30%'
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
 
  </body>
</html>
