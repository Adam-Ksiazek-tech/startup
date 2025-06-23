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

### Wygenerowanie tokena | API

`POST api/login`

- generuje token
- przykładowy response

```
{
    "token": "2|Pfh7nXQRZxlW267lx4eW8nDFBg18GkC23lIYZKyv244c7cdb",
    "user": {
        "id": 2,
        "name": "Allison O'Hara Jr.",
        "email": "boyle.renee@example.com",
        "email_verified_at": "2025-06-22T13:09:34.000000Z",
        "created_at": "2025-06-22T13:09:34.000000Z",
        "updated_at": "2025-06-22T13:09:34.000000Z"
    }
}
```

### Tworzenie nowego artykułu | API

`POST      api/articles`

- przykładowy request

```
{
  "title": "Nowy artykuł z API #4",
  "body": "To jest przykładowa treść nowego artykułu utworzonego z Postmana. #4",
  "publication_date": "2025-06-22"
}
```

- przykładowy response

```
{
    "title": "Nowy artykuł z API #4",
    "body": "To jest przykładowa treść nowego artykułu utworzonego z Postmana. #4",
    "publication_date": "2025-06-22",
    "user_id": 2,
    "updated_at": "2025-06-23T09:59:51.000000Z",
    "created_at": "2025-06-23T09:59:51.000000Z",
    "id": 39
}
```

### Update artykułu | API

`PUT /api/articles/{id}`


### Usunięcie artykułu | API

`DELETE /api/articles/{id}`
