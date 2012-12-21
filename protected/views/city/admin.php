<?php
$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List City','url'=>array('index')),
	array('label'=>'Create City','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('city-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cities</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'city-grid',
	'dataProvider'=>$modelCityView->search(),
	'filter'=>$modelCityView,
	'columns'=>array(
		'Id',
		'CityName',
		'CountryName',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
