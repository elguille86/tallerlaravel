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
## Commit: 08 - Migracciones con la Base de Datos

Creacion de tabla Posts
```bash
php artisan make:migration create_posts_table    
```
vuelve a ejecutar todas las migraciones
```bash
php artisan migrate:reflesh  
```

Agregar una columna a un tabla existente
```bash
php artisan make:migration add_avatar_to_users_table
```
En la migracion adicional el campo nuevo 
```php
public function up(): void
{
  Schema::table('users', function (Blueprint $table) {
    $table->string('avatar')->nullable()->after('email');
  });
}
```
 
## Commit: 09 - Eloquent ORM y Modelos

En esta clase se introduce **Eloquent**, el ORM de Laravel para trabajar con bases de datos usando modelos y relaciones sin escribir SQL directo.

Conceptos clave

* **Modelos:** representan tablas de la base de datos. Un modelo típico se encuentra en `app/Models/Post.php`.
* **Consultas limpias:** Eloquent usa métodos como `all()`, `find()`, `where()`, `create()` y `update()` para manejar datos.
* **Relaciones:** permite definir `hasOne`, `hasMany`, `belongsTo`, `belongsToMany`, etc.
* **Mass assignment:** protege qué campos pueden llenarse en masa con `$fillable` o `$guarded`.

* **Creacion de Modelo:**
```bash
php artisan make:model Post 
```

* **Ejemplo básico de modelo**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];
}
```

* **Ejemplo de uso en controlador**

```php
use App\Models\Post;

// Obtener todos los posts
$posts = Post::all();

// Crear un nuevo post
$post = Post::create([
    'title' => 'Mi primer post',
    'body' => 'Contenido de ejemplo',
    'user_id' => 1,
]);

// Actualizar un post existente
$post->update(['title' => 'Título actualizado']);
```

* **Relaciones Eloquent**

```php
class User extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

* **Comandos útiles**

* `php artisan make:model Post -m` — crea el modelo y una migración.
* `php artisan make:model Comment -m` — crea un modelo `Comment` con migración.
* `php artisan tinker` — probar consultas Eloquent en consola.

* ** Objetivos de la clase 09 **

1. Entender cómo funciona Eloquent dentro de Laravel.
2. Crear modelos básicos y proteger atributos con `$fillable`.
3. Definir relaciones entre tablas.
4. Realizar operaciones CRUD usando Eloquent en lugar de SQL directo.

## Commit: 10 - Mutadores y Accesores en Eloquent

En esta clase se documentan los **mutadores** y **accesores**, dos características de Eloquent que permiten transformar los datos de los modelos al guardar y al leer.

* **¿Qué es un mutador?**
Un mutador modifica un valor antes de almacenarlo en la base de datos.

```php
class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
}
```

* **¿Qué es un accesor?**
Un accesor modifica un valor cuando se obtiene desde el modelo.

```php
class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
```

* **Ejemplos prácticos**

* **Mutador para contraseñas**

```php
public function setPasswordAttribute($value)
{
    $this->attributes['password'] = bcrypt($value);
}
```

* **Accesor para mostrar el título formateado**

```php
public function getTitleAttribute($value)
{
    return "Título: {$value}";
}
```

**Beneficios**

* Permite centralizar la lógica de transformación en el modelo.
* Evita repetir formateo en controladores o vistas.
* Mejora la coherencia en los datos que se guardan y se muestran.

**Buenas prácticas**

* Usa mutadores para normalizar y proteger valores antes de guardar.
* Usa accesores para presentar datos con formato sin cambiar el valor original.
* Mantén el nombre del método en el formato `setXAttribute` y `getXAttribute`.

**Objetivos de la clase**

1. Entender la diferencia entre guardar datos y leer datos en Eloquent.
2. Aprender a crear mutadores para transformar valores antes del guardado.
3. Aprender a crear accesores para formatear valores al obtenerlos.
4. Aplicar mutadores y accesores en modelos reales para mantener la lógica de datos en un solo lugar.

## Commit: 11 - Casting de Atributos en Eloquent

Se introduce el **casting de atributos** (attribute casting), una característica poderosa de Eloquent que permite convertir automáticamente los valores de los atributos del modelo a tipos PHP específicos al leer de la base de datos y al guardar.

**¿Qué es Casting?**

El casting es el proceso de convertir un tipo de dato a otro. En Eloquent, el casting automático transforma:
- Strings de la base de datos → Enteros, booleanos, fechas, JSON, etc.
- Tipos PHP complejos → Formatos apropiados para almacenar en la BD.

Esto simplifica el trabajo eliminando conversiones manuales en controladores o vistas.

**Diferencia entre Casting, Mutadores y Accesores**

| Concepto | Propósito | Cuándo usar |
|----------|-----------|-------------|
| **Casting** | Conversión automática de tipos | Cambios simples de tipo (string → int, datetime, etc.) |
| **Mutadores** | Modificar valor antes de guardar | Transformaciones específicas (encriptación, formato) |
| **Accesores** | Modificar valor al obtener | Presentar datos en un formato legible |

**Método `casts()` en el Modelo**

En Laravel 11, el método `casts()` define la conversión de tipos para los atributos del modelo:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Define qué atributos deben convertirse a qué tipos
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',  // Convierte a instancia Carbon
            'is_active' => 'boolean',     // Convierte a booleano
        ];
    }
}
```

**Tipos de Casting Disponibles**

Eloquent soporta varios tipos de casting nativos:

| Tipo | Descripción | Ejemplo |
|------|-------------|---------|
| `array` | Convierte a array PHP | JSON → Array |
| `boolean` | Convierte a booleano | `"1"` → `true`, `"0"` → `false` |
| `collection` | Convierte a Collection de Laravel | |
| `date` | Convierte a instancia Date | `"2026-08-13"` → Date |
| `datetime` o `immutable_datetime` | Convierte a instancia Carbon | `"2026-08-13 10:30:00"` → Carbon |
| `decimal` | Convierte a número decimal | `"10.50"` → `"10.50"` (preserva precisión) |
| `double` | Convierte a número flotante | `"10.5"` → `10.5` |
| `encrypted` | Encripta/desencripta el valor | |
| `float` | Convierte a flotante | `"10"` → `10.0` |
| `integer` o `int` | Convierte a entero | `"42"` → `42` |
| `json` | Convierte de/hacia JSON | Array/Object ↔ JSON |
| `object` | Convierte a objeto stdClass | |
| `string` | Convierte a string | |
| `timestamp` | Convierte a timestamp Unix | |

**Ejemplo Práctico: Casting en el Modelo Post**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',  // Convertir a Carbon datetime
            'is_active' => 'boolean',     // Convertir a booleano
            'views' => 'integer',         // Convertir a entero
            'metadata' => 'json',         // Convertir a array desde JSON
        ];
    }
}
```

**Uso del Modelo con Casting**

```php
// Obtener un post
$post = Post::find(1);

// Los valores se convierten automáticamente
echo $post->published_at; // Instancia Carbon (ej: "2026-08-13 10:30:00")
echo $post->published_at->format('d/m/Y'); // Formatear la fecha: "13/08/2026"

if ($post->is_active) {
    echo "El post está activo"; // is_active ya es un booleano
}

echo $post->views + 10; // views es un entero, suma directa
```

**Casting Personalizado con Attribute**

Para transformaciones más complejas, se puede combinar casting con la clase `Attribute`:

```php
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Casting personalizado de título
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),        // Accesor: primera letra mayúscula
            set: fn ($value) => strtolower($value),     // Mutador: todo en minúscula
        );
    }

    // Casting estándar
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
}
```

**Ventajas del Casting**

1. **Automatización:** No necesitas escribir conversiones manuales en cada controlador.
2. **Seguridad de tipos:** Garantiza que los datos tengan el tipo correcto.
3. **Consistencia:** Todos los modelos aplican las mismas reglas de conversión.
4. **Legibilidad:** El código es más limpio y fácil de entender.
5. **Reutilización:** Define una vez en el modelo y úsalo en cualquier parte de la aplicación.

**Escenarios de Uso**

1. **Fechas y Horas:** Convertir strings a instancias Carbon para manipular fechas fácilmente.
2. **Booleanos:** Convertir valores numéricos o strings a booleanos (1/0, true/false, "1"/"0").
3. **JSON:** Almacenar datos complejos como JSON en la BD y acceder como arrays/objetos PHP.
4. **Números:** Asegurar que IDs y contadores sean enteros.
5. **Datos sensibles:** Encriptar campos con `'encrypted'`.

**Objetivos de la clase**

1. Entender qué es el casting y sus beneficios.
2. Diferenciar entre casting, mutadores y accesores.
3. Usar el método `casts()` para definir conversiones automáticas.
4. Aplicar casting personalizado con `Attribute` para transformaciones complejas.
5. Mejorar la seguridad de tipos y la consistencia del código en modelos Eloquent.

---
## Seeders: 12 - (Sembradores de Base de Datos)

Un **Seeder** es una clase que permite llenar la base de datos con datos de prueba de forma automática. Son útiles para:
- Poblar la BD con datos iniciales después de las migraciones
- Crear datos realistas para testing y desarrollo
- Reproducir el estado de la BD de forma consistente
- Evitar insertar datos manualmente con phpMyAdmin

#**Estructura de un Seeder**

```php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    // Desactiva eventos de modelo durante el seeding (mejora rendimiento)
    use WithoutModelEvents;

    /**
     * Ejecuta el seeder para poblar la tabla posts
     */
    public function run(): void
    {
        // Aquí va la lógica para insertar datos
    }
}
```

**Crear un Seeder**

**Comando Artisan:**
```bash
php artisan make:seeder PostSeeder
```

Esto crea el archivo `database/seeders/PostSeeder.php`

**Registrar un Seeder en DatabaseSeeder**

El seeder principal es `DatabaseSeeder.php`. Para ejecutar múltiples seeders, regístralos con `$this->call()`:

```php
public function run(): void
{
    // Crear usuario de prueba
    User::create([...]);

    // Llamar al PostSeeder
    $this->call(PostSeeder::class);
    
    // Llamar a otros seeders
    $this->call(CommentSeeder::class);
}
```

**Formas de Insertar Datos en un Seeder**

** 1. Usando `create()` del Modelo (Recomendado)**

```php
public function run(): void
{
    Post::create([
        'title' => 'Mi Primer Post',
        'content' => 'Contenido del post',
        'is_active' => true,
        'published_at' => now(),
    ]);
}
```

**Ventajas:**
- Los mutadores y accesores se aplican automáticamente
- El casting funciona correctamente
- Respeta las reglas del modelo

**2. Usando Schema Query Builder (Más rápido)**

```php
use Illuminate\Support\Facades\DB;

public function run(): void
{
    DB::table('posts')->insert([
        'title' => 'Mi Primer Post',
        'content' => 'Contenido',
        'created_at' => now(),
    ]);
}
```

**Ventajas:**
- Más rápido para inserciones masivas
- Evita triggering de eventos

**Desventajas:**
- No aplica mutadores ni accesores
- No valida datos del modelo

**3. Usando Factory (Para muchos registros)**

```php
public function run(): void
{
    Post::factory(50)->create(); // Crea 50 posts aleatorios
}
```

**Ejemplo Completo: PostSeeder**

```php
namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Post 1: Activo con todos los datos
        Post::create([
            'title' => 'INTRODUCCIÓN A LARAVEL',
            'content' => 'Laravel es un framework PHP moderno...',
            'categoria' => 'Backend',
            'is_active' => true,
            'published_at' => now()->subDays(5),
            'views' => 150,
            'featured_image' => 'https://example.com/laravel.jpg',
            'slug' => 'introducción a laravel',
            'metadata' => json_encode([
                'author' => 'Juan García',
                'tags' => ['Laravel', 'PHP'],
            ]),
        ]);

        // Post 2: Inactivo
        Post::create([
            'title' => 'CASTING EN ELOQUENT',
            'content' => 'El casting automático permite...',
            'categoria' => 'Tutorial',
            'is_active' => false,
            'published_at' => null,
            'views' => 0,
            'metadata' => json_encode(['status' => 'draft']),
        ]);
    }
}
```

**Ejecutar Seeders**

**Ejecutar todos los seeders registrados en DatabaseSeeder**

```bash
php artisan db:seed
```

**Ejecutar un seeder específico**

```bash
php artisan db:seed --class=PostSeeder
```

**Ejecutar migraciones + seeders (en un solo comando)**

```bash
php artisan migrate:fresh --seed
```

**Nota:** `migrate:fresh` borra TODAS las tablas y las recrea desde cero.

**Ejecutar migraciones + seeders en la rama de testing**

```bash
php artisan migrate:fresh --seed --env=testing
```

**Flujo Completo de Desarrollo**

```bash
# 1. Crear la migración
php artisan make:migration create_posts_table

# 2. Definir campos en la migración y ejecutar
php artisan migrate

# 3. Crear el modelo
php artisan make:model Post

# 4. Agregar casting al modelo
# (Editar app/Models/Post.php)

# 5. Crear el seeder
php artisan make:seeder PostSeeder

# 6. Poblar el seeder con datos
# (Editar database/seeders/PostSeeder.php)

# 7. Registrar el seeder en DatabaseSeeder
# (Editar database/seeders/DatabaseSeeder.php con $this->call(PostSeeder::class))

# 8. Ejecutar todas las migraciones y seeders
php artisan migrate:fresh --seed

# Base de datos lista con datos de prueba
```

**Debugging de Seeders**

Si algo sale mal durante el seeding:

```bash
# Ver el error
php artisan db:seed --class=PostSeeder

# Revertir migraciones y reintentar
php artisan migrate:rollback
php artisan migrate
php artisan db:seed
```

**Seeders en el Proyecto Actual**

**Ubicación:** `database/seeders/`

- `DatabaseSeeder.php` — Seeder principal que coordina otros seeders
- `PostSeeder.php` — Seeder para la tabla posts (Taller 11)

**Para ejecutar y probar el casting:**
```bash
php artisan migrate:fresh --seed
```

Esto recreará la BD con la tabla `posts` poblada con datos de prueba que demuestran todos los tipos de casting.
