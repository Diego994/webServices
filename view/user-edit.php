<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->name : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=User">Usuarios</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-user" action="?c=User&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="name" value="<?php echo $alm->name; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="lastName" value="<?php echo $alm->lastName; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Constraseña</label>
        <input type="password" name="password" value="<?php echo $alm->password; ?>" class="form-control" placeholder="Ingrese su contraseña" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="email" value="<?php echo $alm->email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="tel" name="telefon" value="<?php echo $alm->telefon; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-user").submit(function(){
            return $(this).validate();
        });
    })
</script>