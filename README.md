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

---
## Factories: 13 - (Datos de Prueba con Model Factories)

Una **Factory** permite generar registros de prueba con datos realistas y aleatorios usando Faker. Es útil para probar listados, relaciones y funcionalidades de la aplicación sin insertar los datos manualmente.

**Estructura de una Factory**

Las factories se guardan en:

```text
database/factories/
```
En este proyecto se utiliza `UserFactory.php` para generar registros del modelo `User`.

```php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
        ];
    }
}
```

**Crear una Factory**

**Comando Artisan:**

```bash
php artisan make:factory UserFactory --model=User
```

El modelo debe utilizar el trait `HasFactory` para poder llamar a `User::factory()`:

```php
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
}
```

**Generar registros con una Factory**

La Factory actual está registrada en `DatabaseSeeder.php` y crea 10 usuarios:

```php
use App\Models\User;

public function run(): void
{
    User::factory(10)->create();
}
```

También se pueden crear cantidades diferentes o personalizar los atributos:

```php
User::factory()->count(20)->create();

User::factory()->create([
    'name' => 'Test User',
    'email' => 'test@example.com',
]);
```

**Estados de una Factory**

Los estados permiten generar una variante específica de un registro. Por ejemplo, `UserFactory` incluye el estado `unverified()` para crear usuarios sin verificar:

```php
User::factory()->unverified()->count(5)->create();
```

**Ejecutar la Factory**

Como la Factory está registrada en `DatabaseSeeder`, se ejecuta con:

```bash
php artisan db:seed
```

Para borrar las tablas, ejecutar nuevamente las migraciones y poblar la base de datos con las factories y seeders:

```bash
php artisan migrate:fresh --seed
```

También es posible ejecutarla directamente con Tinker:

```bash
php artisan tinker
```

```php
App\Models\User::factory()->count(10)->create();
```

**Nota:** `migrate:fresh` elimina todas las tablas antes de volver a crearlas. Utilízalo únicamente en entornos de desarrollo o testing.

## Commit: 14 - Crear CRUD en Laravel

En este commit se implementa un **CRUD** (Create, Read, Update, Delete) para administrar los registros de la tabla `posts` usando Laravel, Eloquent, controladores y vistas Blade.

**¿Qué es un CRUD?**

CRUD representa las cuatro operaciones principales para trabajar con información:

* **Create:** crear un nuevo registro.
* **Read:** consultar y mostrar registros.
* **Update:** editar un registro existente.
* **Delete:** eliminar un registro.

En este proyecto, el CRUD se aplica al modelo `Post` y a la tabla `posts`.

**1. Estructura utilizada**

* **Modelo:** `app/Models/Post.php`
* **Controlador:** `app/Http/Controllers/PostController.php`
* **Rutas:** `routes/web.php`
* **Vistas:** `resources/views/posts/`
* **Migración:** `database/migrations/2026_08_10_092412_create_posts_table.php`

La tabla `posts` contiene los siguientes campos:

```text
id
 title
 content
 categoria
 created_at
 updated_at
```

**2. Crear el controlador**

El controlador se crea mediante Artisan:

```bash
php artisan make:controller PostController
```

El controlador concentra la lógica de las operaciones del CRUD y comunica las solicitudes con el modelo y las vistas.

**3. Rutas del CRUD**

Las rutas se registran en `routes/web.php`:

```php
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
```

**Métodos HTTP utilizados**

| Operación | Método HTTP | URL | Método del controlador |
|-----------|-------------|-----|------------------------|
| Listar posts | `GET` | `/posts` | `index` |
| Mostrar formulario de creación | `GET` | `/posts/create` | `create` |
| Guardar un post | `POST` | `/posts` | `store` |
| Mostrar un post | `GET` | `/posts/{post}` | `show` |
| Mostrar formulario de edición | `GET` | `/posts/{post}/edit` | `edit` |
| Actualizar un post | `PUT` | `/posts/{post}` | `update` |
| Eliminar un post | `DELETE` | `/posts/{post}` | `destroy` |

Para comprobar las rutas registradas se puede ejecutar:

```bash
php artisan route:list --path=posts
```

**4. Create: crear un post**

El método `create` muestra el formulario de creación:

```php
public function create(){
    return view('posts.create');
}
```

El formulario se encuentra en `resources/views/posts/create.blade.php` y envía los campos `title`, `categoria` y `content` mediante el método `POST`:

```html
<form action="{{ url('/posts') }}" method="post">
    @csrf
    <input type="text" name="title">
    <input type="text" name="categoria">
    <textarea name="content"></textarea>
    <button type="submit">Crear Post</button>
</form>
```

El método `store` recibe la información y crea el registro con Eloquent:

```php
public function store(Request $request){
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->categoria = $request->input('categoria');
    $post->save();
    return redirect('/posts');
}
```

Se utiliza `input()` para obtener los valores enviados por el formulario de forma explícita.

**5. Read: consultar posts**

El método `index` obtiene todos los posts ordenados del más reciente al más antiguo:

```php
public function index(){
    $posts = Post::orderBy('id', 'desc')->get();
    return view('posts.index', ['posts' => $posts]);
}
```

La vista `resources/views/posts/index.blade.php` recorre la colección con `@foreach` y muestra un enlace hacia el detalle de cada post:

```blade
@foreach ($posts as $post)
    <a href="posts/{{ $post->id }}">
        {{ $post->title }}
    </a>
@endforeach
```

Para consultar un único post se utiliza el método `show`:

```php
public function show(string $post){
    $post = Post::find($post);
    return view('posts.show', compact('post'));
}
```

**6. Update: editar un post**

El método `edit` busca el registro y carga el formulario de edición:

```php
public function edit(string $post){
    $post = Post::find($post);
    return view('posts.edit', compact('post'));
}
```

El formulario de `resources/views/posts/edit.blade.php` utiliza `POST` como método HTML y `@method('PUT')` para que Laravel interprete la solicitud como `PUT`:

```blade
<form action="{{ url('/posts/' . $post->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- campos del post -->
    <button type="submit">Editar Post</button>
</form>
```

El método `update` guarda los cambios:

```php
public function update(Request $request, string $post){
    $post = Post::find($post);

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->categoria = $request->input('categoria');
    $post->save();
    return redirect("/posts/{$post->id}");
}
```

La ruta debe utilizar `Route::put`, porque el formulario envía una solicitud `PUT`:

```php
Route::put('/posts/{post}', [PostController::class, 'update']);
```

**7. Delete: eliminar un post**

El detalle del post incluye un formulario para eliminarlo:

```blade
<form action="{{ url('/posts/' . $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar Post</button>
</form>
```

El método `destroy` busca el registro, lo elimina y vuelve al listado:

```php
public function destroy(string $post){
    $post = Post::find($post);
    $post->delete();
    return redirect('/posts');
}
```

La ruta correspondiente es:

```php
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
```

**8. Protección CSRF y métodos HTML**

Los formularios que modifican información deben incluir:

```blade
@csrf
```

Laravel utiliza este token para verificar que la solicitud proviene de la aplicación.

Como HTML solo admite directamente los métodos `GET` y `POST`, Laravel permite simular `PUT` y `DELETE` mediante:

```blade
@method('PUT')
@method('DELETE')
```

Si el formulario usa `@method('PUT')`, la ruta debe declararse con `Route::put()`. De lo contrario, Laravel mostrará el error `MethodNotAllowedHttpException`.

**9. Pruebas del CRUD**

Con el servidor local funcionando, las URLs principales son:

```text
http://localhost/tallerlaravel/public/posts
http://localhost/tallerlaravel/public/posts/create
http://localhost/tallerlaravel/public/posts/{id}
http://localhost/tallerlaravel/public/posts/{id}/edit
```

Flujo de prueba:

1. Entrar a `/posts` para consultar los registros.
2. Seleccionar **Nuevo Post** y guardar un registro.
3. Abrir el título de un post para consultar su detalle.
4. Seleccionar **Editar Post** y guardar los cambios.
5. Seleccionar **Eliminar Post** y verificar que desaparezca del listado.

**Objetivos de la clase**

1. Comprender las operaciones básicas de un CRUD.
2. Conectar rutas, controlador, modelo y vistas Blade.
3. Utilizar Eloquent para crear, consultar, actualizar y eliminar registros.
4. Aplicar los métodos HTTP `GET`, `POST`, `PUT` y `DELETE`.
5. Proteger los formularios con `@csrf` y usar métodos HTTP simulados con `@method`.

## Commit: 15 - Paginación en Laravel

En este commit se implementa la **paginación de registros** en Laravel utilizando Eloquent y Blade. La paginación permite dividir grandes cantidades de resultados en varias páginas, facilitando la navegación y reduciendo la cantidad de información cargada en cada solicitud.

**¿Qué es la paginación?**

La paginación divide una colección de registros en grupos de un tamaño determinado. En lugar de mostrar todos los posts en una sola página, Laravel muestra una cantidad limitada y genera enlaces para consultar las páginas restantes.

**Ventajas de utilizar paginación**

* Mejora el tiempo de carga de la página.
* Reduce la cantidad de registros consultados y mostrados.
* Facilita la navegación del usuario.
* Evita interfaces con listas demasiado extensas.
* Permite trabajar con grandes volúmenes de información.

**1. Paginación con Eloquent**

Para paginar una consulta de Eloquent se utiliza el método `paginate()`:

```php
$posts = Post::paginate(10);
```

El número `10` indica que se mostrarán diez registros por página.
También se puede combinar con filtros y ordenamiento:

```php
$posts = Post::orderBy('id', 'desc')->paginate(10);
```

En este proyecto, los posts se ordenan por `id` de forma descendente para mostrar primero los registros más recientes.

**2. Modificar el método `index`**

El método `index` del controlador se encarga de consultar los posts y enviarlos a la vista:

```php
public function index(){
    $posts = Post::orderBy('id', 'desc')->paginate(10);
    return view('posts.index', ['posts' => $posts]);
}
```

La diferencia principal con `get()` es que `paginate()` devuelve una colección paginada con información adicional, como:

* Página actual.
* Total de registros.
* Número de páginas.
* Cantidad de registros por página.
* Enlaces de navegación.

**Comparación entre `get()` y `paginate()`**

```php
// Obtiene todos los registros
$posts = Post::orderBy('id', 'desc')->get();

// Obtiene diez registros por página
$posts = Post::orderBy('id', 'desc')->paginate(10);
```

`get()` es apropiado para colecciones pequeñas. `paginate()` es recomendable cuando la tabla puede crecer y contener muchos registros.

**3. Mostrar los posts en Blade**

La vista `resources/views/posts/index.blade.php` recorre los registros paginados utilizando `@foreach`:

```blade
@foreach ($posts as $post)
    <li>
        <a href="posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </li>
@endforeach
```

La colección paginada puede recorrerse igual que una colección normal de Eloquent.

**4. Mostrar los enlaces de navegación**

Después de recorrer los registros, se utiliza el método `links()` para mostrar los enlaces de paginación:

```blade
{{ $posts->links() }}
```

En este proyecto, la vista utiliza:

```blade
{{ $posts->links(); }}
```

Laravel genera automáticamente los enlaces para ir a la página anterior, siguiente y a las páginas disponibles.

**5. Configuración de estilos**

Laravel utiliza vistas de paginación compatibles con Tailwind CSS. Para indicar que la aplicación debe utilizar Tailwind, se puede configurar el proveedor de paginación en `AppServiceProvider`:

```php
namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useTailwind();
    }
}
```

Si el proyecto utiliza Bootstrap, se puede indicar el estilo correspondiente:

```php
Paginator::useBootstrapFive();
```

La configuración se realiza en el método `boot()` de `app/Providers/AppServiceProvider.php`.

**6. Consultar una página específica**

Laravel utiliza el parámetro `page` en la URL para identificar la página solicitada:

```text
/posts?page=1
/posts?page=2
/posts?page=3
```

No es necesario leer manualmente este parámetro. Laravel lo procesa automáticamente cuando se utiliza `paginate()`.

**7. Mantener parámetros en los enlaces**

Cuando la consulta utiliza filtros o búsquedas, se pueden conservar los parámetros en los enlaces de paginación con `withQueryString()`:

```php
$posts = Post::where('categoria', 'Laravel')
    ->orderBy('id', 'desc')
    ->paginate(10)
    ->withQueryString();
```

Así, los enlaces mantienen los parámetros actuales de la URL al cambiar de página.

También se puede utilizar `appends()` para agregar parámetros específicos:

```php
$posts = Post::orderBy('id', 'desc')
    ->paginate(10)
    ->appends(['categoria' => 'Laravel']);
```

**8. Tipos de paginación**

Laravel incluye varias formas de paginar resultados:

| Método | Descripción |
|--------|-------------|
| `paginate(10)` | Genera enlaces con número de páginas y total de registros. |
| `simplePaginate(10)` | Solo muestra enlaces anterior y siguiente. |
| `cursorPaginate(10)` | Utiliza paginación por cursor para grandes volúmenes de datos. |

### `simplePaginate`

```php
$posts = Post::orderBy('id', 'desc')->simplePaginate(10);
```

Este método puede ser útil cuando no se necesita conocer el número total de registros.

### `cursorPaginate`

```php
$posts = Post::orderBy('id', 'desc')->cursorPaginate(10);
```

La paginación por cursor puede ofrecer un mejor rendimiento en tablas con muchos registros, especialmente cuando se navega entre páginas consecutivas.

**9. Comandos y pruebas**

Para revisar las rutas de posts:

```bash
php artisan route:list --path=posts
```

Para limpiar las vistas compiladas después de modificar una vista Blade:

```bash
php artisan view:clear
```

Para probar la paginación:

1. Crear o cargar varios registros en la tabla `posts`.
2. Abrir la URL `/posts`.
3. Verificar que se muestran diez registros por página.
4. Seleccionar el enlace de la página siguiente.
5. Confirmar que la URL incluye el parámetro `page`.

URL local del proyecto:

```text
http://localhost/tallerlaravel/public/posts
```

**10. Errores frecuentes**

### No aparecen los enlaces

Verificar que la vista incluya:

```blade
{{ $posts->links() }}
```

### Se utiliza `get()` en lugar de `paginate()`

El método `get()` devuelve una colección normal y no incluye el método `links()`. Para mostrar paginación se debe utilizar `paginate()` o `simplePaginate()`.

### La vista de paginación no tiene estilos

Comprobar que el proyecto tenga Tailwind CSS configurado y que `Paginator::useTailwind()` se encuentre en `AppServiceProvider` cuando sea necesario.

### Se muestran demasiados registros

Reducir el número recibido por `paginate()`:

```php
$posts = Post::paginate(10);
```

**Objetivos de la clase**

1. Comprender qué es la paginación y por qué es importante.
2. Utilizar `paginate()` en consultas de Eloquent.
3. Mostrar enlaces de navegación con `links()` en Blade.
4. Configurar los estilos de paginación con Tailwind CSS.
5. Conservar filtros y parámetros de consulta entre páginas.
6. Diferenciar entre `paginate()`, `simplePaginate()` y `cursorPaginate()`.

## Commit: 16 - Rutas con nombre en Laravel

En este commit se agregan **rutas con nombre** para identificar cada endpoint del CRUD de posts. Esta característica permite generar URLs y redirecciones utilizando un nombre descriptivo, evitando depender directamente de las direcciones escritas en el código.

**¿Qué es una ruta con nombre?**

Una ruta con nombre utiliza el método `name()` para asignar un identificador único a una ruta:

El nombre `posts.index` puede utilizarse desde controladores y vistas para generar la URL correspondiente.

**1. Rutas con nombre del CRUD**

Las rutas del CRUD de posts se definen en `routes/web.php` de la siguiente manera:

```php
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy');
```

Cada nombre debe ser único dentro de la aplicación. La convención utilizada en este proyecto es `recurso.acción`, por ejemplo `posts.index` y `posts.update`.

**2. Generar URLs en las vistas**

En lugar de escribir una URL directamente con `url()`, se puede utilizar `route()`:

```blade
<a href="{{ route('posts.index') }}">Ver todos los posts</a>
<a href="{{ route('posts.create') }}">Nuevo Post</a>
```

Para una ruta que recibe el parámetro `{post}`, se envía el ID como segundo argumento:

```blade
<a href="{{ route('posts.show', $post->id) }}">
    {{ $post->title }}
</a>

<a href="{{ route('posts.edit', $post->id) }}">
    Editar Post
</a>
```

También se puede enviar el parámetro indicando su nombre:

```blade
{{ route('posts.show', ['post' => $post->id]) }}
```

**3. Utilizar rutas con nombre en formularios**

Los formularios también pueden generar su destino mediante `route()`:

```blade
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <!-- campos del post -->
</form>
```

Para actualizar un registro se incluye el parámetro y se simula el método `PUT`:

```blade
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- campos del post -->
</form>
```

Para eliminar un registro se utiliza la ruta `posts.destroy`:

```blade
<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar Post</button>
</form>
```

**4. Redireccionar utilizando el nombre de la ruta**

En el controlador, `redirect()->route()` permite redireccionar sin escribir manualmente la URL:

```php
return redirect()->route('posts.index');
```

Después de actualizar un post, se puede enviar el ID como parámetro:

```php
return redirect()->route('posts.show', $post->id);
```

Esto mantiene el controlador independiente de la estructura exacta de las URLs.

**5. Verificar las rutas registradas**

Para revisar los nombres, métodos y URLs de las rutas se utiliza:

```bash
php artisan route:list --path=posts
```

La columna `Name` debe mostrar nombres como:

```text
posts.index
posts.store
posts.create
posts.show
posts.edit
posts.update
posts.destroy
```

También se puede obtener una URL desde Tinker:

```bash
php artisan tinker
```

```php
route('posts.show', 1);
```

**6. Ventajas de utilizar rutas con nombre**

* Evitan repetir URLs en controladores y vistas.
* Facilitan cambiar la dirección de una ruta en un solo lugar.
* Mejoran la legibilidad del código.
* Reducen errores al construir URLs con parámetros.
* Permiten utilizar nombres descriptivos para cada operación.

**7. Errores frecuentes**

### La ruta no tiene nombre

Si se utiliza `route('posts.index')`, la ruta debe tener `->name('posts.index')`:

```php
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');
```

### El nombre no coincide

El nombre utilizado en `route()` debe coincidir exactamente con el declarado en `name()`. Por ejemplo, `posts.show` y `post.show` son nombres diferentes.

### Falta un parámetro

Las rutas con `{post}` necesitan recibir el ID del registro:

```blade
{{ route('posts.show', $post->id) }}
```

### Método HTTP incorrecto

El formulario de actualización debe utilizar `@method('PUT')` y la ruta debe declararse con `Route::put()`. Para eliminar, se debe utilizar `@method('DELETE')` y `Route::delete()`.

**Objetivos de la clase**

1. Comprender qué son las rutas con nombre en Laravel.
2. Asignar nombres a las rutas del CRUD.
3. Generar URLs con `route()` desde las vistas.
4. Utilizar `redirect()->route()` desde los controladores.
5. Verificar los nombres de las rutas con Artisan.

## Commit: 17 - Route Resource y nombres personalizados en Laravel

En este commit se utiliza `Route::resource` para crear automáticamente las rutas de un CRUD. También se explica cómo cambiar el nombre de las URL sin cambiar los nombres de las rutas que ya se utilizan en las vistas y en los controladores.

**¿Qué es `Route::resource`?**

`Route::resource` registra en una sola línea las siete rutas convencionales de un CRUD:

```php
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

Laravel relaciona automáticamente cada ruta con los métodos `index`, `create`, `store`, `show`, `edit`, `update` y `destroy` del controlador.

**1. Rutas generadas por `Route::resource`**

| Método HTTP | URL | Nombre de la ruta | Método del controlador |
|-------------|-----|-------------------|------------------------|
| `GET` | `/posts` | `posts.index` | `index` |
| `GET` | `/posts/create` | `posts.create` | `create` |
| `POST` | `/posts` | `posts.store` | `store` |
| `GET` | `/posts/{post}` | `posts.show` | `show` |
| `GET` | `/posts/{post}/edit` | `posts.edit` | `edit` |
| `PUT/PATCH` | `/posts/{post}` | `posts.update` | `update` |
| `DELETE` | `/posts/{post}` | `posts.destroy` | `destroy` |

**2. Crear un controlador resource**

Para crear un controlador con los métodos básicos del CRUD se utiliza Artisan:

```bash
php artisan make:controller PostController --resource
```

El controlador creado contiene los siguientes métodos:

```php
public function index() {}
public function create() {}
public function store(Request $request) {}
public function show(string $id) {}
public function edit(string $id) {}
public function update(Request $request, string $id) {}
public function destroy(string $id) {}
```

En este proyecto, los métodos se encuentran en `app/Http/Controllers/PostController.php`.

**3. Cambiar las URL y mantener los nombres de las rutas**

Para cambiar el prefijo de las URL de `/posts` a `/articulos`, se utiliza `articulos` como primer argumento de `Route::resource`. El método `names()` permite conservar los nombres actuales `posts.*`:

```php
Route::resource('articulos', PostController::class)
    ->names([
        'index' => 'posts.index',
        'create' => 'posts.create',
        'store' => 'posts.store',
        'show' => 'posts.show',
        'edit' => 'posts.edit',
        'update' => 'posts.update',
        'destroy' => 'posts.destroy',
    ]);
```

Con esta configuración:

* La URL pública cambia a `/articulos`.
* El controlador continúa siendo `PostController`.
* Los nombres siguen siendo `posts.index`, `posts.create`, `posts.store`, `posts.show`, `posts.edit`, `posts.update` y `posts.destroy`.
* Las vistas pueden continuar utilizando `route('posts.index')` y `route('posts.show', $post->id)`.

Aunque el nombre de la ruta sea `posts.index`, Laravel generará la URL `/articulos`.

**4. Usar las rutas con nombre en las vistas**

Las vistas pueden generar las URL mediante `route()`:

```blade
<a href="{{ route('posts.index') }}">Ver posts</a>
<a href="{{ route('posts.create') }}">Nuevo Post</a>
<a href="{{ route('posts.show', $post->id) }}">Ver detalle</a>
<a href="{{ route('posts.edit', $post->id) }}">Editar</a>
```

Los formularios de actualización y eliminación conservan los mismos nombres de rutas:

```blade
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- campos del post -->
</form>

<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar Post</button>
</form>
```

**5. Cambiar también los nombres de las rutas**

Si se desea que tanto las URL como los nombres utilicen `articulos`, se puede registrar el recurso sin `names()`:

```php
Route::resource('articulos', PostController::class);
```

En ese caso se generan nombres como `articulos.index`, `articulos.create`, `articulos.show` y `articulos.update`.

Para personalizar solo algunos nombres se puede utilizar `names()`:

```php
Route::resource('articulos', PostController::class)
    ->names([
        'index' => 'posts.index',
        'show' => 'posts.show',
    ]);
```

Para conservar todos los nombres `posts.*`, se debe utilizar el arreglo completo mostrado en la sección anterior.

**6. Mantener el parámetro `{post}`**

Cuando el recurso se llama `articulos`, Laravel puede generar el parámetro `{articulo}`. Para conservar el parámetro `{post}`, se utiliza `parameters()`:

```php
Route::resource('articulos', PostController::class)
    ->parameters(['articulos' => 'post'])
    ->names([
        'show' => 'posts.show',
        'edit' => 'posts.edit',
        'update' => 'posts.update',
        'destroy' => 'posts.destroy',
    ]);
```

La URL de detalle será `/articulos/{post}` y el controlador podrá recibir el parámetro `$post`.

**7. Limitar las acciones del resource**

Si no se necesitan todas las acciones, se pueden seleccionar con `only()`:

```php
Route::resource('articulos', PostController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'posts.index',
        'show' => 'posts.show',
    ]);
```

También se pueden excluir acciones con `except()`:

```php
Route::resource('articulos', PostController::class)
    ->except(['destroy']);
```

**8. Verificar las rutas generadas**

Para revisar los métodos, URL y nombres de las rutas:

```bash
php artisan route:list --path=articulos
```

Después de cambiar las rutas, se puede limpiar la caché con:

```bash
php artisan route:clear
```

En producción, después de comprobar los cambios, se puede volver a generar:

```bash
php artisan route:cache
```

La columna `Name` debe mostrar los nombres `posts.index`, `posts.create`, `posts.store`, `posts.show`, `posts.edit`, `posts.update` y `posts.destroy` cuando se utiliza el arreglo completo de `names()`.

**9. Errores frecuentes**

### Se mantienen las rutas individuales y `Route::resource`

No se deben registrar ambos bloques para el mismo recurso, porque se duplicarían las rutas.

### El nombre utilizado no existe

Si se utiliza `route('posts.index')`, debe existir una ruta con el nombre `posts.index`. Se puede comprobar con `php artisan route:list`.

### Falta el parámetro del recurso

Las rutas `show`, `edit`, `update` y `destroy` necesitan recibir el ID del post:

```blade
{{ route('posts.show', $post->id) }}
```

### Error `MethodNotAllowedHttpException`

El método del formulario debe coincidir con el método de la ruta. Para actualizar se utiliza `@method('PUT')` y para eliminar `@method('DELETE')`.

**Objetivos de la clase**

1. Comprender el funcionamiento de `Route::resource`.
2. Generar las rutas de un CRUD automáticamente.
3. Cambiar las URL utilizando un recurso diferente.
4. Conservar nombres de rutas mediante `names()`.
5. Mantener parámetros personalizados con `parameters()`.
6. Verificar las rutas generadas con Artisan.

---
## Clase 18 - Route Model Binding

En esta clase se utiliza **Route Model Binding** para que Laravel convierta automaticamente el parametro `{post}` de la URL en una instancia del modelo `Post`.

**1. Binding implicito**

Las rutas del CRUD se generan en `routes/web.php` con `Route::resource`:

```php
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

Entre las rutas generadas se encuentran:

```text
GET /posts/{post}          posts.show
GET /posts/{post}/edit     posts.edit
PUT /posts/{post}          posts.update
DELETE /posts/{post}       posts.destroy
```

El parametro `{post}` coincide con el tipo `Post $post` del controlador. Laravel busca el registro y lo inyecta automaticamente:

```php
public function show(Post $post)
{
    return view('posts.show', compact('post'));
}

public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}
```

Sin Route Model Binding habria que recibir un valor, buscarlo manualmente y comprobar si existe:

```php
public function show(string $post)
{
    $post = Post::findOrFail($post);
    return view('posts.show', compact('post'));
}
```

Con `Post $post`, Laravel realiza esa busqueda automaticamente. Si no encuentra el registro, devuelve un error 404.

**2. Binding por defecto usando el id**

Por defecto, Laravel busca el modelo utilizando la columna `id`. Por ejemplo:

```text
/posts/103/edit
```

equivale a buscar:

```sql
SELECT * FROM posts WHERE id = 103;
```

Los enlaces pueden enviar el modelo completo o su id:

```blade
{{ route('posts.edit', $post) }}
{{ route('posts.edit', ['post' => $post->id]) }}
```

**3. Cambiar el binding para utilizar slug**

En el modelo `app/Models/Post.php` se agrego este metodo:

```php
public function getRouteKeyName()
{
    return 'slug';
}
```

Con esta configuracion, Laravel deja de buscar por `id` y utiliza `slug`:

```text
/posts/mi-primer-post/edit
```

La consulta equivalente sera:

```sql
SELECT * FROM posts WHERE slug = 'mi-primer-post';
```

El enlace recomendado en `resources/views/posts/index.blade.php` es:

```blade
@foreach ($posts as $post)
    <a href="{{ route('posts.show', ['post' => $post->slug]) }}">
        {{ $post->title }}
    </a>
@endforeach
```

Tambien puede utilizarse el modelo completo porque Laravel conoce el campo definido por `getRouteKeyName()`:

```blade
{{ route('posts.show', $post) }}
```

**4. Crear y actualizar el slug**

El campo `slug` debe tener un valor antes de generar enlaces o buscar el modelo. En el controlador actual se recibe desde el formulario:

```php
$post->slug = $request->input('slug');
```

En un formulario se debe incluir un campo con ese nombre:

```blade
<input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}">
```

Otra opcion es generarlo desde el titulo usando `Str::slug()`:

```php
use Illuminate\Support\Str;

$post->title = $request->input('title');
$post->slug = Str::slug($post->title);
```

Como `slug` tiene un indice `unique`, cada post debe tener un slug diferente.

**5. Por que aparece el error 404**

Si `getRouteKeyName()` devuelve `slug`, esta URL ya no busca por el id:

```text
/posts/103/edit
```

Laravel interpreta `103` como el valor de `slug`. Si no existe un post cuyo slug sea `103`, el Route Model Binding devuelve 404.

Las soluciones son:

```php
// Usar nuevamente el id como clave de ruta
public function getRouteKeyName()
{
    return 'id';
}
```

o acceder con el slug real:

```text
/posts/mi-primer-post/edit
```

Tambien se debe evitar que los posts antiguos tengan `slug` vacio o `NULL`. Es necesario completar esos valores antes de usar slug en las URLs.

**6. Redireccionar despues de actualizar**

Cuando el modelo utiliza `slug`, se recomienda enviar el modelo en la redireccion:

```php
return redirect()->route('posts.show', $post);
```

Laravel generara la URL usando el slug configurado en `getRouteKeyName()`.

**7. Comprobar el funcionamiento**

Mostrar las rutas del recurso:

```bash
php artisan route:list --path=posts
```

Limpiar las vistas y configuracion almacenadas en cache:

```bash
php artisan optimize:clear
```

Flujo de prueba:

1. Crear o actualizar un post con un slug unico.
2. Entrar a `/posts`.
3. Abrir el titulo del post y comprobar que la URL contiene el slug.
4. Abrir la edicion usando `/posts/{slug}/edit`.
5. Probar la actualizacion y verificar la redireccion al detalle.

**Objetivos de la clase**

1. Entender el funcionamiento del Route Model Binding implicito.
2. Recibir modelos directamente en los metodos del controlador.
3. Cambiar la clave de busqueda de `id` a `slug`.
4. Generar enlaces y redirecciones con parametros de ruta correctos.
5. Diagnosticar errores 404 causados por un parametro inexistente.