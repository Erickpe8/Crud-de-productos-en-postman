# API de Productos - Laravel

Este proyecto es una API RESTful desarrollada en Laravel para la gestión de productos. Incluye operaciones CRUD completas a través del controlador `ProductoController`.

## Características

- Listar todos los productos (`GET /api/productos`)
- Crear un nuevo producto (`POST /api/productos`)
- Obtener un producto por ID (`GET /api/productos/{id}`)
- Actualizar un producto existente (`PUT /api/productos/{id}`)
- Eliminar un producto (`DELETE /api/productos/{id}`)

## Requisitos

- PHP >= 8.0
- Composer
- Laravel >= 9
- Base de datos MySQL
- Postman (para pruebas)

## Instalación

1. Clona el repositorio.
2. Ejecuta `composer install`.
3. Copia `.env.example` a `.env` y configura la base de datos.
4. Ejecuta las migraciones: `php artisan migrate`.
5. Inicia el servidor: `php artisan serve`.
6. 
## Documentación

El controlador `ProductoController` está documentado con comentarios tipo JSDoc para facilitar su mantenimiento y comprensión.


## Pruebas

Las rutas de la API pueden ser probadas usando Postman. Se incluyen operaciones con todos los verbos HTTP (GET, POST, PUT, DELETE).

### Ejecutar todas las pruebas:
```bash
php artisan test


