<?php
$this->breadcrumbs=array(
	'Airlines'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Airline','url'=>array('index')),
	array('label'=>'Create Airline','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('airline-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Airlines</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'airline-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Name',
		'Address',
		'Tell1',
		'Email',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
