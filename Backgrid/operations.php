<?php       

function getCountry()
{
	$con = mysql_connect("192.168.31.138", "jvarghese", "Orchard682");
	mysql_select_db("art_relations", $con);
	mysql_set_charset("utf8", $con);
	$country = array();
	$result = mysql_query("SELECT id, name, abbrivation from country", $con);
	if ($result && mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_object($result)) {
			$country[] = $row;
		}
		$page = array("per_page" => 15, "total_entries" => 245, "total_pages" => 17, "page" => 1);
		$data = array($country);
		array_unshift($data, $page);
		echo json_encode($data);
	}
}

function getTrackData()
{
	$con = mysql_connect("192.168.31.138", "jvarghese", "Orchard682");
	mysql_select_db("art_relations", $con);
	mysql_set_charset("utf8", $con);
	$trackData = array();
	$query = mysql_query("SELECT T.id, T.track_name, R.release_name, A.name, M.is_owner, C.name as country_name
							FROM track T
							INNER JOIN releases R ON T.upc=R.upc
							INNER JOIN artist_info A ON R.artist_id=A.artist_id
							LEFT JOIN track_master_rights M ON T.id=M.track_id
							INNER JOIN country C on T.recording_country=C.id
							LIMIT 300;", $con);
	while ($row = mysql_fetch_object($query)) {
		if($row->is_owner == "y")
			$row->is_owner = "Yes";
		elseif($row->is_owner == "n")
			$row->is_owner = "No";
		else
			$row->is_owner = "";
		$trackData[] = $row;
	}
	$total = mysql_num_rows($query);
	$page = array("per_page" => 15, "total_entries" => $total, "total_pages" => ceil($total/15), "page" => 1);
	$data = array($trackData);
	array_unshift($data, $page);
	echo json_encode($data);
}

if (isset($_GET['fun'])) {
	if($_GET['fun'] == "country") {
		getCountry();
	} elseif($_GET['fun'] == "track") {
		getTrackData();
	}
}