Crear la base de datos Mysql

Configurar el archivo .ENV para la base de datos

Ejecutar
composer install

Ejecutar migraciones para crear las tablas 

php artisan migrate


Ejecutar 

php artisan serve

Endpoints
"http://127.0.0.1:8000/api/books/" => listar libros (metodo GET)
"http://127.0.0.1:8000/api/books/create/{isbn} " => crear libro (metodo GET)
"http://127.0.0.1:8000/api/books/delete/{isbn}" => eliminar libro (metodo DELETE)
"http://127.0.0.1:8000/api/books/{isbn}" => detalles libro (metodo GET)

Prerequisites
Instalar Composer
