<?php
$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List City','url'=>array('index')),
	array('label'=>'Create City','url'=>array('create')),
	array('label'=>'Update City','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete City','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage City','url'=>array('admin')),
);
?>

<h1>View City #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		array(
            'name' => 'countryId',
            'value'=>CHtml::encode($model->getCountryName($model->countryId)),
        ),
	),
)); ?>
