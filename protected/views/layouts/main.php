<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">
	<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                
                array('label'=>'Global info',
                  'items'=>array(
                    array('label'=>'Users\' Management', 'url'=>array('/user/admin','view'=>'admin')),
                    array('label'=>'Countries', 'url'=>array('/country/admin','view'=>'admin')),
                    array('label'=>'Cities', 'url'=>array('/city/admin','view'=>'admin')),
                    array('label'=>'Airports', 'url'=>array('/airport/admin','view'=>'admin')),
                  ),
                ),
                
                array('label'=>'Flight info',
                  'items'=>array(
                    array('label'=>'Flights', 'url'=>array('/flight/admin','view'=>'admin')),
                    array('label'=>'Airplanes', 'url'=>array('/airplane/admin','view'=>'admin')),
                    array('label'=>'Airplane Specifications', 'url'=>array('/airplaneSpecification/admin','view'=>'admin')),
                    array('label'=>'Airlines', 'url'=>array('/airline/admin','view'=>'admin')),
                    array('label'=>'Seats', 'url'=>array('/seat/admin','view'=>'admin')),
                    array('label'=>'Clients', 'url'=>array('/client/admin','view'=>'admin')),
                  ),
                ),
                
                array('label'=>'Hotel info',
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
                array('label'=>'Contact', 'url'=>array('/site/contact'),
                  'items'=>array(
                    array('label'=>'Contact us', 'url'=>array('/site/contact')),
                    array('label'=>'About us', 'url'=>array('/site/about')),
                  ),
                ),
                
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                
            ),
    )); ?>	
	</div><!-- mainMbMenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Kamran Khoshnasib.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
