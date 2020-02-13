<?php

 
class ImagizerImage {
 
    private $_image=0;
    private $_image_type=null;
    private $_height=null;
    private $_width=null;
    private $_filename=null;
    
    public function __construct($filename)
    {
        if (!file_exists($filename)) throw new RuntimeException('File not found');
        $image_info = getimagesize($filename);

        $this->_image_type=$image_info[2];
        $this->_width=$image_info[0];
        $this->_height=$image_info[1];
        $this->_filename=$filename;

        if( $this->_image_type == IMAGETYPE_JPEG ) {
            $this->_image = imagecreatefromjpeg($filename);
        } elseif( $this->_image_type == IMAGETYPE_GIF ) {
            $this->_image = imagecreatefromgif($filename);
        } elseif( $this->_image_type == IMAGETYPE_PNG ) {
            $this->_image = imagecreatefrompng($filename);
        } elseif( $this->_image_type == IMAGETYPE_BMP ) {
            $this->_image = self::imagecreatefrombmp($filename);
        }
    }

    public function save($filename='', $image_type=IMAGETYPE_JPEG, $compression=80, $permissions=null) {
        if (empty($filename)) $filename=$this->_filename;

        if( $image_type == IMAGETYPE_JPEG ) {
            if ($image_type!=$this->getType()){
                unlink($filename);
                self::changeExt('jpg',$filename);
                if($this->getType() == IMAGETYPE_PNG){
                    $new_image = imagecreatetruecolor($this->getWidth(), $this->getHeight());
                    $white = imagecolorallocate($new_image,  255, 255, 255);
                    imagefilledrectangle($new_image, 0, 0, $this->getWidth(), $this->getHeight(), $white);
                    imagecopy($new_image, $this->_image, 0, 0, 0, 0, $this->getWidth(), $this->getHeight());
                    $this->_image = $new_image;
                }
            }
            if($compression < 30)
                $compression = 30;
            elseif($compression > 95)
                $compression = 95;
            imagejpeg($this->_image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
        
            imagegif($this->_image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->_image,$filename,round((100 - $compression) / 10) );
        } elseif( $image_type == IMAGETYPE_BMP ) {
        
            self::imagebmp($filename, $this);
        }
        else {
            return false;
        }
        if(!empty($permissions)) {
        
            chmod($filename,$permissions);
        }

        $this->resizeToWidth(defined('GSIMAGEWIDTH') ? GSIMAGEWIDTH : 200);

        $path = isset($_POST['path']) ? $_POST['path']."/" : '';
        $thumbsPath = GSTHUMBNAILPATH.$path;

        if (!(file_exists($thumbsPath))) {
            if (defined('GSCHMOD')) {
                $chmod_value = GSCHMOD;
            } else {
                $chmod_value = 0755;
            }
            mkdir($thumbsPath, $chmod_value);
        }
        $thumbnailFile = $thumbsPath . "thumbnail." . basename($filename);
        switch($image_type){
            case IMAGETYPE_JPEG:
                imagejpeg($this->_image,$thumbnailFile,85);
                break;
            case IMAGETYPE_PNG:
                imagepng($this->_image,$thumbnailFile);
                break;
            case IMAGETYPE_GIF:
                imagegif($this->_image,$thumbnailFile);
                break;
        }

        return $this;
    }

    public function getImageResource() {
        return $this->_image;
    }
    
    public function getWidth() {
        return $this->_width;
    }
    public function getHeight() {
        return $this->_height;
    }
    
    public function getType(){
        return $this->_image_type; 
    }
    
    public function getFilename(){
        return $this->_filename;
    }
    
    public function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }
    
    public function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getHeight() * $ratio;
        $this->resize($width,$height);
    }
    
    public function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getHeight() * $scale/100;
        $this->resize($width,$height);
    }
    
    public function resize($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagealphablending($new_image, false);
        imagesavealpha($new_image, true);
        imagecopyresampled($new_image, $this->_image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->_image = $new_image;
        $this->_height=imagesy($this->_image);
        $this->_width=imagesx($this->_image);
    }     
    
    public function cropCenter($w,$h){
        $new_image = imagecreatetruecolor($w, $h);
        imagealphablending($new_image, false);
        imagesavealpha($new_image, true);
        $delta_w=abs($w-$this->getWidth());
        $delta_h=abs($h-$this->getHeight());
           
        if ($delta_w<$delta_h) {
            $this->resizeToWidth($w);
            imagecopy($new_image,$this->_image,0,0,0,round(($this->getHeight()-$h)/2),$w,$h);
        }
        else {
            $this->resizeToHeight($h);
            imagecopy($new_image,$this->_image,0,0,round(($this->getWidth()-$w)/2),0,$w,$h);
        }
        $this->_image = $new_image;
        $this->_height=imagesy($this->_image);
        $this->_width=imagesx($this->_image);
    }
    
    public function fitMin($min_w,$min_h){
        $delta_w=$min_w-$this->getWidth();
        $delta_h=$min_h-$this->getHeight();
        
        if ($delta_h>0 || $delta_w>0){
            if ($delta_h>$delta_w) $this->resizeToHeight($min_h);
            else $this->resizeToWidth($min_w);
        }
    } 
    
    public function fitMax($max_w,$max_h){
        $delta_w=$this->getWidth()-$max_w;
        $delta_h=$this->getHeight()-$max_h;
        
        if ($delta_h>0 || $delta_w>0){
            if ($delta_h>$delta_w) $this->resizeToHeight($max_h);
            else $this->resizeToWidth($max_w);
        }
    }
    
    public function applyWatermark($filename){
        $wm = imagecreatefrompng($filename);

        $marge_right = 10;
        $marge_bottom = 10;
        $wmx = imagesx($wm);
        $wmy = imagesy($wm);

        return imagecopy($this->_image, $wm, $this->getWidth() - $wmx - $marge_right, $this->getHeight() - $wmy - $marge_bottom, 0, 0, $wmx, $wmy) || imagedestroy($wm);
    }
    
    public static function imagecreatefrombmp($filename){
        $file = fopen($filename,"rb"); 
        $read = fread($file,10); 
        while(!feof($file)&&($read<>"")) $read.=fread($file,1024); 
        $temp = unpack("H*",$read); 
        $hex = $temp[1]; 
        $header = substr($hex,0,108); 
        if (substr($header,0,4)=="424d") 
        { 
            $header_parts=str_split($header,2); 
            $width=hexdec($header_parts[19].$header_parts[18]); 
            $height=hexdec($header_parts[23].$header_parts[22]); 
            unset($header_parts); 
        } 
        $x=0; 
        $y=1; 
        $image=imagecreatetruecolor($width,$height); 
        $body=substr($hex,108); 
        $body_size=(strlen($body)/2); 
        $header_size=($width*$height);  
        $usePadding=($body_size>($header_size*3)+4); 
        $old_r=0;
        $old_b=0;
        $old_g=0;
        for ($i=0;$i<$body_size;$i+=3) 
        { 
            if ($x>=$width) 
            { 
                if ($usePadding) $i+=$width%4; 
                $x=0; 
                $y++; 
                if ($y>$height) break; 
            } 
            $i_pos=$i*2; 
            
            // need speed improvement, each hexdec costs 250 ms
            //$r=hexdec($body[$i_pos+4].$body[$i_pos+5]); 
            //$g=hexdec($body[$i_pos+2].$body[$i_pos+3]); 
            //$b=hexdec($body[$i_pos].$body[$i_pos+1]);
            //hexdec was optimized, 3 times speed win
            // the new revolutional way to convert numbers from dec to hex =)
            $r='0x'.$body[$i_pos+4].$body[$i_pos+5]; 
            $g='0x'.$body[$i_pos+2].$body[$i_pos+3];
            $b='0x'.$body[$i_pos].$body[$i_pos+1];
            if (!($r==$old_r && $g==$old_g && $b==$old_b)){
               $old_r=$r;
               $old_g=$g;
               $old_b=$b; 
               $color=imagecolorallocate($image,$r,$g,$b);
            }
            imagesetpixel($image,$x,$height-$y,$color); 
            $x++; 
        }
        return $image;
    }
    
    public static function imagebmp($filename, ImagizerImage $image){
      $widthFloor = ((floor($image->getWidth()/16))*16);
      $widthCeil = ((ceil($image->getWidth()/16))*16);
      $img_width=$image->getWidth();
      $height=$image->getHeight();
      $img_res = $image->getImageResource();
      $size = ($widthCeil*$height*3)+54;
      $result = 'BM';     
      $result .= self::int_to_dword($size); // size of file (4b)
      $result .= self::int_to_dword(0); // reserved (4b)
      $result .= self::int_to_dword(54);  // byte location in the file which is first byte of IMAGE (4b)
      // Bitmap Info Header
      $result .= self::int_to_dword(40);  // Size of BITMAPINFOHEADER (4b)
      $result .= self::int_to_dword($widthCeil);  // width of bitmap (4b)
      $result .= self::int_to_dword($height); // height of bitmap (4b)
      $result .= self::int_to_word(1);  // biPlanes = 1 (2b)
      $result .= self::int_to_word(24); // biBitCount = {1 (mono) or 4 (16 clr ) or 8 (256 clr) or 24 (16 Mil)} (2b)
      $result .= self::int_to_dword(0); // RLE COMPRESSION (4b)
      $result .= self::int_to_dword(0); // width x height (4b)
      $result .= self::int_to_dword(0); // biXPelsPerMeter (4b)
      $result .= self::int_to_dword(0); // biYPelsPerMeter (4b)
      $result .= self::int_to_dword(0); // Number of palettes used (4b)
      $result .= self::int_to_dword(0); // Number of important colour (4b) 
      // is faster than chr()
      $arrChr = array();
      for($i=0; $i<256; $i++){
        $arrChr[$i] = chr($i);
      }
      // creates image data
      $bgfillcolor = array("red"=>0, "green"=>0, "blue"=>0);
      // bottom to top - left to right - attention blue green red !!!
      $y=$height-1;
      for ($y2=0; $y2<$height; $y2++) {
        for ($x=0; $x<$widthFloor;  ) {
          $rgb=imagecolorat($img_res, $x++, $y);
          $result.=$arrChr[$rgb & 0xFF].$arrChr[($rgb >> 8) & 0xFF].$arrChr[($rgb >> 16) & 0xFF];
        }
        for ($x=$widthFloor; $x<$widthCeil; $x++) {
          $rgb = ($x<$img_width) ? imagecolorsforindex($img_res, imagecolorat($img_res, $x, $y)) : $bgfillcolor;
          $result .= $arrChr[$rgb["blue"]].$arrChr[$rgb["green"]].$arrChr[$rgb["red"]];
        }
        $y--;
      }
      
        $file = fopen($filename, "wb");
        fwrite($file, $result);
        fclose($file);
        return true;
    }
    
    // imagebmp helpers
    private static function int_to_dword($n){
      return chr($n & 255).chr(($n >> 8) & 255).chr(($n >> 16) & 255).chr(($n >> 24) & 255);
    }
    private static function int_to_word($n){
      return chr($n & 255).chr(($n >> 8) & 255);
    }
    
    
    private static function changeExt($new_ext,&$filename){
        $filename=substr_replace($filename,$new_ext,strrpos($filename,'.')+1);
    }
    
}
?>