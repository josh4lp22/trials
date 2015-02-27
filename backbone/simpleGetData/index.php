<?php

class releases{
	private $con;

    function __construct() {
        $this->con = mysql_connect("localhost", "root", "");
        mysql_select_db("test", $this->con);
    }
	
	public function get_releases() {
        $releases = array();
        $result = mysql_query("SELECT  release_id, upc, release_name, release_date, release_status FROM releases ORDER BY release_id DESC LIMIT 15", $this->con);
        if ($result && mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_object($result)) {
                $releases[] = $row;
            }
            return json_encode($releases);
        }
    }
}
$releaseObj = new releases();

if(isset($_GET['action'])){
	if($_GET['action']== 'get'){
		$releaseData = $releaseObj->get_releases();
		echo $releaseData;
		exit;
	}
}
?>
<!doctype html>
<html lang="en" data-framework="backbonejs">
    <head>
        <meta charset="utf-8">
        <title>Get Release</title>
        <script src="js/jquery.js"></script>
        <script src="js/underscore.js"></script>
        <script src="js/backbone.js"></script>
	</head>
	<body>
		<table id="release" align="center" cellspacing="2" border="1">
			<thead>
				<tr>
					<th>Release Name</a></th>
					<th>ReleaseId</a></th>
					<th align="center">upc</th>
					<th>Release Date</th>
					<th>Release Status</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<script type="text/template" id="release_template">
			<td><%= release_name.substring(0,35) %>..</td>
			......................
			<td><%= release_id %></td>
			<td><%= upc %></td>
			<td><%= release_date %></td>
			<td><%= release_status %></td>
		</script>
		<script src="js/model.js"></script>
        <script src="js/collection.js"></script>
		<script src="js/view.js"></script>
        <script src="js/list_view.js"></script>
		<script>
            var release_object = new release_view();
        </script>
	</body>
</html>