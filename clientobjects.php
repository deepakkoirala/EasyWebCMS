<?php
include "data/conn.php";
include "data/constants.php";
include "data/sqlinjection.php";
include "data/youtubeimagegrabber.php";

include "data/groups.php";
include "data/feedbacks.php";
include "data/listings.php";
include "data/listingfiles.php";
include "data/galleries.php";
include "data/videos.php";
include "data/metahome.php";
include "data/adds.php";
include "data/testimonials.php";
include "data/menu.php";

$conn = new Dbconn();
$groups	= new Groups();
$feedbacks = new Feedbacks();
$listings = new Listings();
$listingFiles = new ListingFiles();
$galleries = new Galleries();
$videos = new Videos();
$metahome					= new metaHome();
$adds = new Adds();
$testimonials = new Testimonials();
$menu = new menu();
?>