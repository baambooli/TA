<?php
$this->breadcrumbs=array(
	'Hotel Clients'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List HotelClient','url'=>array('index')),
	array('label'=>'Create HotelClient','url'=>array('create')),
	array('label'=>'Update HotelClient','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete HotelClient','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HotelClient','url'=>array('admin')),
);
?>

<h1>View HotelClient #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'Family',
		'Address',
		'tell',
		'PassportNumber',
		'RoomId',
		'HotelId',
	),
)); ?>
