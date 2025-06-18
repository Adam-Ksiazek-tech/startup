# Realizacja zadania

## User Authentication

### Laravel Breeze - instalacja

```
sail composer require laravel/breeze --dev
```

###  instalację scaffoldu (blade)

```
sail artisan breeze:install
```

- wybieram
 
Blade with Alpine	Klasyczne widoki Blade + lekki Alpine.js	

### filament - instalacja

```
sail composer require filament/filament
```

- publikacja zasobów

```
sail artisan vendor:publish --tag=filament-config
sail artisan vendor:publish --tag=filament-assets
```

## CRUD dla artykułów 

- tworzenie panelu

```
sail artisan make:filament-panel Admin
```

- CRUD

```
sail artisan make:filament-resource Article
```

- adres panelu administracyjnego Filament
```
http://localhost/admin
```

## Tworzenie użytkownika

- konsola Tinker
```
sail artisan tinker
```

- tworzenie fake'owego użytkonika w konsoli Tinker

```
use App\Models\User;
User::factory()->create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
]);
exit
```

## Publikowanie CSS/JS dla Filament

- publikowanie CSS i JS do /public

```
sail artisan filament:install
```

## Tworzenie modelu Article

```
sail artisan make:model Article -m
```

- odpowiedź z terminala 

```
Model [app/Models/Article.php] created successfully.
Migration [database/migrations/2025_06_18_085400_create_articles_table.php] created successfully.  
```

### Modyfikacja kolumn

```
Schema::create('articles', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('body');
    $table->string('publication_date');
    $table->timestamps();
});
```

### Uruchomienie migracji

```
sail artisan migrate
```
