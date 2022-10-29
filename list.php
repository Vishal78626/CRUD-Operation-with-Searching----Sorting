<?php

session_start();
if(!isset($_SESSION["is_login"])) {
	header('Location: login.php');	
}
else{
	
	$now = time();
	
	if($now > $_SESSION['expire']) {
		unset($_SESSION['is_login']);
		$_SESSION['session_end'] = "You need to login to access this page."; 
        header("Location: login.php");  
    }

    include('connection.php');
    include('header.php');

?>

<style>
	.fixes_layout th h1 span sup {
	    margin-left: 4px;
	    position: relative;
	    bottom: -4px;
	}
	.fixes_layout th h1 span sub {
	    margin-left: 4px;
	    position: relative;
	    top: -4px;
	    display: inline-block;
	    transform: rotate(180deg);
	}
</style>

<style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<script>
	function myFunction(){
		var x = document.getElementById('show_record').value;		
		var pageno = "1";
		var sort_order = "<?php echo empty($_GET['sort_order'])? "asc" : $_GET['sort_order'] ?>"; 
		var sort_by = "<?php echo empty($_GET['sort_by'])? "name" : $_GET['sort_by'] ?>";
		var search = "<?php echo empty($_GET['search'])? '' : $_GET['search'] ?>";
		
		window.location.href= `list.php?page=${pageno}&record_per_page=${x}&sort_order=${sort_order}&sort_by=${sort_by}<?php if(!empty($_GET['search'])) echo "&search="; ?>${search}`;	
	}
</script>

<?php 
	if(empty($_GET['record_per_page'])) {
		$_GET['record_per_page'] = 3;
	}

	if(empty($_GET['sort_order'])) {
		$_GET['sort_order'] = "asc";
	}

	if(empty($_GET['sort_by'])) {
		$_GET['sort_by'] = "name";
	}

	if(empty($offset)){
		$offset = 0;	
	}
	
	if(isset ($_GET['page'])) {
		$page =  $_GET['page'];
	}
	else{
		$page = 1;
	}

	if(isset($_GET['search'])){
		$search_value = $_GET['search'];
	}

?>
<style>
	.img-preview {
    /*position: absolute;*/
    /*width: 60px;*/
    /*height: 60px;*/
    border: 1px solid #000;
    margin: 3px 0;
    right: 0;
    background: #999999;
    display: inline-flex;
    align-items: center;
}

.img-preview img {/*width: 100%;*/}
</style>




	<div class="border-div"></div>	
	<div class="clr"></div>
		<div class="hotel-listing ">
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
	<div class="myaccount-outer">
	<div class="account-right-div">
		<div class="dashboard-heading">
			<h2>Manage Customers</h2>
					</div>
		<div class="dashboard-inner">

			<div class="dash-search">
				<form method="GET"  action="">
					<input type="hidden" name="page" value="1" />
					<?php if(!empty($_GET['record_per_page'])){ ?>
						<input type="hidden" name="record_per_page" value="<?=$_GET['record_per_page']?>" />
					<?php } ?>

					<?php if(!empty($_GET['sort_order'])){ ?>
						<input type="hidden" name="sort_order" value="<?=$_GET['sort_order']?>" />
					<?php } ?>

					<?php if(!empty($_GET['sort_by'])){ ?>
						<input type="hidden" name="sort_by" value="<?=$_GET['sort_by']?>" />
					<?php } ?>


					<input style="background-color: #C0C0C0; border-radius: 10px;width:25%;" type="text" placeholder="Enter Name or Email to search" class="list-search" id="search" name="search" value="<?php
					if(!empty($search_value)) { echo "$search_value"; } ?>">
					
					<input type="submit" value="Search" class="add-user search-icon crome-left" >
					
					<span class='reg_span'>
						<div class="user-btn-div">
							<a title="Add" href="add.php">Add Customers </a>
						</div>
					</span>

				</form>
			</div>
				<?php
					echo "<div class='valid-error' style='font-size:15px; color:green;'>".$_SESSION['data_status']."</div>";
					unset($_SESSION['data_status']);

					?>

			<div class="total_rec records-updates">
					
				<div class="add-records">Records Per Page</div>
				<select name="show_record" id="show_record" onchange="myFunction()">
					<option value="1" <?php if($_GET['record_per_page'] == "1") {echo selected; } ?> >1</option>
					<option value="3" <?php if($_GET['record_per_page'] == "3") {echo selected; } ?> >3</option>
					<option value="5" <?php if($_GET['record_per_page'] == "5") {echo selected; } ?> >5</option>
					<option value="all" <?php if($_GET['record_per_page'] == "all") {echo selected; } ?> >All</option>
				</select>
				<div class="block-used1">
				 	<span>Total Records: </span>
				 	<?php							
						$sql = "SELECT COUNT(id) as total FROM `users` ";
						if ($result=mysqli_query($conn,$sql)) {
						    $rowcount= mysqli_fetch_assoc($result);
						    echo $rowcount['total']; 
						}
						else
						{
							echo "--";
						}
					?>
				 </div>

			</div>




			<div class="main-dash-summry Edit-profile nopadding11">
				<div class="my_table_div">
					<table class="fixes_layout">
						<thead >
							<tr>
								<th class="forWidthSno" width="2%"> <h1 class=""> S.No. </h1> </th>
								<th width="6%">
									<a title="Name" class="underline_classs" href="<?php

									if($_GET['sort_by'] != 'name' || $_GET['sort_order'] == 'desc' )
									{
										if(empty($_GET['search'])) {
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=asc&sort_by=name";
										}
										else {
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=asc&sort_by=name&search=".$_GET['search'];
										}
									}
									if($_GET['sort_by'] == 'name' && $_GET['sort_order'] == 'asc')
									{
										if(empty($_GET['search'])) {
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=desc&sort_by=name";
										}
										else {
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=desc&sort_by=name&search=".$_GET['search'];
										}

									}

									?>">
										<h1 class="sort">Name<span><?php if($_GET['sort_order'] == 'asc' && $_GET['sort_by'] == 'name') { echo "<sup>^</sup>"; } if($_GET['sort_order'] == 'desc' && $_GET['sort_by'] == 'name') { echo "<sub>^</sub>"; }?></span></h1>
									</a>
								</th>
								<th width="19%">

									<a class="underline_classs" href="<?php

									if($_GET['sort_by'] != 'email' || $_GET['sort_order'] == 'desc' )
									{
										if(empty($_GET['search'])) 
										{
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=asc&sort_by=email";
										}
										else 
										{
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=asc&sort_by=email&search=".$_GET['search'];
										} 
									}
									if($_GET['sort_by'] == 'email' && $_GET['sort_order'] == 'asc')
									{
										if(empty($_GET['search'])) 
										{
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=desc&sort_by=email";
										}
										else
										{
											echo " list.php?page=".$page."&record_per_page=".$_GET['record_per_page']."&sort_order=desc&sort_by=email&search=".$_GET['search'];
										}
									}

									?>">
										<h1 title="Company Name" class="sort" >Email<span><?php if($_GET['sort_order'] == 'asc' && $_GET['sort_by'] == 'email') { echo "<sup>^</sup>"; } if($_GET['sort_order'] == 'desc' && $_GET['sort_by'] == 'email') { echo "<sub>^</sub>"; }?></span></h1>
									</a>								
								</th>
								
								
								<th width="9%">
									<a title="Year" class="underline_classs" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/index/10/0/asc//sort/year/">
												<h1 class="sort">Phone</h1>
										</a>								</th>
								<th width="6%">
									<a title="Make" class="underline_classs" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/index/10/0/asc//sort/make/">
												<h1 class="sort">Country</h1>
										</a>								</th>
								<th width="6%">
									<a title="Model" class="underline_classs" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/index/10/0/asc//sort/model/">
												<h1 class="sort">Status</h1>
										</a>								</th>
								<th width="9%">
									<a title="Total Due" class="underline_classs" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/index/10/0/asc//sort/purchase_price/">
												<h1 class="sort">DOB</h1>
										</a>								</th>
								<th width="9%">
									<a title="Floorplan date" class="underline_classs" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/index/10/0/asc//sort/purchase_date/">
												<h1 class="sort">Languages Known</h1>
										</a>								</th> 
								<th width="8%">
									<a title="Current Status" class="underline_classs" href="http://dexteroustechnologies.co.in/shamrock/admin/vehicles/index/10/0/asc//sort/current_status/">
												<h1 class="sort">Comments <i class="fa fa-angle-up menu-down"></i></h1>
										</a>								</th>
								<th width="15%"> <h1> Image </h1> </th>
								<th width="13%"> <h1> Action </h1> </th>
							</tr>
						</thead>
						
						<tbody>

							

								<?php
								
								// for numeric value of record_per_page
								if( $_GET['record_per_page'] != 'all' ) {

									$sort_by = $_GET['sort_by'];
									$sort_order = $_GET['sort_order'];

									$limitrecord = $_GET['record_per_page'];
									$offset = ($page-1) * $limitrecord;
									$total_page = ceil($rowcount['total'] / $limitrecord);

									if (!empty($search_value)){
										$sql = "select id, name, email, phone_no, country, status, dob, languages_known, comments, image from users where name like '%$search_value%' or email like '%$search_value%' order by $sort_by $sort_order LIMIT $offset, $limitrecord ";
									}
									else{
									$sql = "select id, name, email, phone_no, country, status, dob, languages_known, comments, image from users order by $sort_by $sort_order LIMIT $offset, $limitrecord ";
									}							
								}
								
								// for all record _per_page
								if( $_GET['record_per_page'] == 'all'){
									$sort_by = $_GET['sort_by'];
									$sort_order = $_GET['sort_order'];
									
									if (!empty($search_value)){
										$sql = "select id, name, email, phone_no, country, status, dob, languages_known, comments, image from users where name like '%$search_value%' or email like '%$search_value%' order by $sort_by $sort_order  ";										
									}
									else{
										$sql = "select id, name, email, phone_no, country, status, dob, languages_known, comments, image from users order by $sort_by $sort_order";
									}
								} 
															
								$result = mysqli_query($conn, $sql);
								$i = ( ($page-1) * $limitrecord) + 1;
								if (mysqli_num_rows($result) > 0)
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
										echo "<tr style='background-color:'>";
										echo "<td>".$i."</td>";

										echo "<td>".$row['name']."</td>";

										echo "<td>".$row['email']."</td>";
										echo "<td>".$row['phone_no']."</td>";
										
										if($row['country'] == 'IN') {
											echo "<td>India</td>";
										}
										if($row['country'] == 'US') {
											echo "<td>United States</td>";
										}
										if($row['country'] == 'CA') {
											echo "<td>Canada</td>";
										}

										if($row['status'] == 1) {
											echo "<td>active</td>";
										}
										if($row['status'] == 0) {
											echo "<td>Inactive</td>";
										}

										$date = strtotime($row['dob']);
										echo "<td>".date("d M Y", $date)."</td>";
										echo "<td>".$row['languages_known']."</td>";
										echo "<td>".$row['comments']."</td>";

										if(!empty($row['image'])) {
											
											echo "<td><div class='img-preview'><img onclick='previewImage(this)' src='dbimages/".$row['image']."' alt='No image' face width='50' height='50'></div></td>";
										}
										else{
											echo "<td>no image</td>";
										}

										echo "<td><a href='edit.php?&id=".$row['id']." '>Edit / </a>
										<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?page=".$_GET['page']."&record_per_page=".$_GET['record_per_page']."&sort_order=".$_GET['sort_order']."&sort_by=".$_GET['sort_by']."&search=".$_GET['search']."&id=".$row['id']."'>Delete</a></td>";
										
										echo "</tr>";
										$i++;																
									}
								}
								else
								{
									echo "<div class='login-error'>Something Wrong.</div>";
								}
									
								?>

								<!-- The Modal -->
								<div id="myModal" class="modal">
								  <span class="close" onclick="closePreview()">&times;</span>
								  <img class="modal-content" id="imgPreview">
								</div>

						</tbody>
					</table>
						</div>
						<div class="pagination">
							<?php

							if($page > 1 ){

								// previous
								if(empty($_GET['search'])) {
									echo '<a href= "list.php?page=1&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].' "> << </a>';
								}
								else {
								echo '<a href= "list.php?page=1&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].'&search='.$_GET['search'].' "> << </a>';
								}
								
								if(empty($_GET['search'])) {
									echo '<a href= "list.php?page='.($page-1).'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].' "> < </a>';
								}
								else{
								echo '<a href= "list.php?page='.($page-1).'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].'&search='.$_GET['search'].' "> < </a>';
								}
							}
					
							for($i=1; $i<=$total_page; $i++)
							{

								if($i == $page)
								{
									// search
									if(empty($_GET['search'])) {
										echo '<a style="background-color:black;" href= "list.php?page='.$i.'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].' ">'.$i.'</a>';
									}
									else{
										echo '<a style="background-color:black;" href= "list.php?page='.$i.'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].'&search='.$_GET['search'].' ">'.$i.'</a>';
									}
								}
								else {
									if(empty($_GET['search'])) {
										echo '<a href= "list.php?page='.$i.'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].' ">'.$i.'</a>';
									}
									else {
									echo '<a href= "list.php?page='.$i.'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].'&search='.$_GET['search'].' ">'.$i.'</a>';
									}

								}
							}  

							if($page < $total_page){

								// previous
								if(empty($_GET['search'])) { 
									echo '<a href= "list.php?page='.($page+1).'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].' "> > </a>';
								}
								else {
								echo '<a href= "list.php?page='.($page+1).'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].'&search='.$_GET['search'].' "> > </a>';
								}

								if(empty($_GET['search'])) { 
									echo '<a href= "list.php?page='.$total_page.'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].' "> >> </a>';
								}
								else {
									echo '<a href= "list.php?page='.$total_page.'&record_per_page='.$limitrecord.'&sort_order='.$_GET['sort_order'].'&sort_by='.$_GET['sort_by'].'&search='.$_GET['search'].' "> >> </a>';
								}

							}

							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
					</div>
                </div>

			</div>

		</div>

<script>

function previewImage(element){
	document.getElementById("myModal").style.display = "block";
  	document.getElementById("imgPreview").src = element.src;
}

function closePreview(){
	document.getElementById("myModal").style.display = "none";
}
</script>

<!-- add footer -->

<?php } ?>

<?php
include('footer.php');
?>	