<?php
ob_start();
session_start();
error_reporting(1);
ini_set("register_globals", "off");
ini_set("upload_max_filesize", "20M");
ini_set("post_max_size", "40M");
ini_set("memory_limit", "80M");

require_once("../data/conn.php");
require_once("../data/users.php");
require_once("../data/groups.php");
require_once("../data/listings.php");
require_once("../data/listingfiles.php");
require_once("../data/galleries.php");
require_once("../data/videos.php");
require_once("../data/testimonials.php");
require_once("../data/feedbacks.php");
require_once("../data/metahome.php");
require_once("../data/cities.php");
require_once("../data/hotels.php");

$conn 					= new Dbconn();		
$users	 				= new Users();	
$groups					= new Groups();
$listings				= new Listings();
$listingFiles		= new ListingFiles();
$galleries			= new Galleries();
$videos					= new Videos();
$testimonials		= new Testimonials();
$feedbacks				= new Feedbacks();
$metahome					= new metaHome();
$cities					= new Cities();
$hotels					= new Hotels();

require_once("../data/constants.php");
require_once("../data/sqlinjection.php");
require_once("../data/youtubeimagegrabber.php");

?>