<?php
	require("image.php");
	function utf8_strlen($string) 
	{
		return mb_strlen($string);
	}
	
	function utf8_strrpos($string, $needle, $offset = 0) 
	{
		return mb_strrpos($string, $needle, $offset);
	}
	
	function utf8_substr($string, $offset, $length = null) 
	{
		if ($length === null) {
			return mb_substr($string, $offset, utf8_strlen($string));
		} else {
			return mb_substr($string, $offset, $length);
		}
	}
	function imagename($imagename,$width,$height)
	{
		$extension = pathinfo($imagename, PATHINFO_EXTENSION);
		$new_image = utf8_substr($imagename,0,utf8_strrpos($imagename,'.')). '-' . $width . 'x' . $height . '.' . $extension;
		return $new_image;
	}
	function imagemulitple($imagename,$width,$height)
	{ 
		$extension = pathinfo($imagename, PATHINFO_EXTENSION);
	
		$new_image = utf8_substr($imagename,0,utf8_strrpos($imagename,'.')). '-' . $width . 'x' . $height . '.' . $extension;
		list($width_orig, $height_orig) = getimagesize($imagename);
		$image = new Image($imagename);
		if ($width/$height == $width_orig/$height_orig) {
			$image->resize($width, $height, 'w');
		} elseif ($width/$height > $width_orig/$height_orig) {
			$image->resize($width, $height, 'w');
		} elseif ($width/$height < $width_orig/$height_orig) {
			$image->resize($width, $height, 'h');
		}
		$image->save($new_image);
	}
?>
