<?php 
// Error Reporting
error_reporting(E_ALL);
session_start();       
define('SITE', TRUE);   


include_once('classes/loader.php');  

$Site = new App;
?>