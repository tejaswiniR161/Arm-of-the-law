<?php
	$phoneNumber = $_POST['vphone'];
	$vname=$_POST['vname'];
	$vaddr=$_POST['vaddr'];
	$vdate=$_POST['vdate'];
	$vtime=$_POST['vtime'];
	$vpname=$_POST['vpname'];



	if(!empty($phoneNumber)) // phone number is not empty
	{
		if(preg_match('/^\d{10}$/',$phoneNumber)) // phone number is valid
		{
		  $phoneNumber = '0' . $phoneNumber;
			
			
			
			$imgName = $_FILES['myimage']['name'];
			$imgData = file_get_contents($_FILES['myimage']['tmp_name']);
			$size = getimagesize($_FILES['myimage']['tmp_name']);
			mysql_connect("localhost", "root", "");
			mysql_select_db ("AOTL");
			$sql = sprintf("INSERT INTO testblob
			(image_type, image, image_size, image_name,v_name,v_add,v_phone,v_date,v_time,v_pri_name)
			VALUES
			('%s', '%s', '%d', '%s','$vname','$vaddr','$phoneNumber','$vdate','$vtime','$vpname')",
			
			mysql_real_escape_string($size['mime']),
			mysql_real_escape_string($imgData),
			$size[3],
			mysql_real_escape_string($_FILES['myimage']['name'])
			);
			mysql_query($sql);
			
			echo $imgName.'Uploaded Successfully';
			echo "<script> alert('Upload Successful!'); </script>";
			header( "refresh:0;url=commhome.php" );
			//header("Location:catalog.php");
		}
		else // phone number is not valid
		{
		  echo "<script> alert('Phone number invalid ! Please Retry Again'); </script>";
		  header( "refresh:0;url=index.php" );
		}
	}
	else // phone number is empty
	{
	  echo 'You must provide a phone number !';
	}
	
?>
