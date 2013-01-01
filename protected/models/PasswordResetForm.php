<?php

class PasswordResetForm extends CFormModel
{
    public $emailAddress;

    public function rules()
    {
        return array(
            array('emailAddress', 'required'),
            array('emailAddress', 'email'),
        );
    }

}
?>
