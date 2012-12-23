<?php
$this->breadcrumbs=array(
	'Flights'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Flight','url'=>array('index')),
	array('label'=>'Create Flight','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('flight-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Flights</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'flight-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'FlightNumber',
		'AirlineId',
		'AirplaneId',
		'TakeoffDate',
		'LandingDate',
		/*
		'DepartureAirportId',
		'DestinationAirportId',
		'PriceOfFirstClassSeats',
		'PriceOfBusinessClassSeats',
		'PriceOfEconomyClassSeats',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
