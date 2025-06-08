<div class="container mt-4">
    <h2><?= esc($titulo) ?></h2>
    <?php if (!empty($usuarios)): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <?php if ($usuario['baja'] === 'NO'): ?>
                    <tr>
                        <td><?= esc($usuario['id_usuario']) ?></td>
                        <td><?= esc($usuario['nombre']) ?></td>
                        <td><?= esc($usuario['apellido']) ?></td>
                        <td><?= esc($usuario['usuario']) ?></td>
                        <td><?= esc($usuario['email']) ?></td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay usuarios registrados.</p>
    <?php endif; ?>
</div>
