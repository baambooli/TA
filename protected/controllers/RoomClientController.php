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
        // $this->layout = '//layouts/column2';
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
            // this does not work !!( very strange)
            //$model->attributes = $_POST['RoomClient'];
            // so we should use this method
            $model->StartDate = $_POST['RoomClient']['StartDate'];
            $model->EndDate = $_POST['RoomClient']['EndDate'];
            $model->Status = $_POST['RoomClient']['Status'];
            $model->ClientId = $_POST['RoomClient']['ClientId'];

            $model->RoomId = (int) $_POST['room_id'];

            // check the avalability of room
            $res = $this->actionCheck(false, NULL);

            if ($res)
            {
                if ($model->save())
                {
                    Yii::app()->user->setFlash('success', 'Data saved successfully!');
                }
                else
                {
                    Yii::app()->user->setFlash('error', 'error in saving room!');
                }
            }
            else
            {
                Yii::app()->user->setFlash('error', 'Room is not available!');
            }
        }

        $this->render('create', array(
            'model' => $model, 'updateMode' => 1,
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

        if (isset($_POST['RoomClient']))
        {
            // this does not work !!( very strange)
            //$model->attributes = $_POST['RoomClient'];
            // so we should use this method
            $model->StartDate = $_POST['RoomClient']['StartDate'];
            $model->EndDate = $_POST['RoomClient']['EndDate'];
            $model->Status = $_POST['RoomClient']['Status'];
            $model->ClientId = $_POST['RoomClient']['ClientId'];

            $model->RoomId = (int) $_POST['room_id'];

            // check the avalability of room
            $res = $this->actionCheck(false);

            if ($res)
            {
                if ($model->save())
                {
                    Yii::app()->user->setFlash('success', 'Data saved successfully!');
                }
                else
                {
                    Yii::app()->user->setFlash('error', 'error in saving room!');
                }
            }
            else
            {
                Yii::app()->user->setFlash('error', 'Room is not available!');
            }
        }


        $this->render('update', array(
            'model' => $model, 'updateMode' => 1,
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
            $modelSearchHotelView->attributes = $_GET['SearchHotelView'];

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

    // Kamran
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

    public function checkAvailabilityOfRoom(
    $roomId, $startDate, $endDate, $roomClientId, &$result)
    {
        $res = true;
        $result = '';

        if ($startDate > $endDate)
        {
            // add flash message error to start date field and end date field
            $model->addError('StartDate', 'Start date should not be greater than end date.');
            $model->addError('EndDate', 'Start date should not be greater than end date.');

            $result = 'Error in dates.';

            return false;
        }

        if ($roomClientId !== NULL)
        {
            // process update request
            // VERY Important note:
            // In the update mode we should excluse the current
            // reservation of room from search results (VERY IMPORTANT)

            $roomClients = RoomClient::model()->findAll('RoomId = :roomId AND Id <> :roomClientId', array(':roomId' => $roomId, ':roomClientId' => $roomClientId));
        }
        else
        {
            // process create a new reservation process
            $roomClients = RoomClient::model()->findAll('RoomId = :roomId', array(':roomId' => $roomId));
        }

        $result = '<table ><tr><td style="border: 1px solid black;">Fullname, Username</td>
            <td style="border: 1px solid black;">Status of room</td>
            <td style="border: 1px solid black;">Check in</td>
            <td style="border: 1px solid black;">Check out</td></tr>';

        foreach ($roomClients as $key => $value)
        {
            $start = $roomClients[$key]->StartDate;
            $end = $roomClients[$key]->EndDate;
            $status = $roomClients[$key]->Status;

            // check that the room is taken or not
            if ((($startDate >= $start) && ($startDate <= $end)) || 
                (($endDate >= $start) && ($endDate <= $end)) || 
                (($start >= $startDate) && ($start <= $endDate)) || 
                (($end >= $startDate) && ($end <= $endDate))
            )
            {

                $clientId = $roomClients[$key]->ClientId;
                $clientFullName = ClientFullnameView::model()->
                                findByPk($clientId)->FullName;

                $result .= '<tr><td style="border: 1px solid black;"> ' .
                        $clientFullName . '</td><td style="border: 1px solid black;">' .
                        $status . '</td><td style="border: 1px solid black;">' .
                        $start . '</td><td style="border: 1px solid black;">' . $end . '</td></tr>';

                $res = false;
            }
        }
        $result .= '</table>';
        if ($res == true)
        {
            $result = 'This room is available between ' . $startDate . ' and ' . $endDate . '.';
            return true;
        }
        else
        {
            return false;
        }
    }

    public function actionCheck($isAjaxCall = true, $roomClientId = NULL)
    {
        // First check all of the fields should be selected by the user
        if (!empty($_POST['room_id']))
            $roomId = (int) $_POST['room_id'];
        else
        {
            echo 'some of the input fields are empty. select all of the fields on screen';
            return false;
        }

        if (!empty($_POST['RoomClient']['StartDate']))
            $start = str_replace('/' ,'-', $_POST['RoomClient']['StartDate']);
        else
        {
            echo 'some of the input fields are empty. select all of the fields on screen';
            return false;
        }

        if (!empty($_POST['RoomClient']['EndDate']))
            $end = str_replace('/' ,'-', $_POST['RoomClient']['EndDate']);
        else
        {
            echo 'some of the input fields are empty. select all of the fields on screen';
            return false;
        }

        if (empty($roomClientId) && !empty($_POST['roomClientId']))
            $roomClientId = $_POST['roomClientId'];

        $result = '';

        // Second: send information for getting availability of the room
        $res = $this->checkAvailabilityOfRoom($roomId, $start, $end, $roomClientId, $result);

        // to send the $result to jQuery ajax caller, we should use 'echo' function
        if ($isAjaxCall)
        {
            echo $result;
        }

        return $res;
    }
}
