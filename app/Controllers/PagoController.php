<?php

namespace App\Controllers;

use App\Models\PagoModel;

class PagoController extends BaseController {

    protected $pagoModel;

    function __construct() {
        $this->pagoModel = new PagoModel();
    }

    // Lista de pagos (VIEW)
    public function index() {
        $pagos = $this->pagoModel->findAll();
        $data = array(
            "pagos" => $pagos
        );
        return view("pagos/index", $data); // Vista de pagos
    }

    // Información de un pago (VIEW)
    public function show($id) {
        $pago = $this->pagoModel->find($id);
        $data = array(
            "pago" => $pago
        );
        return view("pagos/show", $data);
    }

    // Formulario para crear un nuevo pago (VIEW)
    public function create() {
        return view("pagos/create");
    }

    // Código para almacenar un pago (STORE)
    public function store() {
        // Obtener los datos del formulario
        $pedido_id = $this->request->getPost("pedido_id");
        $id_transaccion = $this->request->getPost("id_transaccion");

        // Verificar si el pedido_id ya existe en la base de datos
        $existingPago = $this->pagoModel->where('pedido_id', $pedido_id)->first();
        if ($existingPago) {
            // Si existe, redirigir con mensaje de error
            return redirect()->back()->with('error', 'El ID de pedido ya está registrado.');
        }

        // Verificar si el id_transaccion ya existe en la base de datos
        $existingTransaccion = $this->pagoModel->where('id_transaccion', $id_transaccion)->first();
        if ($existingTransaccion) {
            // Si existe, redirigir con mensaje de error
            return redirect()->back()->with('error', 'El ID de transacción ya está registrado.');
        }

        // Si no hay duplicados, guardar los datos
        $data = [
            "cantidad_pagada" => $this->request->getPost("cantidad_pagada"),
            "pedido_id" => $pedido_id,
            "id_transaccion" => $id_transaccion,
            "metodo" => $this->request->getPost("metodo"),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ];

        // Guardar en la base de datos
        $this->pagoModel->save($data);

        // Redirigir con mensaje de éxito
        return redirect()->to("/pagos");
    }

    // Formulario para editar un pago existente (VIEW)
    public function edit($id) {
        $pago = $this->pagoModel->find($id);
        if (!$pago) {
            return redirect()->to(base_url("pagos"))->with('error', 'Pago no encontrado.');
        }
        
        $data = array(
            "pago" => $pago
        );
        return view("pagos/edit", $data);
    }

    // Código para actualizar un pago existente
    public function update($id) {
        $data = array(
            "cantidad_pagada" => $this->request->getPost("cantidad_pagada"),
            "pedido_id" => $this->request->getPost("pedido_id"),
            "id_transaccion" => $this->request->getPost("id_transaccion"),
            "metodo" => $this->request->getPost("metodo"),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        $this->pagoModel->update($id, $data);

        return redirect()->to("pagos/$id");
    }

    // Código para eliminar un pago
    public function delete($id) {
        $this->pagoModel->delete($id);
        return redirect()->to("/pagos");
    }
}
