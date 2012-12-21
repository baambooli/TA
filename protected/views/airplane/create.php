<?php
$this->breadcrumbs=array(
	'Airplanes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Airplane','url'=>array('index')),
	array('label'=>'Manage Airplane','url'=>array('admin')),
);
?>

<h1>Create Airplane</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>