<?php
$this->breadcrumbs=array(
	'Airlines'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Airline','url'=>array('index')),
	array('label'=>'Create Airline','url'=>array('create')),
	array('label'=>'View Airline','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Airline','url'=>array('admin')),
);
?>

<h1>Update Airline <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>