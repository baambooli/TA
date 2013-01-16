<?php
$this->breadcrumbs = array(
    'Flights' => array('index'),
    $model->Id,
);

$this->menu = array(
    array('label' => 'List Flight', 'url' => array('index')),
    array('label' => 'Create Flight', 'url' => array('create')),
    array('label' => 'Update Flight', 'url' => array('update', 'id' => $model->Id)),
    array('label' => 'Delete Flight', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->Id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Flight', 'url' => array('admin')),
);
?>

<h1>View Flight #<?php echo $model->Id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'Id',
        'FlightNumber',
        //'AirlineId',
        array(
            'name' => 'AirlineId',
            'value' => CHtml::encode($model->getAirlineName($model->AirlineId)),
        ),
        //'AirplaneId',
        array(
            'name' => 'AirplaneId',
            'value' => CHtml::encode($model->getAirplaneName($model->AirplaneId)),
        ),
        'TakeoffDate',
        'LandingDate',
        //'DepartureAirportId',
        array(
            'name' => 'DepartureAirportId',
            'value' => CHtml::encode($model->getAirportName($model->DepartureAirportId)),
        ),
        //'DestinationAirportId',
        array(
            'name' => 'DestinationAirportId',
            'value' => CHtml::encode($model->getAirportName($model->DestinationAirportId)),
        ),
        'PriceOfFirstClassSeats',
        'PriceOfBusinessClassSeats',
        'PriceOfEconomyClassSeats',
    ),
));
?>
