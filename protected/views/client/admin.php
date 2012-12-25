<?php
$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Client','url'=>array('index')),
	array('label'=>'Create Client','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('client-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Clients</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Name',
		'Family',
		'Address',
		'tell',
		//'PassportNumber',
		/*
		'CreditCardType',
		'CreditCardExpiryDate',
		'CreditCardHolderName',
		'CreditCardSecurityNumber',
		'CreditCardNumber',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
