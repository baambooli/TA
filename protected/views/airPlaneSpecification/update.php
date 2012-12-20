<?php
$this->breadcrumbs=array(
	'Air Plane Specifications'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AirPlaneSpecification','url'=>array('index')),
	array('label'=>'Create AirPlaneSpecification','url'=>array('create')),
	array('label'=>'View AirPlaneSpecification','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage AirPlaneSpecification','url'=>array('admin')),
);
?>

<h1>Update AirPlaneSpecification <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>