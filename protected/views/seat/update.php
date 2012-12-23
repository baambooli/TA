<?php
$this->breadcrumbs=array(
	'Seats'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seat','url'=>array('index')),
	array('label'=>'Create Seat','url'=>array('create')),
	array('label'=>'View Seat','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Seat','url'=>array('admin')),
);
?>

<h1>Update Seat <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>