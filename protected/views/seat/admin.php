<?php
$this->breadcrumbs=array(
	'Seats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Seat','url'=>array('index')),
	array('label'=>'Create Seat','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('seat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Seats</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'seat-grid',
	'dataProvider'=>$modelSeatView->search(),
	'filter'=>$modelSeatView,
	'columns'=>array(
		'Id',
		'SeatNumber',
		'SeatType',
		'AirplaneType',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
