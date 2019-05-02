<?php 
  ob_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Quản lý nhân viên</title>
    <!-- Favicons-->
    <link rel="icon" href="public/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="public/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="public/images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="public/css//materialize.css" type="text/css" rel="stylesheet">
    <link href="public/css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="public/css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="public/vendors/prism/prism.css" type="text/css" rel="stylesheet">
    <link href="public/vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="public/vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    <style type="text/css">
      small.pink{
        display: none !important; 
      }
    </style>
  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="?mod=user" class="brand-logo darken-1">
                    <img src="public/images/logo/materialize-logo.png" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">FLASH SOFT</span>
                  </a>
                </h1>
              </li>
            </ul>
            <div class="header-search-wrapper hide-on-med-and-down">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Tìm kiếm ..." />
            </div>
            <ul class="right hide-on-med-and-down">
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span class="flag-icon flag-icon-gb"></span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">5</small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="public/images/<?= $_SESSION['user']['image']?>" alt="avatar" style="width: 28px !important;height: 28px !important">
                    <i></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                  <i class="material-icons">format_indent_increase</i>
                </a>
              </li>
            </ul>
            <!-- translation-button -->
            <ul id="translation-dropdown" class="dropdown-content">
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-gb"></i> English</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-fr"></i> French</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-cn"></i> Chinese</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-de"></i> German</a>
              </li>
            </ul>
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>THÔNG BÁO
                </h6>
              </li>
              <li class="divider"></li>
              <?php foreach ($notifications as $notification) {
               ?>
              <li>
                <a href="#modal_notification" idNo="<?= $notification['id'] ?>" class="grey-text text-darken-2 modal-trigger modal_notification">
                  <span class="material-icons icon-bg-circle cyan small">done</span><?= $notification['title'] ?></a>
              </li>
              <?php } ?>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="?mod=dashboard&act=profile" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Thông tin</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Cài đặt</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Trợ giúp</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">lock_outline</i> Khóa</a>
              </li>
              <li>
                <a href="?mod=dashboard&act=logout" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Đăng xuất</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img src="public/images/<?= $_SESSION['user']['image']?>" alt="" class="circle responsive-img valign profile-image cyan" style="width: 53px !important;height: 53px !important">
                </div>
                <div class="col col s8 m8 l8">
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="?mod=dashboard&act=profile" data-activates="profile-dropdown-nav"><?= $_SESSION['user']['name'] ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal">
                    <?php 
                      if($_SESSION['user']['role_id']!=1){
                        echo "Nhân viên";
                      } else{
                        echo "Quản lí";
                      }
                    ?>
                  </p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                  <a href="?mod=dashboard" class="waves-effect waves-cyan">
                      <i class="material-icons">dashboard</i>
                      <span class="nav-text">Trang chủ</span>
                  </a>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                      <i class="material-icons">person</i>
                      <span class="nav-text">Nhân viên</span>
                  </a>
                  <div class="collapsible-body" style="display: block;">
                    <ul>
                      <li >
                        <a href="?mod=user&act=list">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Danh sách</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="bold 
                  <?php 
                    if($_SESSION['user']['role_id']!=1){
                      echo 'hide';
                    }

                  ?>"
                >
                  <a href="?mod=notification&act=add" class="waves-effect waves-cyan">
                      <i class="material-icons">notifications_active</i>
                      <span class="nav-text">Thông báo</span>
                  </a>
                </li>
              </ul>
            </li>
            
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
<div id="modal_notification" class="modal">
    <div class="modal-content">
        <h5 id="nameNotifi"></h5>
        <p id="contentNotifi"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Thoát</a>
    </div>
</div>

