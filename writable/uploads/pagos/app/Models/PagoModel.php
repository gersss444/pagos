<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoModel extends Model {
    protected $table = 'pagos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria

    protected $allowedFields = [
        'cantidad_pagada', 
        'pedido_id', 
        'id_transaccion', 
        'metodo'
    ]; // Campos permitidos para escritura

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}