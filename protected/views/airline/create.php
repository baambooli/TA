<?php
$this->breadcrumbs = array(
    'Airlines' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Airline', 'url' => array('index')),
    array('label' => 'Manage Airline', 'url' => array('admin')),
);
?>

<h1>Create Airline</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>