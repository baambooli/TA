<div>
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'verticalForm2',
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array(
            'class' => 'well',
            /* Disable normal form submit */
            /* 'onsubmit'=>"return false;",  */
            'onkeypress' => " if(event.keyCode == 13){ sendAjaxRequestHotelSearch(); } " /* Do ajax call when user presses enter key */
        ),
            ));
    ?>

    <div>
        Flight:<br>
        <?php
        $this->widget('bootstrap.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => 'flight',
            'options' => array(
                'tags' => $citiesName,
                'placeholder' => 'City Name',
                'width' => '20%',
            //'tokenSeparators' => array(',', ' ')
            )
        ));
        ?>
    </div>
    <div>
        Category:<br>
        <?php
        $this->widget('bootstrap.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => 'category2222',
            'options' => array(
                'tags' => array('Two starts', 'Three starts', 'Four starts', 'Five starts'),
                'placeholder' => 'Category of Hotel',
                'width' => '20%',
            //'tokenSeparators' => array(',', ' ')
            )
        ));
        ?>
    </div>
    <div>
        Room Type:<br>
        <?php
        $this->widget('bootstrap.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => 'roomTypesss',
            'options' => array(
                'tags' => array('Two starts', 'Three starts', 'Four starts', 'Five starts'),
                'placeholder' => 'Room type',
                'width' => '20%',
            //'tokenSeparators' => array(',', ' ')
            )
        ));
        ?>
    </div>
    <div>
        Number of room(s):<br>
        <?php
        $this->widget('bootstrap.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => 'noOfRoomssss',
            'options' => array(
                'tags' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
                'placeholder' => 'Number of rooms',
                'width' => '20%',
            //'tokenSeparators' => array(',', ' ')
            )
        ));
        ?>
    </div>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Search For Flight')); ?>

    <?php $this->endWidget(); ?>
</div>
