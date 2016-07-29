<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo $this->url->get('index/index'); ?>">
                    <?php echo $this->tag->image(array('/public/assets/images/logo.jpg', 'alt' => '', 'class' => 'logo-default', 'style' => 'width: 80px; margin-top: 3px;')); ?>
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <?php echo $this->tag->image(array('/public/avatars/' . $this->session->auth['image'], 'alt' => '', 'class' => 'img-circle')); ?>
                            <span class="username username-hide-mobile"><?php echo $this->session->auth['username']; ?></span>
                        </a>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    
                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                    	<a href="<?php echo $this->url->get('session/end'); ?>" style="margin-top: -13px;">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="icon-logout" style="font-size: 20px"></i>
                        </a>
                    </li>
	                
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->
    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <div class="hor-menu  ">
                <ul class="nav navbar-nav">
                     <li class="dropdown dclassic-menu-dropdown <?php if ($this->dispatcher->getControllerName() == 'dashboard') { ?> active <?php } ?>">
                            <a href="<?php echo $this->url->get('dashboard/index'); ?>" class="text-uppercase">
                            <i class="icon-home"></i> Accueil </a>
                        </li>
                    <li class="menu-dropdown classic-menu-dropdown <?php if ($this->dispatcher->getControllerName() == 'rdv') { ?> active  <?php } ?>">
                        <a href="<?php echo $this->url->get('rdv/index'); ?>"> <i class="fa fa-calendar-check-o"></i> Rendez-vous</span>
                        </a>
                    </li>

                    <?php if ($this->session->auth && $this->session->auth['role'] == 'Admin') { ?>
                        <li class="menu-dropdown classic-menu-dropdown  <?php if ($this->dispatcher->getControllerName() == 'user') { ?> active <?php } ?>">
                            <a href="<?php echo $this->url->get('user/index'); ?>"> <i class="icon-users"></i> Utilisateurs</span></a>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                                <?php if ($this->dispatcher->getControllerName() == 'dashboard') { ?>
                                    <a href="<?php echo $this->url->get('dashboard/index'); ?>">Dashboard</a>
                                <?php } elseif ($this->dispatcher->getControllerName() == 'rdv') { ?>
                                    <a href="<?php echo $this->url->get('rdv/index'); ?>">Rendez-vous</a>
                                <?php } elseif ($this->dispatcher->getControllerName() == 'user') { ?>
                                    <a href="<?php echo $this->url->get('user/index'); ?>">Utilisateurs</a>
                                <?php } ?>
                                <i class="fa fa-angle-right"></i>
                                <?php if ($this->dispatcher->getActionName() == 'edit') { ?>
                                    Modifier
                                <?php } elseif ($this->dispatcher->getActionName() == 'save') { ?>
                                    Enregister
                                <?php } elseif ($this->dispatcher->getActionName() == 'details') { ?>
                                    Détails
                                <?php } elseif ($this->dispatcher->getActionName() == 'new') { ?>
                                    Ajouter
                                <?php } elseif ($this->dispatcher->getActionName() == 'profile') { ?>
                                    Profil
                                <?php } ?>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <?php echo $this->flash->output(); ?>
                            <?php echo $this->getContent(); ?>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
 