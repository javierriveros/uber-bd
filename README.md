# UBER DB

Registro y atención de solicitudes de transporte UBER
en la ciudad de Villavicencio, tener en cuenta información de
vehículos, barrios, tarifas, tipos de pago, etc. 

## Funcionamiento

Aplicación desarrollada bajo el modelo MVC.

## Requerimientos

* PHP (>7.4) [Instrucciones de Instalación](https://thishosting.rocks/install-php-on-ubuntu/)
* Composer [Instrucciones de Instalación](https://www.ionos.com/community/hosting/php/install-and-use-php-composer-on-ubuntu-1604/)
* PostgresSQL (>10) [Instrucciones de Instalación](https://gorails.com/setup/ubuntu/18.10#postgresql)

## Servidor

Para iniciar la aplicación con el servidor por defecto que trae php
se ejecuta el comando `$ php artisan serve` dentro de la carpeta del proyecto.

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
