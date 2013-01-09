

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
        'ClientUsername',
        'StartDate',
        'EndDate',
        'Status',
        /*array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),*/
    ),
));
?>
