<?php
 class MyCaptcha{
 	private $string;
 	private $dir=PUBLIC_FOLDER.'fonts/';

 	function __construct(){
 		start_session();
 		$this->string='';

 	}

 	// create a random variable

 	function random_variable(){
 		for($i=0;$i<5;$i++){
 			$this->string.=chr(rand(97,122));
 		}
 		$_SESSION['randon_code']=$string;
 	}
 	// colors
 	// Building the image
 	function create_image(){
 		$image=imagecreatetruecolor(170, 60);
 		$black=imagecolorallocate($image, 0, 0, 0);
 		$color=imagecolorallocate($image, 200, 100, 90);
 		$white=imagecolorallocate($image, 255, 255, 255);
 		imagefilledrectangle($image, 0, 0, 200, 100, $white);
 		imagettftext($image, 30, 0, 10, 40, $color, $dir."icomoon.ttf", $_SESSION['randon_code']);

 		header("Content-type:img/png");
 		imagepng($image);
 	}

 }

 $image=new MyCaptcha();

 $image->random_variable();
 $image->create_image();