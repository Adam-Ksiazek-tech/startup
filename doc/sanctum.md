# sanctum

RESTfull API

## Instalacja

### composer
```
sail composer require laravel/sanctum
```
### Publikuj plik konfiguracyjny

```
sail artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```
To utworzy: `config/sanctum.php`

### Dodaj migracje tokenów (jeśli jeszcze nie masz)

```
sail artisan migrate
```

Sanctum doda tabelę personal_access_tokens.

## Obsługa API

### Tworzenie API tokena (logowanie)

```
sail artisan make:controller Api/AuthController
```
