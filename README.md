# Sistema de Gestión de Pagos

Sistema web desarrollado con CodeIgniter 4 para la gestión de pagos y transacciones.

## Características

- Gestión completa de pagos (CRUD)
- Validación de datos únicos
- Interfaz responsive con AdminLTE
- Confirmación de eliminación con SweetAlert2
- Timestamps automáticos

## Requisitos

- PHP 8.1 o superior
- MySQL
- Extensiones PHP: intl, mbstring, json

## Instalación

1. Clona el repositorio
2. Configura la base de datos en `app/Config/Database.php`
3. Ejecuta las migraciones (si las hay)
4. Configura tu servidor web para apuntar a la carpeta `public/`

## Uso

Accede a `/pagos` para gestionar los pagos:
- Crear nuevos pagos
- Ver listado de pagos
- Editar pagos existentes
- Eliminar pagos

## Estructura

```
app/
├── Controllers/PagoController.php
├── Models/PagoModel.php
└── Views/pagos/
    ├── index.php
    ├── create.php
    ├── edit.php
    └── show.php
```
