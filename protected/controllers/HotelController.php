<?php

class HotelController extends RController
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
        $model = new Hotel;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Hotel']))
        {
            $hasPicture = true;
            $model->attributes = $_POST['Hotel'];
            $uploadedFile = CUploadedFile::getInstance($model, 'Image');

            if ($uploadedFile === NULL || empty($uploadedFile))
            {
                $model->Image = $model->Name;

                // create a default flag picture
                $file = Yii::app()->basePath . '/../images/hotel/' . 'default.jpg';
                $toFile = Yii::app()->basePath . '/../images/hotel/' . $model->Name;
                copy($file, $toFile);

                $hasPicture = false;
            }
            else
            {
                $fileName = $model->Name . '_' . $uploadedFile;
                $model->Image = $fileName;
            }

            if ($model->save())
            {
                if ($hasPicture)
                {
                    $image = Yii::app()->basePath . '/../images/hotel/' . $fileName;
                    // image will uplode to rootDirectory/images/hotel/
                    $uploadedFile->saveAs($image);
                }
                $message = 'TA LOG: New Hotel created by user = ' . Yii::app()->user->id;
                Yii::log($message, 'info', 'application.controllers.HotelController');

                $this->redirect(array('view', 'id' => $model->ID));
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

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Hotel']))
        {
            if ($model->Image === NULL || empty($model->Image))
            {
                $model->Image = $model->Name . '_' . rand(1, 999999);
            }

            $_POST['Hotel']['Image'] = $model->Image;

            $model->attributes = $_POST['Hotel'];

            $uploadedFile = CUploadedFile::getInstance($model, 'Image');

            if ($model->save())
            {
                if (!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $image = Yii::app()->basePath . '/../images/hotel/' . $model->Image;
                    $uploadedFile->saveAs($image);
                }
                $message = 'TA LOG: Hotel ' . $id . ' edited by user = ' . Yii::app()->user->id;
                Yii::log($message, 'info', 'application.controllers.HotelController');

                $this->redirect(array('view', 'id' => $model->ID));
            }
        }

        $this->render('update', array(
            'model' => $model,
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
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            $message = 'TA LOG: Hotel ' . $id . ' deleted by user = ' . Yii::app()->user->id;
            Yii::log($message, 'info', 'application.controllers.HotelController');

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
        $dataProvider = new CActiveDataProvider('Hotel');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $hotelsView = new HotlesView('search');
        $hotelsView->unsetAttributes();  // clear any default values
        if (isset($_GET['HotlesView']))
            $hotelsView->attributes = $_GET['HotlesView'];

        $this->render('admin', array(
            'hotelsViewModel' => $hotelsView,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Hotel::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hotel-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
