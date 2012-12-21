<?php
$this->breadcrumbs=array(
	'Flight Passengers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FlightPassenger','url'=>array('index')),
	array('label'=>'Create FlightPassenger','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('flight-passenger-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Flight Passengers</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'flight-passenger-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Name',
		'Family',
		'PassportNumber',
		'Tell',
		'FlightId',
		'SeatId',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
