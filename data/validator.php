<?php
class Validator{
	function validate_empty($data,$label)
	{
		$data = trim($data);
		if(empty($data))
		{
			$error = "<li><strong>".$label."</strong> cannot be empty " . "</li>";		
		}
		else
		{
			$error = NULL;	
		}
		return $error;
	}
	function validate_text_with_space($data,$label)
	{
		if(preg_match("/^[a-zA-Z][a-zA-Z ]+$/", $data) === 0)
		{
			$error = "<li><strong>".$label."</strong> must contain letters and spaces only " . "</li>";	
		}
		else
		{
			$error = NULL;		
		}
		return $error;
	}
	function validate_text_without_space($data,$label)
	{
		if(preg_match("/^[a-zA-Z]+$/", $data) === 0)
		{
			$error = "<li><strong>".$label."</strong> must contain letters, & no spaces allowed " . "</li>";	
		}
		else
		{
			$error = NULL ;		
		}
		return $error;		
	}	
	function validate_text_range($data,$min_range,$max_range,$label)
	{
		if(strlen($data)<$min_range)
		{	
			$error = "<li><strong>".$label."</strong> should be greater than " . $min_range ."</li>"; 
		}
		else if(strlen($data)>$max_range)
		{
			$error = "<li><strong>".$label."</strong> should be less than ". $max_range . "</li>";	
		}	
		else
		{
			$error = NULL;
		}
		return $error;
	}
	function validate_digit($digits,$label)
	{
			$digits = trim($digits);
			if(preg_match("/^[0-9]+$/", $digits) === 0)
			{
				$error = "<li><strong>".$label."</strong> should be number without decimal places " . "</li>";
			}
			else 
			{
				$error = NULL;
			}
			return $error;
	}

	function validate_number($data,$label)
	{
		if(!is_numeric($data))
		{
			$error.= "<li><strong>".$label. "</strong> should be number with/without decimal places " . "</li>";	
		}
		else
		{
			$error = NULL;	
		}
		return $error;
	}
	function validate_numeric_range($data,$min_range,$max_range,$label)
	{
		if($data < $min_range)
		{	
			$error = "<li><strong>".$label."</strong> should be greater than or equal to " . $min_range ."</li>"; 
		}
		else if($data > $max_range)
		{
			$error = "<li><strong>".$label."</strong> should be less than or equal to ". $max_range . "</li>";	
		}	
		else
		{
			$error = NULL;
		}
		return $error;
	}
	function validate_email($email,$label)
	{
		$email = trim($email);
	
		if(preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $email) === 0)
		{
			$error = "<li><strong>".$label."</strong> is invalid " . "</li>";
		}
		else 
		{
			$error = NULL;
		}
		return $error;		
	}
	function validate_password($password,$label)
	{
		if(preg_match("/^.*(?=.{8,}).*$/", $password) === 0)
		{
			$error = "<li><strong>".$label. "</strong> must be at least 8 characters " . "</li>";
		}
		else 
		{
			$error = NULL;		
		}
		return $error;
	}
	function validate_identical($string1,$string2,$label)
	{
		if( strlen($string1)!= strlen($string2) )
		{
			$error = "<li><strong>" . $label . "</strong> are not equal " . "</li>" ;
		}
		else if($string1 != $string2)
		{
			$error = "<li><strong>" . $label . "</strong> should be same " . "</li>" ;				
		}
		else
		{
			$error = NULL;	
		}
		return $error;
	}
}

$validator = new Validator();
?>