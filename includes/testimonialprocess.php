<?php 
if(isset($_POST['btnTestimonials']))
{
	if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
	{
		$size = $_FILES['filename']['size'];
		$image = $_FILES['filename']['name'];
		$tmp_image = $_FILES['filename']['tmp_name'];
		$filename = time(). str_replace(" ", "_", strtolower($image));
		if($size > 0)
		{
			copy($tmp_image, CMS_TESTIMONIALS_DIR . $filename);
		}
		
		$id = $testimonials ->insertTests($_POST['name'], $_POST['address'], $_POST['comments'], $filename);
		$_SESSION['testmsg'] = "Testimonials posted successfully";
		$_SESSION['tsubmit'] = "ok";
		header("Location: testimonials.html");
		exit();
	}
	else
	{
		$_SESSION['testmsg'] = "Please enter valid security code";
		$_SESSION['tsubmit'] = "submit";
		//header("Location: testimonials.html");
		//exit();
	}
}
?>