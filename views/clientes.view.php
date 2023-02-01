<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clientes</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Edad</th>
                                    <th>Cédula</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Acciones
                                        <a data-toggle="modal" data-target="#AddModal" href="javascript:void(0);" title="Aregar Nuevo Cliente"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) :
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['edad'] ?></td>
                                        <td><?php echo $row['cedula'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#EditModal" href="javascript:void(0);" onclick="document.getElementById('update_id').value = <?= $row['id'] ?>;document.getElementById('update_nombre').value = '<?= $row['nombre'] ?>';document.getElementById('update_edad').value = '<?= $row['edad'] ?>';document.getElementById('update_cedula').value = '<?= $row['cedula'] ?>';document.getElementById('update_email').value = '<?= $row['email'] ?>';document.getElementById('update_direccion').value = '<?= $row['direccion'] ?>';" title="Editar Cliente" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a data-toggle="modal" data-target="#DeleteModal" href="javascript:void(0);" onclick="document.getElementById('delete_id').value = <?= $row['id'] ?>;document.getElementById('delete_nombre').value = '<?= $row['nombre'] ?>';" title="Eliminar Cliente" class="text-danger"> <i class="fas fa-trash"></i> </a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal para Ingresar -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=clientes" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="add_nombre">Nombre</label>
                        <input type="text" name="add_nombre" id="add_nombre" placeholder="Nombre de Cliente" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_edad">Edad</label>
                        <input type="number" name="add_edad" id="add_edad" placeholder="Edad del Cliente" class="form-control" required="required" min="1" max="100">
                    </div>

                    <div class="form-group">
                        <label for="add_cedula">Cédula</label>
                        <input type="text" name="add_cedula" id="add_cedula" placeholder="Cédula del Cliente" class="form-control" required="required" minlength="10" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="add_email">Email</label>
                        <input type="email" name="add_email" id="add_email" placeholder="Email de Cliente" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="add_direccion">Dirección</label>
                        <input type="text" name="add_direccion" id="add_direccion" placeholder="Dirección del Cliente" class="form-control" required="required">
                    </div>

                    <input type="submit" name="add_cliente" Value="Registrar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Cliente</h4>
            </div>
            <div class="modal-body">

                <form action="panel.php?modulo=clientes" method="POST">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <div class="form-group">
                        <label for="update_nombre">Nombre</label>
                        <input type="text" name="update_nombre" id="update_nombre" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="update_edad">Edad</label>
                        <input type="number" name="update_edad" id="update_edad" class="form-control" required="required" min="1" max="100">
                    </div>

                    <div class="form-group">
                        <label for="update_cedula">Cédula</label>
                        <input type="text" name="update_cedula" id="update_cedula" class="form-control" required="required" maxlength="10" minlength="10">
                    </div>

                    <div class="form-group">
                        <label for="update_email">Email</label>
                        <input type="email" name="update_email" id="update_email" class="form-control" value="" required="required">
                    </div>
                    <div class="form-group">
                        <label for="update_direccion">Dirección</label>
                        <input type="text" name="update_direccion" id="update_direccion" class="form-control" required="required">
                    </div>

                    <input type="submit" name="update_cliente" id="update_cliente" Value="Actualizar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Eliminar -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=clientes" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este cliente?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_cliente" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>