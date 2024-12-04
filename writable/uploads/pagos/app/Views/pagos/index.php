<!-- Views/usuario/create  http://localhost/fotobook/public/index.php/usuarios/create -->

<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?> 
Gestión de Pagos
<?php $this->endSection(); ?>

<?php $this->section("content"); // Aquí el contenido ?>

<section class="row">
    <div class="col-12 card">

        <div class="card-header">
            <a href="<?= base_url(); ?>index.php/pagos/create" class="btn btn-success"><i class="bi bi-bookmark-plus"></i> Nuevo Pago</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Cantidad Pagada</th>
                        <th>Pedido ID</th>
                        <th>ID Transacción</th>
                        <th>Método</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagos as $pago): ?>
                    <tr class="align-middle">
                        <td><?= $pago["id"] ?></td>
                        <td><?= $pago["cantidad_pagada"] ?></td>
                        <td><?= $pago["pedido_id"] ?></td>
                        <td><?= $pago["id_transaccion"] ?></td>
                        <td><?= $pago["metodo"] ?></td>
                        <td><?= $pago["created_at"] ?></td>
                        <td>
                            <a href="<?= base_url("index.php/pagos/$pago[id]"); ?>" 
                            class="btn btn-warning btn-sm">
                            <i class="bi bi-eye-fill"></i></a>
                            <a href="<?= base_url("index.php/pagos/$pago[id]/edit"); ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button onClick="eliminar(<?= $pago['id']; ?>)" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function eliminar(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El registro se eliminará permanentemente.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "<?= base_url(); ?>index.php/pagos/" + id + "/delete";
            }
        });
    }
</script>

<?php $this->endSection(); // Aquí termina el contenido ?>