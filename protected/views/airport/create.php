<?php
$this->breadcrumbs=array(
	'Airports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Airport','url'=>array('index')),
	array('label'=>'Manage Airport','url'=>array('admin')),
);
?>

<h1>Create Airport</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>