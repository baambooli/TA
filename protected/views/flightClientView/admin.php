<?php
$this->breadcrumbs = array(
    'Flight Client Views' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List FlightClient', 'url' => array('index')),
    array('label' => 'Create FlightClient', 'url' => array('flightClient/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('flight-client-view-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Flight Client Views</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'flight-client-view-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'FlightNumber',
        'SeatNumber',
        'ClientName',
        'ClientFamily',
        //'PassportNumber',
        'DepartureAirportName',
        'DestinationAirportName',
        'Status', 
        /*
          'FlightClientId',
          'ClientSex',
          'SeatId',
          'SeatType',
          'Aireplane_specificationsName',
          'AirplaneName',
          'AirlineName',
          'AirlineCountry',
          'AirlineTel',
          'FlightId',
          'TakeoffTime',
          'TakeoffDate',
          'LandingTime',
          'LandingDate',
          'DestinationCityName',
          'DestinationAirportAddress',
          'DestinationAirportTel',
          'DepartureCityName',
          'DepartureAirportAddress',
          'DepartureAirportTel',
          'Username',
          'AireplaneSpecificationType',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
