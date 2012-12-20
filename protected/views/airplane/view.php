<?php
$this->breadcrumbs=array(
	'Airplanes'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Airplane','url'=>array('index')),
	array('label'=>'Create Airplane','url'=>array('create')),
	array('label'=>'Update Airplane','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Airplane','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Airplane','url'=>array('admin')),
);
?>

<h1>View Airplane #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'StartDateOfWork',
		'AirlineId',
	),
)); ?>
