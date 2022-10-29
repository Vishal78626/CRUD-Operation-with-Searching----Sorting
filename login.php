<?php

session_start();
if(isset($_SESSION["is_login"])) {
	$_SESSION['is_login'] = true;
	header('Location: list.php');
	exit();
}

if(isset($_POST['submit'])) {

	$status = false;

// password validation php
if(empty($_POST['password'])){
	$passErr = "Please enter Password.";
	$status = false;
}
else{
	$status = true;
}

// email validation php
if (empty($_POST["email"])) {
    $emailErr = "Please enter Email.";
    $status = false;
	} 
else {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Please enter Valid Email.";
      $status = false;
    }
    else{
    	$status = true;
    }
}

if($status == true){
	$email = $_POST['email'];
	$pass = $_POST['password'];

	include('connection.php');

	$sql = "select email, password from users where email='$email' AND password='".md5($pass)."' ";
	$result = mysqli_query($conn, $sql);
	

	if(mysqli_num_rows($result) == 1 )
	{
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['password'] = md5($pass);
		$_SESSION["is_login"] = true;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (18 * 100) ;

		header('Location:list.php');
		exit();
	}

	else{
		$final_error = "Invalid Email or Password.";
	}
 }

}

?>

<!-- add header -->
<?php
include('header.php');
?>	



<script>
	$(document).ready(function(){
			$("#login-form").validate({
				errorElement: "div",
				errorClass: "login-error",
			  rules: {

			    email: {
			      required: true,
			      email: true
			    },

			    password: {
			    	required: true
			    }
			  },
			  messages: {
			    email: {
			      required: "Please enter Email.",
			      email: "Please enter Valid Email."
			    },
			    password: {
			    	required: "Please enter Password."
			    }
			  }
			});
		});
</script>



		<div class="border-div"></div>	
		<div class="regi-main ">
			<div class="regi-base login_main">
				<?php
					if (!empty($_SESSION['logoutMsg'])){ 
						echo "<div class='login-error' style='color:green;'>".$_SESSION['logoutMsg']."</div>";
						unset($_SESSION['logoutMsg']);
					}
				?>

				<?php
					if (!empty($_SESSION['session_end'])){ 
						echo "<div class='login-error''>".$_SESSION['session_end']."</div>";
						unset($_SESSION['session_end']);
					}
				?>

				<?php
					if (!empty($final_error)){ 
						echo "<div class='login-error'>".$final_error."</div>";
					}
				?>

				<div class="login-box">
						
						

					<h2><img src="images/login_icon.png"/>
						<div class="login_title">
							<span>LOGIN</span>
							<p>to admin panel</p>
						</div>
					</h2>
					<form method="post" action="" class="form-horizontal" id="login-form">
						<fieldset>

							

							

							<div class="input-prepend">
								<label >Email:</label>
								<input type="text"  name="email" id="email"  value="" placeholder=" Please enter email" />
								<?php
								if (!empty($emailErr)){ 
									echo "<div class='login-error'>".$emailErr."</div>";
								}
								?>
							</div>
							

							<div class="input-prepend">
								<label>Password:</label>
								<input type="password" name="password" id="password" placeholder=" Please enter password" />
								<?php
								if (!empty($passErr)){ 
									echo "<div class='login-error'>".$passErr."</div>";
								}
								?>
							</div>

							<div class="button-login" >	
								<button class="btn login" type="submit" name="submit" >Login</button>

							</div>

							
							

						</fieldset>
					</form>
				</div>			
			</div>
		</div>

		<!-- Showing footer -->
		<?php
			include('footer.php');
		?>

		