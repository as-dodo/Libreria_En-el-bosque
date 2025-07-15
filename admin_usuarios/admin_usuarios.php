<?php
require_once('../_init.php');
if (!$usuario || $usuario['tipo'] !== 'admin') {
    header('Location: ../error.php');
    exit;
}

$usuarios = getUsuarios($conexion);
?>

<?php include('../includes/header.php'); ?>

<div class="container my-5">
    <h2>Administración de Usuarios</h2>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Fecha de nacimiento</th>
                <th>Genero</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($u['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($u['email']); ?></td>
                    <td><?php echo htmlspecialchars($u['fecha_nacimiento']); ?></td>
                    <td><?php echo htmlspecialchars($u['genero']); ?></td>
                    <td><?php echo htmlspecialchars($u['tipo']); ?></td>
                    <td>
                        <?php if ($u['tipo'] !== 'admin'): ?>
                            <form method="POST" action="hacer_admin.php" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $u['id']; ?>">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-person-up"></i> Hacer Admin
                                </button>
                            </form>
                        <?php else: ?>
                            <?php if ($usuario['id'] != $u['id']): ?>
                                <form method="POST" action="quitar_admin.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $u['id']; ?>">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-person-down"></i> Quitar Admin
                                    </button>
                                </form>
                            <?php else: ?>
                                <span class="badge bg-secondary">Admin</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>