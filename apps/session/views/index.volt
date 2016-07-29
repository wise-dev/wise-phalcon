<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {{ stylesheet_link('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
        {{ stylesheet_link('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
        {{ stylesheet_link('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
        {{ stylesheet_link('assets/global/plugins/uniform/css/uniform.default.css') }}
        {{ stylesheet_link('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {{ stylesheet_link('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {{ stylesheet_link('assets/global/css/components.min.css') }}
        {{ stylesheet_link('assets/global/css/plugins.min.css') }}
        {{ stylesheet_link('assets/pages/css/profile.min.css') }}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {{ stylesheet_link('assets/layouts/layout3/css/layout.min.css')}}
        {{ stylesheet_link('assets/layouts/layout3/css/themes/default.min.css')}}
        {{ stylesheet_link('assets/layouts/layout3/css/custom.min.css')}}
        <!-- END THEME LAYOUT STYLES -->
        <!-- BEGIN LOGIN STYLES -->
        {{ stylesheet_link('assets/pages/css/login.min.css')}}
        <!-- END LOGIN STYLES -->
        {{ stylesheet_link('assets/pages/css/error.min.css')}}
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {{ stylesheet_link('assets/global/plugins/datatables/datatables.min.css')}}
        {{ stylesheet_link('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}
        {{ stylesheet_link('assets/global/plugins/icheck/skins/all.css')}}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN CUSTOM PLUGINS -->
        {{ stylesheet_link('assets/zen/style.css')}}
        <!-- END CUSTOM PLUGINS -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    {% if dispatcher.getControllerName() == "connexion"  %}
        <body class="login">
    {% elseif dispatcher.getControllerName() == "errors"%}
        <body class="page-404-full-page">
    {% else %}
        <body class="page-container-bg-solid page-boxed">
    {% endif  %}


        {{ content() }}
        <!--[if lt IE 9]>
        {{ javascript_include('assets/global/plugins/respond.min.js') }}
        {{ javascript_include('assets/global/plugins/excanvas.min.js') }} 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {{ javascript_include('assets/global/plugins/jquery.min.js') }}
        {{ javascript_include('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
        {{ javascript_include('assets/global/plugins/js.cookie.min.js') }}
        {{ javascript_include('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
        {{ javascript_include('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
        {{ javascript_include('assets/global/plugins/jquery.blockui.min.js') }}
        {{ javascript_include('assets/global/plugins/uniform/jquery.uniform.min.js') }}
        {{ javascript_include('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {{ javascript_include('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
        {{ javascript_include('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}
        {{ javascript_include('assets/global/plugins/select2/js/select2.full.min.js') }}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {{ javascript_include('assets/global/scripts/app.min.js') }}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {{ javascript_include('assets/pages/scripts/login.min.js') }}
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {{ javascript_include('assets/global/scripts/datatable.js') }}
        {{ javascript_include('assets/global/plugins/datatables/datatables.min.js') }}
        {{ javascript_include('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}
        {{ javascript_include('assets/global/plugins/icheck/icheck.min.js') }}
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        {{ javascript_include('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {{ javascript_include('assets/pages/scripts/table-datatables-managed.min.js') }}
        <!-- END PAGE LEVEL SCRIPTS -->
   
    </body>
</html>