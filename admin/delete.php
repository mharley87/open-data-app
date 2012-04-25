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

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once '../includes/db.php';

$sql = $db->prepare('
	DELETE FROM locations
	WHERE id = :id
	LIMIT 1
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);

$sql->execute();

header('Location: index.php');
exit;
