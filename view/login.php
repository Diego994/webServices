<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-b-160 p-t-50">
			<form class="login100-form validate-form" name="autenthicate" method="post">
				<span class="login100-form-title p-b-43">
					Account Login
				</span>
				
				<div class="wrap-input100 rs1 validate-input" data-validate = "Email is required">
					<input class="input100" type="text" name="email">
					<span class="label-input100">Email</span>
				</div>
				
				
				<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
					<input class="input100" type="password" name="password">
					<span class="label-input100">Password</span>
				</div>

		

				<div class="container-login100-form-btn">
					<button class="login100-form-btn non-border">
						<a class="autenticationBtn" href="?c=User&a=Autenticar&email=<?php echo $_POST['email']; ?>&password=<?php echo $_POST['password']; ?>">Sign in</a>
					</button>
				</div>


				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Sign up
					</button>
				</div>
				
				<div class="text-center w-full p-t-23">
					<a href="#" class="txt1">
						Forgot password?
					</a>
				</div>
			</form>
		</div>
	</div>
</div>