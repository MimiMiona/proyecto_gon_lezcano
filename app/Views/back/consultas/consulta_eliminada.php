<!-- Contenedor principal del formulario -->
<section class="container py-4">
    <div class="row justify-content-center"> 

        <!-- Encabezado con título y botón -->
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2>Consultas Resueltas</h2>
        <div>

            <!-- Botón para volver al listado general -->
            <a href="<?= base_url('ver-consultas'); ?>" class="btn btn-success">Volver</a>
        </div>
    </div>

    <div class="table-responsive">
        <!-- Tabla que lista consultas resueltas -->
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
                <?php if (!empty($consulta)): ?>
                     <!-- Recorre el arreglo de consultas y muestra cada registro en una fila -->
                    <?php foreach ($consulta as $consultas): ?>
                        <?php if ($consultas['eliminado'] === 'SI'): ?>
                            <tr>
                                <!-- Id de la consulta -->
                                <td><?= esc($consultas['id_usuario']) ?></td>
                                <!-- Nombre del usuario -->
                                <td><?= esc($consultas['nombre']) ?></td>
                                <!-- Email del usuario -->
                                <td><?= esc($consultas['email']) ?></td>
                                <!-- Mensaje enviado -->
                                <td><?= esc($consultas['mensaje']) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                    <!-- Fila cuando no hay registros -->
                    <tr>
                        <td colspan="7">No hay consultas resueltas.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</section>
