<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?>
Crear Pago
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>
<h1>Crear Pago</h1>

<!-- Mostrar mensajes de error o éxito -->
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('pagos/store') ?>" method="post">
    <div class="mb-3">
        <label for="cantidad_pagada" class="form-label">Cantidad Pagada</label>
        <input type="number" step="0.01" class="form-control" id="cantidad_pagada" name="cantidad_pagada" required>
    </div>
    <div class="mb-3">
        <label for="pedido_id" class="form-label">ID Pedido</label>
        <input type="number" class="form-control" id="pedido_id" name="pedido_id" required>
    </div>
    <div class="mb-3">
        <label for="id_transaccion" class="form-label">ID Transacción</label>
        <input type="text" class="form-control" id="id_transaccion" name="id_transaccion" required>
    </div>
    <div class="mb-3">
        <label for="metodo" class="form-label">Método de Pago</label>
        <select class="form-select" id="metodo" name="metodo" required>
            <option value="efectivo">Efectivo</option>
            <option value="transferencia">Transferencia</option>
            <option value="mercadopago">MercadoPago</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?= base_url("pagos") ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?php $this->endSection(); ?>