<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - DB Diagram';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Db Diagram</h1>

<?php
    echo CHtml::image(Yii::app()->request->baseUrl.'/images/system/diagram.png'); 
?>