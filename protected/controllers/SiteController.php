<?php

class SiteController extends Controller
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
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
            
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    
    public function actionAbout()
    {
       $this->render('about'); 
    }
               
    // changes the theme of website
    public function actionChangeTheme($name)
    {
       Yii::app()->theme = $name;
       
       // save theme's name on the session variable
       Yii::app()->session['currentTheme']= $name;
       
       $this->render('index');
    }
    
    // registers new user
     public function actionRegister()
     {
         $model=new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {                                      
            $model->attributes=$_POST['User'];
            $transaction=$model->dbConnection->beginTransaction();
            try
            {
                // first save user on users table
                if(!$model->save())
                {
                    $msg = 'Error in saving user.';
                    Yii::app()->user->setFlash('error', $msg);
                    
                    // raise an exception
                    throw new CException($msg);
                }
                
                // second: add a row to authassignment table to
                // make this user as authenticated user
                // first save user on users table
                
                $auth = new Authassignment(); 
                $auth->itemname = 'Authenticated';
                $auth->userid =  $model->id;
                $auth->data = 'N;';
                if(!$auth->save())
                {
                    $msg = 'Error in saving the role of the user.';
                    Yii::app()->user->setFlash('error', $msg);
                    
                    // raise an exception
                    throw new CException($msg);
                }
                
            //send email to the user
                $email = Yii::app()->email;
                $email->from = Yii::app()->params['adminEmail']; //admin's email in config/main.php file
                $email->to = $model->email;
                $email->subject = 'Registeration';
                $email->view = 'emailConfirm';
                $email->viewVars = array('username'=>$model->username,
                    'emailAddress'=>$model->email);
                // IMPORTANT LINE
                // there in no SMTP in Win7, so I commneted this line
                // in production machine(Ubuntu), uncomment it
                
                //$email->send();   
                
                // show success message to the user
                $msg = 'Your have been successfully registered. An email will be sent to you soon.
                    (Email is disabled on win7, because it does not have SMTP support by default)';
                Yii::app()->user->setFlash('success', $msg);
                    
                $transaction->commit();
                $model->unsetAttributes();
            }
            catch(Exception $e)
            {
                $transaction->rollback();
                
                // show error message
                $msg = $e->getMessage();
                Yii::app()->user->setFlash('error', $msg);
            }
        }

        $this->render('register',array(
            'model'=>$model,
        ));
     }
}