<div class="container mt-4">
    <h2><?= esc($titulo) ?></h2>
    <?php if (!empty($consultas)): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= esc($consulta['id_usuario']) ?></td>
                        <td><?= esc($consulta['nombre']) ?></td>
                        <td><?= esc($consulta['email']) ?></td>
                        <td><?= esc($consulta['mensaje']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay consultas registradas.</p>
    <?php endif; ?>
</div>
