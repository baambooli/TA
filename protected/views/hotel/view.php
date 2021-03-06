<?php
$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Hotel','url'=>array('index')),
	array('label'=>'Create Hotel','url'=>array('create')),
	array('label'=>'Update Hotel','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Delete Hotel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hotel','url'=>array('admin')),
);
?>

<h1>View Hotel #<?php echo $model->ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'type' => 'striped bordered condensed',
	'attributes'=>array(
		'ID',
		'Name',
		'Category',
		array(
            'name' => 'CityId',
            'value'=>CHtml::encode($model->getCityName($model->CityId)),
        ),
        'Tel',
        'Fax',
        'Address',
        'URL',
        'Email',
	),
)); ?>
<!-- show Image here-->
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/hotel/'.$model->Image,'Image',array('width'=>200));
