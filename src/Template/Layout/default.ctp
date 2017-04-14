<?php
use Cake\Core\Configure;
echo $this->element('doctype');

?>
<html lang="en">
<!--<![endif]-->
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $this->fetch('title');?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="21kanban - System dystrybucji drobnych komponentów produkcyjnych typu" name="description" />
    <meta content="Sylwester Kowal" name="author" />
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->Html->meta('icon'); ?>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all'); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/font-awesome/css/font-awesome.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap/css/bootstrap.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/uniform/css/uniform.default.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css?q='.QRDN); ?>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <?php echo $this->fetch('css'); ?>

    <?php echo $this->Html->css('../../assets/global/plugins/select2/css/select2.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/select2/css/select2-bootstrap.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/datatables/datatables.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css?q='.QRDN); ?>

    <?php echo $this->Html->css('../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/global/plugins/typeahead/typeahead.css?q='.QRDN); ?>


    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo $this->Html->css('../../assets/pages/css/profile-2.min.css?q='.QRDN); ?>
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <?php echo $this->Html->css('../../assets/global/css/components-rounded.min.css?q='.QRDN, ['id'=>'style_components']); ?>
    <?php echo $this->Html->css('../../assets/global/css/plugins.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/layouts/layout/css/custom.css?q='.QRDN); ?>
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <?php echo $this->fetch('themeLayoytStyles'); ?>

    <?php echo $this->Html->css('../../assets/layouts/layout/css/layout.min.css?q='.QRDN); ?>
    <?php echo $this->Html->css('../../assets/layouts/layout/css/themes/default.min.css?q='.QRDN, ['id'=>'style_color']); ?>
    <?php echo $this->Html->css('../../assets/layouts/layout/css/custom.min.css?q='.QRDN); ?>
    <!-- END THEME LAYOUT STYLES -->

    <!-- BEGIN USERMGMT STYLES -->
    <?php
    echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);
    echo $this->Html->css('../../assets/global/plugins/chosen/chosen.min.css?q='.QRDN);
    echo $this->Html->css('../../assets/global/plugins/toastr/build/toastr.min.css?q='.QRDN);
    ?>
    <!-- END USERMGMT STYLES -->


    <script language="javascript">
        var urlForJs="<?php echo SITE_URL ?>";
    </script>
    <?= $this->element('Blocks/pace-loader'); ?>
</head>

<body class="page-container-bg-solid  page-sidebar-closed">


<!-- BEGIN HEADER -->
<?php //echo $this->element('header-top-fixed'); ?>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php //echo $this->element('sidebar'); ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <?php //echo $this->element('theme-panel'); ?>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <?php //echo $this->element('page-bar'); ?>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <?php //echo (Configure::read('display_page_title')) ? $this->element('page-title') : ''; ?>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <?php echo $this->fetch('content'); ?>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <?php // echo $this->element('quick-sidebar'); ?>
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php //echo $this->element('footer'); ?>
<!-- END FOOTER -->





<!--[if lt IE 9]>
<?php
		echo $this->Html->script('../../assets/global/plugins/respond.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/excanvas.min.js?q='.QRDN);
?>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<?php
echo $this->Html->script('../../assets/global/plugins/jquery.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap/js/bootstrap.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/js.cookie.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jquery.blockui.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/uniform/jquery.uniform.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js?q='.QRDN);

?>

<!-- BEGIN USERMGMT PLUGINS  -->

<?php
echo $this->Html->script('../../assets/global/plugins/jquery-validation/js/jquery.validate.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jquery-validation/js/additional-methods.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/select2/js/select2.full.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/backstretch/jquery.backstretch.min.js?q='.QRDN);

echo $this->Html->script('../../assets/global/plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/chosen/chosen.jquery.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/toastr/build/toastr.min.js?q='.QRDN);

/* Usermgmt Plugin JS */
echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);
echo $this->Html->script('/usermgmt/js/chosen/chosen.ajaxaddition.jquery.js?q='.QRDN);
?>
<!-- END USERMGMT PLUGINS  -->

<?php echo $this->fetch('corePlugins'); ?>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->fetch('pagePlugins'); ?>
<?php
echo $this->Html->script('../../assets/global/plugins/moment.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/fullcalendar/fullcalendar.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jquery.sparkline.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js?q='.QRDN);


echo $this->Html->script('../../assets/global/scripts/datatable.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/datatables/datatables.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js?q='.QRDN);

echo $this->Html->script('../../assets/global/plugins/fuelux/js/spinner.min.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js?q='.QRDN);

echo $this->Html->script('../../assets/global/plugins/jquery-printarea/jquery.PrintArea.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.js?q='.QRDN);

echo $this->Html->script('../../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-wysihtml5/locales/bootstrap-wysihtml5.pl-PL.js?q='.QRDN);
echo $this->Html->script('../../assets/global/plugins/bootstrap-summernote/summernote.min.js?q='.QRDN);
?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<?php echo $this->Html->script('../../assets/global/scripts/app.js?q='.QRDN); ?>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo $this->fetch('pageScripts'); ?>

<?php
echo $this->Html->script('../../assets/pages/scripts/table-datatables-fixedheader.min.js?q='.QRDN);
echo $this->Html->script('../../assets/pages/scripts/form-samples.min.js?q='.QRDN);
echo $this->Html->script('../../assets/pages/scripts/components-bootstrap-select.min.js?q='.QRDN);
echo $this->Html->script('../../assets/pages/scripts/components-bootstrap-touchspin.min.js?q='.QRDN);
echo $this->Html->script('../../assets/pages/scripts/components-date-time-pickers.js?q='.QRDN);
echo $this->Html->script('../../assets/pages/scripts/components-bootstrap-maxlength.js?q='.QRDN);

echo $this->Html->script('../../assets/pages/scripts/components-editors.min.js?q='.QRDN);
echo $this->Html->script('../../assets/pages/scripts/comma2dot-jquery.js?q='.QRDN);

?>

<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<?php echo $this->fetch('layoutScripts'); ?>

<?php
echo $this->Html->script('../../assets/layouts/layout/scripts/layout.min.js?q='.QRDN);
echo $this->Html->script('../../assets/layouts/layout/scripts/demo.min.js?q='.QRDN);
echo $this->Html->script('../../assets/layouts/global/scripts/quick-sidebar.min.js?q='.QRDN);
?>

<!-- END THEME LAYOUT SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->fetch('script'); ?>
<?php echo $this->element('Usermgmt.message_notification'); ?>
<!-- END PAGE LEVEL PLUGINS -->

</body>
</html>