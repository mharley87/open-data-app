<?php /*?>*small description: Displays the list and the map for the Open Data
*
*@package
*@copyright 2012 Mike Harley
*@author Mike Harley <mike.harley87@yahoo.com>
*@link https:git@github.com:mharley87/open-data-app.git
*@link https::<http://ottawa-baseball.phpfogapp.com/index.php>
*@license New BSD Licence
*@version 1.0.0
<?php */?>



<?php

require_once '../includes/filter-wrapper.php';

$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($name)) {
		$errors['name'] = true;
	}
	
	if (empty($longitude)) {
		$errors['longitude'] = true;
	}
	
	if (empty($latitude)) {
		$errors['latitude'] = true;
	}
	
	if (empty($errors)) {
		require_once '../includes/db.php';
		
		$sql = $db->prepare('
			INSERT INTO locations (name, longitude, latitude )
			VALUES (:name, :longitude, :latitude)
		');
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Add a Location</title>
</head>
<body>
	
	<form method="post" action="add.php">
		<div>
			<label for="name">Location Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="name" name="name" value="<?php echo $name; ?>" required>
		</div>
		<div>
			<label for="longitude">Longitude<?php if (isset($errors['longitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="longitude" name="longitude" value="<?php echo $longitude; ?>" required>
		</div>
        <div>
			<label for="latitude">Longitude<?php if (isset($errors['latitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
			<input id="latitude" name="latitude" value="<?php echo $latitude; ?>" required>
		</div>
		<button type="submit">Add</button>
	</form>
	
</body>
</html>
