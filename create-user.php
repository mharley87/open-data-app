<?php 


require_once 'includes/db.php';
require_once 'includes/users.php';

$email = 'mharley87@hotmail.com';
$password = 'Fisher12';


user_create($db, $email,$password);

