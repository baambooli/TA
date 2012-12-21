<?php
$this->breadcrumbs=array(
	'Flights'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Flight','url'=>array('index')),
	array('label'=>'Create Flight','url'=>array('create')),
	array('label'=>'Update Flight','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Flight','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Flight','url'=>array('admin')),
);
?>

<h1>View Flight #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'FlightNumber',
		'AirlineId',
		'AirplaneId',
		'TakeoffDate',
		'LandingDate',
		'DepartureAirportId',
		'DestinationAirportId',
		'PriceOfFirstClassSeats',
		'PriceOfBusinessClassSeats',
		'PriceOfEconomyClassSeats',
	),
)); ?>
