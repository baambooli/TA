<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

<div id="mainMbMenu">
    <?php 
       
        $visibility = MenuVisibility::getMenuVisibility();
        
        $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                // show 'Home' menu to all users 
                array('label'=>'Home', 'url'=>array('/site/index')),
                
                // show 'Search' menu to all users 
                array('label'=>'Search',
                  'items'=>array(
                    array('label'=>'Hotels', 'url'=>array('/search/hotel','view'=>'admin')),
                    array('label'=>'Flights', 'url'=>array('/search/flight','view'=>'admin')),
                  ),
                ),
                
                // show 'Global info' menu to NONE guest users
                array('label'=>'Global info', 'visible' => $visibility['General'],
                  'items'=>array(
                    array('label'=>'Users\' Management', 'url'=>array('/user/admin','view'=>'admin')),
                    array('label'=>'Countries', 'url'=>array('/country/admin','view'=>'admin')),
                    array('label'=>'Cities', 'url'=>array('/city/admin','view'=>'admin')),
                  ),
                ),
                
                // show 'Flight info' menu to admin and Flight_operator users 
                array('label'=>'Flight info', 'visible' => $visibility['Flight'],
                  'items'=>array(
                    array('label'=>'Flights', 'url'=>array('/flight/admin','view'=>'admin')),
                    array('label'=>'Airplanes', 'url'=>array('/airplane/admin','view'=>'admin')),
                    array('label'=>'Airports', 'url'=>array('/airport/admin','view'=>'admin')),
                    array('label'=>'Airplane Specifications', 'url'=>array('/airplaneSpecification/admin','view'=>'admin')),
                    array('label'=>'Airlines', 'url'=>array('/airline/admin','view'=>'admin')),
                    array('label'=>'Seats', 'url'=>array('/seat/admin','view'=>'admin')),
                    array('label'=>'Clients', 'url'=>array('/client/admin','view'=>'admin')),
                  ),
                ),
                
                // show 'Hotel info' menu to admin and Hotel_operator users 
                
                array('label'=>'Hotel info', 'visible' => $visibility['Hotel'], 
                  'items'=>array(
                    array('label'=>'Hotels', 'url'=>array('/hotel/admin','view'=>'admin')),
                    array('label'=>'Rooms', 'url'=>array('/room/admin','view'=>'admin')),
                    array('label'=>'Room Types', 'url'=>array('/roomType/admin','view'=>'admin')),
                    array('label'=>'Clients', 'url'=>array('/client/admin','view'=>'admin')),
                  ),
                ),
                
                /* a menu with SUB SUB MENU
                array('label'=>'Test',
                  'items'=>array(
                    array('label'=>'Sub 1', 'url'=>array('/site/page','view'=>'sub1')),
                    array('label'=>'Sub 2',
                      'items'=>array(
                        array('label'=>'Sub sub 1', 'url'=>array('/site/page','view'=>'subsub1')),
                        array('label'=>'Sub sub 2', 'url'=>array('/site/page','view'=>'subsub2')),
                      ),
                    ),
                  ),
                ),
                */
                // show 'Contact' menu to all users
                array('label'=>'Contact', 'url'=>array('/site/contact'),
                  'items'=>array(
                    array('label'=>'Contact us', 'url'=>array('/site/contact')),
                    array('label'=>'About us', 'url'=>array('/site/about')),
                  ),
                ),
                // show 'Admin' menu to all users 
                array('label'=>'Admin Tasks', 'visible' => $visibility['Admin'],
                  'items'=>array(
                    array('label'=>'RBAC', 'url'=>array('/rights/assignment/','view'=>'view')),
                    array('label'=>'Create Reports', 'url'=>array('/report/admin','view'=>'admin')),
                    array('label'=>'Change Forms', 'url'=>array('/changeForm/admin','view'=>'admin')),
                    array('label'=>'Themes',
                      'items'=>array(
                        array('label'=>'Theme Kamran', 'url'=>array('/site/changeTheme/name/kamran_theme1')),
                        array('label'=>'Theme cheese', 'url'=>array('/site/changeTheme/name/cheese')),
                        array('label'=>'Theme classic', 'url'=>array('/site/changeTheme/name/classic')),
                      ),
                    ),
                  ),
                ),
                
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
    )); ?>    
    </div><!-- mainMbMenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>