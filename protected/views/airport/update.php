<?php
$this->breadcrumbs = array(
    'Airports' => array('index'),
    $model->Name => array('view', 'id' => $model->Id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Airport', 'url' => array('index')),
    array('label' => 'Create Airport', 'url' => array('create')),
    array('label' => 'View Airport', 'url' => array('view', 'id' => $model->Id)),
    array('label' => 'Manage Airport', 'url' => array('admin')),
);
?>

<h1>Update Airport <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>