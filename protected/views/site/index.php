<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<!-- we need these two lines for tabs-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<!-- tabs function call -->
<script>
$(function() {
    $("#tabs").tabs();
});
</script>

<div id="tabs" class="Kheight">
    <ul>
        <li><a href="#tabs-1">Search Hotel</a></li>
        <li><a href="#tabs-2">Search Flight</a></li>
    </ul>
    <div id="tabs-1" >
        <?php require_once('searchHotelTab.php'); ?>
    </div>
    <div id="tabs-2">
         <?php require_once('searchFlightTab.php'); ?> 
    </div>
</div>

