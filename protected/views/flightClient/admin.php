<?php
$this->breadcrumbs=array(
	'Flight Clients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FlightClient','url'=>array('index')),
	array('label'=>'Create FlightClient','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('flight-client-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Flight Clients</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'flight-client-grid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'ClientId',
		'FlightId',
		'SeatId',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
