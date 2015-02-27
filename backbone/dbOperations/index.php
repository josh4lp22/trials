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
	
	function add_release($post) {
        if (isset($post['release_id'])) {
            $query = "UPDATE releases SET release_name = '{$post['release_name']}', upc = '{$post['upc']}', release_date = '{$post['release_date']}' WHERE release_id = '{$post['release_id']}'";
            mysql_query($query, $this->con);
            return true;
            exit;
        } else {
            $release_name = mysql_real_escape_string($post['release_name']);
            $query = "INSERT INTO releases(release_name, upc,release_date,release_status) VALUES('{$release_name}','{$post['upc']}', '{$post['release_date']}', '{$post['release_status']}')";
            mysql_query($query, $this->con) or die("An Error occured " . mysql_error());
            return mysql_insert_id();
            exit;
        }
    }
	
	function delete_release($release_id) {
        $result = mysql_query("DELETE FROM releases WHERE release_id = '{$release_id}'", $this->con);
    }
}
$releaseObj = new releases();

if(isset($_GET['action'])){
	if($_GET['action']== 'get'){
		$releaseData = $releaseObj->get_releases();
		echo $releaseData;
		exit;
	}elseif($_GET['action'] == 'add'){
		if (isset($_GET['release_name']) && isset($_GET['upc'])) {
			$release_id = $releaseObj->add_release($_GET);
			echo $release_id;
			exit;
		}
	}elseif($_GET['action'] == 'delete'){
		if (isset($_GET['release_id'])) {
                $releaseObj->delete_release($_GET['release_id']);
            }
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
		<div id="message"></div>
        <div class="wrapper">
            <form id="frmAddRelease" action="#">
                <label for="release_name">Release Name</label><input
                    id="releasename_add" class="addInput" /> 
                <label for="upc">upc</label><input id="upc_add" class="addInput" /> 
                <input id="addrelease" type="button" value="Add Release" /> 
            </form>
        </div>
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
			<td>
                <a id="<%= release_id %>" href="javascript:void(<%= release_id %>);" class="delete_release"> Delete</a>
                <a id="<%= release_id %>" href="javascript:void(<%= release_id %>);" class="edit_release"> Edit</a>
            </td>
		</script>
		<script id="releaseEditTemplate" type="text/template">
			<form id="editrelease1" action="#">
				<td><input id="editrelease" class="editInput" value="<%= release_name %>"/></td>
				<td><%= release_id %></td>
				<td><input id="editupc" class="editInput" value="<%= upc %>"/></td>
				<td><input id="release_date" class="editInput" value="<%= release_date %>"/></td>
				<td>
					<input id="editSave" type="button" value="Save"/>
					<input id="editCancel" type="button" value="Cancel"/>
				</td>
			</form>
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