<?php

/*
 * Author: Michał [balor] Thoma
 * Version: 1.0
 */

class CTaksonomyMenuWidget extends CWidget
{
    public $taksonomy_id;
    public $recursive = true;
    public $show_contents = true;
    public $menu_container_id = 'yiicms_taksonomymenu';

    //todo: all stuff below is an old simpleGalleryWidget...
    public function run()
    {
        Yii::import('application.modules.cms.models.Taksonomy');
        Yii::import('application.modules.cms.models.TaksonomyLinker');
        Yii::import('application.modules.cms.models.Content');

        if (isset($opts['in_row']) && is_numeric($opts['in_row']))
            $in_row = $opts['in_row'];
        else
            $in_row = 3;

        $gallery = Yii::createComponent('Gallery')->findByPk($this->gallery_id);
        if ($gallery == NULL)
            die('Wrong gallery id');

        if (isset($_GET['folder']) && is_numeric($_GET['folder'])) {
            $folder = Yii::createComponent('GalleryFolder')->findByPk($_GET['folder']);

            if ($folder != NULL) {
                print '<'.$this->header_tag.'>'.$gallery->name.
                    ' &raquo; '.$folder->name.'</'.$this->header_tag.'>';

                if ($this->current_page != NULL)
                    $addr = Yii::app()->createUrl(
                        $this->current_page[0],
                        $this->current_page[1]);
                else
                    $addr = Yii::app()->createUrl($_GET['r'],
                        array('view'=>$_GET['view']));

                print '&laquo; '.CHtml::link('Powrót',$addr);
                $images = Yii::createComponent('GalleryImage')->findAll(
                    'gallery_folder_id='.$folder->id);

                print '<br />';

                $this->owner->widget(
                    'application.modules.cms.extensions.querybox.CQueryboxWidget', 
                    array(
                        'yiicms_images' => $images,
                        'in_row' => $this->images['in_row'],
                    )
                );
            }
            else
                print 'Taki folder nie istnieje.';
        }
        else {
            $folders = Yii::createComponent('GalleryFolder')->findAll('gallery_id='.$this->gallery_id);

            print '<'.$this->header_tag.'>'.$gallery->name.'</'.$this->header_tag.'>';
            print '<table>';
            $in_row = $this->folders['in_row'];
            $i = 1;
            $last_was_tr = false;
            foreach ($folders as $folder) {
                if ($i % $in_row == 1)
                    print '<tr>';

                if (isset($opts['current_page']))
                    $addr = Yii::app()->createUrl($opts['current_page'][0],
                        array_merge(array('folder'=>$folder->id),
                        $this->current_page[1]));
                else
                    $addr = Yii::app()->createUrl($_GET['r'],
                        array('view'=>$_GET['view'],'folder'=>$folder->id));

                print '<td>'.
                    CHtml::link(
                        CHtml::image(
                            Yii::app()->createUrl('/cms/gallery/getImage',
                                array('f'=>$folder->icon)),
                            $folder->name
                        ),
                        $addr,
                        array('title'=>$folder->name)
                    ).
                    '<br />'.
                    CHtml::link(
                        $folder->name,
                        $addr,
                        array('title'=>$folder->name)
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
