<?php
 /*
 * Author: Michał [balor] Thoma
 * Version: 1.0
 *
 * This Yii component will resize the given image
 * and can show on the fly or save as image file.  
 */

class ImageResizer extends CComponent
{ 
    private $img_file=""; 
    private $imagick_obj=null;
    private $img_width=0; 
    private $img_height=0; 
    private $img_size=0;
    private $_error=""; 
     
    /**
     * ImageResizer constructor
     *
     * @param path to image file
     */
    function ImageResizer($img_file="") 
    { 
        if (!extension_loaded('imagick')) {
            $this->_error="Error: ImageMagick library is not available."; 
            return false;
        }

        if (!empty($img_file)) {
            $this->setImage($img_file); 
        }
    } 

    /** 
     * Error occured while resizing the image. 
     * 
     * @return String  
     */ 
    public function error() 
    { 
        return $this->_error; 
    } 

    /** 
     * Set image file name 
     * 
     * @param String $imgFile 
     * @return void 
     */ 
    public function setImage($img_file) 
    { 
        $this->img_file=$img_file; 
        return $this->_createImage(); 
    } 

    /** 
     * Resize a image to given width and height and keep it's current width and height ratio 
     *  
     * @param Number $imgwidth 
     * @param Numnber $imgheight 
     * @param String $newfile 
     */ 
    public function resizeLimitwh($imgwidth, $imgheight, $newfile=null) 
    { 
        $new_dimensions = $this->_scaleImage(
            $this->img_width, $this->img_height, // actual dimensions
            $imgwidth, $imgheight //dimensions limit
        ); 

        return $this->resize(
            $new_dimensions[0], // height
            $new_dimensions[1], // width
            $newfile // optional new file name
        ); 
    } 

    /** 
     * Resize an image to given width and height 
     * 
     * @param Number $width 
     * @param Number $height 
     * @param String $newfile 
     * @return void 
     */ 
    public function resize($width, $height, $newfile = null) 
    { 
        if ($this->img_width <= 0 || $this->img_height <= 0) { 
            $this->_error="Could not resize given image"; 
            return false; 
        } 

        if ($width <= 0) {
            $width = $this->img_width; 
        }
        if ($height <= 0) {
            $height = $this->img_height; 
        }

        $this->imagick_obj->thumbnailImage($width, $height);

        if ($newfile != null) {
            $this->saveAs($newfile);
        }
    } 

    /**
     * Save file as file
     *
     * @param String New filename
     */
    public function saveAs($newfile = null)
    {
        if ($newfile != null) {
        Yii::trace($newfile,
            "application.modules.dbfs.components.DBFS");
            $this->imagick_obj->writeImage($newfile);
        }
    }

    /**
     * Print or return image
     *
     * @param Boolean If set to true, returning image contents instead printing it
     */
    public function printOut($return = false)
    {
        if ($return)
            return $this->imagick_obj . '';
        else
            echo $this->imagick_obj;
    }

    public function getImageData()
    {
        return array(
            'size'=>$this->img_size,
            'width'=>$this->img_width,
            'height'=>$this->img_height,
        );
    }

    /** 
     * Create the image resource  
     * @access Private 
     * @return Boolean 
     */ 
    private function _createImage() 
    { 
        $this->imagick_obj = new Imagick($this->img_file);

        if (!$this->imagick_obj || $this->imagick_obj == null) {
            return false;
        }

        $this->img_width = $this->imagick_obj->getImageWidth();
        $this->img_height = $this->imagick_obj->getImageHeight();
        $this->img_size = $this->imagick_obj->getImageLength();

        Yii::trace(print_r(array($this->img_width, $this->img_height, $this->img_file), true),
            "application.modules.dbfs.components.DBFS");
        return true; 
    } 

    /**
     * Calculate new image dimensions to new constraints
     *
     * @param Original X size in pixels
     * @param Original Y size in pixels
     * @return New X maximum size in pixels
     * @return New Y maximum size in pixels
     */
    private function _scaleImage($x, $y, $cx, $cy)
    {
        //Set the default NEW values to be the old, in case it doesn't even need scaling
        list($nx,$ny)=array($x,$y);
        
        //If image is generally smaller, don't even bother
        if ($x>=$cx || $y>=$cx) {
            //Work out ratios
            if ($x>0) $rx=$cx/$x;
            if ($y>0) $ry=$cy/$y;
            
            //Use the lowest ratio, to ensure we don't go over the wanted image size
            if ($rx>$ry) {
                $r=$ry;
            } else {
                $r=$rx;
            }
            
            //Calculate the new size based on the chosen ratio
            $nx=intval($x*$r);
            $ny=intval($y*$r);
        }    
        
        //Return the results
        return array($nx,$ny);
    }
} 
?>
