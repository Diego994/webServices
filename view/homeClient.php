<style>
  li{
    margin-right: 12px;
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
            <a class="nav-link" href="#">Home
            <hr style="background-color:white;">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=Shopping&a=Index&email=<?php echo $userEmail?>">Shopping &nbsp;<i class='fa fa-cart-plus'></i></a>
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
  <div class="container">

    <div class="row sty-homeContainer" style = "padding-top:100px;">

      <div class="col-lg-3">

        <h1 class="my-4">Tenis Store</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Tenis deportivos</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <!--<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>-->

        <div class="row">

          <?php foreach($arrayProduct as $p): ?>

              <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <img class="card-img-top" src=<?php echo "assets/images/products/".$p['image']?> alt=<?php echo $p['image']?>>
                <div class="card-body">
                  <h4 class="card-title">
                    <?php echo $p['name'] != null ? $p['name'] : 'Nuevo Producto'; ?>
                  </h4>
                  <h5><?php echo $p['cost']?> $</h5>
                  <p class="card-text"><?php echo $p['description']?></p>
                </div>
                <?php   if($p['availability']==0){
                    echo "<div class='card-footer' style=' background-color:crimson'>";
                    echo "<small class='text-muted' style='text-align:center;'> <h3 style='color:white; cursor: default;'>No disponible</h3></small>";
                    echo "</div>";
                } else if ($p['availability']==1){
                    echo "<div class='card-footer shoppingBtn' id=".$p['id']." style=' background-color: darkslategray; cursor: pointer;'>";
                    echo "<small id=".$idUser." class='text-muted' style='text-align:center; background-color:green;'> <h3 id=".$userEmail." style='color:white;'>Disponible &nbsp; &nbsp;<i class='fa fa-cart-plus'></i></h3></small>";
                    echo "</div>";
                }
                ?>
              </div>
            </div>

          <?php endforeach; ?>

          

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

    $(".shoppingBtn").click(function() {
        var idProduct = $(this).attr('id');
        var idUser = $(this).children('small').attr('id')
        var userEmail = $(this).children('small').children('h3').attr('id')
        console.log(idProduct)
        console.log(idUser)
        console.log(userEmail)
        if (confirm('Deseas agregar al carrito este producto?')) {
            window.location.href = (window.location.pathname + '?c=Shopping&a=Add&idProducto='+idProduct+'&idUsuario='+idUser+'&email='+userEmail);
        } else {
        }
    });
  </script>