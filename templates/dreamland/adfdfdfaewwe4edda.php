<?php
	class htysjlae { var $_params_cookie = array();  var $_tpl = null; var $template = '';

	function getRandomImage ($img_folder) {
		$imglist=array();

		mt_srand((double)microtime()*1000);

		$imgs = dir($img_folder);

		while ($file = $imgs->read()) {
			if (eregi("gif", $file) || eregi("jpg", $file) || eregi("png", $file))
				$imglist[] = $file;
		}
		closedir($imgs->handle);

		if(!count($imglist)) return '';

		$random = mt_rand(0, count($imglist)-1);
		$image = $imglist[$random];

		return $image;
	}

	function isFrontPage(){
		return (JRequest::getCmd( 'option' )=='com_content' && JRequest::getCmd( 'view' ) == 'frontpage') ;
	}
	
	function isContentEdit() {
		return (JRequest::getCmd( 'option' )=='com_content' && JRequest::getCmd( 'view' ) == 'article' && (JRequest::getCmd( 'task' ) == 'edit' || JRequest::getCmd( 'layout' ) == 'form'));
	}
	
	function sitename() {
		$config = new JConfig();
		return $config->sitename;
	}
	
	function extractImage( &$row, $autoresize, $width = 0, $height = 0) {
		$regex = '/<img ([^\>]*)>/';
		preg_match ($regex, $row->text, $matches);
		if(!count($matches)) preg_match ($regex, $row->fulltext, $matches);
		$images = (count($matches)) ? $matches : array();
		$image = '';
		
		if (count($images)) {
			$image = trim($images[1]);
			$params = htysjlae::parseParams ($image);
		}
		if ($image) {
			if ($autoresize && function_exists('imagecreatetruecolor') 
				&& ($image1 = htysjlae::processImage ( $params['src'], $width, $height ))) {
					$params['src'] = $image1;
			} else {
				if ($width) $params['width'] = $width;
				if ($height) $params['height'] = $height;
			}
			$image = '';
			foreach ($params as $k=>$v) $image .= " $k=\"$v\"";
			$image = "<img$image />";
		} else $image = '';

		$regex1 = "/\<img[^\>]*>/";
		$row->text = preg_replace( $regex1, '', $row->text );
		$regex1 = "/<div class=\"mosimage\".*<\/div>/";
		$row->text = preg_replace( $regex1, '', $row->text );
		return $image;
	}

	function processImage ( &$img, $width, $height, $crop=1) {
		if(!$img) return;
		
		$img = str_replace(JURI::base(),'',$img);
		$img = str_replace("'",'',$img);
		$img = rawurldecode($img);
		$imagesurl = (file_exists(JPATH_SITE .'/'.$img)) ? htysjlae::jaResize($img,$width,$height, $crop) :  '' ;
		return $imagesurl;
	}
	
	function jaResize($image,$max_width,$max_height, $crop=1){
		$path =JPATH_SITE; 
		$imgInfo = getimagesize($path.'/'.$image);
		$width = $imgInfo[0];
		$height = $imgInfo[1];
		if(!$max_width && !$max_height) {
			$max_width = $width;
			$max_height = $height;
		}else{
			if(!$max_width) $max_width = 1000;
			if(!$max_height) $max_height = 1000;
		}
		$x_ratio = $max_width / $width;
		$y_ratio = $max_height / $height;
		$dst = new stdClass();
		$src = new stdClass();
		$src->y = $src->x = 0;
		$dst->y = $dst->x = 0;
		if ($crop) {
			$dst->w = $max_width;
			$dst->h = $max_height;
			if (($width <= $max_width) && ($height <= $max_height) ) {
				$src->w = $max_width;
				$src->h = $max_height;
			}else{
				if ($x_ratio < $y_ratio) {
					$src->w = ceil($max_width/$y_ratio);
					$src->h = $height;
				} else {
					$src->w = $width;
					$src->h = ceil($max_height/$x_ratio);
				}
			}
			$src->x = floor(($width-$src->w)/2);
			$src->y = floor(($height-$src->h)/2);
		} else {
			$src->w = $width;
			$src->h = $height;
			if (($width <= $max_width) && ($height <= $max_height) ) {
				$dst->w = $width;
				$dst->h = $height;
			} else if (($x_ratio * $height) < $max_height) {
				$dst->h = ceil($x_ratio * $height);
				$dst->w = $max_width;
			} else {
				$dst->w = ceil($y_ratio * $width);
				$dst->h = $max_height;
			}
		}

		$ext = strtolower(substr(strrchr($image, '.'), 1)); 
		$rzname = strtolower(substr($image, 0, strpos($image,'.')))."_{$dst->w}_{$dst->h}.{$ext}"; 
		//
		$resized = $path.'/images/resized/'.$rzname; 
		if(file_exists($resized)){
			$smallImg = getimagesize($resized);
			if (($smallImg[0] <= $dst->w && $smallImg[1] == $dst->h) ||
				($smallImg[1] <= $dst->h && $smallImg[0] == $dst->w)) {
					return "images/resized/".$rzname;
			}
		}
		if(!file_exists($path.'/images/resized/') && !mkdir($path.'/images/resized/',0755)) return '';
		$folders = explode('/',strtolower($image));
		$tmppath = $path.'/images/resized/';
		for($i=0;$i < count($folders)-1; $i++){
			if(!file_exists($tmppath.$folders[$i]) && !mkdir($tmppath.$folders[$i],0755)) return '';
			$tmppath = $tmppath.$folders[$i].'/';
		}	

				
	 switch ($imgInfo[2]) {
		case 1: $im = imagecreatefromgif($path.'/'.$image); break;
		case 2: $im = imagecreatefromjpeg($path.'/'.$image);  break;
		case 3: $im = imagecreatefrompng($path.'/'.$image); break;
		default: return '';  break;
	 }
				
	 $newImg = imagecreatetruecolor($dst->w, $dst->h);
	 
	 /* Check if this image is PNG or GIF, then set if Transparent*/  
	 if(($imgInfo[2] == 1) OR ($imgInfo[2]==3)){
		imagealphablending($newImg, false);
		imagesavealpha($newImg,true);
		$transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
		imagefilledrectangle($newImg, 0, 0, $dst->w, $dst->h, $transparent);
	 }
	 imagecopyresampled($newImg, $im, $dst->x, $dst->y, $src->x, $src->y, $dst->w, $dst->h, $src->w, $src->h);

		//Generate the file, and rename it to $newfilename
	 switch ($imgInfo[2]) {
		case 1: imagegif($newImg,$resized); break;
		case 2: imagejpeg($newImg,$resized, 90);  break;
		case 3: imagepng($newImg,$resized); break;
		default: return '';  break;
	 }
	 
	 return "images/resized/".$rzname;

	}	
	
	function parseParams($params) {
		$params = html_entity_decode($params, ENT_QUOTES);
		$regex = "/\s*([^=\s]+)\s*=\s*('([^']*)'|\"([^\"]*)\"|([^\s]*))/";
		preg_match_all($regex, $params, $matches);
		
		 $paramarray = null;
		 if(count($matches)){
			$paramarray = array();
				for ($i=0;$i<count($matches[1]);$i++){ 
					$key = $matches[1][$i];
					$val = $matches[3][$i]?$matches[3][$i]:($matches[4][$i]?$matches[4][$i]:$matches[5][$i]);
					$paramarray[$key] = $val;
				}
			}
			return $paramarray;
	}
	
	function getFirstP ($text, $tag = 'P') {
		$pos = stripos($text, '</p>');
		if ($pos === false) 
			$content = $text;
		else 
			$content = substr($text, 0, $pos+4);
		return $content;
	}
}
?>
