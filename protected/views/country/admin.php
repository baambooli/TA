<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Country','url'=>array('index')),
	array('label'=>'Create Country','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('country-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Countries</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'country-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'Name',
		'FlagURL',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
