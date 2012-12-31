<?php

class UserController extends RController
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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
        $model->password_repeat = $model->password;
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
            $model=$this->loadModel($id);
            $model->password_repeat = $model->password;
            
            if(isset($_POST['User']))
            {
                $model->attributes=$_POST['User'];
                if($model->save())
                {
                    $msg = 'Your information is changed successfully.';
                    Yii::app()->user->setFlash('success', $msg);
                    $this->render('confirm'); 
                    return;
                }    
            }
            
            $this->render('update',array(
                'model'=>$model,
            ));
        }
    }
    
    // This functions allows admin reset the password of a 
    // user and send new pass by email to him/her
    // Kamran
    public function actionResetPassword()
    {
        $model = new PasswordResetForm();
        
        if(isset($_POST['PasswordResetForm']))
        {
            $user = User::model()->find('email = :emailAddress', 
                array(':emailAddress'=>$_POST['PasswordResetForm']['emailAddress']));    
            
            if (empty($user))
            {
                $msg = 'There is not such an email in DB.';
                Yii::app()->user->setFlash('error', $msg);
                $this->render('confirm'); 
                return;
            }
            
            // create a random pasword
            $pass = rand(1,9999999);
            $user->password = $pass;
            $user->password_repeat = $pass;
            
            if($user->save())
            {
                // send email to the user
                $email = Yii::app()->email;
                $email->from = Yii::app()->params['adminEmail']; //admin's email in config/main.php file
                $email->to = $model->emailAddress;
                $email->subject = 'Password reset';
                $email->view = 'passwordResetEmail';
                $email->viewVars = array('user'=>$user->username,
                    'pass'=>$pass);
                // IMPORTANT LINE
                // there in no SMTP in Win7, so I commneted this line
                // in production machine(Ubuntu), uncomment it
                
                //$email->send(); 
                    
                $msg = 'Password has been reseted successfully. An email will be sent to the user\'s email address containing new password.';
                Yii::app()->user->setFlash('success', $msg);      
            }
            else
            {
                $msg = 'Error in saving data.';
                Yii::app()->user->setFlash('error', $msg);
            }
            
            $this->render('confirm');
            return;
        }
        else
        {
            $this->render('resetPassword',array(
                'model'=>$model,
            ));
        }
    }
}
