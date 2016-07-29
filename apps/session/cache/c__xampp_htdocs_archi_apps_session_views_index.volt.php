<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $this->tag->getTitle(); ?>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/uniform/css/uniform.default.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); ?>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <?php echo $this->tag->stylesheetLink('assets/global/css/components.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/css/plugins.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/pages/css/profile.min.css'); ?>
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <?php echo $this->tag->stylesheetLink('assets/layouts/layout3/css/layout.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/layouts/layout3/css/themes/default.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/layouts/layout3/css/custom.min.css'); ?>
        <!-- END THEME LAYOUT STYLES -->
        <!-- BEGIN LOGIN STYLES -->
        <?php echo $this->tag->stylesheetLink('assets/pages/css/login.min.css'); ?>
        <!-- END LOGIN STYLES -->
        <?php echo $this->tag->stylesheetLink('assets/pages/css/error.min.css'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/datatables/datatables.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/global/plugins/icheck/skins/all.css'); ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN CUSTOM PLUGINS -->
        <?php echo $this->tag->stylesheetLink('assets/zen/style.css'); ?>
        <!-- END CUSTOM PLUGINS -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <?php if ($this->dispatcher->getControllerName() == 'connexion') { ?>
        <body class="login">
    <?php } elseif ($this->dispatcher->getControllerName() == 'errors') { ?>
        <body class="page-404-full-page">
    <?php } else { ?>
        <body class="page-container-bg-solid page-boxed">
    <?php } ?>


        <?php echo $this->getContent(); ?>
        <!--[if lt IE 9]>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/respond.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/excanvas.min.js'); ?> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/jquery.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/js.cookie.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/jquery.blockui.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/uniform/jquery.uniform.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/jquery-validation/js/additional-methods.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/select2/js/select2.full.min.js'); ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <?php echo $this->tag->javascriptInclude('assets/global/scripts/app.min.js'); ?>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <?php echo $this->tag->javascriptInclude('assets/pages/scripts/login.min.js'); ?>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $this->tag->javascriptInclude('assets/global/scripts/datatable.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/datatables/datatables.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/icheck/icheck.min.js'); ?>
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $this->tag->javascriptInclude('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <?php echo $this->tag->javascriptInclude('assets/pages/scripts/table-datatables-managed.min.js'); ?>
        <!-- END PAGE LEVEL SCRIPTS -->
   
    </body>
</html>