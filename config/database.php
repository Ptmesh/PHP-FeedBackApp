<?php 

define('DB_HOST','localhost');
define('DB_USER','Ptmesh');
define('DB_PASS','123456789');
define('DB_NAME','php_feedbackapp');


// For creating a connection

$connect=new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);

// Checking connection

if($connect->connect_error)
{
    die('Connection Failed' . $connect->connect_error);
}
// echo 'CONNECTED!';

?>