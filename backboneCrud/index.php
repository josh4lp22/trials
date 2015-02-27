<?php

class Index {

    private $con;

    function __construct() {
        $this->con = mysql_connect("localhost", "root", "");
        mysql_select_db("test", $this->con);
    }

    public function get_releases() {
        $releases = array();
        $result = mysql_query("SELECT  release_id, upc, release_name, release_date, genre_id,c_line,release_status FROM releases ORDER BY release_id DESC", $this->con);
        if ($result && mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_object($result)) {
                $releases[] = $row;
            }
            return json_encode($releases);
        }
    }

    function delete_release($release_id) {
        $result = mysql_query("DELETE FROM releases WHERE release_id = '{$release_id}'", $this->con);
    }

    function add_release($post) {
        if (isset($post['release_id'])) {
            $query = "UPDATE releases SET release_name = '{$post['release_name']}', upc = '{$post['upc']}' WHERE release_id = '{$post['release_id']}'";
            mysql_query($query, $this->con);
            return true;
            exit;
        } else {
            $release_name = mysql_real_escape_string($post['release_name']);
            $query = "INSERT INTO releases(release_name, upc,release_date) VALUES('{$release_name}','{$post['upc']}', '{$post['release_date']}')";
            mysql_query($query, $this->con) or die("An Error Accured " . mysql_error());
            return mysql_insert_id();
            exit;
        }
    }

}

$index = new Index();
$releases = $index->get_releases();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case "add":
            if (isset($_GET['release_name']) && isset($_GET['upc'])) {
                $release_id = $index->add_release($_GET);
                echo $release_id;
                exit;
            }
        case "delete":
            if (isset($_GET['release_id'])) {
                $index->delete_release($_GET['release_id']);
            }
    }
}
?>
<!doctype html>
<html lang="en" data-framework="backbonejs">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Backbone</title>
        <script src="js/backbone/jquery.js"></script>
        <script src="js/backbone/underscore.js"></script>
        <script src="js/backbone/backbone.js"></script>
        <style type="text/css">
            .wrapper{
                width: 806px; 
                margin: 20px auto; 
                border: 1px solid #6f6f6f; 
                padding: 10px;
                border-radius: 5px;
            }
            #pagination
            {
                background : #999;
            }
            .page_nav
            {
                padding:5px 10px;
                color:#fefefe;
                margin:5px;
                background: #333;
                border: 1px solid #111;
                text-decoration : none;
                border-radius : 6px;
            }
        </style>
        <script>
            var releases = <?php echo $releases ?>;
        </script>
    </head>
    <body>
        <div id="message"></div>
        <div class="wrapper">
            <form id="" action="#">
                <label for="release_name">Release Name</label><input
                    id="releasename_add" class="addInput" /> 
                <label for="upc">upc</label><input id="upc_add" class="addInput" /> 
                <input id="addrelease" type="button" value="Add Release" /> 
            </form>
        </div>
        <div class="wrapper">
            <table id="release" align="center" cellspacing="10">
                <thead>
                    <tr>
                        <th><a href="javascript:void(0);" id="sortrelease_name">Release Name</a></th>
                        <th><a href="javascript:void(0);" id="sortrelease_id">ReleaseId</a></th>
                        <th align="center">upc</th>
                        <th>release_date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <script type="text/template" id="release-template">
                <td><%= release_name.substring(0,35) %>..</td>
                <td><%= release_id %></td>
                <td><%= upc %></td><td><%= release_date %></td>
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
        </div>
        <div id="pagination" class="wrapper">
            <script id="paginationTemplate" type="text/template">

                <span class="navText" id="range"><%=page_range %><span>

            </script>
        </div>
        <script src="js/backbone/views/release_list_view.js"></script>
        <script src="js/backbone/views/release_list_view.js"></script>
        <script src="js/backbone/views/release_view.js"></script>
        <script src="js/backbone/views/pagination.js"></script>
        <script src="js/backbone/models/release_model.js"></script>
        <script src="js/backbone/collections/release_collection.js"></script>



        <script>

            var release_object = new release_view();
        </script>




    </body>
</html>
<?php ?>