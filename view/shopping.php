<style>
  li{
    margin-right: 12px;
  }
</style>
<style>
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

    * {
    	box-sizing: border-box;
    }

    .btn:hover{
        color:white!important;
    }

    body {
    	font-family: 'Muli', sans-serif;
    	display: flex;
    	align-items: center;
    	flex-direction: column;
    	min-height: 100vh;
    	margin: 0;
    }

    .courses-container {
        width: 100%;
        text-align: -webkit-center;
    }

    .course {
    	background-color: #fff;
    	border-radius: 10px;
    	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    	display: flex;
    	max-width: 100%;
    	margin: 20px;
    	overflow: hidden;
    	width: 700px;
    }

    .course h6 {
    	opacity: 0.6;
    	margin: 0;
    	letter-spacing: 1px;
    	text-transform: uppercase;
    }

    .course h2 {
    	letter-spacing: 1px;
    	margin: 10px 0;
    }

    .course-preview {
    	background-color: #2A265F;
    	color: #fff;
    	padding: 30px;
    	max-width: 250px;
    }

    .course-preview a {
    	color: #fff;
    	display: inline-block;
    	font-size: 12px;
    	opacity: 0.6;
    	margin-top: 30px;
    	text-decoration: none;
    }

    .course-info {
    	padding: 30px;
    	position: relative;
    	width: 100%;
    }

    .progress-container {
    	position: absolute;
    	top: 30px;
    	right: 30px;
    	text-align: right;
    	width: 150px;
    }

    .progress {
    	background-color: #ddd;
    	border-radius: 3px;
    	height: 5px;
    	width: 100%;
    }

    .progress::after {
    	border-radius: 3px;
    	background-color: #2A265F;
    	content: '';
    	position: absolute;
    	top: 0;
    	left: 0;
    	height: 5px;
    	width: 66%;
    }

    .progress-text {
    	font-size: 10px;
    	opacity: 0.6;
    	letter-spacing: 1px;
    }

    .btn {
        cursor: default!important;
    	background-color: black;
    	border: 0;
    	border-radius: 50px;
    	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    	color: #fff;
    	font-size: 16px;
    	padding: 12px 25px;
    	position: absolute;
    	bottom: 30px;
    	right: 30px;
    	letter-spacing: 1px;
    }

    /* SOCIAL PANEL CSS */
    .social-panel-container {
    	position: fixed;
    	right: 0;
    	bottom: 80px;
    	transform: translateX(100%);
    	transition: transform 0.4s ease-in-out;
    }

    .social-panel-container.visible {
    	transform: translateX(-10px);
    }

    .social-panel {	
    	background-color: #fff;
    	border-radius: 16px;
    	box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
    	border: 5px solid #001F61;
    	display: flex;
    	flex-direction: column;
    	justify-content: center;
    	align-items: center;
    	font-family: 'Muli';
    	position: relative;
    	height: 169px;	
    	width: 370px;
    	max-width: calc(100% - 10px);
    }

    .social-panel button.close-btn {
    	border: 0;
    	color: #97A5CE;
    	cursor: pointer;
    	font-size: 20px;
    	position: absolute;
    	top: 5px;
    	right: 5px;
    }

    .social-panel button.close-btn:focus {
    	outline: none;
    }

    .social-panel p {
    	background-color: #001F61;
    	border-radius: 0 0 10px 10px;
    	color: #fff;
    	font-size: 14px;
    	line-height: 18px;
    	padding: 2px 17px 6px;
    	position: absolute;
    	top: 0;
    	left: 50%;
    	margin: 0;
    	transform: translateX(-50%);
    	text-align: center;
    	width: 235px;
    }

    .social-panel p i {
    	margin: 0 5px;
    }

    .social-panel p a {
    	color: #FF7500;
    	text-decoration: none;
    }

    .social-panel h4 {
    	margin: 20px 0;
    	color: #97A5CE;	
    	font-family: 'Muli';	
    	font-size: 14px;	
    	line-height: 18px;
    	text-transform: uppercase;
    }

    .social-panel ul {
    	display: flex;
    	list-style-type: none;
    	padding: 0;
    	margin: 0;
    }

    .social-panel ul li {
    	margin: 0 10px;
    }

    .social-panel ul li a {
    	border: 1px solid #DCE1F2;
    	border-radius: 50%;
    	color: #001F61;
    	font-size: 20px;
    	display: flex;
    	justify-content: center;
    	align-items: center;
    	height: 50px;
    	width: 50px;
    	text-decoration: none;
    }

    .social-panel ul li a:hover {
    	border-color: #FF6A00;
    	box-shadow: 0 9px 12px -9px #FF6A00;
    }

    .floating-btn {
    	border-radius: 26.5px;
    	background-color: #001F61;
    	border: 1px solid #001F61;
    	box-shadow: 0 16px 22px -17px #03153B;
    	color: #fff;
    	cursor: pointer;
    	font-size: 16px;
    	line-height: 20px;
    	padding: 12px 20px;
    	position: fixed;
    	bottom: 20px;
    	right: 20px;
    	z-index: 999;
    }

    .floating-btn:hover {
    	background-color: #ffffff;
    	color: white;
    }

    .floating-btn:focus {
    	outline: none;
    }

    .floating-text {
    	background-color: #001F61;
    	border-radius: 10px 10px 0 0;
    	color: #fff;
    	font-family: 'Muli';
    	padding: 7px 15px;
    	position: fixed;
    	bottom: 0;
    	left: 50%;
    	transform: translateX(-50%);
    	text-align: center;
    	z-index: 998;
    }

    .floating-text a {
    	color: #FF7500;
    	text-decoration: none;
    }

    @media screen and (max-width: 480px) {

    	.social-panel-container.visible {
    		transform: translateX(0px);
    	}
    
    	.floating-btn {
    		right: 10px;
    	}
    }
	#btnComprar{
		cursor: pointer!important;
	}
	#btnComprar:hover{
		border-color: black;
		background-color:white;
		color: black!important;
		border: 1px solid black;
	}
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <h1 style="color: white;">Bienvenid@ <?php echo $arrayUser[0]['name']?></h1>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?c=Product&a=Index&email=<?php echo $arrayUser[0]['email']?>">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Shopping &nbsp; &nbsp;<i class='fa fa-cart-plus'></i>
                <hr style="background-color:white;">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Salir</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=Product&a=newProduct">New Product</a>
          </li>
          -->
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div id='<?php echo $userEmail?>'  class="container email">

    <div id='<?php echo $idUser?>' class="row sty-homeContainer idUser" style = "padding-top:100px;">

      <div class="col-lg-12">

        <div class="row" style="border: 1px solid silver; padding-bottom: 150px;">



        <?php foreach($arrayProduct as $p): ?>

            <div class="courses-container">
                <div class="course">
                    <div class="course-preview" style="background-color: black;">
                    <img class="card-img-top" src=<?php echo "assets/images/products/".$p['image']?> alt=<?php echo $p['image']?>>
                    </div>
                    <div class="course-info">
                        <h2><?php echo $p['name']?></h2>
                        <button class="btn">$<?php echo $p['cost']?></button>
                    </div>
                </div>
            </div>
        
        <?php endforeach; ?>

		<button id="btnComprar" class="btn">Comprar</button>

          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <script  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });

	$("#btnComprar").click(function() {
		var email = $('.email').attr('id');
		var idUser = $('.idUser').attr('id');
		console.log(email);
		window.location.href = (window.location.pathname + '?c=Shopping&a=Buy&email='+email+'&idUser='+idUser);
	});

  </script>