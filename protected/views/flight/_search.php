<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'Id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'FlightNumber', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'AirlineId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'AirplaneId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'TakeoffDate', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'LandingDate', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'DepartureAirportId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'DestinationAirportId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'PriceOfFirstClassSeats', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'PriceOfBusinessClassSeats', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'PriceOfEconomyClassSeats', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
