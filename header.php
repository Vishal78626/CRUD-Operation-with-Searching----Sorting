<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
		<title></title>
		<link rel="shortcut icon" type="image/x-icon" href="images/fav.ico" />
		
		<script src="js/jquery-1.12.1.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		
		<!-- <script src="js/view-image.js"></script> -->
		<!-- <script src="js/view-image.min.js"></script> -->
		<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
  		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/flatly/ -->
		
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>

		<style type="text/css">
			form .error {
		  		color: #ff0000;
			}
			span .error {
			    width: 100%;
			    display: block;
			}
		</style>

	</head>

	<body class="admin_body">
		<header>		
			<div id="wrapper2">			
				<div class="header-base">				
					<div class="logo-div">
						<a title="Shamrock Finance" href ="http://localhost/vishal/shamrock">
							<img alt="Shamrock Finance" src="images/logo.png"/>
						</a>
					</div>
				<?php
				session_start(); 
				if($_SESSION['is_login']){ ?>
					<div class="header-right-main">
						<nav  class="dashboard-nav">
							<div class="welcometxt"> 
								<h2>
									
									<a  title="Unread Message(s)" href="" class="message-icon">
									<img  src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/message_chat.png">
									<span id="inbox_count" style='display:none'></span>
										
									</a>
									<?php

									include('connection.php');
									$email = $_SESSION['email'];
									$password = $_SESSION['password'];
									$sql = "select name from users where email='$email' AND password='$password' ";
									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) == 1){
										while($row = mysqli_fetch_assoc($result)) {
											$username = $row['name'];
										}
									}
									
									?>
									<span>Welcome <?php echo $username; ?></span>
									
								</h2>
							</div>
							<ul>
								<li >
									<a href="logout.php" class="active sign-out">Logout</a>
								</li>
							</ul>
						</nav>

						<div class="navi-outer" id="dashboard">
													<ul>
								<li> 
									<a  href="list.php">Customer List</a> 
								</li>
									
								<li class="slide-menu" id="manage_dealers" style="display:inline-block"> 
									<a href="#"> Dealers <i class="fa fa-angle-down menu-down"></i>  </a> 
									<ul class="sub-menu manages-dlr">
										<li style="display:inline-block"> 
											<a class=""   href="">Dealers</a>
										</li>
										<li> 
											<a href=""> Reserve Fund Requests</a> 
										</li>
									</ul>
								</li>
								
								<li class="slide-menu" id="manage_dealercredit" style="display:inline-block">
									<a href=""> Dealer Credit </a> 
								</li>
								<li class="slide-menu" id="manage_vehicles" style="display:inline-block"> 
									<a href=""> Vehicles </a> 
								</li>
								<li class="slide-menu" id="manage_lotcheck" style="display:inline-block"> 
									<a href=""> Lot Check </a> 
								</li>
								<li class="slide-menu" id="manage_admin" style="display:inline-block"> 
									<a href="#"> Employees <i class="fa fa-angle-down menu-down"></i>  </a> 
									<ul class="sub-menu manages-emp">
										<li style="display:inline-block"> 
											<a class=""   href="#">Employees</a>
										</li>
										<li> 
											<a href=""> Activity Log</a> 
										</li>
									</ul>
								</li>
								<li style="display:inline-block" id="blogs">  
									<a class="" href="#"> Blogs <i class="fa fa-angle-down menu-down"></i> </a> 
									<ul class="sub-menu blog-child">
										<li style="display:inline-block"> 
											<a class="" id="manage_blog"  href="">Blogs</a>
										</li>
										<li> 
											<a class="" id="manage_comments" href="">Comments</a>
										</li>
									</ul>
								</li>
								<li class="slide-menu " id="reports" style="display:inline-block"> 

									<a class="slide-menu-new" href="#"> Reports <i class="fa fa-angle-down menu-down"></i> </a> 
									<ul class="sub-menu report-child report">
										<li>
											<a class="" href="">Additional Fee Report</a>
										</li>
										<li>  
											<a class="" href="">Aging Report</a>
										</li>
										<li > 
											<a class="" href="">Available Dealer Credit</a>
										</li>
										<li > 
											<a class="" href="">Available Dealers Report</a>
										</li>
										<li>  
											<a class="" href="">Credits</a>
										</li>
										<li> 
											<a class="" href="">Daily Snapshot External Version</a>
										</li>
										<li > 
											<a class="" href="">Daily Snapshot Internal Version</a>
										</li>
										<li > 
											<a class="" href="">Dealer Master List</a>
										</li>
										<li > 
											<a class="" href="">Dealers Interest Payment Report</a>
										</li>
										<li>  
											<a class="" href="">Floored Units</a>
										</li>
										<li > 
											<a class="" href="">Individual Dealer Receivable Report</a>
										</li>
										<li > 
											<a class="" href="">Loan Receivable Summary Report</a>
										</li>
										<li> 
											<a class="" href="">Lot Check Status</a>
										</li>
									
										<li> 
											<a class="" href="">Negative Balance</a>
										</li>
										<li>  
											<a class="" href="">Paid Units</a>
										</li>
										<li>  
											<a class="" href="">Payment Due</a>
										</li>
										
										<li>  
										<a class="" href="">Reserve Fund</a>
										</li>
										
										
										<li>
											<a class="" href="">System Emails</a>
										</li>
										<li> 
											<a class="" href="">Titles</a>
										</li>
										
										<li> 
											<a class="" href="">UCC Report</a>
										</li>	
									</ul>
								</li>
								
								<li class="slide-menu" id="master_data" style="display:inline-block"> 
									<a class="" href="#">Master Data <i class="fa fa-angle-down menu-down"></i> </a> 
									<ul class="sub-menu master-child">
										<li> 
											<a class="" href="">Static Pages</a>
										</li>
										<li> 
											<a class="" href="">Email Templates</a>
										</li>
									</ul>
								</li>
								<li class="slide-menu" id="settings"> 
									<a class="" href="#"> Settings <i class="fa fa-angle-down menu-down"></i> </a> 
									<ul class="sub-menu setting-child">
										<li style="display:inline-block"> 
											<a class="" href="">General Settings</a>
										</li>
										<li> 
											<a class="" href="">Change Password</a>
										</li>
									</ul>
								</li>						
							</ul>
						</div>
					</div>
				<?php } ?>
				</div>			
			</div>		
		</header>