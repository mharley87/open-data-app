<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once 'includes/db.php';
require_once 'includes/functions.php';

$sql = $db->prepare('
	SELECT id, name, adr, latitude, longitude, rate_count, rate_total
	FROM locations
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$location = $sql->fetch();

if (empty($location)) {
	header('Location: index.php');
	exit;
}

$title = $location['name'];

if ($location['rate_count'] > 0) {
	$rating = round($location['rate_total'] / $location['rate_count']);
} else {
	$rating = 0;
}

$cookie = get_rate_cookie();

include 'includes/theme-top.php';

?>

<body>
<div class="container">

<div class="whitebox">
<h1><?php echo $location['name']; ?></h1>


<dl>
	<dt>Average Rating</dt><dd><meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter></dd>
	<dt class="address">Address</dt><dd><?php echo $location['adr']; ?></dd>
	<dt>Longitude</dt><dd><?php echo $location['longitude']; ?></dd>
	<dt>Latitude</dt><dd><?php echo $location['latitude']; ?></dd>
</dl>
</div>

<div class="ratebox">
<?php if (isset($cookie[$id])) : ?>



<h2>YOUR RATING</h2>
<ol class="rater rater-usable">
	<?php for ($i = 1; $i <= 5; $i++) : ?>
		<?php $class = ($i <= $cookie[$id]) ? 'is-rated' : ''; ?>
		<li class="rater-level <?php echo $class; ?>">★</li>
	<?php endfor; ?>
</ol>

<?php else : ?>



<h1>PLEASE RATE</h1>
<ol class="rater rater-usable">
	<?php for ($i = 1; $i <= 5; $i++) : ?>
    
	<li class="rater-level"><a href="rate.php?id=<?php echo $location['id']; ?>&rate=<?php echo $i; ?>">★</a></li>
	<?php endfor; ?>
</ol>

</div>

</div>
</body>
<?php endif; ?>

<?php

include 'includes/theme-bottom.php';

?>
