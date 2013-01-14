    <title id='Description'>This example illustrates the Grid filtering feature. Enter some data into the Filter Row.</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/globalization/jquery.global.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/scripts/gettheme.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/generatedata.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var theme = getTheme();

            var data = generatedata(500);
            var source =
            {
                localdata: data,
                datafields:
                [
                    { name: 'name', type: 'string' },
                    { name: 'productname', type: 'string' },
                    { name: 'available', type: 'bool' },
                    { name: 'date', type: 'date'},
                    { name: 'quantity', type: 'number' }
                ],
                datatype: "array"
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            $("#jqxgrid").jqxGrid(
            {
                width: 800,
                source: dataAdapter,
                showfilterrow: true,
                filterable: true,
                theme: theme,
                selectionmode: 'multiplecellsextended',
                columns: [
                  { text: 'Name', columntype: 'textbox', filtertype: 'textbox', filtercondition: 'starts_with', datafield: 'name', width: 115 },
                  {
                      text: 'Product', filtertype: 'checkedlist', datafield: 'productname', width: 220
                  },
                  { text: 'Available', datafield: 'available', columntype: 'checkbox', filtertype: 'bool', width: 67 },
                  { text: 'Ship Date', datafield: 'date', filtertype: 'date', width: 210, cellsalign: 'right', cellsformat: 'd' },
                  { text: 'Qty.', datafield: 'quantity', filtertype: 'number',  cellsalign: 'right' }
                ]
            });
            $('#clearfilteringbutton').jqxButton({ height: 25, theme: theme });
            $('#clearfilteringbutton').click(function () {
                $("#jqxgrid").jqxGrid('clearfilters');
            });
        });
    </script>
    <div id="jqxgrid">
    </div>
    <input style="margin-top: 10px;" value="Remove Filter" id="clearfilteringbutton" type="button" />
