<?php

class GalleryFolderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to 'column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
            'gallery'=>$this->loadGal(),
		));
	}

    private function loadGal()
    {
        if (!isset($_GET['gal']) || !is_numeric($_GET['gal']))
	        $this->redirect(array('/cms/gallery/admin'));

        return Gallery::model()->findByPk($_GET['gal']);
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GalleryFolder;

        $gallery = $this->loadGal();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryFolder']))
		{
			$model->attributes=$_POST['GalleryFolder'];
            $model->gallery_id = $gallery->id;
            $model->created = time();

            $model->image=CUploadedFile::getInstance($model,'image');
            $model->icon='galleryfolder_';

			if ($model->save()) {
                $model->icon.=$model->id;
                $ir = new ImageResizer($model->image->tempName);
                $opts = Yii::app()->getModule("cms")->gallery;
                $dim = explode('x',$opts['icon_size']);
                $ir->resizeLimitwh($dim[0],$dim[1],
                    $opts['storage_path'].$model->icon);
                $model->save();
				$this->redirect(array('/cms/gallery/view','id'=>$gallery->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'gallery'=>$gallery,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

        $gallery = $this->loadGal();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryFolder']))
		{
			$model->attributes=$_POST['GalleryFolder'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
            'gallery'=>$gallery,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
            $model = $this->loadModel();
            $file = $model->icon;
			// we only allow deletion via POST request
            if ($model->delete()) {
                @unlink(Yii::app()->getModule('cms')->gallery['storage_path'].$file);
            }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GalleryFolder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GalleryFolder('search');
		if(isset($_GET['GalleryFolder']))
			$model->attributes=$_GET['GalleryFolder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=GalleryFolder::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-folder-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
