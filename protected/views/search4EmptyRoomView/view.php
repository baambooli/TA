<?php
$this->breadcrumbs=array(
	'Search4 Empty Room Views'=>array('index'),
	$model->RoomId,
);

$this->menu=array(
	array('label'=>'List Search4EmptyRoomView','url'=>array('index')),
	array('label'=>'Create Search4EmptyRoomView','url'=>array('create')),
	array('label'=>'Update Search4EmptyRoomView','url'=>array('update','id'=>$model->RoomId)),
	array('label'=>'Delete Search4EmptyRoomView','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->RoomId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Search4EmptyRoomView','url'=>array('admin')),
);
?>

<h1>View Search4EmptyRoomView #<?php echo $model->RoomId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type' => 'striped bordered condensed',
	'attributes'=>array(
		'RoomId',
		'RoomNumber',
		'HotelName',
		'HotelCategory',
		'HotelTel',
		'CityName',
		'RoomType',
		'PricePerDay',
		'CheckinDate',
		'CheckoutDate',
		'RoomStatus',
		'HotelAddress',
		'HotelImage',
		'RoomCapacity',
		'HotelId',
	),
)); ?>
