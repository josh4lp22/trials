<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Car Services</title>
        <!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
		<div id="main" method="post" action="submit.php">
			<h1>Car Services</h1>
			<p id="services">
				You chose: <?php echo htmlspecialchars(implode(array_keys($_POST), ', '));?> <br />
				<a href="index.html">Go back</a>
			</p>
		</div>
    </body>
</html>

