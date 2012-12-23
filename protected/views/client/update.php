<?php
$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Client','url'=>array('index')),
	array('label'=>'Create Client','url'=>array('create')),
	array('label'=>'View Client','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Client','url'=>array('admin')),
);
?>

<h1>Update Client <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>