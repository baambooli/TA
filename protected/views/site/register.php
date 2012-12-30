<?php
$this->breadcrumbs=array(
	'Site'=>array('index'),
	'Register',
);
?>
<h1>Register</h1>

<?php echo $this->renderPartial('_formRegister', array('model'=>$model)); ?>