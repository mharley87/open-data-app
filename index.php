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

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, adr, latitude, longitude, rate_count, rate_total
	FROM locations
	ORDER BY name DESC
');

include 'includes/theme-top.php';

?>
<div class="container">
<a class="admin1" href = "/admin/sign-in.php">Admin</a>

<div class="buttons">

<form id="geo-form">
	<label for="adr">Address</label>
	<input id="adr">
</form>
<button id="geo">Search</button>
</div>

<ol class="locations">
<?php foreach ($results as $location) : ?>
	<?php
		if ($location['rate_count'] > 0) {
			$rating = round($location['rate_total'] / $location['rate_count']);
		} else {
			$rating = 0;
		}
	?>
	<li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $location['id']; ?>">
		<strong class="distance"></strong>
		<a href="single.php?id=<?php echo $location['id']; ?>" itemprop="name"><?php echo $location['name']; ?></a>
		<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			<meta itemprop="latitude" content="<?php echo $location['latitude']; ?>">
			<meta itemprop="longitude" content="<?php echo $location['longitude']; ?>">
		</span>
		
		<ol class="rater">
		<?php for ($i = 1; $i <= 5; $i++) : ?>
			<?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
			<li class="rater-level <?php echo $class; ?>">★</li>
		<?php endfor; ?>
		</ol>
	</li>
<?php endforeach; ?>
</ol>

<div id="map"></div>
</div>
<?php

include 'includes/theme-bottom.php';

?>
