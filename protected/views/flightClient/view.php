<?php
$this->breadcrumbs=array(
	'Flight Clients'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List FlightClient','url'=>array('index')),
	array('label'=>'Create FlightClient','url'=>array('create')),
	array('label'=>'Update FlightClient','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete FlightClient','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlightClient','url'=>array('admin')),
);
?>

<h1>View FlightClient #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'ClientId',
		'FlightId',
		'SeatId',
	),
)); ?>
