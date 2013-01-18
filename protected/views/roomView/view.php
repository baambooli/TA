<?php
$this->breadcrumbs=array(
	'Room Views'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List RoomView','url'=>array('index')),
	array('label'=>'Create RoomView','url'=>array('create')),
	array('label'=>'Update RoomView','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete RoomView','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomView','url'=>array('admin')),
);
?>

<h1>View RoomView #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type' => 'striped bordered condensed',
	'attributes'=>array(
		'Id',
		'HotelName',
		'RoomTypeName',
		'RoomNumber',
		'Tell',
	),
)); ?>
