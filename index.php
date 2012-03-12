<?php

require_once 'includes/filter-wrapper.php';
require_once 'includes/db.php';

// `->exec()` allows us to perform SQL and NOT expect results
// `->query()` allows us to perform SQL and expect results
$results = $db->query('
	SELECT id, name, longitude, latitude
	FROM locations
	ORDER BY name DESC
');

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Fake Data</title>
</head>
<body>
	<a href="admin/index.php">Admin</a>
    <br>
    <br>
	<ul>

	
	<?php foreach ($results as $location) : ?>
		<li>
			<a href="single.php?id=<?php echo $location['id']; ?>"><?php echo $location['name']; ?></a>
			
		</li>
	<?php endforeach; ?>
	</ul>
	
</body>
</html>
