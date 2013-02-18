<?php /*
  This file includes the menu items. every theme including main theme
  (classic theme) should include this file to have a consistence menues .

  we should write:

  <?php require_once('menuItems.php'); ?>

  on correct place of views/layouts/main.php file in each theme AND
  /protected/views/layouts/main.php for classic theme

  Kamran

 */ ?>
<div id="mainMbMenu">
    <?php
    $visibility = MenuVisibility::getMenuVisibility();

    $this->widget('application.extensions.mbmenu.MbMenu', array(
        'items' => array(
            // show 'Home' menu to all users
            array('label' => 'Home', 'url' => array('/site/index')),
            // show 'Search' menu to all users
            /* array('label' => 'Search',
              'items' => array(
              array('label' => 'Hotels', 'url' => array('/search/hotel', 'view' => 'admin')),
              array('label' => 'Flights', 'url' => array('/search/flight', 'view' => 'admin')),
              ),
              ),
             */

            // show 'User info' menu to NONE guest users
            array('label' => 'User info', 'visible' => $visibility['Authenticated'],
                'items' => array(
                    array('label' => 'Change my email/pass', 'url' => array('/user/updateMyself/id/' . Yii::app()->user->id)),
                    array('label' => 'Change my info', 'url' => array('/client/updateMyself/id/' . Yii::app()->user->id)),
                    array('label' => 'Hotel reservations', 'url' => array('/site/showMyHotelReservations')),
                    array('label' => 'Flight reservations', 'url' => array('/site/showMyFlightSeatReservations')),
                ),
            ),
            // show 'Global info' menu to NONE guest users
            array('label' => 'Global info', 'visible' => $visibility['General'],
                'items' => array(
                    array('label' => 'Countries', 'url' => array('/country/admin', 'view' => 'admin')),
                    array('label' => 'Cities', 'url' => array('/city/admin', 'view' => 'admin')),
                ),
            ),
            // show 'Flight info' menu to admin and Flight_operator users
            array('label' => 'Flight info', 'visible' => $visibility['Flight'],
                'items' => array(
                    array('label' => 'Flights', 'url' => array('/flight/admin', 'view' => 'admin')),
                    array('label' => 'Airplanes', 'url' => array('/airplane/admin', 'view' => 'admin')),
                    array('label' => 'Airports', 'url' => array('/airport/admin', 'view' => 'admin')),
                    array('label' => 'Airplane Specifications', 'url' => array('/airplaneSpecification/admin', 'view' => 'admin')),
                    array('label' => 'Airlines', 'url' => array('/airline/admin', 'view' => 'admin')),
                    array('label' => 'Seats', 'url' => array('/seat/admin', 'view' => 'admin')),
                    array('label' => 'Clients', 'url' => array('/client/admin', 'view' => 'admin')),
                    array('label' => 'Flight/Clients', 'url' => array('/flightClientView/admin', 'view' => 'admin')),
                ),
            ),
            // show 'Hotel info' menu to admin and Hotel_operator users
            array('label' => 'Hotel info', 'visible' => $visibility['Hotel'],
                'items' => array(
                    array('label' => 'Hotels', 'url' => array('/hotel/admin', 'view' => 'admin')),
                    array('label' => 'Rooms', 'url' => array('/room/admin', 'view' => 'admin')),
                    array('label' => 'Room Types', 'url' => array('/roomType/admin', 'view' => 'admin')),
                    array('label' => 'Clients', 'url' => array('/client/admin', 'view' => 'admin')),
                    array('label' => 'Rooms/Clients', 'url' => array('/roomClient/admin', 'view' => 'admin')),
                    array('label' => 'Reserve Room', 'url' => array('/roomClient/create')),
                ),
            ),
            // show 'Contact' menu to all users
            array('label' => 'Contact', 'url' => array('/site/contact'),
                'items' => array(
                    array('label' => 'Contact us', 'url' => array('/site/contact')),
                    array('label' => 'About us', 'url' => array('/site/about')),
                    array('label' => 'DB Diagram', 'url' => array('/site/dbDiagram')),
                    array('label' => 'RBAC Diagram', 'url' => array('/site/rbacDiagram')),
                ),
            ),
            // show 'Admin' menu to all users
            array('label' => 'Admin Tasks', 'visible' => $visibility['Admin'],
                'items' => array(
                    array('label' => 'RBAC', 'url' => array('/rights/assignment/', 'view' => 'view')),
                    array('label' => 'Users\' Management', 'url' => array('/user/admin', 'view' => 'admin')),
                    array('label' => 'Create Reports', 'url' => array('/report/admin', 'view' => 'admin')),
                    array('label' => 'Change Forms', 'url' => array('/changeForm/admin', 'view' => 'admin')),
                    array('label' => 'Reset users\' password', 'url' => array('/site/resetPassword')),
                    array('label' => 'Themes',
                        'items' => array(
                            array('label' => 'Theme Kamran', 'url' => array('/site/changeTheme/name/kamran_theme1')),
							array('label' => 'Theme Kamran 2', 'url' => array('/site/changeTheme/name/kamran_theme2')),
                            array('label' => 'Theme cheese', 'url' => array('/site/changeTheme/name/cheese')),
                            array('label' => 'Theme classic', 'url' => array('/site/changeTheme/name/classic')),
                        ),
                    ),
                ),
            ),
            // login/logout item
            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
            // register item
            array('label' => 'Register', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
        ),
    ));
    ?>
</div><!-- mainMbMenu -->

