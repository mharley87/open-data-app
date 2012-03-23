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

include 'includes/theme-top.php';

?>
	<ul class="locations">

	
	<?php foreach ($results as $location) : ?>
			<li itemscope itemtype="http://schema.org/TouristAttraction">
		<a href="single.php?id=<?php echo $location['id']; ?>" itemprop="name"><?php echo $location['name']; ?></a>
		<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			<meta itemprop="latitude" content="<?php echo $location['latitude']; ?>">
			<meta itemprop="longitude" content="<?php echo $location['longitude']; ?>">
		</span>
	</li>
	<?php endforeach; ?>
	</ul>
<div id="map"></div>

<?php

include 'includes/theme-bottom.php';

?>

