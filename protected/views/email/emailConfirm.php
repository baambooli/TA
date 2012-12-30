<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

 <h1>Congratulation</h1>
 <br>
 you have successfully registerd on our website.
 <br> username:<?php  echo $username;?> 
 <br> pass: *****   
 <br> email: <?php  echo $emailAddress;?>
 
<?php $this->endWidget(); ?>
