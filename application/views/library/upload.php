<?php
	require("image.php");
	require("imageclass.php");
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
	function createResized($filename, $thumb_path, $max_dim) {
        
		list($width, $height) = getimagesize($filename);
	
		  $ratio = $width / $height;
	
		  if( $ratio < 1) 
		  {
			  $new_height = $max_dim;
	  
			  $new_width = round($max_dim * $ratio);
	  
		  } else 	// horizontal
	  
		  {
	  
			  $new_width = $max_dim; 
	  
			  $new_height = round($max_dim / $ratio);
	  
		  }
	  
		 
	  
		  $img = new Zubrag_image;
	  
			  $img->max_x     	= $new_width;
	  
			  $img->max_y        = $new_height;
	  
		  $img->cut_x        = 0;
	  
		  $img->cut_y        = 0;
	  
		  $img->quality      = 100;
	  
		  $img->save_to_file = true;
	  
		  $img->image_type   = -1;	
	  
		  $img->GenerateThumbFile($filename, $thumb_path);
	  
	  
	  
	  }
	  
?>
