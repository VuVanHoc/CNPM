<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Trang Quan Li Nhan Su</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url()?>public/admin/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url()?>public/admin/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url()?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
    </head>
    <body style="background: #eceff2; color: black;">
        <div id="wrapper" style="background: #eceff2;">
            <!-- Navigation -->
            <nav style="border-bottom: 1px solid #ccc;" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a style="color: black;" class="navbar-brand" href="index.html">Xin chào <?php echo $_SESSION['admin_name']?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black;"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                                <strong><?php echo $_SESSION['admin_name']?></strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                           
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black;"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                           
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black;"><i class="fa fa-user"></i> <?php echo $_SESSION['admin_name']?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/quanlinhansu/login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse" style="background: #eceff2;">
                    <ul class="nav navbar-nav side-nav" style="background: #eceff2; border-right: 1px solid #ccc;">
                        <li>
                            <a href="index.html" style="color: black;"><i class="fa fa-fw fa-dashboard"></i> Tổng quan </a>
                        </li>
                        
                        <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : ''?>">
                            <a class="nav-link" href="<?php echo modules("admin") ?>" style="color: black;">
                               <i class="fa fa-fw fa-user"> </i>
                                  <span class="nav-link-text">Danh sách quản lí</span>
                            </a>
                        </li>    
                        <li class="<?php echo isset($open) && $open == 'nhanvien' ? 'active' : ''?>">
                            <a class="nav-link" href="<?php echo modules("nhanvien") ?>" style="color: black;">
                               <i class="fa fa-fw fa-user"> </i>
                                  <span class="nav-link-text">Danh sách nhân viên</span>
                            </a>
                        </li>
                        <li class="<?php echo isset($open) && $open == 'bangluong' ? 'active' : ''?>">
                            <a class="nav-link" href="<?php echo modules("bangluong") ?>" style="color: black;">
                               <i class="fa fa-fw fa-usd"> </i>
                                  <span class="nav-link-text">Bảng Lương</span>
                            </a>
                        </li>
                        <li class="<?php echo isset($open) && $open == 'luongtheothang' ? 'active' : ''?>">
                            <a class="nav-link" href="<?php echo modules("luongtheothang/luong.php") ?>" style="color: black;">
                               <i class="fa fa-fw fa-usd"></i>
                                  <span class="nav-link-text">Tính lương hàng tháng</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper" style="background: #eceff2;">
                <div class="container-fluid">