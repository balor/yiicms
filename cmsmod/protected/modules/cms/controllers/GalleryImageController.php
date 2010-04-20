<?php

class GalleryImageController extends Controller
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
            ),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','view','update','delete'),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
            ),*/
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
        $t = $this->loadGaldata();
        $gallery = $t[0];
        $gallery_folder = $t[1];

		$this->render('view',array(
			'model'=>$this->loadModel(),
            'gallery'=>$t[0],
            'gallery_folder'=>$t[1],
		));
	}

    private function loadGaldata()
    {
        $id = 0;
        if (isset($_GET['gal']) && is_numeric($_GET['gal']))
            $id = $_GET['gal'];
        else if (isset($_POST['gal']) && is_numeric($_POST['gal']))
            $id = $_POST['gal'];
        else
	        $this->redirect(array('/cms/gallery/admin'));

        $gallery = Gallery::model()->findByPk($id);

        $id = 0;
        if (isset($_GET['galfol']) && is_numeric($_GET['galfol']))
            $id = $_GET['galfol'];
        else if (isset($_POST['galfol']) && is_numeric($_POST['galfol']))
            $id = $_POST['galfol'];
        else
	        $this->redirect(array('/cms/gallery/admin'));

        $gallery_folder = GalleryFolder::model()->findByPk($id);
        return array($gallery, $gallery_folder);
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GalleryImage;

        $t = $this->loadGaldata();
        $gallery = $t[0];
        $gallery_folder = $t[1];
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryImage']))
		{
			$model->attributes=$_POST['GalleryImage'];
            $model->gallery_folder_id = $gallery_folder->id;
            $model->created = time();

            $model->image=CUploadedFile::getInstance($model,'image');
            $model->image_filename='galleryimage_';

			if ($model->save()) {
                $model->image_filename.=$model->id;
                if ($model->image!=NULL) {
                    $ir = new ImageResizer($model->image->tempName);
                    $opts = Yii::app()->getModule("cms")->gallery;
                    $dim = explode('x',$opts['thumbnail_size']);
                    $p = $ir->getImageData();
                    $model->image_dimensions = $p['width'].'x'.$p['height'];
                    $model->image_size = $p['size'];
                    $ir->saveAs($opts['storage_path'].$model->image_filename);
                    $ir->resizeLimitwh($dim[0],$dim[1],
                        $opts['storage_path'].$model->image_filename.'_t');
                }
                $model->save();
				$this->redirect(array('/cms/galleryFolder/view','id'=>$gallery_folder->id, 'gal'=>$gallery->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'gallery'=>$t[0],
            'gallery_folder'=>$t[1],
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

        $t = $this->loadGaldata();
        $gallery = $t[0];
        $gallery_folder = $t[1];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GalleryImage']))
		{
			$model->attributes=$_POST['GalleryImage'];
            $model->image = CUploadedFile::getInstance($model,'image');

			if ($model->save()) {
                if ($model->image!=NULL) {
                    // tools!
                    $ir = new ImageResizer($model->image->tempName);
                    $opts = Yii::app()->getModule("cms")->gallery;
                    $dim = explode('x',$opts['thumbnail_size']);

                    // new img params
                    $p = $ir->getImageData();
                    $model->image_dimensions = $p['width'].'x'.$p['height'];
                    $model->image_size = $p['size'];

                    // unlink old files
                    $storage_path = $opts['storage_path'];
                    @unlink($storage_path.$file);
                    @unlink($storage_path.$file.'_t');

                    // save new files
                    $ir->saveAs($opts['storage_path'].$model->image_filename);
                    $ir->resizeLimitwh($dim[0],$dim[1],
                        $opts['storage_path'].$model->image_filename.'_t');

                    // save model
                    $model->save();
                }
                $this->redirect(array(
                    '/cms/galleryImage/view',
                    'id'=>$model->id,
                    'galfol'=>$gallery_folder->id, 
                    'gal'=>$gallery->id
                ));
            }
		}

		$this->render('update',array(
			'model'=>$model,
            'gallery'=>$t[0],
            'gallery_folder'=>$t[1],
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
            $file = $model->image_filename;
			// we only allow deletion via POST request
            if ($model->delete()) {
                $storage_path = Yii::app()->getmodule('cms')->gallery['storage_path'];
                @unlink($storage_path.$file);
                @unlink($storage_path.$file.'_t');
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
		$dataProvider=new CActiveDataProvider('GalleryImage');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GalleryImage('search');
		if(isset($_GET['GalleryImage']))
			$model->attributes=$_GET['GalleryImage'];

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
				$this->_model=GalleryImage::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
