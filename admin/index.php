<?php

require_once '../includes/users.php';

if (!user_is_signed_in()) {
	header('Location: sign-in.php');
	exit;
}

require_once '../includes/db.php';

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
	<a href="sign-out.php">Sign Out</a>
    
	<a href="add.php">Add a location</a>
	
	<ul>

	
	<?php foreach ($results as $location) : ?>
		<li>
			<a href="../single.php?id=<?php echo $location['id']; ?>"><?php echo $location['name']; ?></a>
			&bull;
			<a href="edit.php?id=<?php echo $location['id']; ?>">Edit</a>
			<a href="delete.php?id=<?php echo $location['id']; ?>">Delete</a>
		</li>
	<?php endforeach; ?>
	</ul>
	
</body>
</html>
