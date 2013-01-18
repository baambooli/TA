<?php
$this->breadcrumbs=array(
	'Seats'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Seat','url'=>array('index')),
	array('label'=>'Create Seat','url'=>array('create')),
	array('label'=>'Update Seat','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Seat','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seat','url'=>array('admin')),
);
?>

<h1>View Seat #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type' => 'striped bordered condensed',
	'attributes'=>array(
		'Id',
		'SeatNumber',
        array(
            'name' => 'SeatType',
            'value'=>CHtml::encode($model->getTypeName($model->SeatType)),
        ),
        array(
            'name' => 'AirplaneSpecId',
            'value'=>CHtml::encode($model->getAirplaneSpecificationName($model->AirplaneSpecId)),
        ),
	),
)); ?>
