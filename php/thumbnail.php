//thumbnail
	function thumbnail($oimg) {
		$ordner = 'thumbnail';
		// @unlink($_SERVER['DOCUMENT_ROOT'].'/'.$ordner.'/'.$oimg);
		if( !file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$ordner.'/'.$oimg) ){
			$thumbsize = 30;
			list($imagewidth, $imageheight, $imagetype) = getimagesize($_SERVER['DOCUMENT_ROOT'].'/media/'.$oimg);
			$imageratio = $imagewidth/$imageheight;		  
			$thumbwidth = $thumbsize;
			$thumbheight = $thumbsize/$imageratio;
			// 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM

			// leeres Bild wird erstellt
			$thumb = imagecreatetruecolor($thumbwidth, $thumbheight);
			// Bilder werden geholt
			if( $imagetype == 1 ){
				$black=imagecolorallocate($thumb, 0,0,0);
				imagecolortransparent($thumb, $black);
				$image = imagecreatefromgif($_SERVER['DOCUMENT_ROOT'].'/media/'.$oimg);
			}
			elseif( $imagetype == 2 ){
				$image = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'].'/media/'.$oimg);
			}
			elseif( $imagetype == 3 ){
				$image = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'].'/media/'.$oimg);
				imagealphablending($thumb, false);
                imagesavealpha($thumb, true);
                $transparent = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
                imagefilledrectangle($thumb, 0, 0, $thumbwidth, $thumbheight, $transparent);
			}
			

			imagecopyresampled(
			    $thumb,
			    $image,
			    0, 0, 0, 0, // Startposition des Ausschnittes
			    $thumbwidth, $thumbheight,
			    $imagewidth, $imageheight
			);
			$thumbfile = $_SERVER['DOCUMENT_ROOT'].'/thumbnail/'.$oimg;
			if( $imagetype == 1 ){
				imagegif($thumb, $thumbfile);
			}
			elseif( $imagetype == 2 ){
				imagejpeg($thumb, $thumbfile);
			}
			elseif( $imagetype == 3 ){
				imagepng($thumb, $thumbfile);
			}
			imagedestroy($thumb);
			imagedestroy($image);



		}


		return $oimg;
	}
