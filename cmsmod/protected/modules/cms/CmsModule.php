<?php

class CmsModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'cms.models.*',
			'cms.components.*',
		));

        $baseDir = dirname(__FILE__);
        $assets = Yii::app()->getAssetManager()->publish(
            $baseDir.DIRECTORY_SEPARATOR.'assets');
        Yii::app()->getClientScript()->registerCssFile(
            $assets.'/cmsmod.css');

	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
