<?php
$this->breadcrumbs = array(
    'Airports',
);

$this->menu = array(
    array('label' => 'Create Airport', 'url' => array('create')),
    array('label' => 'Manage Airport', 'url' => array('admin')),
);
?>

<h1>Airports</h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
