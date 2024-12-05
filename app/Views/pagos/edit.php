<?php $this->extend("plantilla"); ?>

<?php $this->section("titulo"); ?>
Editar Pago
<?php $this->endSection(); ?>

<?php $this->section("content"); ?>
<h1>Editar Pago</h1>
<form action="<?= base_url("pagos/{$pago['id']}/update") ?>" method="post">
    <div class="mb-3">
        <label for="cantidad_pagada" class="form-label">Cantidad Pagada</label>
        <input type="number" step="0.01" class="form-control" id="cantidad_pagada" name="cantidad_pagada" value="<?= $pago['cantidad_pagada'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="pedido_id" class="form-label">ID Pedido</label>
        <input type="number" class="form-control" id="pedido_id" name="pedido_id" value="<?= $pago['pedido_id'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="id_transaccion" class="form-label">ID Transacción</label>
        <input type="text" class="form-control" id="id_transaccion" name="id_transaccion" value="<?= $pago['id_transaccion'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="metodo" class="form-label">Método de Pago</label>
        <select class="form-select" id="metodo" name="metodo" required>
            <option value="efectivo" <?= $pago['metodo'] === 'efectivo' ? 'selected' : '' ?>>Efectivo</option>
            <option value="transferencia" <?= $pago['metodo'] === 'transferencia' ? 'selected' : '' ?>>Transferencia</option>
            <option value="mercadopago" <?= $pago['metodo'] === 'mercadopago' ? 'selected' : '' ?>>MercadoPago</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="<?= base_url("pagos") ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?php $this->endSection(); ?>
