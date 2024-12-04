<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?>
Detalles del Pago
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>
<h1>Detalles del Pago</h1>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= $pago['id'] ?></td>
    </tr>
    <tr>
        <th>Cantidad Pagada</th>
        <td><?= $pago['cantidad_pagada'] ?></td>
    </tr>
    <tr>
        <th>ID Pedido</th>
        <td><?= $pago['pedido_id'] ?></td>
    </tr>
    <tr>
        <th>ID Transacción</th>
        <td><?= $pago['id_transaccion'] ?></td>
    </tr>
    <tr>
        <th>Método</th>
        <td><?= $pago['metodo'] ?></td>
    </tr>
    <tr>
        <th>Fecha de Creación</th>
        <td><?= $pago['created_at'] ?></td>
    </tr>
    <tr>
        <th>Última Actualización</th>
        <td><?= $pago['updated_at'] ?></td>
    </tr>
</table>
<a href="<?= base_url('index.php/pagos') ?>" class="btn btn-primary">Volver a la lista</a>
<?php $this->endSection(); ?>