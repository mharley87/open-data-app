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
require_once 'includes/users.php';

$email = 'mike.harley87@yahoo.com';
$password = 'Fisher12';

user_create($db, $email, $password);
