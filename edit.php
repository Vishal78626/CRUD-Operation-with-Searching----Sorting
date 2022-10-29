<?php

session_start();

if(!isset($_SESSION["is_login"])) {
	header('Location: login.php');	
}

else
{
	$now = time();
	
	if($now > $_SESSION['expire']) {
		unset($_SESSION['is_login']);
		$_SESSION['session_end'] = "You need to login to access this page."; 
        header("Location: login.php");  
    }

    // edit data
    $id = $_GET['id'];
	$page = $_GET['page'];
	$limitrecord = $_GET['record_per_page'];
	$sort_order = $_GET['sort_order'];
	$sort_by = $_GET['sort_by'];
	$search = $_GET['search'];
	
	include('connection.php');

	if(!empty($id)){
		// include('connection.php');
		$sql = "select name, email, password, phone_no, country, status, dob, languages_known, comments, image from users where id = $id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$name = $row['name'];
				$emailId = $row['email'];
				$password = $row['password'];
				$phone_no = $row['phone_no'];
				$country = $row['country'];
				$dbstatus = $row['status'];
				$dob = $row['dob'];

				$languages_known = $row['languages_known'];
				$lang = explode (",", $languages_known); 
				
				$comments = $row['comments'];
				$image = $row['image'];


			}
		}
	}

    // on click submit code
	if(isset($_POST['submit'])) 
	{

		$status = true;

		// name validation php
		if(empty($_POST['name'])) {
			$nameErr = "Name is required.";
			$status = false;
		}
		else {
			$name = $_POST['name'];
		}	

		// phone_no validation php
		if(empty($_POST['phone'])) {
			$phoneErr = "Phone number should not be empty.";
			$status = false;
		}
		else{
			if(!preg_match("/^[0-9]+$/", $_POST['phone'])) {
				$phoneErr = "Phone number should digits only.";
				$status = false;
			}
			elseif (strlen($_POST['phone'])<10 || strlen($_POST['phone'])>=11 ) {
				$phoneErr = "Phone length 10 digits only.";
				$status = false;			
			}
			else{
			$phone = $_POST['phone'];
			} 
		}

		// country validation php
		if(empty($_POST['country'])) {
			$countryErr = "Please select Country.";
			$status = false;
		}
		else{
			$country = $_POST['country'];
		}

		// status variable
		$customer_status = $_POST['customer_status'];

		// DOB validation php
		if(empty($_POST['dob'])){
			$dobErr = "Please select Date of Birth.";
			$status = false;
		}
		else{
			$dob = $_POST['dob'];
		}

		// Language validation php
		if(empty($_POST['checkbox'])  ) {
			$languageErr = "Please select atleast one language.";
			$status = false;
		}
		else{
			$language = $_POST['checkbox'];
			$chk = implode(',', $language);
		}

		// comment validation php
		if(empty($_POST['comment'])) {
			$commentErr = "Please enter comments.";
			$status = false;
		}
		else{
			$comment = $_POST['comment'];
		}

		// image validation php

		if(empty($image)) 
		{
			$imageName = $_FILES['image']['name'];
			$tempname = $_FILES["image"]["tmp_name"];
			$folder = "dbimages/".$imageName;

			$allowed =  array('jpeg','jpg', "png", "gif", "pdf", "JPEG","JPG", "PNG", "GIF", "PDF");
			$ext = pathinfo($imageName, PATHINFO_EXTENSION);

			if($imageName)
			{
				if(!in_array($ext, $allowed)) 
				{
					$imageErr = "Only image type jpg/png/jpeg/gif/pdf is allowed.";
					$status = false;	
				}	
				else
				{
					if($status == true){
						// $tempname = time();
						if (move_uploaded_file($tempname, $folder)) 
						{	
							chmod("$folder", 0777);
							$image = $imageName;
						}
						else 
						{
							$_SESSION['data_status'] = "File System error";
							// $imageStatus = false;
							$status = false;
						}
					}
				}
			}	
		}

		if(!empty($_POST['remove_checkbox']) && !empty($_FILES['updateimage']['name'])) {
			$updateImgErr = "Please choose one option";
			$status = false;
		}

		if(!empty($_POST['remove_checkbox']) ) {
			$sql = "update users set image='' where id = $id";
			if(mysqli_query($conn, $sql)) {
				unlink("dbimages/".$image);
				// $_SESSION['data_status'] = "Image removes Successfully";
				// header('location: list.php');
				// exit();
				$image = '';
				

			}
			else{
				echo "image remove error";
				$status=false;
			}
		}

		if(!empty($_FILES['updateimage']['name'])) {

			$imageName = $_FILES['updateimage']['name'];
			$tempname = $_FILES["updateimage"]["tmp_name"];
			$folder = "dbimages/".$imageName;

			$allowed =  array('jpeg','jpg', "png", "gif", "pdf", "JPEG","JPG", "PNG", "GIF", "PDF");
			$ext = pathinfo($imageName, PATHINFO_EXTENSION);

			// $imageStatus = false;

			if(!in_array($ext, $allowed)) {
				$imageErr = "Only image type jpg/png/jpeg/gif/pdf is allowed.";
				$status = false;		
			}
			else{
				if($status == true){
					
					if (move_uploaded_file($tempname, $folder)) {
						unlink("dbimages/".$image);	
						chmod("$folder", 0777);
						$image = $imageName;
						// $imageStatus = true;
					}
					else {
						$_SESSION['data_status'] = "File System error";
						$imageStatus = false;
						$status = false;
					}
				}
			}
		}
		// echo $_POST['remove_checkbox'];
		// echo $_FILES['updateimage']['name'];
	}



// echo $name;
	if($status == true) {
		
		$sql = "update users set name='$name', phone_no='$phone', country='$country', status=$customer_status,dob='$dob', languages_known='$chk', comments='$comment', image='$image'  where id=$id";
		// echo $sql;die;

		if(mysqli_query($conn, $sql)){		
			$_SESSION['data_status'] = "Data Edited Successfully.";  
				header('location: list.php');
				exit();
		} 
		else {
		    // $sql.
		    $_SESSION['data_status'] = "ERROR!! Sorry  " . mysqli_error($conn);
		}

	}

?>

<?php
include('header.php');
?>
<style>
	.img-preview {
    position: absolute;
    width: 60px;
    height: 60px;
    border: 1px solid #000;
    margin: 3px 0;
    right: 0;
    background: #999999;
    display: inline-flex;
    align-items: center;
}

.img-preview img {width: 100%;}
</style>
<!-- <script>
	$(document).ready(function () { 
			$("#enter_data").validate({
				errorElement: "div",
				errorClass: "valid-error",
			  
			  rules: {

			  	name: "required",

			    password: {
			    	required: true
			    },

			    confirm_password : {
			    	required:true,
                    equalTo: "#password"
                },

                phone: {
			      	required: true,
			      	minlength: 10,
			      	maxlength: 10,
			      	digits: true
			    },

			    country: {
			    	required: true
			    },

			    dob: {
			    	required: true
			    },

			    'checkbox[]': {
	                required: true,
	            },

	            comment: {
	            	required: true
	            },

	            image: {
	            	required: true,
	            	accept:"jpg,png,jpeg,gif,pdf"
	            }
			},
			  
			  messages: 
			  {
			  	name: "Please enter your Name.",

			    password: {
			    	required: "Please enter Password."
			    },

			    confirm_password: {
			    	required: "Please enter Confirm Password.",
			    	equalTo: "Password must be same"
			    },

			    phone: {
			      	required: "Please enter phone number.",
			      	maxlength: "Your phone number must be of 10 digit long.",
			      	minlength: "Your phone number must be of 10 digit long."
			    },

		     	country: {
			     	required: "Please Select Country."
			    },

			    dob: {
			     	required: "Please select Date of Birth."
			    },
			    
			     'checkbox[]': {
			    	required: "Please select atleast one Language."
			    },
			    
			    comment: {
			    	required: "Please enter Comments."
			    },
			    
			    image: {
			    	required: "Please select Image.",
			    	accept: "Only image type jpg/png/jpeg/gif/pdf is allowed."
			    }
			  },

		  		submitHandler: function(form) {
			  		form.submit();
			  	}
			});
		});
</script> -->


	<div class="border-div"></div>	
	<div class="clr"></div>
	
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
			</div>
				
<div class="my-account">					
	<div class="myaccount-outer ">
    	<form id="enter_data" enctype="multipart/form-data" method="post" accept-charset="utf-8" name="form">
			<div class="account-right-div">					
				<div class="dashboard-heading">
					<h2 class="dealer-head" title="">
						Edit Details</h2>				
				</div>
			</div>


		<div class="dashboard-inner">
			
			<?php
				echo "<div class='valid-error'>".$_SESSION['data_status']."</div>";
				unset($_SESSION['data_status']);
			?>

			<div class="main-dash-summry Edit-profile edit-dealer-prof dealer-edit">

				
				<div class="left-column">

					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label for="name">Name: <span class="star">*</span></label>
								<span class="reg_span">
									<input type="text" name="name" value="<?php if(!empty($name)) { echo $name; } ?>" id="name" class="inputbox-main" />
									<?php
									if (!empty($nameErr)){ 
										echo "<div class='valid-error'>".$nameErr."</div>";
									}
									?>
								</span>
							</div>
						</div>
					</div>

					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Email: <span class="star">*</span></label>
								<span class="reg_span  ">
									<!-- if(!empty($emailErr)){ $_POST['emailId'] = ""; } -->
									<input type="text" name="emailId" value="<?php if(!empty($emailId)) { echo $emailId; } ?>" id="emailId" class="inputbox-main" disabled />
									<?php
									if (!empty($emailErr)){ 
										echo "<div class='valid-error'>".$emailErr."</div>";
									}
									?>									
								</span>
							</div>
						</div>
					</div>
					

					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label>Phone no: <span class="star">*</span></label>
								<span class="reg_span">
									<input type="tel" name="phone" value="<?php if(!empty($phone_no)) { echo $phone_no; } ?>" id="phone" class="inputbox-main"  />
									<?php
									if (!empty($phoneErr)){ 
										echo "<div class='valid-error'>".$phoneErr."</div>";
									}
									?>
								</span>
							</div>
						</div>
					</div>
										
					<div class="input-row ">
						<div class="full">
							<div class="input-block factor-row factor">
								<label>Country: <span class="star">*</span></label>
								
								<span class="reg_span">
									<select name="country" class="inputbox-main pur_loc" id="country">
										<option value="" <?php if($_POST['country'] == '') { echo 'selected="selected"'; } ?> >Select Country</option>
										<option value="IN" <?php 
										if($country == 'IN') { echo "selected"; } 
										 ?> >India</option>
										<option value="US" <?php if($country == 'US') { echo "selected"; } ?>>USA</option>
										<option value="CA" <?php if($country == 'CA') { echo "selected"; } ?> >Canada</option>
									</select>
									<?php
									if (!empty($countryErr)){ 
										echo "<div class='valid-error'>".$countryErr."</div>";
									}
									?>
								</span>
							</div>
						</div>
					</div>
										
					<div class="input-row">
						<div class="full">
							<div class="input-block edit-full">
								<label>Status: </label>
								<span class="reg_span">
									<input id="active" type="radio" name="customer_status" <?php 
									if($dbstatus == '1') { echo 'checked'; } 
									 ?> value="1">
									<label class="radio-label radio-deal" for="active">Active</label>
									
									<input id="inactive" type="radio" name="customer_status" <?php if($dbstatus == '0') { echo 'checked'; } 
									 ?> value="0">
									<label class="radio-label radio-deal" for="inactive">Inactive</label>
								</span>
							</div>
						</div>
					</div>

					
				</div>
				<div class="right-column">
					
						
										
					<div class="input-row ">
						<div class="full">
							<div class="input-block">
								<label>Date of Birth: <span class="star">*</span><br/><span class="date-form">(MM-DD-YYYY)</span></label>
								<span class="reg_span">
									<input type="date" name="dob" id="dob" value="<?php if(!empty($dob)) { echo $dob; } ?>" class="inputbox-main"  />
									<?php
									if (!empty($dobErr)){ 
										echo "<div class='valid-error'>".$dobErr."</div>";
									}
									?>
								</span>
							</div>
						</div>
					</div>
					
										
					<div class="input-row add-fee">
						<div class="full">
							<div class="input-block">
								<label>Languages Known: <span class="star">*</span></label>
								<span class="reg_span ship_method">

									<div title="" class="fl-width">
										<input type="checkbox"  name="checkbox[]" value="html" class="risk_input"  id="html" <?php 
										
										if(in_array('html', $lang)) { echo "checked"; } 
										 ?> />
										<label class="check-val" for="html">HTML</label>
									</div>

									<div title="" class="fl-width">
										<input type="checkbox"  name="checkbox[]" value="css" class="risk_input"  id="css" <?php 

										if(in_array('css', $lang)) { echo "checked"; }
										 ?> />
										<label class="check-val" for="css">CSS</label>
									</div>

									<div title="" class="fl-width">
										<input type="checkbox"  name="checkbox[]" value="js" class="risk_input"  id="js" <?php

										if(in_array('js', $lang)) { echo "checked"; }
										 ?> />
										<label class="check-val" for="js">JavaScript</label>
									</div>

									<?php
									if (!empty($languageErr)){ 
										echo "<div class='valid-error'>".$languageErr."</div>";
									}
									?>

								</span>
							</div>
						</div>
					</div>
					
					<div class="input-row auth-space">
						<div class="full">
							<div class="input-block textarea-input text">
								<label>Comment: <span class="star">*</span></label>
								<span class="reg_span">
									<textarea name="comment" cols="40" rows="10" id="comment" class="inputbox-address check" ><?php 
									if(!empty($comments)) { echo $comments; } 
									 ?></textarea>
									<?php
									if (!empty($commentErr)){ 
										echo "<div class='valid-error'>".$commentErr."</div>";
									}
									?>
								</span>
							</div>
						</div>
					</div>	
					
					<div class="input-row up-title">
						<div class="full">
							<div class="input-block file ">
								<label>Image : <!-- <span class="star">*</span> --><br/><span class="file-form">(Upload image in .jpg, .jpeg, .png, .gif, .pdf format)</span></label>
							
								<span class="reg_span">
									
									
									<?php

									if(!empty($image)) 
									{
										
										echo "<div class='img-preview'><img src='dbimages/$image' style='border=1px solid;' alt='no image' width='50px' heigth='50px' id='frame'></div>";
										echo '<span><input type="checkbox" name="remove_checkbox" value="1" /><h5>Remove</h5></span>';
										echo '<br><input type="file" name="updateimage" id="updateimage" class="titles_file check lot-input-new" />';
										}

									else{
										echo '<input type="file" name="image" id="image" class="titles_file check lot-input-new" />';
										if (!empty($imageErr)){ 
											echo "<div class='valid-error'>".$imageErr."</div>";
										}
									}



									
									if(!empty($updateImgErr)){
										echo "<div class='valid-error'>".$updateImgErr."</div>";
									}
									?>
									
									<span class="reg_span file"></span>							
								</span>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

				<div class="submit-class">
					<div class="full">
						<input type="submit" name = "submit" id="submit" value="Submit" class="btn-submit btn"> 
						<input type="button" value="Cancel" onclick="javascript:history.go(-1);" class="btn-submit btn">
					</div>	
				</div>

			</form>

		</div>
	</div>
</div>

	

</div>

<?php } ?>
	
<!-- add footer -->
<?php
include('footer.php');
?>	