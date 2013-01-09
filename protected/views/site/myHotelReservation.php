

<h1>My Hotel reservation</h1>


<?php
//very important line
// if we use $modelSearchHotelView in CLinkColumn, it does nor work
// so we should define this line
$data = $modelSearchHotelView;

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'room-client-grid',
    'dataProvider' => $modelSearchHotelView->searchMyHoelReservations($clientId),
    'filter' => $modelSearchHotelView,
    'columns' => array(
        //'RoomClientId',
        'HotelName',
        'RoomNumber',
        'ClientName',
        'ClientFamily',
        'ClientTel',
        'StartDate',
        'EndDate',
        'Status',
        ////////////////////////////////////////////////////////////////////////////////////// 
        // make it a linkable column
        array(
            'class'=>'CLinkColumn',
            // create a sortable header for column
            'header'=>'Cancel/Reserve',
            // label that user will see
            'labelExpression'=>'$data->RoomClientId',
            // url of the link
            'urlExpression'=>'Yii::app()->createUrl("/site/cancelMyRoomReservation/id/".$data->RoomClientId)',
            // tool tip
            'linkHtmlOptions'=>array('title'=>'Cancel this reservation')
        ),
            ///////////////////////////////////////////////////////////////////////////////////////
        /*array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),*/
    ),
));
?>
