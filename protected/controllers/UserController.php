<?php

class UserController extends RController
{

    public function init()
    {
        // apply the theme dynamically
        $theme = Yii::app()->session['currentTheme'];
        if (!empty($theme))
            Yii::app()->theme = $theme;

        // if our class extends a class, we need this line too
        parent::init();
    }

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];

            $transaction = $model->dbConnection->beginTransaction();

            try
            {
                // first save user on users table
                if (!$model->save())
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
                $auth->userid = $model->id;
                $auth->data = 'N;';
                if (!$auth->save())
                {
                    $msg = 'Error in saving the role of the user.';
                    Yii::app()->user->setFlash('error', $msg);

                    // raise an exception
                    throw new CException($msg);
                }

                // third: creat a row in clients table for user
                $client = new Client('register');
                $client->UserId = $model->id;
                $client->Username = $model->username;
                
                // set a default country
                $countryId = Country::model()->find()->Id;
                $client->CountryId = $countryId;
                if (!$client->save())
                {
                    $msg = 'Error in saving the client.';
                    Yii::app()->user->setFlash('error', $msg);

                    // raise an exception
                    throw new CException($msg);
                }

                // forth: send email to the user
                $email = Yii::app()->email;
                $email->from = Yii::app()->params['adminEmail']; //admin's email in config/main.php file
                $email->to = $model->email;
                $email->subject = 'Registeration';
                $email->view = 'registerationConfirmEmail';
                $email->viewVars = array('username' => $model->username,
                    'emailAddress' => $model->email);
                // IMPORTANT LINE
                // there in no SMTP in Win7, so I commneted this line
                // in production machine(Ubuntu), uncomment it
                //$email->send();
                // fifth: commit the transaction
                $transaction->commit();

                // sexth: unset attributes
                $model->unsetAttributes();
                $model->password_repeat = '';
                $model->verifyCode = '';

                // seventh: show success message to the user
                $msg = 'Your have been successfully registered. An email will be sent to you soon.
                    (Email is disabled on win7, because it does not have SMTP support by default)';
                Yii::app()->user->setFlash('success', $msg);
            }
            catch (Exception $e)
            {
                $transaction->rollback();

                // show error message
                $msg = $e->getMessage();
                Yii::app()->user->setFlash('error', $msg);
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
        $model = $this->loadModel($id);
        $model->password_repeat = $model->password;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'updateMode' => '1', 
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest)
        {
            DebugBreak();
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
             
            // delete related records on the authassignment and clients tables
            // first  authassignment table
            $total = Authassignment::model()->count('userid = :id', array(':id' => $id));
            
            if ($total > 0)
            {
                $auth = Authassignment::model()->findAll('userid = :id', array(':id' => $id));
                for ($i = 0; $i < $total; $i++)
                {
                    $auth[$i]->delete();   
                }
               
            }
            
             // second clients table
            $total = Client::model()->count('UserId = :id', array(':id' => $id));
            
            if ($total > 0)
            {
                $client = Client::model()->findAll('UserId = :id', array(':id' => $id));
                for ($i = 0; $i < $total; $i++)
                {
                    $client[$i]->delete();   
                }
               
            }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    // This functions allows user just change his own information
    // Kamran
    public function actionUpdateMyself($id)
    {
        if ($id != Yii::app()->user->id)
        {
            $msg = 'Your are not allowed to change the information of other users.';
            Yii::app()->user->setFlash('error', $msg);
            $this->render('confirm');
        }
        else
        {
            $model = $this->loadModel($id);
            $model->password_repeat = $model->password;

            if (isset($_POST['User']))
            {
                $model->attributes = $_POST['User'];
                if ($model->save())
                {
                    $msg = 'Your information is changed successfully.';
                    Yii::app()->user->setFlash('success', $msg);
                    $this->render('confirm');
                    return;
                }
            }

            $this->render('update', array(
                'model' => $model,
                'updateMode' => '1',
            ));
        }
    }

}
