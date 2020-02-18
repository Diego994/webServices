<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-b-160 p-t-50">
			<form class="login100-form validate-form" action ="index.php?c=User&a=Autenticar&email=<?php echo $_POST['email']; ?>&password=<?php echo $_POST['password']; ?>" name="autenthicate" method="post">
				<span class="login100-form-title p-b-43">
					Login
				</span>
				
				<div class="wrap-input100 rs1 validate-input" data-validate = "Email is required">
					<input id="inputEmail" class="input100" type="text" name="email">
					<span id="labelEmail" class="label-input100">Email</span>
				</div>
				
				
				<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
					<input id="inputPassword" class="input100" type="password" name="password">
					<span id="labelPassword" class="label-input100">Password</span>
				</div>

		

				<div class="container-login100-form-btn">
					<button class="login100-form-btn non-border">
						Sign in
					</button>
				</div>
				
			</form>

			<form class="login100-form validate-form" action ="index.php?c=User&a=Registrar" name="autenthicate" method="post">
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Sign up					
					</button>
				</div>
			</form>

				<div class="text-center w-full p-t-23">
					<a href="#" class="txt1">
						Forgot password?
					</a>
				</div>
		</div>
	</div>
</div>


<script>
	$('body').on('change', "#inputEmail", function() {
	  let floatText = $('#labelEmail');
      let value = $(this).val();
	  if(value){
		  console.log(true)
		  floatText.addClass('d-none')
	  } else {
		  if(floatText.hasClass('d-none')){
			  floatText.removeClass('d-none')
		  }
	  }
    });
	
	
	$('body').on('change', "#inputPassword", function() {
	  let floatText = $('#labelPassword');
      let value = $(this).val();
	  if(value){
		  console.log(true)
		  floatText.addClass('d-none')
	  } else {
		  if(floatText.hasClass('d-none')){
			  floatText.removeClass('d-none')
		  }
	  }
    });
</script>