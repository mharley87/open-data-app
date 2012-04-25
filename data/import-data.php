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

require_once '../includes/db.php';

$places_xml = simplexml_load_file('2009_ball_diamonds.kml');

$sql = $db->prepare('
		INSERT INTO locations (name, longitude, latitude, adr, rate_count, rate_total)
		VALUES (:name, :longitude, :latitude, :adr, :rate_count, rate_total)
');

foreach ($places_xml->Document->Folder[0]->Placemark as $place) {
	
	$coords = explode(',',trim($place->Point->coordinates));
	/*echo $place->name;*/
/*	echo $place->Point->coordinates;*/
	
	/*$adr = '';*/


/*foreach ($place->ExtendedData->SchemaData->SimpleData as $civic) {	
	if $civic->attributes()->name == 'LEGAL ADDR') {
		$adr = $civic;
	}
	
	echo $adr;
}*/


$sql->bindValue(':name', $place->name, PDO::PARAM_STR);
$sql->bindValue(':rate_count', $place->rate_count, PDO::PARAM_STR);
$sql->bindValue(':rate_total', $place->rate_total, PDO::PARAM_STR);
$sql->bindValue(':adr', $place->adr, PDO::PARAM_STR);
$sql->bindValue(':longitude', $coords[0], PDO::PARAM_STR);
$sql->bindValue(':latitude', $coords[1], PDO::PARAM_STR);
$sql->execute();

var_dump($sql);
}
