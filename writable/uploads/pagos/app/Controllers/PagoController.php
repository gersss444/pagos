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

    // Código para guardar un nuevo pago en la base de datos
    public function store() {
        $data = array(
            "cantidad_pagada" => $this->request->getPost("cantidad_pagada"),
            "pedido_id" => $this->request->getPost("pedido_id"),
            "id_transaccion" => $this->request->getPost("id_transaccion"),
            "metodo" => $this->request->getPost("metodo"),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        $this->pagoModel->save($data);

        return redirect()->to("http://localhost/pagos/public/index.php/pagos");
    }

    // Formulario para editar un pago existente (VIEW)
    public function edit($id) {
        $pago = $this->pagoModel->find($id);
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

        return redirect()->to("http://localhost/pagos/public/index.php/pagos/$id");
    }

    // Código para eliminar un pago
    public function delete($id) {
        $this->pagoModel->delete($id);
        return redirect()->to("/pagos");
    }
}