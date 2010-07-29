<?php

class CmsModule extends CWebModule
{
    // assets dir, generated dynamicly in constructor
    public $assets = null;

    // enabled CMS submodules
    // currently avalible: content, gallery
    public $submodules = array(
        'content',
        'taksonomy',
    );

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

    // TODO: create a simpleContentRenderer insted getContent with rendering feature
    public function getContent($content_id, $opts = array())
    {
        $header = 'h1';
        if (isset($opts['header_tag']))
            $header = $opts['header_tag'];

        $content = Content::model()->findByPk($content_id);
        if ($opts['render']) {
            print '<'.$header.'>'.$content->name.'</'.$header.'>';
            print $content->html;
        }
        return $content->attributes;
    }

    public function getControlBox($logout_action)
    {
        if (!Yii::app()->user->isGuest) {
            return '<div style="border:1px solid #dfdfdf; margin:5px;'.
                    'padding:2px; background: #fafafa;">'.
                        'Zalogowany jako <strong>'.Yii::app()->user->name.'</strong>. '.
                        CHtml::link('Otwórz panel administracyjny', 
                            Yii::app()->createUrl('/cms/default/index')).' | '.
                        CHtml::link(CHtml::image($this->assets.'/door_in.png').' Wloguj się', Yii::app()->createUrl('/site/logout')).
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
		if (parent::beforeControllerAction($controller, $action))
			return true;
		else
			return false;
	}
}
