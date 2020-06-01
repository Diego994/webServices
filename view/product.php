
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?c=Product&a=Index&email=<?php echo $userEmail?>">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">New Product
              <hr style="background-color:white;">
            </a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row" style="padding-top:100px;">
    <div class="card-body">

<h1 class="page-header">
    <?php echo $product->id != null ? $product->name : 'Nuevo Producto'; ?>
</h1>

<form id="frm-product" action="?c=Product&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" value="<?php echo $product->name; ?>" class="form-control" placeholder="Ingrese nombre de producto" data-validacion-tipo="productuerido|min:3" />
    </div>

    <div class="form-group">
        <label>descripcion</label>
        <input type="text" name="description" value="<?php echo $product->description; ?>" class="form-control" placeholder="Ingrese descripcion de producto" data-validacion-tipo="productuerido|min:3" />
    </div>

    <div class="form-group">
        <label>precio</label>
        <input type="number" name="cost" value="<?php echo $product->cost; ?>" class="form-control" placeholder="Ingrese precio de producto" data-validacion-tipo="productuerido|numero" />
    </div>

    <div class="form-group">
        <label>disponibilidad</label>
        <input id="availabilityCheckBox" type="checkbox" name="availability" value="<?php echo $product->availability; ?>" class="form-control "/>
        <label for="availability"> disponibilidad</label><br>
    </div>

    <div class="form-group">
        <label>stock</label>
        <input type="number" name="stock" value="<?php echo $product->stock; ?>" class="form-control" placeholder="stock del producto" data-validacion-tipo="productuerido|numero" />
    </div>

    <div class="form-group">
        <label>image</label>
        <input type="file" name="image" value="<?php echo $product->image; ?>" class="form-control" placeholder="imagen del producto" />
    </div>

    <br>
    <br>
    <hr />

    <div class="text-right">
        <button class="saveBtn">Guardar</button>
    </div>
    
</form>
</div>

    </div>

  </div>
  <!-- /.container -->


  <script>
    $('#availabilityCheckBox').change(function(){
          if($(this).attr('checked')){
                $(this).val(0);
          }else{
                $(this).val(1);
          }
        });
    $(document).ready(function(){
      


        $("#frm-user").submit(function(){
            return $(this).validate();
        });
    })
  
      if($('#availabilityCheckBox').val()==1){
        $('#availabilityCheckBox').prop('checked', true);
      } else {
        $('#availabilityCheckBox').prop('checked', false);
      }
    
</script>