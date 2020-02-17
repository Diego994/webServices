<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=User&a=Registrar">Nuevo usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Contraseña</th>
            <th style="width:120px;">Correo</th>
            <th style="width:120px;">Telefono</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->lastName; ?></td>
            <td><?php echo $r->password; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->telefon; ?></td>
            <td>
                <a href="?c=User&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=User&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
