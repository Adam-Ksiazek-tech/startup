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
### Routing

`routes/api.php`

#### zarejestrowanie nowego routingu

- Laravel 11+, 12

```
bootstrap/app.php
```
- następnie wyłącz/włącz

```
sail down
sail up
sail artisan route:clear
sail artisan route:list --path=api
```

- efekt:

```
 GET|HEAD  api/articles ............... Api\ArticleApiController@index
  POST      api/articles ............... Api\ArticleApiController@store
  GET|HEAD  api/articles/{article} ...... Api\ArticleApiController@show
  PUT       api/articles/{article} .... Api\ArticleApiController@update
  DELETE    api/articles/{article} ... Api\ArticleApiController@destroy
  POST      api/login ........................ Api\AuthController@login
  POST      api/logout ...................... Api\AuthController@logout
```

### ArticleApiController

- kontroler do API

```
sail artisan make:controller Api/ArticleApiController --api
```

to stworzy plik: 

app/Http/Controllers/Api/ArticleApiController.php  

## URL do API

http://localhost/api/articles

http://localhost/api/articles/1



