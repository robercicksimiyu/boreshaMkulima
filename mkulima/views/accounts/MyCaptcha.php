<?php

 	/*$string='';
 	$dir='fonts/';

 	

 	// create a random variable
	for($i=0;$i<5;$i++){
 		$string.=chr(rand(97,122));
 	}

	$_SESSION['randon_code']=$string;
 		
 	// colors
 	// Building the image
 	
 		$image=imagecreatetruecolor(170, 60);
 		$black=imagecolorallocate($image, 0, 0, 0);
 		$color=imagecolorallocate($image, 200, 100, 90);
 		$white=imagecolorallocate($image, 255, 255, 255);
 		imagefilledrectangle($image, 0, 0, 200, 100, $white);
 		imagettftext($image, 30, 0, 10, 40, $color, $dir."icomoon.ttf", $_SESSION['randon_code']);

 		header("Content-type:img/png");
 		imagepng($image);*/

  
 		  
 		session_start();  
 		  
 		$string = '';  
 		  
 		for ($i = 0; $i < 5; $i++) {  
 		    // this numbers refer to numbers of the ascii table (lower case)  
 		    $string .= chr(rand(97, 122));  
 		}  
 		  
 		$_SESSION['rand_code'] = $string;  
 		  
 		$dir = PUBLIC_FOLDER.'fonts/';  
 		  
 		$image = imagecreatetruecolor(180, 60);  
 		$black = imagecolorallocate($image, 0, 0, 0);  
 		$color = imagecolorallocate($image, 200, 100, 90); // red  
 		$white = imagecolorallocate($image, 255, 255, 255);  
 		  
 		imagefilledrectangle($image,0,0,399,99,$white);  
 		imagettftext ($image, 30, -2, 10, 40, $black, $dir."casual.ttf", $_SESSION['rand_code']);  

 		if(file_exists($dir.'casual.ttf')){
 			echo "Available";
 		}
 		if(file_exists($dir)){
 			echo "Directory Available";
 		}
 		echo fileperms($dir.'casual/casual.ttf');
 		  
 		header("Content-type: image/png");  
 		imagepng($image); 


 		?>  
  

 		

 