
<!DOCTYPE html>
<head>
	<!-- Chat -->
	<link rel="stylesheet" href="http://dexteroustechnologies.co.in/shamrock/assets/css/admin/chat/chatStyle.css" />
	<!-- Chat -->
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<title>Add Vehicle</title>
	<link rel="shortcut icon" type="image/x-icon" href="http://dexteroustechnologies.co.in/shamrock/assets/images/fav.ico" />
	<link href="http://dexteroustechnologies.co.in/shamrock/assets/css/admin/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://dexteroustechnologies.co.in/shamrock/assets/css/jquery-ui.css"/>
		<link rel="stylesheet" type="text/css" href="http://dexteroustechnologies.co.in/shamrock/assets/css/sweet_alert.css"/>
		<link rel="stylesheet" type="text/css" href="http://dexteroustechnologies.co.in/shamrock/assets/css/jquery.mCustomScrollbar.css"/>
		<link rel="stylesheet" type="text/css" href="http://dexteroustechnologies.co.in/shamrock/assets/css/jquery.multiselect.css"/>
	<link href="http://dexteroustechnologies.co.in/shamrock/assets/css/admin/style.css" rel="stylesheet">
	<script src="http://dexteroustechnologies.co.in/shamrock/assets/js/jquery-1.12.1.min.js"></script>

	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/jquery-ui.js"></script>
	<!-- Chat -->
	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/admin/chat/chat.js"></script>
	<!-- Chat -->
		<script src="http://dexteroustechnologies.co.in/shamrock/assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/additional-methods.js"></script>
	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/jquery-ui.js"></script>
		<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/jquery.multiselect.js"></script>

	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/moment.min.js"></script>
		<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/sweet_alert.js"></script>
	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/admin/promise.js"></script>
		<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/admin/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="http://dexteroustechnologies.co.in/shamrock/assets/js/admin/script.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

	
		<script type="text/javascript" src="https://appcenter.intuit.com/Content/IA/intuit.ipp.anywhere.js"></script>
		<script type="text/javascript">
		intuit.ipp.anywhere.setup({
			menuProxy: 'http://dexteroustechnologies.co.in/shamrock/main/menu.php',
			grantUrl: 'http://dexteroustechnologies.co.in/shamrock/main/oauth.php'
		});
		</script>



	<script>
		var base_url = 'http://dexteroustechnologies.co.in/shamrock/';
		var admin_url = 'http://dexteroustechnologies.co.in/shamrock/admin/';
		function loadajax(){
		$.ajax({
			url:admin_url+'message/get_message_count',
			type:'post',
			success:function(data) {
			if($.trim(data)>0){
			$('#inbox_count').show();	
			$('#inbox_count').html($.trim(data));
		    } else {
				$('#inbox_count').hide();
			}
			
			}
		});
        }
		
		
		$(document).ready(function(){
			setTimeout(function(){
			   loadajax();
			 },1000); // milliseconds
		});
		
	</script>
	
	
</head>
<body>	
	<!--  Chat -->
	<div class="chat-bg-overlay" style = "display:none"></div>
	<div id = "chat_boxes" class="user-chating-div"></div>
	<div id = "main_chat" class="chat-main-cover" style = "display:none">
		<div class="chat-inner-main">
			<div class="chat-head"><h3><img src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/chat-box.svg">Users</h3><span title = "Close" class="chat-close" onclick = "closeChatBox()" ><i class = "fa fa-chevron-down"></i></span></div>
			<div class="listing-comondiv">
				<div class="chat-user-listing">
					<ul id="onlinebuddies" class="chat">
						
					</ul>
				</div>

				<!-- end of chat user listing -->
			</div>
		</div>
	</div>
	<div id="menu-root" href = "javascript(void)" onclick = "openChatBox()" class = "start-chat">
		<span>Chat Here</span>
		<i title = "Chat Here" class = "arrowChat fa fa-chevron-up"></i>
		<span id="" class="newmessage"><i class = "fa fa-comments"></i></span>
		<span id="newmessage" class = "new-evelope"></span>
	</div>
	<!--  Chat -->
	<header>		
		<div id="wrapper2">			
			<div class="header-base">				
				<div class="logo-div">
					<a title="Shamrock Finance" href ="http://dexteroustechnologies.co.in/shamrock/admin/">
						<img alt="Shamrock Finance" src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/logo.png"/>
					</a>
				</div>
				
				<div class="header-right-main">
					<nav  class="dashboard-nav">
						<div class="welcometxt"> 
							<h2>
								
																<a  title="Unread Message(s)" href="http://dexteroustechnologies.co.in/shamrock/admin/message/inbox" class="message-icon">
									<img  src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/message_chat.png">
																		<span id="inbox_count" style='display:none'></span>
									
								</a>|
								<span>
									Welcome  Admin								</span>
								
							</h2>
						</div>
						<ul>
							<li >
								<a href="http://dexteroustechnologies.co.in/shamrock/admin/logout" class="active sign-out">Logout</a>
							</li>
						</ul>
					</nav>

					<div class="navi-outer" id="dashboard">
												<ul>
							<li> 
								<a  href="http://dexteroustechnologies.co.in/shamrock/admin/dashboard"> Dashboard </a> 
							</li>
								
							<!--li class="slide-menu" id="manage_dealers" style="< ?php echo $deal_dis; ?>"> 
								<a href="< ?php echo $this->config->item('admin_url'); ?>dealers"> Dealers </a> 
							</li-->
							<li class="slide-menu" id="manage_dealers" style="display:inline-block"> 
								<a href="#"> Dealers <i class="fa fa-angle-down menu-down"></i>  </a> 
								<ul class="sub-menu manages-dlr">
									<li style="display:inline-block"> 
										<a class=""   href="http://dexteroustechnologies.co.in/shamrock/admin/dealers">Dealers</a>
									</li>
									<li> 
										<a href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/reserve_requests"> Reserve Fund Requests</a> 
									</li>
								</ul>
							</li>
							
							<li class="slide-menu" id="manage_dealercredit" style="display:inline-block"> 
								<a href="http://dexteroustechnologies.co.in/shamrock/admin/dealercredit"> Dealer Credit </a> 
							</li>
							<li class="slide-menu" id="manage_vehicles" style="display:inline-block"> 
								<a href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles"> Vehicles </a> 
							</li>
							<li class="slide-menu" id="manage_lotcheck" style="display:inline-block"> 
								<a href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/lot_check"> Lot Check </a> 
							</li>
							<li class="slide-menu" id="manage_admin" style="display:inline-block"> 
								<a href="#"> Employees <i class="fa fa-angle-down menu-down"></i>  </a> 
								<ul class="sub-menu manages-emp">
									<li style="display:inline-block"> 
										<a class=""   href="http://dexteroustechnologies.co.in/shamrock/admin/manage_employees">Employees</a>
									</li>
									<li> 
										<a href="http://dexteroustechnologies.co.in/shamrock/admin/activity_log"> Activity Log</a> 
									</li>
								</ul>
							</li>
							<li style="display:inline-block" id="blogs">  
								<a class="" href="#"> Blogs <i class="fa fa-angle-down menu-down"></i> </a> 
								<ul class="sub-menu blog-child">
									<li style="display:inline-block"> 
										<a class="" id="manage_blog"  href="http://dexteroustechnologies.co.in/shamrock/admin/blog">Blogs</a>
									</li>
									<li> 
										<a class="" id="manage_comments" href="http://dexteroustechnologies.co.in/shamrock/admin/blog/comments_all">Comments</a>
									</li>
								</ul>
							</li>
							<li class="slide-menu " id="reports" style="display:inline-block"> 

								<a class="slide-menu-new" href="#"> Reports <i class="fa fa-angle-down menu-down"></i> </a> 
								<ul class="sub-menu report-child report">
									<li>
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/add_fee_report">Additional Fee Report</a>
									</li>
									<li>  
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/	ageing_vehicles_report">Aging Report</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/bal_detail">Available Dealer Credit</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/dealers_report">Available Dealers Report</a>
									</li>
									<li>  
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/credit_report">Credits</a>
									</li>
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/daily_snapshot_company_version">Daily Snapshot External Version</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/daily_snapshot_internal_version">Daily Snapshot Internal Version</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/dealer_master_list">Dealer Master List</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/interest_payment_report">Dealers Interest Payment Report</a>
									</li>
									<li>  
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/purchase_report/">Floored Units</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/individual_dealer_receivable_report">Individual Dealer Receivable Report</a>
									</li>
									<li > 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/loan_receivable_summary_report">Loan Receivable Summary Report</a>
									</li>
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/lot_check_status_reports">Lot Check Status</a>
									</li>
								
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/neg_bal_detail">Negative Balance</a>
									</li>
									<li>  
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/sales_report">Paid Units</a>
									</li>
									<li>  
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/payment_due_report">Payment Due</a>
									</li>
									
									<li>  
									<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/reserve_report">Reserve Fund</a>
									</li>
									
									
									<li>
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/system_emails">System Emails</a>
									</li>
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/title_reports">Titles</a>
									</li>
									
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/dealers/ucc_report">UCC Report</a>
									</li>	
								</ul>
							</li>
							
							<li class="slide-menu" id="master_data" style="display:inline-block"> 
								<a class="" href="#">Master Data <i class="fa fa-angle-down menu-down"></i> </a> 
								<ul class="sub-menu master-child">
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/setting/static_page">Static Pages</a>
									</li>
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/setting/email_templates">Email Templates</a>
									</li>
								</ul>
							</li>
							<li class="slide-menu" id="settings"> 
								<a class="" href="#"> Settings <i class="fa fa-angle-down menu-down"></i> </a> 
								<ul class="sub-menu setting-child">
									<li style="display:inline-block"> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/setting/general_settings">General Settings</a>
									</li>
									<li> 
										<a class="" href="http://dexteroustechnologies.co.in/shamrock/admin/change_password">Change Password</a>
									</li>
								</ul>
							</li>						
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="border-div"></div>	
	<div class="clr"></div>
	<script >
		setTimeout(function(){ $('#succ_flash').fadeOut('slow'); }, 6000);
	</script>
		<div class="hotel-listing add_edit">
		<div class="regi-main ">

			<div id="wrapper2" class="vehicle_wrapper">
				<div style="display:none;" class="top-msg" id="message-green">
					<table cellspacing="0" cellpadding="0" style="width:100%;border:0px;">
						<tbody>
							<tr>
								<td class="green-left" style="border:0px;">
									<span class="msg_green"><i aria-hidden="true" class="fa fa-check"></i></span>
								</td>
								
							</tr>
						</tbody>
					</table>
				</div>
				<div style="display:none;" class="top-msg-new" id="message-green">
					<table cellspacing="0" cellpadding="0" style="width:100%;border:0px;">
						<tbody>
							<tr>
								<td class="green-left" style="border:0px;">
									<span class="msg_green"><i aria-hidden="true" class="fa fa-check"></i></span>
								</td>
								
							</tr>
						</tbody>
					</table>
				</div>
				
								<div id="message-ajax" class="top-msg"  style="display:none;">
					<table cellspacing="0" cellpadding="0" style="width:100%;border:0px;">
						<tbody>
							<tr>
								<td style="border:0px;" class="green-left">
									<span class="msg_green"><i class="fa fa-check" aria-hidden="true"></i></span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="my-account">					
					<div class="myaccount-outer ">
                    	<form action="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/add" id="add_vehicle_form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<body>
	<div class="account-right-div">					
		<div class="dashboard-heading">
			<h2 class="dealer-head" title="">
				Add Vehicle			</h2>
						<ul class="breadcrumb right_bc">
				<li>
					<a href="http://dexteroustechnologies.co.in/shamrock/admin/dashboard">Dashboard</a> 
					<span class="divider"> &raquo;</span>
				</li>
				<li>
					<a href="http://dexteroustechnologies.co.in/shamrock/admin/Vehicles">Vehicles</a> 
					<span class="divider"> &raquo;</span>
				</li>
				<li class="active">Add Vehicle</li>
			</ul>
		</div>
		<div class="dashboard-inner">
			<div class="main-dash-summry Edit-profile edit-dealer-prof dealer-edit">
				
				<div class="left-column">
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label>VIN No.: <span class="star">*</span></label>
								<span class="reg_span">
									<input type="hidden" id="source" name="source" value="">
									<input type="text" name="vin_no" value="" id="vin_no" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Year: </label>
								<span class="reg_span">
									<input type="text" name="year" value="" id="year" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Make: </label>
								<span class="reg_span">
									<input type="text" name="make" value="" id="make" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Model:</label>
								<span class="reg_span">
									<input type="text" name="car_model" value="" id="car_model" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Color:</label>
								<span class="reg_span">
									<input type="text" name="color" value="" id="color" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
										<div class="input-row">
						<div class="full">
							<div class="input-block tooltipouter">
																	<label>Total Due ($): <span class="star">*</span></label>
																<span class="reg_span " id="qtip_additional_fee" title = "">
									<input type="text" name="purchase_price" value="" id="purchase_price" class="inputbox-main"  />
								</span>
															</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Reserve Fund ($):</label>
								<span class="reg_span">
									<input type="text" name="reserve_amt" value="" id="reserve_amt" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label>Floorplan Date: <span class="star">*</span><br/><span class="date-form">(MM-DD-YYYY)</span></label>
								<span class="reg_span">
									<input type="text" name="purchase_date" value="" id="purchase_date" autocomplete="off" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
										<div class="input-row ">
						<div class="full">
							<div class="input-block factor-row factor">
								<label>Purchase Location: </label>
								
								<span class="reg_span">
									<select name="purchase_loc" class="inputbox-main pur_loc" id="purchase_loc">
<option value="" selected="selected">Select Purchase Location</option>
<option value="1">Manhein</option>
<option value="2">Quincy</option>
<option value="3">Adesa-Concord</option>
<option value="4">Adesa-Boston</option>
<option value="5">Londonderry</option>
<option value="6">Lynnway</option>
<option value="7">Other</option>
<option value="8">CMAA</option>
<option value="9">Partners</option>
<option value="10">ACV</option>
<option value="11">Backlots</option>
<option value="12">3rd Party</option>
</select>
								</span>
							</div>
						</div>
					</div>
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label>Additional Purchase: <br/><span >Information</span></label>
								<span class="reg_span">
									<input type="text" name="purchase_loc_other" value="" id="purchase_loc_other" class="inputbox-main text" placeholder="Enter Other Location" rows="10" cols="40"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Title Status:</label>
								<span class="reg_span">
									<select name='title_loc' id = 'title_loc' onchange = 'title_change()' class='inputbox-main valid check'><option value="">Select Title Status</option>											<option   value='1'>Shamrock</option>
																				<option   value='2'>TAAdesa</option>
																				<option   value='3'>TADealer</option>
																				<option   value='4'>Hold</option>
																				<option   value='5'>Paid</option>
																				<option   value='6'>TALynnway</option>
																				<option   value='7'>TAManheim</option>
																				<option   value='8'>TAQuincy</option>
																				<option   value='9'>TAAuction</option>
																				<option   value='10'>TA</option>
																				<option   value='11'>3rd Party</option>
									</select>								</span>
							</div>
						</div>
					</div>
					
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Current Status: <span class="star">*</span></label>
								<span class="reg_span">
																		<select name="current_status" class="inputbox-main check" onchange="payment_due(this.value);">
																		<option selected value="0">On Floor</option>
																		<option  value="1">Payment Due</option>
																		<option  value="2">Returned Check </option>
																		<option  value="3">Paid</option>
																		</select>
								</span>
							</div>
						</div>
					</div>
										<div class="input-row " id="payment_date_outer"  style="display:none;">
						<div class="full">
							<div class="input-block">
								<label>Payment Due Date:</label>
								<span class="reg_span">
									<input type="text" class="inputbox-main check"  value="" id="paymentdue_date" name="paymentdue_date"/>	
								</span>
							</div>
						</div>
					</div>
					<div class="input-row " id="payment_amt_outer"  style="display:none;">
						<div class="full">
							<div class="input-block">
								<label>Late Payoff Fee:</label>
								<span class="reg_span">
									<input type="text" class="inputbox-main check"  value="50" id="paymentdue_amt" name="paymentdue_amt"/>	
								</span>
							</div>
						</div>
					</div>
					
					<!--input type="hidden" name="paymentdue_date" value="0000-00-00" id="paymentdue_date"/-->
					<input type="hidden" name="days" value="" id="days" class="inputbox-main" readonly="readonly"  />
									
					<div class="input-row factor-row">
						<div class="full">
							<div class="input-block">
								<label>Risk Factors:</label>
								<span class="reg_span">
									<ul>
										<li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='1' value='5'  /><label for='1' class='check-val'>TA Auction (5)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='2' value='5'  /><label for='2' class='check-val'>TA Dealer (5)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='3' value='10'  /><label for='3' class='check-val'>Title Borrow (10)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='4' value='10'  /><label for='4' class='check-val'>Carfax title / reg (10)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='5' value='5'  /><label for='5' class='check-val'>Lot check not present (5)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='6' value='10'  /><label for='6' class='check-val'>Lot check not present 2 mo (10)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='7' value='5'  /><label for='7' class='check-val'>Lot check poor condition (5)</label></li><li><input type='checkbox' class='risk_input check'  name='risk_factor[]' id='8' value='15'  /><label for='8' class='check-val'>Returned Check (15)</label></li>									</ul>
									<input type="hidden" value="" class="check" id="total" name='total' />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block edit-full">
								<label>Extend Loan(120 Days): </label>
								<span class="reg_span">
									<input id="extend_loan1" type="radio" name="extend_loan"  value="1">
									<label class="radio-label radio-deal" for="extend_loan1">ON</label>
									<input id="extend_loan0" type="radio" name="extend_loan" checked value="0">
									<label class="radio-label radio-deal" for="extend_loan0">OFF</label>
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Checkout Date: <span class="star">*</span></label>
								<span class="reg_span">
									<input type="text" name="checkout_date" value="" id="checkout_date" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Person Checking Out: <span class="star">*</span></label>
								<span class="reg_span">
									<input type="text" name="person_checking_out" value="" id="person_checking_out" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="right-column">
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Title No.: </label>
								<span class="reg_span">
									<input type="text" name="title_no" value="" id="title_no" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
										<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Dealership Name: <span class="star">*</span></label>
								<span class='reg_span'>
										<select class="inputbox-main valid"  name="dealers_id" >
											<option value="">Select Dealership Name</option>
											<option value="206"  >100 Percent Auto Wholesalers</option><option value="32"  >114 Used Car Super Store</option><option value="180"  >114 Used Car Superstore Number Two</option><option value="327"  >2 Sons Auto Brokers</option><option value="217"  >A & A Auto Sales</option><option value="272"  >A & A Auto Sales John</option><option value="36"  >A Starr Blanchard</option><option value="310"  >A-1 Repairable Wrecks LLC</option><option value="297"  >A-One Auto LTD</option><option value="264"  >Abington Auto Repairs INC</option><option value="251"  >Absolute Auto Wholesale</option><option value="182"  >Affordable Auto Mechanic INC</option><option value="164"  >All Wheels Detailing & Auto Sales INC</option><option value="255"  >Allenstown Auto Sales LLC</option><option value="209"  >Alpha Motors</option><option value="221"  >Alpha Motors Lucas</option><option value="33"  >American Auto Gallery</option><option value="262"  >American Eagle Auto Sales Corp</option><option value="35"  >Anytime Auto Sales</option><option value="281"  >Aramian's Auto Sales (FLOAT)</option><option value="63"  >Ashot</option><option value="37"  >Atlantes Automotive Group</option><option value="208"  >Atlantic Auto Solutions</option><option value="191"  >Atlantic Auto Solutions II</option><option value="38"  >Atlantic Coast Wholesale</option><option value="39"  >Auto Connection</option><option value="202"  >Auto Express</option><option value="212"  >Auto Spa LLC</option><option value="40"  >Auto Town INC</option><option value="41"  >AutoMaster(ZIG)</option><option value="125"  >Autos For Animals</option><option value="249"  >Autosmith Car Company</option><option value="280"  >BarahonaAuto</option><option value="215"  >Bay State Motorsports</option><option value="177"  >BAYSIDE AUTO SALES</option><option value="154"  >BEATO AUTO SALES</option><option value="269"  >Beato Auto Sales FP</option><option value="283"  >Bethel Car Co INC</option><option value="42"  >BH Auto Sales</option><option value="43"  >BIG ISLAND AUTO SALES</option><option value="244"  >Bk Auto Empire</option><option value="231"  >BM Best Auto Sales</option><option value="44"  >Boston Auto Brokers</option><option value="319"  >Boston Motor Sports Dba</option><option value="301"  >Boston Motors USA INC</option><option value="311"  >Boston Motors USA Jerome</option><option value="120"  >Boston Prime Cars</option><option value="274"  >Braza Car Auto Sales</option><option value="45"  >Brevik Auto Sales</option><option value="313"  >Bristol County Auto Exchange</option><option value="240"  >Broadway</option><option value="275"  >BS Motors INC</option><option value="129"  >CAP INC</option><option value="141"  >Car City</option><option value="48"  >Car Expo Group</option><option value="308"  >Carfive INC.</option><option value="167"  >Carlider USA</option><option value="50"  >Carmatch Group</option><option value="318"  >CARNOVA</option><option value="204"  >Casino Auto Sales INC</option><option value="189"  >Center St Auto Sales</option><option value="51"  >CERTIFIED AUTO SALES</option><option value="52"  >Cesar Cars</option><option value="53"  >Champion Motors USA</option><option value="54"  >CHAMPION MOTORS USA MICHAEL</option><option value="55"  >Check Engine Services</option><option value="194"  >Choice Motor Group INC</option><option value="325"  >Circle Auto Gallery</option><option value="250"  >City Limits Auto Brokers</option><option value="47"  >City Stop (Paulo)</option><option value="193"  >Clasico Motor</option><option value="235"  >Click Auto Center INC</option><option value="121"  >CM Auto Sales</option><option value="226"  >Commonwealth Auto Sales</option><option value="57"  >Compare Auto Sales</option><option value="175"  >Compass Autoworks</option><option value="309"  >CP Auto Sales Inc</option><option value="58"  >Crimson Auto Sales (Paulo)</option><option value="116"  >Crimson Auto Sales(Eliel)</option><option value="186"  >Customer First Auto Group</option><option value="256"  >D&D Auto Sales LLC</option><option value="187"  >Dalmaso Motors LLC</option><option value="220"  >Dartmouth Motors Auto Sales INC</option><option value="190"  >Dave Franks Auto Sales</option><option value="284"  >Devine Motors On Wheels INC</option><option value="122"  >Dialworks</option><option value="59"  >Diesel Motor Group</option><option value="223"  >Dking Auto Detailing</option><option value="265"  >Drivers Depot</option><option value="195"  >E&C Auto Brokers LLC</option><option value="46"  >E&P Auto (Brothers Auto)</option><option value="60"  >E&R Motors</option><option value="101"  >Eastern Sales (Joas)</option><option value="188"  >Eastern Sales JR</option><option value="100"  >Eastern Sales(Moises)</option><option value="321"  >Easy Up Cars</option><option value="198"  >Economy Motors INC</option><option value="126"  >Emerald Isle Auto Sales</option><option value="62"  >Empire Auto Tico</option><option value="273"  >EMPIRE MOTOR GROUP LLC</option><option value="266"  >Empire Motors INC</option><option value="243"  >Estrella National Auto LLC</option><option value="49"  >Euro Flow Auto</option><option value="64"  >Everett Used Cars</option><option value="117"  >Everett Used Cars S Sheet</option><option value="219"  >Exotic Auto Group</option><option value="323"  >EZ Approval Auto Sales And Leasing Llc</option><option value="210"  >F1 Auto Sales</option><option value="65"  >F1 Motors</option><option value="282"  >Famania Auto Service & Repair INC</option><option value="216"  >Family Auto Mall</option><option value="236"  >Fast Lane Motors LLC</option><option value="66"  >Fastway Auto Sales</option><option value="290"  >Felo Motor Detail Center</option><option value="307"  >Ferry St Auto Sales LLC</option><option value="127"  >Ferry St Exotics</option><option value="276"  >Find My Car</option><option value="315"  >Finest Auto Sales LLC</option><option value="155"  >Frank Coffey LLC</option><option value="303"  >GB Auto Sales Dba Int'l Horsepower Auto Sales</option><option value="68"  >Global Auto Mark</option><option value="286"  >GOLDEN MOTOR GROUP INC</option><option value="242"  >Golden Motor Group INC</option><option value="69"  >Good Works</option><option value="196"  >Green Light Auto Sales INC</option><option value="253"  >Hadi's Auto Sales</option><option value="211"  >Hadi's Auto Sales Guy Caf</option><option value="278"  >Highline Motor Sport INC</option><option value="295"  >Home Run Auto Sales INC</option><option value="71"  >Hot Rides INC</option><option value="72"  >Hot Wheels Auto Sales</option><option value="135"  >Internet Cars Unlimited</option><option value="287"  >Interstate Auto Auction INC</option><option value="115"  >J&K Acquisitions</option><option value="322"  >JAC Auto Import</option><option value="302"  >James Auto LTD</option><option value="34"  >Jeff Metro Auto</option><option value="73"  >JGS</option><option value="252"  >JK Auto Sales & Service LLC</option><option value="128"  >Johns Online Debt</option><option value="170"  >JONAH MOTORS LLC</option><option value="300"  >Jr Car Care INC</option><option value="268"  >JR's Auto Sales LLC</option><option value="75"  >JTS Auto & Truck</option><option value="119"  >Kays Auto Sales</option><option value="169"  >Kevin Auto Sales LLC</option><option value="31"  >King Auto Sales</option><option value="205"  >L And S Auto Sales</option><option value="168"  >LA JOYA AUTO SALES AND SERVICE</option><option value="324"  >LANDES DEBT SHEET</option><option value="76"  >Landes Family Auto Sales</option><option value="77"  >Larson Automotive</option><option value="78"  >Laurel Hill Auto Sales</option><option value="79"  >Leadership Motors INC</option><option value="80"  >Lewis Motor Sales</option><option value="81"  >Limerock Motors</option><option value="316"  >Lynn Auto Center And Repair</option><option value="74"  >Madbury Motors</option><option value="83"  >Main Auto Mall</option><option value="123"  >Main Auto Mall Debt</option><option value="82"  >Main St Motors Auto Center</option><option value="134"  >Malcon Lima</option><option value="277"  >Mann Clan INC</option><option value="298"  >Mark Pombriant LLC (FLOAT)</option><option value="197"  >Marshall Motors North</option><option value="84"  >Mass Auto Brokers</option><option value="67"  >Mega Auto</option><option value="85"  >Metro Auto Sales</option><option value="294"  >Metro Auto Sales Corp</option><option value="285"  >Michael Motors LLC</option><option value="86"  >Milford Auto Mall</option><option value="94"  >MPV Chris</option><option value="95"  >MPV Trailer Sales</option><option value="87"  >MPX Auto Group</option><option value="181"  >New England Auto</option><option value="291"  >New England Auto Mall</option><option value="248"  >New To You Auto Sales</option><option value="245"  >NH Motorsports</option><option value="271"  >NH Motorsports FP</option><option value="289"  >NH Select INC</option><option value="199"  >NH Select Truck-Auto INC</option><option value="88"  >NJM</option><option value="56"  >North Shore Auto</option><option value="90"  >Northstar Auto Sales</option><option value="260"  >Official Auto Sales</option><option value="292"  >Onestop Auto Shop LLC</option><option value="200"  >Oval Motors LLC</option><option value="320"  >Panda Auto Group Inc</option><option value="91"  >Park Ave Auto Inc</option><option value="153"  >Parkway</option><option value="203"  >ParkwayII</option><option value="317"  >Petes Auto Sales & Service LLC</option><option value="130"  >PJ Auto</option><option value="92"  >Platinum Cars</option><option value="234"  >Premier Motor Sales INC</option><option value="241"  >Prime Auto Mall INC</option><option value="214"  >Prime Cars Auto Sales INC</option><option value="93"  >Prime Motor Sports</option><option value="207"  >Prime Time Auto Sales</option><option value="183"  >Quickbook Testing</option><option value="288"  >Ray Mace Auto Exchange (FLOAT)</option><option value="254"  >Reading Auto Exchange INC</option><option value="192"  >Real Auto Shop INC</option><option value="222"  >Revolution Motors INC</option><option value="96"  >Rockingham County</option><option value="296"  >Roger Pelletier Dba (FLOAT)</option><option value="267"  >Roslindale Auto Sales</option><option value="184"  >Route 38 Motors</option><option value="227"  >Roxbury Motors INC</option><option value="97"  >Royal Crest Motors</option><option value="61"  >Rt 1 Auto Sales</option><option value="98"  >Rt 111 Auto Sales Of Hampstead</option><option value="247"  >S And D Auto Sales INC</option><option value="99"  >Salem St Motors</option><option value="118"  >SAVIC ADNAN</option><option value="102"  >SAVIC AUTO BROKERS</option><option value="103"  >SAVIC CHRIS H</option><option value="104"  >Sena Motors</option><option value="201"  >Shalom Auto Sales INC</option><option value="225"  >Shamrock Auto Brokers</option><option value="306"  >Shamrock FInance</option><option value="105"  >Shamrock Motors</option><option value="305"  >Sinclair Auto Palace LLC</option><option value="299"  >Solution Auto LLC</option><option value="106"  >Southcoast Auto Exchange</option><option value="136"  >Southern Auto Plus</option><option value="228"  >Speed Auto Center INC</option><option value="131"  >Stadium Auto Sales</option><option value="107"  >Stars Auto Sales</option><option value="165"  >Super Auto Sales</option><option value="108"  >Super Value Auto</option><option value="132"  >Supreme Cars</option><option value="133"  >Supreme Cars II</option><option value="124"  >Swiftway Container</option><option value="314"  >Thames River Motorcars LLC</option><option value="270"  >Top Cars Auto Mall FP</option><option value="237"  >Top Cars Auto Mall INC</option><option value="23"  >Top Gear Motor Group</option><option value="263"  >Top Line Motorsport LLC</option><option value="109"  >TRADE AUTO BROKERS</option><option value="238"  >Twin Motorsport</option><option value="110"  >TYME MACHINE / HOLIDAY</option><option value="224"  >United Motors INC</option><option value="239"  >Universal Solutions Auto Group LLC</option><option value="279"  >Valentina's Auto Sales</option><option value="304"  >VJ Robbin Auto Sales- Test</option><option value="111"  >W & D AUTO SALES</option><option value="213"  >West Street Auto Corp</option><option value="112"  >WHIPOUT AUTO</option><option value="293"  >WHITE ST DEBT</option><option value="113"  >White Street Motors</option><option value="326"  >Whitman Auto Sales Corp</option><option value="246"  >Windsor Wheels</option><option value="312"  >Yaab Motor Sales LLC</option><option value="114"  >Zamps Auto</option></select>									
								</span>
							</div>
						</div>
					</div>
										
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label>Date Paid: <br/><span class="date-form">(MM-DD-YYYY)</span></label>
								<span class="reg_span">
									<input type="text" name="sale_date" value="" id="sale_date" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					<div class="input-row auth-space">
						<div class="full">
							<div class="input-block">
								<label>Payment Method: </label>
								<span class="reg_span">
									<select name='payment_method'  class='inputbox-main valid check' onchange='checkPaymentMethod(this.value);'>
											<option value=''>Select Payment Method</option>											<option  value='1'>CASH</option>
																				<option  value='2'>ACH</option>
																				<option  value='3'>Check</option>
																				<option  value='4'>Swap</option>
																				<option  value='5'>Car Returned</option>
																				<option  value='6'>Reserve</option>
																				<option  value='7'>Auction Check</option>
																				<option  value='8'>Auction Wire</option>
																				<option  value='9'>Bank Check</option>
																				<option  value='10'>Wire</option>
																				<option  value='11'>Legal-Moved to Accounting</option>
									</select>								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Check Number: </label>
								<span class="reg_span">
									<input type="text" name="check_number" value="" id="check_number" class="inputbox-main"  />
								</span>
							</div>
						</div>
					</div>
					
					
					<div class="input-row add-fee">
						<div class="full">
							<div class="input-block">
								<label>Additional Fees: </label>
								<span class="reg_span ship_method">
									<div title="Shamrock: $50, Bank Charges: $20" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="1" class="risk_input"  id="fee1"  /><label class="check-val" for="fee1">Returned check ($70)</label></div><div title="" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="2" class="risk_input"  id="fee2"  /><label class="check-val" for="fee2">Wire Fee ($15)</label></div><div title="" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="3" class="risk_input"  id="fee3"  /><label class="check-val" for="fee3">Fedex regular ($25)</label></div><div title="" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="4" class="risk_input"  id="fee4"  /><label class="check-val" for="fee4">Fedex Saturday ($50)</label></div><div title="Non Auction Purchase" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="6" class="risk_input"  id="fee6"  /><label class="check-val" for="fee6">NAP ($75)</label></div><div title="Unit Unverified Audit Fee" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="7" class="risk_input"  id="fee7"  /><label class="check-val" for="fee7">UUAF ($100)</label></div><div title="" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="8" class="risk_input"  id="fee8"  /><label class="check-val" for="fee8">Additonal Title Fee 2 ($50)</label></div><div title="" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="9" class="risk_input"  id="fee9"  /><label class="check-val" for="fee9">Additonal Title Fee 3 ($100)</label></div><div title="" class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="12" class="risk_input"  id="fee12"  /><label class="check-val" for="fee12">Wire Fee ($5)</label></div><div class="fl-width"><input type="checkbox"  name="add_fees_ids[]" value="5" class="risk_input"  id="fee5"  /><label class="check-val" for="fee5">Other </label></div>									<!-- <input type="text" placeholder="Title" name="title_add" class="inputbox-main other valid checklist" id="title_add" value="" >
									
									<input type="text" placeholder="Fees" name="other_add_fee_price" class="inputbox-main other valid checklist" id="other_add_fee_price" value="" > -->
								</span>
							</div>
						</div>
					</div>
					<div class="input-row" id="title_add_outer" style="display: none">
						<div class="full">
							<div class="input-block">
								<label>Other Fee: </label>
								<span class="reg_span">
									<input type="text" placeholder="Title" name="title_add" class="inputbox-main other valid checklist" id="title_add" value="" >
								</span>
							</div>
						</div>
					</div>
					<div class="input-row" id="other_add_fee_price_outer" style="display: none">
						<div class="full">
							<div class="input-block">
								<label>Other Fee Amount: </label>
								<span class="reg_span">
									<input type="text" placeholder="Fees" name="other_add_fee_price" class="inputbox-main other valid checklist" id="other_add_fee_price" value="" >
								</span>
							</div>
						</div>
					</div>
					
					<div class="input-row ship ">
						<div class="full">
							<div class="input-block">
								<label>Shipping Method:</label>
								<span class="reg_span ship_method">
									<select name="shipping_method" id="shipping_method" class="inputbox-main valid check" onchange="check_other(this.value)">										<option value=''>Select Shipping Method</option>
																				<option  value='1'>
												FEDEX											</option>
																				<option  value='2'>
												UPS											</option>
																				<option  value='3'>
												USPS											</option>
																				<option  value='4'>
												Other											</option>
									</select><input type="hidden" name="shipping_other" id="shipping_other" placeholder="Enter other shipping method" class="inputbox-main other check" value="" />								</span>
							</div>
						</div>
					</div>
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Status: <span class="star">*</span></label>
								<span class="reg_span">
									<select name="status" class="inputbox-main">
<option value="0">Inactive</option>
<option value="1" selected="selected">Active</option>
</select>
								</span>
							</div>
						</div>
					</div>
					<div class="input-row auth-space">
						<div class="full">
							<div class="input-block textarea-input text">
								<label>Comment: </label>
								<span class="reg_span">
									<textarea name="comment" cols="40" rows="10" id="comment" class="inputbox-address check" ></textarea>
								</span>
							</div>
						</div>
					</div>	
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label> Lot Check:</label>
								<span class="reg_span lot-check">
																	
									<input type="text" name="lot_check" readonly class="inputbox-main" value="" >
									
																		
								</span>
							</div>
						</div>
					</div>
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label> Lot Check Date:</label>
								<span class="reg_span lot-check">
																		<input type="text" name="lot_check_date" readonly class="inputbox-main" value="" >
								</span>
							</div>
						</div>
					</div>
					
					
					<div class="input-row auth-space">
						<div class="full">
							<div class="input-block textarea-input text">
								<label> Lot Check Comment:</label>
								<span class="reg_span lot-check">
									<textarea name="lot_check_comment" cols="40" rows="10" readonly="true" id="lot_check_commen" class="inputbox-address" ></textarea>
									
									<br>
									
								</span>
							</div>
						</div>
					</div>
					
					
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Carfax Report: </label>
								<span class="reg_span">
									<select name="carfax" class="inputbox-main">
<option value="" selected="selected">Select Carfax Report</option>
<option value="1">Damage</option>
<option value="2">Dealer</option>
<option value="3">Import/Export</option>
<option value="4">Inspection</option>
<option value="5">Service</option>
<option value="6">Title Registration</option>
</select>
								</span>
							</div>
						</div>
					</div>
					
					<div class="input-row up-title">
						<div class="full">
							<div class="input-block file ">
								<label>Titles:<br/><span class="file-form">(Upload titles in .jpg, .jpeg, .png, .gif, .pdf format)</span></label>
							
								<span class="reg_span">
										<input type="file" name="title" value="" id="title" class="titles_file check lot-input-new"  />
<span class="reg_span file"></span>							
								</span>
							</div>
						</div>
					</div>
					<div class="input-row up-title">
						<div class="full">
							<div class="input-block file">
								<label>Vehicle Condition:<br/><span class="file-form">(Image Uploaded for lot check)</span></label>
								<span class="reg_span">
									-								</span>
							</div>
						</div>
					</div>
				</div>	
				<div class="submit-class">
					<div class="full">
						<input type="hidden" name="vehicle_id" id="vehicle_id" value="">
						<input type="hidden" name="dealer_id" id="dealer_id" value="">
						<input type="hidden" name="extra_penalty" value="0">
												<input type="submit" name = "add_vehicle_btn" id="submit" value="Add" class="btn-submit btn"> 
						<input type="button" value="Cancel" onclick="javascript:history.go(-1);" class="btn-submit btn">
					</div>	
				</div>
				</form>			</div>
		</div>
	</div>
	<div class="popup email-popup" id="email_template_view" style="display:none;">
			<div class="popup-inner">
				<div class="popup-tb">
					<div class="popup-cell">
						<div class="login-block-popup" style="width: 150%;">
							<div class="login-icon ">
								<div class="custom-scroll-inner">
									<div class="msg_para ">
										<div class="account-right-div">
											<div class="dashboard-heading">
												<h2>Send Email</h2>
											</div>
											<div class="dashboard-inner">
												<div class="main-dash-summry Edit-profile edit-template">
													<form action="http://dexteroustechnologies.co.in/shamrockadmin/setting/send_newsletter" id="send_newsletter" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
														<div class="input-row" style='width:100%;'>
															<div class="full">
																<div class="input-block edit_page">
																	<label>Template:</label>
																	<span class="reg_span ">
																		<select name="template_id" id="template_id" class="inputbox-main" onchange="get_template()">
																			<option value="" selected>--Select Template--</option>
																																					</select>
																		<span class="error-ms"></span>	
																	</span>
																</div>
															</div>
														</div>
														<div class="input-row" style='width:100%;'>
															<div class="full">
																<div class="input-block edit_page">
																	<label>Subject:<span class="star">*</span></label>
																	<span class="reg_span">
																		<input type="text" name="subject" value="" id="subject" class="inputbox-main no-margin"  />
																		<span class="error-ms"></span>	
																	</span>
																</div>
															</div>
														</div>

														<div class="input-row ckeditor-row">
															<div class="full">
																<div class="input-block">
																	<label>Message:<span class="star">*</span></label>
																	<span class="reg_span ckeditor_span">
																		<div style="position:relative" class="ckeditorwidthblock">
																			<textarea name="message" cols="40" rows="10" class="inputbox-main ckeditor" id="ck_editor_message" ></textarea>
																			<span class="error-ms"></span>	
																		</div>		
																	</span>
																</div>
															</div>
														</div>
														<div class="footer_button footer_div">
															<div class="">
																<div class="full ckeditor_class">
																	<div class="input-block add-user-btn">
																		<span class="">
																			<input type = "hidden" name = "email_to" value = "">
																			<input type="submit" name = "send_mail" value="Send" class="btn-submit btn"> 
																			<button type="button" value="1" class="btn-submit btn" onclick="cancel()" >Cancel</button>
																		</span>
																	</div>
																</div>	
															</div>
														</div>	
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="cross close_pop" href="javascript:void(0)"><img src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/cross_pop.png"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<input type="hidden" name="price_add" id="price_add" value="">
</body>		
		
	<script type="text/javascript">
		var ta_dealer_change = '';
		var dealer_name = "";
		var vin_number = "";
		var enter_date = "";
		var amount = "";
		var check_amount = "";
			
		$(document).ready(function() {
			
			
			if($("#fee5").is(':checked')){
				$('#other_add_fee_price').show();
				$('#other_add_fee_price_outer').show();
				$('#title_add').show();
				$('#title_add_outer').show();
				$('#other_add_fee_price').parents().find('.add-fee').addClass('loc-text');
			} else{
				$('#other_add_fee_price').hide();
				$('#other_add_fee_price_outer').hide();
				$('#title_add').hide();
				$('#title_add_outer').hide();
				$('#other_add_fee_price').parents().find('.add-fee').removeClass('loc-text');
			}
			
			$('#2').click(function(){
				if($("#2").is(':unchecked')) ta_dealer_change = 'by_checkbox';
			});

			// $(document).on('click','.tooltip',function(){			
			// 	if($(".tooltiptext").is(':visible')) 
			// 		$(".tooltiptext").hide();
			// 	else $(".tooltiptext").show();
			// });

			$(document).on('click', function() {
				if($(event.target).closest('div').hasClass('info-icon')) {
					if($(".tooltiptext").is(':visible')) 
						$(".tooltiptext").hide();
					else $(".tooltiptext").show();
				} else {

					if(!$(event.target).closest('span').hasClass('tooltiptext') && !$(event.target).closest('div').hasClass('download_print') && !$(event.target).closest('div').hasClass('info-icon')) {
						$(".tooltiptext").hide();
					}
				}
			});
			
		});
		
		function title_change(){
			var ta_dealer_unchecked = $("#2").is(':unchecked');
			if(($('#title_loc').val() == 1 || $('#title_loc').val() == 4) && ta_dealer_unchecked == false){
				$('#2').prop('checked', false);
				ta_dealer_change = 'by_title';
			}else if(ta_dealer_unchecked && ta_dealer_change == 'by_title'){
				$('#2').prop('checked', true);
			}
		}
		
		$(document).ready(function() {
			var vehicle_id = $('#vehicle_id').val();
			if(vehicle_id != '' && vehicle_id != '0') {
				$('#title_no').focus();
			} else {
				$('#vin_no').focus();
			}
			return false;
		});
		
		$(document).on('click','#fee5',function(id){
			if($("#fee5").is(':checked')){
				$('#other_add_fee_price').show();
				$('#other_add_fee_price_outer').show();
				$('#title_add').show();
				$('#title_add_outer').show();
				$('#other_add_fee_price').parents().find('.add-fee').addClass('loc-text');
			} else{
				$('#other_add_fee_price').hide();
				$('#other_add_fee_price_outer').hide();
				$('#other_add_fee_price').val('');
				$('#title_add').hide();
				$('#title_add_outer').hide();
				$('#title_add').val('');
				$('#title_add_error').hide();
				$('#shipping_method_error').hide();
				$('#other_add_fee_price').parents().find('.add-fee').removeClass('loc-text');
			}
		});
		$(function() {
			
			var add_fee_id = $('#price_add').val();;
			var other_add_fee_price = $('#other_add_fee_price').val();
			$('#manage_vehicles').addClass('active');
			var title_no = $('#title_no').val();
			if(title_no == '0') {
				$('#title_no').val('');
			}
			var days = $('#days').val();
			if(days == '0') {
				$('#days').val('');
			}
			var purchase_price = $('#purchase_price').val();
			if(purchase_price == '0') {
				$('#purchase_price').val('');
			}
			var purchase_date = $('#purchase_date').val();
			if(purchase_date == '0000-00-00') {
				$('#purchase_date').val('');
			}
			var sale_date = $('#sale_date').val();
			if(sale_date == '0000-00-00') {
				$('#sale_date').val('');
			}
			$("#sale_date").datepicker({ dateFormat: 'mm-dd-yy' });
			$("#checkout_date").datepicker({ dateFormat: 'mm-dd-yy' });
			$('#purchase_date').datepicker({
				dateFormat: "mm-dd-yy",
				onSelect:function(){
					var date = $(this).datepicker('getDate'),
					day  = date.getDate(),  
					month = date.getMonth() + 1,              
					year =  date.getFullYear();
					var purchase_date = date;
					purchase_date = moment(purchase_date).format('YYYY-MM-DD');
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1;
					var yyyy = today.getFullYear();
					if(dd < 10) {
						dd = '0'+dd;
					} 
					if(mm < 10) {
						mm = '0'+mm;
					} 
					today = yyyy+'-'+mm+'-'+dd;
					var date1 = new Date(purchase_date);
					var date2 = new Date(today);
					var timeDiff = Math.abs(date2.getTime() - date1.getTime());
					var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
					var days_on_floor = diffDays;
					$('#days').val(days_on_floor);
				}
			});
			var sale_date = $('#sale_date').val();
			if(sale_date == '0000-00-00') {
				$('#sale_date').val('');
			}
			var purchase_date = $('#purchase_date').val();
			if(purchase_date == '0000-00-00') {
				$('#purchase_date').val('');
			}
		});
		$(document).on('keypress','#ucc_fil_date',function(e) {
			if(e.keyCode == 8) {
				$('#ucc_fil_date').val('');
				$('#ucc_exp_date').val('');
			}
		});
		
		$(document).on('click','.radio-deal',function() {
			var id = $(this).attr('data-id');
			var div_class = $(this).attr('data-class');
			if(id == '1') {
				$('.edit-dealer-prof').find('.'+div_class).show();
			} else {
				$('.edit-dealer-prof').find('.'+div_class).hide();
			}
		});
		function gen_password() {
			var length = 8,
				charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
				retVal = "";
			for (var i = 0, n = charset.length; i < length; ++i) {
				retVal += charset.charAt(Math.floor(Math.random() * n));
			}
			$('#password').val(retVal);
			$('#con_password').val(retVal);
		}
		$("form").submit(function(){
				var y='';
				var str=0; 
				$("input:checkbox[type=checkbox]:checked").each(function ()
				{    
					y+=$(this).attr('id')+',';
					
				});
				str = y.slice(0, -1);
				 $('#total').val(str);
				$(".hidden-factors").each(function ()
				{    
					y+=$(this).attr('id')+',';
					
				});
				str = y.slice(0, -1);
				 $('#total').val(str);
		});
		$('#sale_date').on('keypress', function() {
				}).on('keydown', function(e) {
				if (e.keyCode==8){
					$('#sale_date').val('');
				}
		});
		$('#purchase_date').on('keypress', function() {
				}).on('keydown', function(e) {
				if (e.keyCode==8){
					$('#purchase_date').val('');
				}
		});
		$('#paymentdue_date').on('keypress', function() {
				}).on('keydown', function(e) {
				if (e.keyCode==8){
					$('#paymentdue_date').val('');
				}
		});
		function payment_due(id){
			
			if(id=='1'){
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				if(dd<10) {
					dd='0'+dd
				} 
				if(mm<10) {
					mm='0'+mm
				} 
				today =  mm+'-'+dd+'-'+yyyy;
				$('#payment_date_outer').show();
				$('#paymentdue_date').val(today);
				$('#payment_amt_outer').show();
				$('#paymentdue_amt').val(50);
				/*var payment_due_date = $('#paymentdue_date').val();
				alert(payment_due_date);
				if(payment_due_date == '') {
					$('#paymentdue_date').val(today);
				}*/
			} else{
				$('#payment_date_outer').hide();
				$('#paymentdue_date').val('');	
				$('#payment_amt_outer').hide();
				$('#paymentdue_amt').val('');	
			}
		}

		function checkPaymentMethod(id){
			if(id == '3' || id == '7' || id == '9'){
				document.getElementById("check_number").required = true;
			}else{
				document.getElementById("check_number").required = false;
			}

		}
		
		$("#paymentdue_date").datepicker({ dateFormat: 'mm-dd-yy' });
		$(document).on('click','#title_btn',function() {
			$('#title').click();
		});

		
		function check_other(val){
			if(val==4){
				$('#shipping_other').attr("type", "text");
				$('#shipping_other').parent().parent().parent().parent().addClass('loc-text');
				
			} else{
				$('#shipping_other').attr("type", "hidden");
				$('#shipping_other').parent().parent().parent().parent().removeClass('loc-text');
			}
		}
		$(document).ready(function() {
			
			var visible_comment= $('#lot_check_comment').val();
			if(visible_comment!=''){
				$('#lot_check_comment').show();
				$('#lot_check_comment').val(visible_comment);
			} else{
				$('#lot_check_comment').hide();
			}
		});
		
		function get_lot_id(id) {
			if(id == '1') {
				$('#lot_check_comment').hide();
				$('#lot_check_comment').val('');
				$('#lot_check_comment').parent().parent().parent().parent().removeClass('lot-text');
			} else if(id == '') {
				$('#lot_check_comment').hide();
				$('#lot_check_comment').parent().parent().parent().parent().removeClass('lot-text');
			}
			else{
				$('#lot_check_comment').show();
				$('#lot_check_comment').parent().parent().parent().parent().addClass('lot-text');
			}
		}
		
		$(document).on('blur','#vin_no',function() {
			
			var vin = $('#vin_no').val();
			if(vin != '') {
				$('#loader').show();
				$.ajax({
					url:admin_url+'vehicles/check_vin_no',
					type:'post',
					data:{
						vin_no:function() {return $('#vin_no').val()},
						vehicle_id:function() {return $('#vehicle_id').val()},
					},
					success:function(data) {
						if(data == 'false'){
							$('#add_vehicle_form').find('.valid-errors').remove();
							$('#vin_no').parent().append('<span id="vin_error" class="valid-errors">Vehicle already exists with this VIN No.</span>');
						} else {
							$('#add_vehicle_form').find('.valid-errors').remove();
						}
					}
				});				
				$.ajax({
					url:admin_url+'vehicles/get_vehicle_info',
					type:'post',
					data:{vin:vin},
					success:function(data) {
						$('#loader').hide();
						var info = new Array();
						var info = $.parseJSON(data);
						var error = info.error;
						if(error != '') {
							$('#api_error').find('.msg_para.para_msg span').html('').html('<span style="text-align:center;color:red">Invalid VIN No.</span>');
							$('#api_error').show();
							$('#make').val('');
							$('#car_model').val('');
							$('#year').val('');
							$('#color').val('');
						} else {
							var year = info.year;
							var make = info.make;
							var model = info.model;
							var color = info.color;
							$('#make').val(make);
							$('#car_model').val(model);
							$('#year').val(year);
							$('#color').val(color);
						}
					}
				});
			}
		});
		
		$(document).on('click','.del',function(e){
				e.preventDefault();
				var id = $(this).attr('data-id');
				swal({
				    title: 'Are you sure, you want to delete this title image?',
				    text: "",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#1E8D05',
					cancelButtonColor: '#696969',
					confirmButtonText: 'Yes'
				}).then(function() {
					if(id != '0' && id != '') {
						window.location.href = admin_url+'vehicles/remove_vehicle_image/'+id;
					}
				});
				return false;
			});
			
		$(document).on('click','.dellot',function(e){
				e.preventDefault();
				var id = $(this).attr('data-id');
				swal({
				    title: 'Are you sure, you want to delete this lot check image?',
				    text: "",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#1E8D05',
					cancelButtonColor: '#696969',
					confirmButtonText: 'Yes'
				}).then(function() {
					if(id != '0' && id != '') {
						window.location.href = admin_url+'vehicles/remove_lot_check_image/'+id;
					}
				});
				return false;
			});	
	
		

	</script>
		<script>


$(function() {
    $('#master_data').addClass('active');
	$(document).on('click','.download_add_fee, .print_add_fee',function() {
    	var vehicleId = $(this).data('id');
    	var url = "http://dexteroustechnologies.co.in/shamrock/admin/vehicles/download_vehicle_add_fees_info/"+vehicleId;
    	if($(this).hasClass('download_add_fee')) {
    		url = url + '/D';
    	}
    	//window.location.href = url;
    	window.open(url, '_blank');
    });
});
function cancel() {
	$('#email_template_view').hide();
}
$(function(){
	CKEDITOR.replace('message');
	
});

function get_template(){
	var id = document.getElementById('template_id').value;
	if(id == '') {
		CKEDITOR.instances['ck_editor_message'].setData('');
		document.getElementById('subject').value = '';
		return false;
	} 
	$.ajax({
		url:admin_url+'setting/get_template_details',
		type:'post',
		data:{id: id},
		success:function(data) {
			response = JSON.parse(data);
			if(response.type == 'success') {
				document.getElementById('subject').value = response.template.subject;
				response.template.message = response.template.message.replace(/{{dealer_name}}/g, dealer_name);
				response.template.message = response.template.message.replace(/{{vin_number}}/g, vin_number);
				response.template.message = response.template.message.replace(/{{enter_date}}/g, enter_date);
				response.template.message = response.template.message.replace(/{{amount}}/g, amount);
				response.template.message = response.template.message.replace(/{{check_amount}}/g, check_amount);
				CKEDITOR.instances['ck_editor_message'].setData(response.template.message);
			}
			else {
				document.getElementById('subject').value = '';
				CKEDITOR.instances['ck_editor_message'].setData('');
			}
		}
	});
}

$(document).on('click','#send_email',function(){
	$('#email_template_view').show();
});

</script>
					</div>
                </div>

			</div>

		</div>
		<footer>
			<div class="wrapper">
				<p>Copyright 2022. ShamrockFinance.com. All Right Reserved.</p>
			</div>
		</footer>
		<span id='base_url' class="http://dexteroustechnologies.co.in/shamrock/" title='admin'></span>
		<div class="popup" id="loader" style="display:none;">
			<div class="popup-inner">
				<div class="popup-tb">
					<div class="popup-cell">
						<img class="loader_img" src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/loader.gif">
						<div class="loader-text">Please wait, Its loading vehicle's information.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popup" id="email_loader" style="display:none;">
			<div class="popup-inner">
				<div class="popup-tb">
					<div class="popup-cell">
						<img class="loader_img" src="http://dexteroustechnologies.co.in/shamrock/assets/images/admin/loader.gif">
						<div class="loader-text">Please wait...</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popup" id="api_error" style="display:none;">
			<div class="popup-inner">
				<div class="popup-tb">
					<div class="popup-cell">
						<div class="login-block-popup">
							<div class="login-icon">
								<div class="icon-img icon-img2">
								  <h2> <span> Error </span> </h2>									
								</div>
								<div class="" id="content-3" >
									<div class="msg_para para_msg">
										<span></span>
										<div class="btn-outer close-btn"><div class="inner-close">Close</div></div>
									</div>
								</div>
							</div>
							<a class="cross close_pop" href="javascript:void(0)"><img src="http://dexteroustechnologies.co.in/shamrock/assets/images/cross_pop.png"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<script>
	$(document).ready(function() {
		
		if($('#add_vehicle_form').length){
			//$('#title_no').focus();
		} else {
			$('form:first *:input[type!=hidden]:first').focus();
		}
		
	});
		$('#master_data').click(function(){
		$('#settings ul').hide();
		$('#reports ul').hide();
		$('#blogs ul').hide();
		$('#manage_admin ul').hide();
		$('#manage_dealers ul').hide();
		$(this).find('.master-child').toggle();
	});
	$('#settings').click(function(){
		$('#master_data ul').hide();
		$('#reports ul').hide();
		$('#blogs ul').hide();
		$('#manage_admin ul').hide();
		$('#manage_dealers ul').hide();
		$(this).find('.setting-child').toggle();
	});

	$('#reports').click(function(){
		$('#master_data ul').hide();
		$('#settings ul').hide();
		$('#blogs ul').hide();
		$('#manage_admin ul').hide();
		$('#manage_dealers ul').hide();
		$(this).find('.report-child').toggle();
	});
	$('#blogs').click(function(){
		$('#master_data ul').hide();
		$('#settings ul').hide();
		$('#reports ul').hide();
		$('#manage_admin ul').hide();
		$('#manage_dealers ul').hide();
		$(this).find('.blog-child').toggle();
	});
	$('#manage_admin').click(function(){
		$('#master_data ul').hide();
		$('#settings ul').hide();
		$('#reports ul').hide();
		$('#blogs ul').hide();
		$('#manage_dealers ul').hide();
		$(this).find('.manages-emp').toggle();
	});
	$('#manage_dealers').click(function(){
		$('#master_data ul').hide();
		$('#settings ul').hide();
		$('#reports ul').hide();
		$('#blogs ul').hide();
		$('#manage_admin ul').hide();
		$(this).find('.manages-dlr').toggle();
	});
	$(document).on('click','.inner-close',function() {
		$(this).parents().find('#api_error').hide();
	});
</script>
	</body>
	</html>

