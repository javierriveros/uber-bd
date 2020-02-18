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

## Llave de la aplicación

Laravel requiere de una clave para encriptar los datos, para generarla se ejecuta:
`$ php artisan key:generate --show`, el resultado se ese comando se asigna a la variable
de entorno `APP_KEY` ubicada en el archivo `.env`.

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

## Requerimientos de la aplicación

### Disparadores y bitácora

#### Facturas

> Tabla bitacora_facturas
```sql
CREATE TABLE bitacora_facturas (
  operacion varchar(10) NOT NULL,
  usuario text NOT NULL,
  fecha timestamp NOT NULL,
  id bigint NOT NULL,
  total integer NOT NULL,
  pasajero_id bigint NOT NULL,
  vehiculo_id bigint NOT NULL,
  metodo_pago_id bigint NOT NULL,
  tarifa_id bigint NOT NULL
);


```

> Disparador
```sql
CREATE OR REPLACE FUNCTION auditar_cambio_facturas() RETURNS TRIGGER AS $$
BEGIN
  IF (TG_OP = 'DELETE' OR TG_OP = 'UPDATE') THEN 
    INSERT INTO bitacora_facturas SELECT TG_OP, user, now(), OLD.id, OLD.total, OLD.pasajero_id, OLD.vehiculo_id, OLD.metodo_pago_id, OLD.tarifa_id;
    RETURN OLD;
  ELSIF (TG_OP = 'INSERT') THEN 
    INSERT INTO bitacora_facturas SELECT TG_OP, user, now(), NEW.id, NEW.total, NEW.pasajero_id, NEW.vehiculo_id, NEW.metodo_pago_id, NEW.tarifa_id;
    RETURN NEW;
  END IF;
  RETURN NULL;
END;
$$LANGUAGE plpgsql;

CREATE TRIGGER auditar_cambio_facturas
AFTER INSERT OR UPDATE OR DELETE ON facturas
FOR EACH ROW EXECUTE PROCEDURE auditar_cambio_facturas();

```

#### Usuarios

> Tabla bitácora usuarios
```sql
CREATE TABLE bitacora_usuarios (
  operacion varchar(10) NOT NULL,
  usuario text NOT NULL,
  fecha timestamp NOT NULL,
  id bigint NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  tipo integer NOT NULL ,
  apellido varchar(255) NOT NULL,
  celular  varchar(255) NOT NULL
);
```

> Disparador
```sql
CREATE OR REPLACE FUNCTION auditar_cambio_usuarios() RETURNS TRIGGER AS $$
BEGIN
  IF (TG_OP = 'DELETE' or TG_OP = 'UPDATE') THEN 
    INSERT INTO bitacora_usuarios SELECT TG_OP, user, now(), OLD.id, OLD.name, OLD.email, OLD.tipo, OLD.apellido, OLD.celular;
    RETURN OLD;
  ELSIF (TG_OP = 'INSERT') THEN 
    INSERT INTO bitacora_usuarios SELECT TG_OP, user, now(), NEW.id, NEW.name, NEW.email, NEW.tipo, NEW.apellido, NEW.celular;
    RETURN NEW;
  END IF;
  RETURN NULL;
END;
$$LANGUAGE plpgsql;

CREATE TRIGGER auditar_cambio_usuarios
AFTER INSERT OR UPDATE OR DELETE ON users
FOR EACH ROW EXECUTE PROCEDURE auditar_cambio_usuarios();
```

### Funciones

> Obtener las facturas de un conductor
```sql
CREATE FUNCTION facturas_conductor (id_veh int) 
RETURNS TABLE (
  id bigint,
  total integer,
  pasajero_name varchar,
  pasajero_apellido varchar,
  pasajero_celular varchar,
  metodo_pago_nombre_met varchar,
  origen_dir varchar,
  origen_barr varchar,
  destino_dir varchar,
  destino_barr varchar
)
AS $$
BEGIN
  RETURN QUERY
    SELECT f.id, 
          f.total, 
          p.name AS pasajero_name, 
          p.apellido AS pasajero_apellido,
          p.celular AS pasajero_celular,
          m.nombre_met AS metodo_pago_nombre_met,
          ub1.direccion AS origen_dir, 
          ub1.nombre_barr AS origen_barr,
          ub2.direccion AS destino_dir,
          ub2.nombre_barr AS destino_barr
      FROM facturas f LEFT JOIN users p ON p.id=f.pasajero_id
                      LEFT JOIN metodos_pago m ON m.id=f.metodo_pago_id
                      LEFT JOIN tarifas t ON t.id=f.tarifa_id
                      LEFT JOIN ubicaciones ub1 on ub1.id=t.origen_id
                      LEFT JOIN ubicaciones ub2 on ub2.id=t.destino_id
        WHERE f.vehiculo_id=id_veh;
END; $$
LANGUAGE plpgsql;
```

### Vistas

> Vista para obtener el total de las facturas
```sql
CREATE VIEW total_facturas AS SELECT total FROM facturas;
```

> Vista para obtener los usuarios pasajeros
```sql
CREATE VIEW usuarios_pasajeros AS SELECT COUNT(*) FROM users WHERE tipo=1;
```

> Vista para obtener los usuarios conductores
```sql
CREATE VIEW usuarios_conductores AS SELECT COUNT(*) FROM users WHERE tipo=2;
```

> Vista para obtener los usuarios administradores
```sql
CREATE VIEW usuarios_administradores AS SELECT COUNT(*) FROM users WHERE tipo=3;
```
