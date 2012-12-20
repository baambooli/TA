<?php
$this->breadcrumbs=array(
	'Air Plane Specifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AirPlaneSpecification','url'=>array('index')),
	array('label'=>'Create AirPlaneSpecification','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('air-plane-specification-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Air Plane Specifications</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'air-plane-specification-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'Name',
		'Type',
		'NoOfFirstClassSeats',
		'NoOfBusinessClassSeats',
		'NoOfEconomyClassSeats',
		/*
		'PriceOfFirstClassSeats',
		'PriceOfBusinessClassSeats',
		'PriceOfEconomyClassSeats',
		'AirplaneId',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
