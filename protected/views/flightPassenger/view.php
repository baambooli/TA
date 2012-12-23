<?php
$this->breadcrumbs=array(
	'Flight Passengers'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List FlightPassenger','url'=>array('index')),
	array('label'=>'Create FlightPassenger','url'=>array('create')),
	array('label'=>'Update FlightPassenger','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete FlightPassenger','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlightPassenger','url'=>array('admin')),
);
?>

<h1>View FlightPassenger #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'Family',
		'Address',
		'PassportNumber',
		'PassportExpirey',
		'CountryId',
		'Tell',
		array(
            'name' => 'FlightId',
            'value'=> CHtml::encode($model->getFlightNumber($model->FlightId)),
        ),
		'SeatId',
	),
)); ?>
