<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Country','url'=>array('index')),
	array('label'=>'Create Country','url'=>array('create')),
	array('label'=>'Update Country','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Country','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Country','url'=>array('admin')),
);
?>

<h1>View Country #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'FlagURL',
	),
)); ?>
<!-- show flag here-->
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/country/'.$model->FlagURL,'FlagURL',array('width'=>200)); 
