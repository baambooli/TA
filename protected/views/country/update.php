<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Country','url'=>array('index')),
	array('label'=>'Create Country','url'=>array('create')),
	array('label'=>'View Country','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Country','url'=>array('admin')),
);
?>

<h1>Update Country <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>