# UBER DB

Registro y atención de solicitudes de transporte UBER
en la ciudad de Villavicencio, tener en cuenta información de
vehículos, barrios, tarifas, tipos de pago, etc. 

## Requerimientos

* PHP (>7.4) [Instrucciones de Instalación](https://thishosting.rocks/install-php-on-ubuntu/)
* Composer [Instrucciones de Instalación](https://www.ionos.com/community/hosting/php/install-and-use-php-composer-on-ubuntu-1604/)
* PostgresSQL (>10) [Instrucciones de Instalación](https://gorails.com/setup/ubuntu/18.10#postgresql)

## Migrar la base de datos

Para que se creen todas las tablas de la base de datos se debe modificar el archivo `.env`
ubicado en la raíz del proyecto, con los datos de Postgres:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=uber_app
DB_USERNAME=tunombredeusuario
DB_PASSWORD=tupassword
```

Luego ingresar a la consola de Postgres y crear la base de datos con:
 
```sql
CREATE DATABASE uber_app;
```

Luego ejecutar el comando: `$ php artisan migrate`

## Dependecias de composer

Para instalar las depedencias necesarias para poder ejecutar la aplicación se ejecuta el comando:
`$ composer install` en la carpeta raíz del proyecto.

## Servidor

Para iniciar la aplicación con el servidor por defecto que trae php
se ejecuta el comando `$ php artisan serve` dentro de la carpeta del proyecto.

## Funcionamiento

Aplicación desarrollada bajo el modelo MVC.

### Estructura del Proyecto:

*Los archivos y Las carpetas no mencionadas no tienen relevación en el proyecto mismo, fueron generadas por Laravel*

 ```
app
├── Http
│   ├── Controllers -> Contiene los controladores de la aplicación
│   │   ├── Auth -> Contiene la lógica de autenticación y registro de usuarios
│   │   ├── Controller.php
│   │   ├── FacturasController.php
│   │   ├── HomeController.php
│   │   ├── MetodosPagoController.php
│   │   ├── TarifasController.php
│   │   ├── UbicacionesController.php
│   │   ├── UsuariosController.php
│   │   └── VehiculosController.php
│   └── Middleware -> Middlwares aplicados en las rutas.
│       ├── ComprobarAdmin.php
│       ├── ComprobarConductorAdmin.php
│       ├── ComprobarConductor.php
│       ├── ComprobarPasajeroAdmin.php
├── Factura.php -> Modelo
├── MetodoPago.php -> Modelo
├── Tarifa.php -> Modelo
├── Ubicacion.php -> Modelo
├── User.php -> Modelo
└── Vehiculo.php -> Modelo

resources -> contiene las vistas y recursos usados en la aplicación
├── js -> Scripts de la aplicación
├── lang -> Mensajes de validación
├── sass -> Estilos de la aplicación
│   ├── app.scss
│   └── _variables.scss
└── views -> Vistas de la aplicación
    ├── auth -> Vistas de la autenticación de usuarios
    │   ├── login.blade.php
    │   ├── passwords
    │   │   ├── confirm.blade.php
    │   │   ├── email.blade.php
    │   │   └── reset.blade.php
    │   ├── register.blade.php
    │   └── verify.blade.php
    ├── facturas -> Vistas del módulo de facturas
    │   ├── create.blade.php
    │   ├── delete.blade.php
    │   ├── edit.blade.php
    │   ├── form.blade.php
    │   ├── index.blade.php
    │   └── show.blade.php
    ├── home -> Vistas de la página principal
    │   ├── admin.blade.php
    │   ├── conductor.blade.php
    |   └── home.blade.php
    ├── layouts -> Layout principal
    │   └── app.blade.php
    ├── metodos_pago -> Vistas del métodos de pago
    │   ├── create.blade.php
    │   ├── delete.blade.php
    │   ├── edit.blade.php
    │   ├── form.blade.php
    │   └── index.blade.php
    ├── partials -> Archivos comunes
    │   └── nav.blade.php
    ├── tarifas -> Vistas del módulo de tarifas
    │   ├── create.blade.php
    │   ├── delete.blade.php
    │   ├── edit.blade.php
    │   ├── form.blade.php
    │   └── index.blade.php
    ├── ubicaciones -> Vistas del módulo de ubicaciones
    │   ├── create.blade.php
    │   ├── delete.blade.php
    │   ├── edit.blade.php
    │   ├── form.blade.php
    │   └── index.blade.php
    ├── unauthenticated.blade.php -> Landing Page
    ├── usuarios ->  -> Vistas del módulo de usuarios
    │   ├── delete.blade.php
    │   ├── edit.blade.php
    │   └── index.blade.php
    └── vehiculos -> Vistas del módulo de vehículos
        ├── create.blade.php
        ├── delete.blade.php
        ├── edit.blade.php
        ├── form.blade.php
        └── index.blade.php

routes -> Rutas de la aplicación
└── web.php
```
