<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-b-160 p-t-50">
            <div class="card">
                <div class="card-body">

                    <h1 class="page-header">
                        <?php echo $user->id != null ? $user->name : 'Nuevo Registro'; ?>
                    </h1>
        
                    <form id="frm-user" action="?c=User&a=Guardar" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
        
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="useruerido|min:3" />
                        </div>
        
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="lastName" value="<?php echo $user->lastName; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="useruerido|min:3" />
                        </div>
        
                        <div class="form-group">
                            <label>Constraseña</label>
                            <input type="password" name="password" value="<?php echo $user->password; ?>" class="form-control" placeholder="Ingrese su contraseña" data-validacion-tipo="useruerido|min:8" />
                        </div>
        
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="useruerido|email" />
                        </div>
        
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="tel" name="telefon" value="<?php echo $user->telefon; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="useruerido|min:10" />
                        </div>
        
                        <hr />
        
                        <div class="text-right">
                            <button class="saveBtn">Guardar</button>
                        </div>
                        
                    </form>
                </div>
               
            </div>
            <form class="login100-form validate-form" action ="index.php" name="autenthicate" method="post">
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign up					
                    </button>
                </div>
            </form>
        </div>
	</div>
</div>

<script>
    $(document).ready(function(){
        $("#frm-user").submit(function(){
            return $(this).validate();
        });
    })
</script>