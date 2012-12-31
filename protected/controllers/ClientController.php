<?php

class ClientController extends RController
{
    public function init() 
    {
        // apply the theme dynamically
        $theme=Yii::app()->session['currentTheme'];
        if (!empty($theme))
            Yii::app()->theme=$theme;
    
        // if our class extends a class, we need this line too
        parent::init();
    }
    
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		 return array(
            'rights',
        );
	}

	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Client;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

        if (isset($_POST['Client']))
        {
            $hasPicture = true; 
            $model->attributes = $_POST['Client'];
            
            // encrypt critical data before save
            $this->_encryptClient($model);
            
            $uploadedFile=CUploadedFile::getInstance($model,'Image');
            
            if($uploadedFile === NULL || empty($uploadedFile))
            {
                $model->Image = $model->Name;
                
                // create a default flag picture
                $file = Yii::app()->basePath.'/../images_client/'.'default.jpg';
                $toFile = Yii::app()->basePath.'/../images_client/'.$model->Name;
                copy($file,$toFile);
                
                $hasPicture = false;   
            }
            else
            {
                $fileName = $model->Name.'_'.$uploadedFile;  
                $model->Image = $fileName;
            }
            
            if ($model->save())
            {
                if ($hasPicture)
                {
                    $image = Yii::app()->basePath.'/../images_client/'.$fileName;
                    // image will uplode to rootDirectory/images_client/
                    $uploadedFile->saveAs($image);
                }  
                $this->redirect(array('view','id'=>$model->Id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

        if (isset($_POST['Client']))
        {
            if ($model->Image === NULL || empty($model->Image))
            {
                $model->Image = $model->Name.'_'.rand(1,999999);
            }
            
            $_POST['Client']['Image'] = $model->Image; 
            
            $model->attributes = $_POST['Client'];
            
            // encrypt critical data before save
            $this->_encryptClient($model);
            
            $uploadedFile=CUploadedFile::getInstance($model,'Image'); 
            
            if($model->save())
            {
                if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $image = Yii::app()->basePath.'/../images_client/'.$model->Image;
                    $uploadedFile->saveAs($image);
                }
                $this->redirect(array('view','id'=>$model->Id));
            }
        }
        
        // decrypt critical data before save
        $this->_decryptClient($model);

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Client');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    // Encrypt some private data of user
    public function _encryptClient(&$model)
    {
        // read global variable from /protected/config/main.php file
        $key = Yii::app()->params['key'];
        
        $model->PassportNumber = AES::aes256Encrypt($key,$model->PassportNumber);
        $model->CreditCardType = AES::aes256Encrypt($key,$model->CreditCardType);
        $model->CreditCardExpiryDate = AES::aes256Encrypt($key,$model->CreditCardExpiryDate);
        $model->CreditCardHolderName = AES::aes256Encrypt($key,$model->CreditCardHolderName);
        $model->CreditCardSecurityNumber = AES::aes256Encrypt($key,$model->CreditCardSecurityNumber);
        $model->CreditCardNumber = AES::aes256Encrypt($key,$model->CreditCardNumber);
    }
    
    // Decrypt some private data of user
    public function _decryptClient(&$model)
    {
        // read global variable from /protected/config/main.php file
        $key = Yii::app()->params['key'];
        
        $model->PassportNumber = AES::aes256Decrypt($key,$model->PassportNumber);
        $model->CreditCardType = AES::aes256Decrypt($key,$model->CreditCardType);
        $model->CreditCardExpiryDate = AES::aes256Decrypt($key,$model->CreditCardExpiryDate);
        $model->CreditCardHolderName = AES::aes256Decrypt($key,$model->CreditCardHolderName);
        $model->CreditCardSecurityNumber = AES::aes256Decrypt($key,$model->CreditCardSecurityNumber);
        $model->CreditCardNumber = AES::aes256Decrypt($key,$model->CreditCardNumber);
    }
    
       // This functions allows user just change his own information
    // Kamran
    public function actionUpdateMyself($id)
    {
        if($id != Yii::app()->user->id)
        {
          $msg = 'Your are not allowed to change the information of other users.';
          Yii::app()->user->setFlash('error', $msg);
          $this->render('confirm');  
        }
        else
        {
            $clientId = Client::model()->find('UserId = :id', array(':id' => $id))->Id;
            $model=$this->loadModel($clientId);
        
            if (isset($_POST['Client']))
            {
                if ($model->Image === NULL || empty($model->Image))
                {
                    $model->Image = $model->Name.'_'.rand(1,999999);
                }
                
                $_POST['Client']['Image'] = $model->Image; 
                
                $model->attributes = $_POST['Client'];
                
                // encrypt critical data before save
                $this->_encryptClient($model);
                
                $uploadedFile=CUploadedFile::getInstance($model,'Image'); 
                
                if($model->save())
                {
                    if(!empty($uploadedFile))  // check if uploaded file is set or not
                    {
                        $image = Yii::app()->basePath.'/../images_client/'.$model->Image;
                        $uploadedFile->saveAs($image);
                    }
                    $msg = 'Your information is changed successfully.';
                    Yii::app()->user->setFlash('success', $msg);
                    $this->render('confirm'); 
                    return;
                }
            }
            
            // decrypt critical data before save
            $this->_decryptClient($model);

            $this->render('update',array(
                'model'=>$model,
            ));
        }
    }
}
