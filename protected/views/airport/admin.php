<?php
$this->breadcrumbs=array(
	'Airports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Airport','url'=>array('index')),
	array('label'=>'Create Airport','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('airport-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Airports</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'airport-grid',
	'dataProvider'=>$modelAirportView->search(),
	'filter'=>$modelAirportView,
	'columns'=>array(
		'Id',
		'AirportName',
		'Tel1',
        'CityName',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
