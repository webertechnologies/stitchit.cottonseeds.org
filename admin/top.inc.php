<?php
require("connection.php");
require("functions.php");
if(isset( $_SESSION['ADMIN_LOGIN']) &&  $_SESSION['ADMIN_LOGIN']!=''){
}
else{
    header('location:login.php');
    die();
}
// $nav_stateh="nav-item";
// $nav_state_cat="nav-item";
// $nav_state_pro="nav-item";
// $nav_state_order="nav-item";
// $nav_state_user="nav-item";
// $nav_state_cont="nav-item";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Fluffy Friend</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/style.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="<?php echo $nav_state_cat ?> d-block d-md-none"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ft-menu"></i></a></li>
                        <li class="<?php echo $nav_state_cat ?> d-none d-md-block"><a class="nav-link nav-link-expand"
                                href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="<?php echo $nav_state_cat ?> dropdown navbar-search"><a
                                class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i
                                    class="ficon ft-search"></i></a>
                            <ul class="dropdown-menu">
                                <li class="arrow_box">
                                    <form>
                                        <div class="input-group search-box">
                                            <div class="position-relative has-icon-right full-width">
                                                <input class="form-control" id="search" type="text"
                                                    placeholder="Search here...">
                                                <div class="form-control-position navbar-search-close"><i class="ft-x">
                                                    </i></div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language <?php echo $nav_state_cat ?>"><a
                                class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box"><a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item"
                                        href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a
                                        class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i>
                                        Russian</a><a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item"
                                        href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification <?php echo $nav_state_cat ?>"><a
                                class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                    class="ficon ft-mail"> </i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i>
                                        Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read
                                        Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark
                                        all Read </a></div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user <?php echo $nav_state_cat ?>"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online"><img
                                        src="theme-assets/images/portrait/small/avatar-s-19.png"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span
                                            class="avatar avatar-online"><img
                                                src="theme-assets/images/portrait/small/avatar-s-19.png"
                                                alt="avatar"><span class="user-name text-bold-700 ml-1">John
                                                Doe</span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i
                                            class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i
                                            class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i
                                            class="ft-message-square"></i> Chats</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i
                                            class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
        data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                            alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png" />
                        <h3 class="brand-text">StitchIt</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="<?php echo $nav_stateh ?>"><a href="dashboard.php"><i class="ft-home"></i><span
                            class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class="<?php echo $nav_state_cat ?>"><a href="categories.php"><i class="ft-pie-chart"></i><span
                            class="menu-title" data-i18n="">Category Master</span></a>
                </li>
                <li class=" <?php echo $nav_state_pro ?>"><a href="product.php"><i class="ft-droplet"></i><span
                            class="menu-title" data-i18n="">Product Master</span></a>
                </li>
                <li class=" <?php echo $nav_state_order ?>"><a href="order_master.php"><i class="ft-layers"></i><span
                            class="menu-title" data-i18n="">Order Master</span></a>
                </li>
                <li class=" <?php echo $nav_state_user ?>"><a href="users.php"><i class="ft-box"></i><span
                            class="menu-title" data-i18n="">User Master</span></a>
                </li>
                <li class=" <?php echo $nav_state_cont ?>"><a href="contact-us.php"><i class="ft-bold"></i><span
                            class="menu-title" data-i18n="">Contact Us</span></a>
                </li>
                <li class=" nav-item"><a href="tables.html"><i class="ft-credit-card"></i><span class="menu-title"
                            data-i18n="">Tables</span></a>
                </li>
                <li class=" nav-item"><a href="form-elements.html"><i class="ft-layout"></i><span class="menu-title"
                            data-i18n="">Form Elements</span></a>
                </li>
                <li class=" nav-item"><a
                        href="https://themeselection.com/demo/chameleon-admin-template/documentation"><i
                            class="ft-book"></i><span class="menu-title" data-i18n="">Documentation</span></a>
                </li>
            </ul>
        </div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="#" target="_blank">StitchIt
            online !</a>
        <div class="navigation-background"></div>
    </div>