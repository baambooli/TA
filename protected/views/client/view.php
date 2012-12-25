<?php
$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Client','url'=>array('index')),
	array('label'=>'Create Client','url'=>array('create')),
	array('label'=>'Update Client','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Client','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Client','url'=>array('admin')),
);
?>

<h1>View Client #<?php echo $model->Id; ?></h1>

<?php 
    $this->_decryptClient($model);
    
    $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'Family',
        array(
            'name' => 'CountryId',
            'value'=>CHtml::encode($model->getCountryName($model->CountryId)),
        ),
		'Address',
        'email',
		'tell',
		'PassportNumber',
		'CreditCardType',
		'CreditCardExpiryDate',
		'CreditCardHolderName',
		'CreditCardSecurityNumber',
		'CreditCardNumber',
	),
)); ?>
