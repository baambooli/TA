<?php
$this->breadcrumbs=array(
	'Search4 Empty Room Views'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Search4EmptyRoomView','url'=>array('index')),
	array('label'=>'Create Search4EmptyRoomView','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('search4-empty-room-view-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Search4 Empty Room Views</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'search4-empty-room-view-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'RoomId',
		'RoomNumber',
		'HotelName',
		'HotelCategory',
		'HotelTel',
		'CityName',
		/*
		'RoomType',
		'PricePerDay',
		'CheckinDate',
		'CheckoutDate',
		'RoomStatus',
		'HotelAddress',
		'HotelImage',
		'RoomCapacity',
		'HotelId',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
