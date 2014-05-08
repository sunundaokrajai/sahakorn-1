<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?php echo control_url("bootstrap/css/bootstrap.min.css");?>" media="screen">

<!-- jquery-ui Stylesheets -->
<link rel="stylesheet" href="<?php echo control_url("assets/jui/css/jquery.ui.all.css");?>" media="screen">
<link rel="stylesheet" href="<?php echo control_url("assets/jui/jquery-ui.custom.css");?>" media="screen">
<link rel="stylesheet" href="<?php echo control_url("assets/jui/timepicker/jquery-ui-timepicker.css");?>" media="screen">

<!-- Uniform Stylesheet -->
<link rel="stylesheet" href="<?php echo control_url("plugins/uniform/css/uniform.default.css");?>">

<!-- Plugin Stylsheets first to ease overrides -->

<!-- iButton -->
<link rel="stylesheet" href="<?php echo control_url("plugins/ibutton/jquery.ibutton.css");?>" media="screen">

<!-- Circular Stat -->
<link rel="stylesheet" href="<?php echo control_url("custom-plugins/circular-stat/circular-stat.css");?>">

<!-- Fullcalendar -->
<link rel="stylesheet" href="<?php echo control_url("plugins/fullcalendar/fullcalendar.css");?>" media="screen">
<link rel="stylesheet" href="<?php echo control_url("plugins/fullcalendar/fullcalendar.print.css");?>" media="print">

<!-- End Plugin Stylesheets -->

<!-- Main Layout Stylesheet -->
<link rel="stylesheet" href="<?php echo control_url("assets/css/fonts/icomoon/style.css");?>" media="screen">
<link rel="stylesheet" href="<?php echo control_url("assets/css/main-style.css");?>" media="screen">
<link rel="stylesheet" href="<?php echo base_url("assets/fancybox/jquery.fancybox.css");?>" media="screen">


<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-combobox.css");?>" media="screen">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
.nav2{background: #fff !important;border:1px solid #fff !important;border-bottom:1px solid #ccc !important;}
span.info{color:#000 !important;}
.close{opacity:1;
filter: alpha(opacity=100);}
</style>
<title>ระบบเงินทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร</title>

</head>

<body>
	<!--
    <div id="customizer">
        <div id="showButton"><i class="icon-cogs"></i></div>
        <div id="layoutMode">
            <label class="checkbox"><input type="checkbox" class="uniform" name="layout-mode" value="boxed"> Boxed</label>
        </div>
    </div>
	-->
	<div id="wrapper">
        <header id="header" class="navbar navbar-inverse">
            <div class="navbar-inner nav2">
                <div class="container">
					<div class="brand-wrap pull-left">
						<div class="brand-img">
							<a class="brand" href="#">
								<img src="<?php echo base_url("assets/images/logobanner.png");?>" height="20" alt="">
							</a>
						</div>
					</div>
                    
                    <div id="header-right" class="clearfix">
						<div id="nav-toggle" data-toggle="collapse" data-target="#navigation" class="collapsed">
							<i class="icon-caret-down"></i>
						</div>
						<!--
						<div id="header-search">
							<span id="search-toggle" data-toggle="dropdown">
								<i class="icon-search"></i>
							</span>
							<form class="navbar-search">
								<input type="text" class="search-query" placeholder="Search">
							</form>
						</div>
						<div id="dropdown-lists">
							<a class="item" href="#">
								<span class="item-icon"><i class="icon-exclamation-sign"></i></span>
								<span class="item-label">Notifications</span>
								<span class="item-count">4</span>
							</a>
							<a class="item" href="mail.html">
								<span class="item-icon"><i class="icon-envelope"></i></span>
								<span class="item-label">Messages</span>
								<span class="item-count">16</span>
							</a>
						</div>
						-->
                        
                        <div id="header-functions" class="pull-right">
                        	<div id="user-info" class="clearfix">
                                <span class="info">
                                	สวัสดี
                                    <span class="name"><?php echo getName();?></span>
                                </span>
                            	<div class="avatar">
                                	<a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                    	<img src="<?php echo userLogo();?>" alt="Avatar">
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                    	<li><a href="<?php echo site_url("control/edit_profile");?>"><i class="icol-user"></i> แก้ไขข้อมูลส่วนตัว</a></li>                                   
                                        <li class="divider"></li>
                                        <li><a href="<?php echo site_url("control/logout");?>" onclick="javascript:return confirm('ต้องการออกจากระบบหรือไม่');"><i class="icol-key"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="logout-ribbon">
                            	<a href="<?php echo site_url("control/logout");?>" onclick="javascript:return confirm('ต้องการออกจากระบบหรือไม่');"><i class="icon-off"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div id="content-wrap">
        	<div id="content">
            	<div id="content-outer">
                	<div id="content-inner">
                    	<aside id="sidebar">
                        	<nav id="navigation" class="collapse">
                            	<ul>
                                	<li class="<?php echo $this->uri->segment(1)=="control" || $this->uri->segment(1)==""?"active":"";?>">
                                    	<span title="General">
                                    		<i class="icon-home"></i>
											<span class="nav-title">Dashboard</span>
                                        </span>
                                    	<ul class="inner-nav">
                                        	<li class="<?php echo $this->uri->segment(1)=="control" && $this->uri->segment(2)=="" || $this->uri->segment(1)==""?"active":"";?>"><a href="<?php echo site_url();?>"><i class="icol-dashboard"></i> Dashboard</a></li>	
                                        	<li class="<?php echo $this->uri->segment(2)=="edit_profile"?"active":"";?>"><a href="<?php echo site_url("control/edit_profile");?>"><i class='icol-vcard'></i>&nbsp;แก้ไขข้อมูลส่วนตัว</a></li>
                                        	<!--
                                        	<li><a href="calendar.html"><i class="icol-calendar-2"></i> Calendar</a></li>
                                            <li><a href="icons.html"><i class="icol-lifebuoy"></i> Icons</a></li>
                                        	<li><a href="grids.html"><i class="icol-grid"></i> Grids</a></li>
                                        	<li><a href="typography.html"><i class="icol-font"></i> Typography</a></li>
                                        	-->
                                        </ul>
                                    </li>
                                    <li class="<?php echo $this->uri->segment(1)=="member"?"active":"";?>">
                                    	<span title="User">
                                    		<i class="icon-users"></i>
											<span class="nav-title">สมาชิก</span>
                                        </span>
                                    	<ul class="inner-nav">
                                    		<li class="<?php echo $this->uri->segment(1)=="member"  && $this->uri->segment(2)==""?"active":"";?>"><a href="<?php echo site_url("member");?>"><i class='icol-user'></i> ข้อมูลสมาชิก</a></li>
											<li class="<?php echo $this->uri->segment(1)=="member" && $this->uri->segment(2)=="import"?"active":"";?>"><a href="<?php echo site_url("member/import");?>"><i class='icol-database'></i> นำเข้าข้อมูลสมาชิก</a></li>
                                        	
                                        </ul>
                                    </li>
                                	<li class="<?php echo $this->uri->segment(1)=="loan"?"active":"";?>">
                                    	<span title="Form">
                                        	<i class="icon-list-2"></i>
											<span class="nav-title">สัญญา</span>
                                        </span>
                                    	<ul class="inner-nav">
                                    		<li class="<?php echo $this->uri->segment(1)=="loan" && $this->uri->segment(3)=="all"?"active":"";?>"><a href="<?php echo site_url("loan/set/all");?>"><i class="icol-application-view-columns"></i> สัญญาเงินกู้ทั้งหมด</a></li>
                                        	<li class="<?php echo $this->uri->segment(1)=="loan" && $this->uri->segment(3)=="long"?"active":"";?>"><a href="<?php echo site_url("loan/set/long");?>"><i class="icol-application-view-list"></i> เงินกู้ระยะยาว</a></li>
                                        	<li class="<?php echo $this->uri->segment(1)=="loan" && $this->uri->segment(3)=="short"?"active":"";?>"><a href="<?php echo site_url("loan/set/short");?>"><i class="icol-table"></i> เงินกู้ระยะสั้น</a></li>
                                            <li class="<?php echo $this->uri->segment(1)=="loan" && $this->uri->segment(3)=="study"?"active":"";?>"><a href=<?php echo site_url("loan/set/study");?>"><i class="icol-eye"></i> เงินกู้เพื่อการศึกษา</a></li>
                                        </ul>
                                    </li>
                                	<li class="<?php echo $this->uri->segment(1)=="config"?"active":"";?>">
                                    	<span title="Elements">
                                        	<i class="icon-cogs"></i>
											<span class="nav-title">ตั้งค่าระบบ</span>
                                        </span>
                                    	<ul class="inner-nav">
                                    		<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="office"?"active":"";?>"><a href="<?php echo site_url("config/office");?>"><i class='icol-application-home'></i>จัดการสังกัด</a></li>
                                    		<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="department"?"active":"";?>"><a href="<?php echo site_url("config/department");?>"><i class='icol-award-star-gold'></i>จัดการหน่วยงาน</a></li>
                                    		<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="sub_department"?"active":"";?>"><a href="<?php echo site_url("config/sub_department");?>"><i class='icol-bookmark-book-open'></i>จัดการฝ่าย/กลุ่มงาน</a></li>
                                    		<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="jobs"?"active":"";?>"><a href="<?php echo site_url("config/jobs");?>"><i class='icol-bookmark-document'></i>จัดการตำแหน่งงาน</a></li>
                                    		<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="users"?"active":"";?>"><a href="<?php echo site_url("config/users");?>"><i class='icol-user'></i>จัดการผู้ใช้งานระบบ</a></li>
											<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="relation"?"active":"";?>"><a href="<?php echo site_url("config/relation");?>"><i class="icol-chart-line"></i>ตั้งค่าข้อมูลความสัมพันธ์</a></li>
											<li class="<?php echo $this->uri->segment(1)=="config" && $this->uri->segment(2)=="month_expire"?"active":"";?>"><a href="<?php echo site_url("config/month_expire");?>"><i class="icol-application-view-tile"></i>ตั้งค่าเดือนเรียกเก็บเงินสมทบ</a></li>
											
                                    		<!--
                                        	<li><a href="ui_bootstrap.html"><i class="icol-ui-tab-content"></i> Bootstrap Elements</a></li>
											<li><a href="ui_components.html"><i class="icol-pipette"></i> Other Elements</a></li>
                                        	<li><a href="alerts.html"><i class="icol-error"></i> Alerts and Notifications</a></li>
											<li><a href="boxes.html"><i class="icol-cog"></i> Widget Boxes</a></li>
                                        	<li><a href="buttons.html"><i class="icol-joystick"></i> Buttons</a></li>
                                        	<li><a href="file_uploader.html"><i class="icol-computer"></i> File Uploader</a></li>
											<li><a href="file_manager.html"><i class="icol-databases"></i> File Manager</a>	
											-->
                                        </ul>
                                    </li>
									<li class="<?php echo $this->uri->segment(1)=="money"?"active":"";?>">
                                    	<span title="Form">
                                        	<i class="icon-download-2"></i>
											<span class="nav-title">การเงิน</span>
                                        </span>
                                    	<ul class="inner-nav">
                                    		<li class="<?php echo $this->uri->segment(1)=="money" && $this->uri->segment(2)=="department"?"active":"";?>"><a href="<?php echo site_url("money/department");?>"><i class="icol-sitemap"></i> ชำระรายหน่วยงาน</a></li>
                                        	<li class="<?php echo $this->uri->segment(1)=="money" && $this->uri->segment(2)=="member"?"active":"";?>"><a href="<?php echo site_url("money/member");?>"><i class="icol-user-business-boss"></i> ชำระรายบุคคล</a></li>
                                        	<li class="<?php echo $this->uri->segment(1)=="money" && $this->uri->segment(2)=="receipt"?"active":"";?>"><a href="<?php echo site_url("money/receipt");?>"><i class="icol-doc-table"></i> ข้อมูลใบเสร็จ</a></li>
                                        </ul>
                                    </li>
                                	<li>
                                    	<span title="Extra">
                                        	<i class="icon-print"></i>
											<span class="nav-title">รายงาน</span>
                                        </span>
                                        <ul class="inner-nav">
											<!--
                                            <li><a href="profile.html"><i class="icol-user"></i> Profile Page</a></li>
                                            <li><a href="mail.html"><i class="icol-email"></i> Mail Page</a></li>
                                            <li><a href="widgets.html"><i class="icol-ruby"></i> Custom Widgets</a></li>
                                            <li><a href="gallery.html"><i class="icol-images"></i> Image Gallery</a>
                                            <li><a href="contacts.html"><i class="icol-vcard"></i> Contact List</a></li>
                                            <li><a href="404.html"><i class="icol-error"></i> Error Page (404)</a></li>
											-->
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </aside>

                        <div id="sidebar-separator"></div>
                        
                        <section id="main" class="clearfix">
                        	
                            
                            