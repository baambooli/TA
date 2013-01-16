<?php
$this->breadcrumbs = array(
    'Flights' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Flight', 'url' => array('index')),
    array('label' => 'Manage Flight', 'url' => array('admin')),
);
?>

<h1>Create Flight</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>