<?php
$this->breadcrumbs=array(
	'Room Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomView','url'=>array('index')),
	array('label'=>'Manage RoomView','url'=>array('admin')),
);
?>

<h1>Create RoomView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>