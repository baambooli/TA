<?php

class RoomClientController extends RController
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
    public $layout = '//layouts/column1Kamran';

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
        $this->layout = '//layouts/column2';
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
        $model = new RoomClient;

        if (isset($_POST['RoomClient']))
        {
            $model->attributes = $_POST['RoomClient'];
            $model->RoomId = (int) $_POST['room_id'];

            if ($model->save())
            {
                Yii::app()->user->setFlash('success', 'Data saved successfully!');
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
        //$this->performAjaxValidation($model);

        if (isset($_POST['RoomClient']))
        {
            $model->attributes = $_POST['RoomClient'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
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
        $dataProvider = new CActiveDataProvider('RoomClient');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $modelSearchHotelView = new SearchHotelView('search');
        $modelSearchHotelView->unsetAttributes();  // clear any default values
        if (isset($_GET['SearchHotelView']))
            $model->attributes = $_GET['SearchHotelView'];

        $this->render('admin', array(
            'modelSearchHotelView' => $modelSearchHotelView,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = RoomClient::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'room-client-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynamicCities()
    {
        $countryId = (int) $_POST['country_id'];
        $cities = RoomClient::getDynamicCities($countryId);

        // add one blank line
        echo CHtml::tag('option', array('value' => 0), CHtml::encode('Please select...'), true);
        foreach ($cities as $value => $name)
        {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicHotels()
    {
        $cityId = (int) $_POST['city_id'];
        $hotels = RoomClient::getDynamicHotels($cityId);

        // add one blank line
        echo CHtml::tag('option', array('value' => 0), CHtml::encode('Please select...'), true);
        foreach ($hotels as $value => $name)
        {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicRooms()
    {
        $hotelId = (int) $_POST['hotel_id'];
        $rooms = RoomClient::getDynamicRooms($hotelId);

        // add one blank line
        echo CHtml::tag('option', array('value' => 0), CHtml::encode('Please select...'), true);
        foreach ($rooms as $value => $name)
        {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

}
