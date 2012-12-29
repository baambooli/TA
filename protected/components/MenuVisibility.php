<?php
class MenuVisibility
{
    public static function getMenuVisibility()
    {
        // get current user's roles
        if (Yii::app()->user->isGuest)
            $roles = array('Guest');
        else
            $roles = Yii::app()->user->roles;
        
        if (in_array('Admin',$roles) || in_array('FlightOperator',$roles))
            $visibleFlightMenu= true;
        else
            $visibleFlightMenu= false;
            
        if (in_array('Admin',$roles) || in_array('FlightOperator',$roles)
            || in_array('HotelOperator',$roles)
        )
            $visibleGeneralMenu= true;
        else
            $visibleGeneralMenu= false;
            
        if (in_array('Admin',$roles) || in_array('HotelOperator',$roles))
            $visibleHotelMenu= true;
        else
            $visibleHotelMenu= false;
            
        if (in_array('Admin',$roles))
            $visibleAdminMenu= true;
        else
            $visibleAdminMenu= false;

        $result = array(
            'General' => $visibleGeneralMenu,
            'Hotel'   => $visibleHotelMenu,
            'Flight'  => $visibleFlightMenu,
            'Admin' => $visibleAdminMenu,
        );
        return $result;
    } 
}
?>
