<?php

class CmsModule extends CWebModule
{
    // assets dir, generated dynamicly in constructor
    public $assets = null;

    // enabled CMS submodules
    // currently avalible: content, gallery
    public $submodules = array("content");

    // content submodule settings
    public $content = array(
        'use_editor'=>false,
    );

    // gallery submodule settings
    public $gallery = array(
        'storage_path'=>'/tmp/',
        'icon_size'=>'100x100',
        'thumbnail_size'=>'100x100',
    );

	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'cms.models.*',
			'cms.components.*',
		));

        $baseDir = dirname(__FILE__);
        $assets = Yii::app()->getAssetManager()->publish(
            $baseDir.DIRECTORY_SEPARATOR.'assets');
        $this->assets = $assets;
        Yii::app()->getClientScript()->registerCssFile(
            $assets.'/cmsmod.css');
	}

    // TODO: basic renderery nie powinny sie tutaj znajdowac <_<
    // TODO: renderery przeniesc do widgetow
    // TODO: dorobic locki przy nie-zaladowanych modulach
    public function getContent($content_id, $module = 'content', $opts = array())
    {
        $header = 'h1';
        if (isset($opts['header_tag']))
            $header = $opts['header_tag'];

        switch ($module) {

        case 'content':
            $content = Content::model()->findByPk($content_id);
            if ($opts['render']) {
                print '<'.$header.'>'.$content->name.'</'.$header.'>';
                print $content->html;
            }
            return $content->attributes;

        case 'gallery':
            /*$arr = array();
            $arr['gallery'] = Gallery::model()->findByPk($content_id);

            if (isset($opts['folder']) && is_numeric($opts['folder'])) {
                $arr['folder'] = GalleryFolder::model()->findByPk($opts['folder']);
                $arr['images'] = GalleryImage::model()->findAll('gallery_folder_id='.$opts['folder']);
            }
            else {
                $arr['folders'] = GalleryFolder::model()->findAll('gallery_id='.$content_id);
            }

            if ($opts['render']) {
                if (isset($opts['in_row']) && is_numeric($opts['in_row']))
                    $in_row = $opts['in_row'];
                else
                    $in_row = 3;

                if (isset($_GET['folder']) && is_numeric($_GET['folder'])) {
                    $folder = GalleryFolder::model()->findByPk($_GET['folder']);
                    if ($folder != NULL) {
                        print '<'.$header.'>'.$arr['gallery']->name.
                            ' &raquo; '.$folder->name.'</'.$header.'>';
                        if (isset($opts['current_page']))
                            $addr = Yii::app()->createUrl(
                                $opts['current_page'][0],
                                $opts['current_page']['1']);
                        else
                            $addr = Yii::app()->createUrl($_GET['r'],
                                array('view'=>$_GET['view']));
                        print '&laquo; '.CHtml::link(
                            'Powrót',
                            $addr
                        );
                        $images = GalleryImage::model()->findAll(
                            'gallery_folder_id='.$folder->id);

                        CWidgetFactory->createWidget(
                            null,
                            'application.modules.cms.extensions.querybox.CQueryboxWidget', 
                            array(
                                'yiicms_images' => $images,
                            )
                        );
                    }
                    else
                        print 'Taki folder nie istnieje.';
                }
                else {
                    if (isset($arr['folders']))
                        $folders = $arr['folders'];
                    else
                        $folders = GalleryFolder::model()->findAll('gallery_id='.$content_id);

                    print '<'.$header.'>'.$arr['gallery']->name.'</'.$header.'>';
                    print '<table>';
                    $i = 1;
                    $last_was_tr = false;
                    foreach ($folders as $folder) {
                        if ($i % $in_row == 1)
                            print '<tr>';

                        if (isset($opts['current_page']))
                            $addr = Yii::app()->createUrl($opts['current_page'][0],
                                array_merge(array('folder'=>$folder->id), $opts['current_page']['1']));
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

            return $arr;*/
        }
    }

    public function getControlBox($logout_action)
    {
        if (!Yii::app()->user->isGuest) {
            return '<div style="border:1px solid #dfdfdf; margin:5px;'.
                    'padding:2px; background: #fafafa;">'.
                        'Zalogowany jako <strong>'.Yii::app()->user->name.'</strong>. '.
                        CHtml::link('Otwórz panel administracyjny', 
                            Yii::app()->createUrl('/cms/default/index')).' | '.
                        CHtml::link('Wyloguj się', Yii::app()->createUrl('/site/logout')).
                '</div>';
        }
        return '';
    }

    public function submoduleLoaded($submodule)
    {
        return in_array($submodule, $this->submodules);
    }

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)){
			return true;
		}
		else
			return false;
	}
}
