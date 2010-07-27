<?php

/*
 * Author: Michał [balor] Thoma
 * Version: 1.0
 */

class CJQueryImgBoxWidget extends CWidget
{
    /*
     * Array of manual image data
     * array(
     *  array(
     *      'path'=>'path to image',
     *      'title'=>'image title',
     *      'thumb'=>array(
     *          'path'=>'path to thumb',
     *          'alt'=>'alt of thumb',
     *      )
     *  ),
     *  [...]
     * )
     */
    public $images = array();

    /*
     * Array of YiiCMS GalleryImage AR objects
     * objects are translated and added to $images array
     */
    public $yiicms_images = array();

    /*
     * ID of an image html container
     */
    public $gallery_object_id = 'jqueryimgbox-gallery';

    /*
     * Item count in table row when more than one image is passed
     */
    public $in_row = 3;

    public function run()
    {
        $imgs = $this->images;

        // adding cms images to main images array
        if (count($this->yiicms_images) > 0) {
            foreach ($this->yiicms_images as $img) {
                $imgs[] = array(
                    'path'=>Yii::app()->createUrl('/cms/gallery/getImage', 
                        array('f'=>$img->image_filename)),
                    'title'=>$img->name,
                    'thumb'=>array(
                        'path'=>Yii::app()->createUrl('/cms/gallery/getImage', 
                            array('f'=>$img->image_filename.'_t')),
                        'alt'=>$img->name,
                    ),
                ); 
            }
        }

        $img_count = count($imgs);
        if ($img_count <= 0)
            die();

        $dir = dirname(__FILE__);
        $asset_dir = Yii::app()->getAssetManager()->publish($dir.'/jquery-lightbox/');
  		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCssFile($asset_dir.'/css/jquery.lightbox-0.5.css', 'screen');
		$cs->registerScriptFile($asset_dir.'/js/jquery.lightbox-0.5.min.js');
        $js = 
        '$(document).ready(function(){'.
        '$("#'.$this->gallery_object_id.' a").lightBox({
            overlayOpacity:         0.9,
            imageLoading:           "'.$asset_dir.'/images/lightbox-ico-loading.gif",
            imageBtnPrev:			"'.$asset_dir.'/images/lightbox-btn-prev.gif",	
            imageBtnNext:			"'.$asset_dir.'/images/lightbox-btn-next.gif",	
            imageBtnClose:			"'.$asset_dir.'/images/lightbox-btn-close.gif",
            imageBlank:				"'.$asset_dir.'/images/lightbox-blank.gif",	            

        });'.
        '});';
        $cs->registerScript('CQueryboxWidget'.time(), $js, CClientScript::POS_HEAD);

        if ($img_count == 1) {
            print '<div id="'.$this->gallery_object_id.'">'.CHtml::link(
                CHtml::image($imgs[0]['thumb']['path'], $imgs[0]['thumb']['alt']),
                $imgs[0]['path'],
                array('title'=>$imgs[0]['title'])
            ).'</div>';
        }
        else {
            $in_row = $this->in_row;
            $i = 1;
            $last_was_tr = false;
            print '<table id="'.$this->gallery_object_id.'">';
            foreach ($imgs as $img) {
                if ($i % $in_row == 1)
                    print '<tr>';

                print '<td>'.
                    CHtml::link(
                        CHtml::image($img['thumb']['path'], $img['thumb']['alt']),
                        $img['path'],
                        array('title'=>$img['title'])
                    ).
                    '</td>';
                $last_was_tr = false;
                if ($i % $in_row == 0) {
                    print '</tr>';
                    $last_was_tr = true;
                }
                $i++;
            }
            if ($last_was_tr == false) {
                for ($a=($i%$in_row);$a>=0;$a--)
                    print '<td>&nbsp;</td>';
                print '</tr>';
            }
            print '</table>';
        }
    }
}
