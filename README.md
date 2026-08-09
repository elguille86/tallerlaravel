# 📚 Proyecto de Taller - Blog con Laravel 12

Repositorio público destinado al almacenamiento, desarrollo y prácticas paso a paso de un **Blog**, comenzando desde la configuración base y endpoints CRUD hasta la construcción de módulos avanzados.

---

## 🛠️ Requisitos del Sistema

* **PHP:** >= 8.3
* **Servidor Web:** XAMPP (Apache) / Entorno local
* **Base de Datos:** MySQL / MariaDB (XAMPP)
* **Gestor de Dependencias:** Composer
* **Entorno Node.js:** >= 18.x (para compilación de assets con Vite)

---

## 🚀 Guía de Instalación Local

### 1. Clonar el repositorio
```bash
git clone <URL_DE_TU_REPOSITORIO>
cd <NOMBRE_DE_TU_CARPETA>
```

### Clases: Controladores en Laravel

## 📝 Historial de Clases y Commits


## Commit: 03 -  Creación de controlador (`HomeController`)
* **Comando ejecutado:**
```bash
PS D:\xampp\htdocs\tallerlaravel> php artisan make:controller HomeController
PS D:\xampp\htdocs\tallerlaravel> php artisan make:controller PostController
```
Se generó el controlador base app/Http/Controllers/HomeController.php y app/Http/Controllers/PostController.php mediante Artisan para gestionar las peticiones HTTP de la página principal de la aplicación.

## Commit: 04 -  Vistas en Laravel

En la arquitectura **MVC (Modelo-Vista-Controlador)** de Laravel, las **vistas** representan la **"V"**. Su función principal es gestionar la **capa de presentación**, separando el diseño HTML/CSS de la lógica de negocio y del acceso a datos.

### Responsabilidades de una Vista

* **Interrupción de lógica en HTML:** Evita escribir consultas a la base de datos o lógica compleja dentro de la interfaz.
* **Renderizado dinámico:** Muestra el contenido final procesando las variables enviadas por los controladores o rutas.
* **Seguridad (XSS):** Protege la aplicación al escapar automáticamente los datos transmitidos en pantalla.

### Estructura y Ubicación

Todas las vistas deben guardarse en la ruta:

```text
resources/views/
```
### Motor de Plantillas: Blade

Laravel utiliza **Blade** como su motor de plantillas predeterminado. A diferencia del código PHP tradicional (`<?php echo $variable; ?>`), Blade ofrece una sintaxis mucho más limpia, segura y optimizada.
* **Impresión de variables:**
```html
  <h2>Aquí se mostrará el post {{ $post }}</h2>
```

## Commit: 05 - Componentes con Blade y Configuración de Tailwind CSS

En este commit se integra la arquitectura de **componentes reutilizables de Blade** para modularizar la interfaz de usuario, combinada con **[Tailwind CSS](https://tailwindcss.com/docs/installation/using-vite)** para la estilización ágil y responsiva de las vistas.

### 1. Integración de Tailwind CSS (vvia CDN v3)

Para esta sesión de clase y el prototipado rápido de la interfaz, se utiliza la integración directa mediante el CDN de **Tailwind CSS v3**:

```html
<script src="https://cdn.tailwindcss.com"></script>
```

### 2. Componentes de Blade (`x-component`)

Los componentes de Blade permiten encapsular fragmentos de HTML reusables (botones, alertas, tarjetas, estructuras de diseño) evitando la duplicación de código. Creando el Directorio "components" ( Tenemos Componentes Anonimos y de Clase)


* **Ubicación de los componentes:**
```text
  resources/views/components/
```

* **Comando ejecutado de Clase:**
```bash
PS D:\xampp\htdocs\tallerlaravel> php artisan make:component alert2
```


## Commit: 06 - Plantillas y Directivas de Control en Blade

En este commit se consolida el uso de **plantillas Blade** mediante directivas de control (`@if`, `@foreach`, `@forelse`) y la reutilización de vistas para renderizar datos dinámicos provenientes de los controladores de Laravel.

### 1. Tipos de plantillas creadas en este proyecto
 
* **Layouts tradicionales con Blade:**
  * Archivo: `resources/views/layouts/app.blade.php`
  * Uso: `@extends('layouts.app')` en vistas como `Homelayout.blade.php`
  * Secciones: `@section('content22')` y `@yield('content22')` en el layout.
  * URL TEST : tallerlaravel/public/homelayout

* **Componentes de layout:**
  * Archivo: `resources/views/components/app-layout.blade.php`
  * Uso: `<x-app-layout> ... </x-app-layout>` en vistas como `Home.blade.php`
  * El contenido pasa al componente mediante la variable Blade `$slot`.
  * URL TEST : tallerlaravel/public/

* **Componentes de alerta reutilizables:**
  * `resources/views/components/alert.blade.php` — componente anónimo con `@props(['type' => 'info'])` y clases dinámicas según el tipo.
  * `resources/views/components/alert2.blade.php` — componente creado con Artisan (`php artisan make:component alert2`) y renderizado como `<x-alert2>`.
  * Ambos componentes usan slots para el título (`<x-slot name="title">`) y el contenido dinámico.

* **Differences entre Layout y Component Layout:**
  * El layout tradicional con `@extends` define una plantilla base y una sección de contenido.
  * El componente de layout con `<x-app-layout>` actúa como un wrapper reutilizable que recibe contenido en `$slot`.

### 2. Directivas de Control de Flujo en Blade

Blade ofrece accesos directos a las estructuras de control comunes de PHP de forma limpia y legible dentro del HTML.

* **Estructuras condicionales:**
```html
  @if(count($posts) > 0)
      <p>Hay artículos publicados.</p>
  @else
      <p>No se encontraron publicaciones.</p>
  @endif
```  

## Commit: 07 - Conexion con la Base de Datos
## 🗄️ Base de datos y migraciones

En este proyecto se configuró la base de datos MySQL como sigue:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bdtaller1
DB_USERNAME=root
DB_PASSWORD=miclave
```

La base de datos `bdtaller1` debe existir en tu servidor MySQL antes de ejecutar las migraciones. Puedes crearla con un cliente como phpMyAdmin o desde la consola MySQL:

```sql
CREATE DATABASE bdtaller1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Migraciones aplicadas

El proyecto incluye las migraciones por defecto de Laravel y algunas migraciones propias con las cuales se puede hacer un mantenimiento simple y creacion de clave forarena entre tabla cliente y venta:

* `database/migrations/0001_01_01_000000_create_users_table.php`
* `database/migrations/0001_01_01_000001_create_cache_table.php`
* `database/migrations/0001_01_01_000002_create_jobs_table.php`
* `database/migrations/2026_08_03_183251_crear_tabla_cliente.php`
* `database/migrations/2026_08_03_210000_agregar_columna_descripcion_tabla_cliente.php`
* `database/migrations/2026_08_04_035105_crear_tabla_venta.php`
* `database/migrations/2026_08_04_154022_create_detalle_venta_table.php`

### Ejecutar migraciones

* Para aplicar las migraciones en el entorno local:
```bash
php artisan migrate
```

* Hacer rollback de la última tanda de migraciones:
```bash
php artisan migrate:rollback
```
* Para regresar solo una vez (último batch) también puedes usar:
```bash
php artisan migrate:rollback --step=1
```

* Y si quieres borrar todo y volver a migrar desde cero:
```bash
php artisan migrate:fresh
```

Si necesitas limpiar las vistas compiladas y la cache de configuración después de cambios en el `.env` o en las vistas:
```bash
php artisan view:clear
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear
```