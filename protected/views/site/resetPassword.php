<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'ResetPassword',
);
 ?>
<h1>Reset User's password</h1>

<?php echo $this->renderPartial('_formResetPassword', array('model'=>$model)); ?>