<?php
$this->breadcrumbs=array(
	'Air Plane Specifications'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List AirPlaneSpecification','url'=>array('index')),
	array('label'=>'Create AirPlaneSpecification','url'=>array('create')),
	array('label'=>'Update AirPlaneSpecification','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete AirPlaneSpecification','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AirPlaneSpecification','url'=>array('admin')),
);
?>

<h1>View AirPlaneSpecification #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'Type',
		'NoOfFirstClassSeats',
		'NoOfBusinessClassSeats',
		'NoOfEconomyClassSeats',
	),
)); ?>
