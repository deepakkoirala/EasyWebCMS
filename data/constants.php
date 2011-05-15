<?php
////////////////ADMIN DEFAULT CONSTANTS////////////////////////
define("ADMIN_PAGE_WIDTH", "1000");
define("ADMIN_LEFT_WIDTH", "20%");
define("ADMIN_BODY_WIDTH", "80%");
define("ADMIN_TITLE", "Admin Control Panel");
define("PAGE_TITLE", "Company Name");
define("SITE_EMAIL", "info@company");
define("WEBSITE", "www.website.com");
define("PAGE_NAME", "www.website.com");
define("SKYPE_NAME","");

date_default_timezone_set("Asia/Kathmandu");

////////////////IMAGE FOLDER LOCATIONS////////////////////////
define("CMS_FILES_DIR", "files/download/");
define("CMS_IMAGES_DIR", "files/pics/");
define("CMS_LISTINGS_DIR", "files/listings/");
define("CMS_LISTING_FILES_DIR", "files/listingfiles/");
define("CMS_GROUPS_DIR", "files/groups/");
define("CMS_ADDS_DIR", "files/adds/");
define("CMS_TESTIMONIALS_DIR", "files/testimonials/");

///////////////// PAGE_EXTENSION /////////////
define("PAGE_EXTENSION",".html");
////////////// LINK_COLOR //////////////
define("LINK_COLOR","#000000");

define("LISTING_LIMIT", 10);
define("PAGING_LIMIT", 40);


$innerIds = array(69); // for spring and autumn itineraries
$main_img_id = array(14); // for displaying images on the header part of the template
$upd_visit_id= array(17); // automatically increase the visits number per visitor
$leftLinks = array(29, 30, 24); 
$arrIds = array("127","147","217","227","194","153","241");
$stars = array("Non Star", "1 Star", "2 Star", "3 Star", "4 Star", "5 Star");

////////////////LINKS AND PAGE TYPES////////////////////////
$groupTypesArray = array("Header Links", "Page Contents","Other Links","Footer Links");

$linkTypesArray = array("Normal Group", "Link", "File", "Contents Page", "Gallery", "List", "Video Gallery");

$filesNotAllowed =  array("php","js","asp"); // 4 places edited on manage_cms.php

?>