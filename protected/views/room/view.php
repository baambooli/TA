<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Room','url'=>array('index')),
	array('label'=>'Create Room','url'=>array('create')),
	array('label'=>'Update Room','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Room','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Room','url'=>array('admin')),
);
?>

<h1>View Room #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type' => 'striped bordered condensed',
	'attributes'=>array(
		'Id',
        array(
            'name' => 'HotelId',
            'value'=> CHtml::encode($model->getHotelName($model->HotelId)),
        ),
		'RoomNumber',
        array(
            'name' => 'RoomTypeId',
            'value'=> CHtml::encode($model->getRoomTypeName($model->RoomTypeId)),
        ),
		'Tell',
	),
)); ?>
