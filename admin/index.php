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
include '../includes/theme-top.php';

require_once '../includes/users.php';


if (!user_signed_in()) {
	header('Location: sign-in.php');
	exit;
}

require_once '../includes/db.php';

$results = $db->query('
	SELECT id, name, adr, latitude, longitude, rate_count, rate_total
	FROM locations
	ORDER BY name DESC
');


?>
<div class="container">
<div class="buttons">
	
    <div class="button-two"><a href="sign-out.php">Sign Out</a></div>
    
	<div class="button-three"><a href="add.php">Add a location</a></div>
    
   </div>
	<div class="items">
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
    </div>
</div>
<?php 
include '../includes/theme-bottom.php';
?>	

