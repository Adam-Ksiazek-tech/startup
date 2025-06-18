# Testy

## Testy jednostkowe

- użyjemy SQLite, aby nie korzystać z bazy MySQL

### w phpunit.xml 
```
<env name="DB_DATABASE" value=":memory:"/>
<env name="DB_CONNECTION" value="sqlite"/>
```
### uruchomienie istniejących testów
- z tym że to uruchomi bazę produkcyjną MySQL
```
sail artisan test
```

## czyszczenie 

```
sail artisan config:clear
sail artisan optimize:clear
```

## Tworzenie nowych testów

### ArticleCreationTest

- tworzymy plik z testami
```
sail artisan make:test ArticleResourceTest
```
Test [tests/Feature/ArticleResourceTest.php] created successfully.

- sprawdzamy trasy
```
sail artisan route:list | grep admin
```
- dostaniemy odpowiedź w stylu:
```
  GET|HEAD  admin filament.admin.pages.dashboard › Filament\Pages › Dashboard
  GET|HEAD  admin/articles filament.admin.resources.articles.index › App\Fila…
  GET|HEAD  admin/articles/create filament.admin.resources.articles.create › …
  GET|HEAD  admin/articles/{record}/edit filament.admin.resources.articles.ed…
  GET|HEAD  admin/login ... filament.admin.auth.login › Filament\Pages › Login
  POST      admin/logout filament.admin.auth.logout › Filament\Http › LogoutC…

```

## użytkownik testowy dla phpUnit

```php artisan make:filament-user```

## uruchomienie środowiska testowego phpUnit z SQListe

- utwórz plik: `.env.testing`

```
APP_ENV=testing
APP_KEY=base64:9uMf8uwdPf9IqmwaLsg/zWFiVQVydF4kIzeDPJVrwVo=
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
CACHE_DRIVER=array
SESSION_DRIVER=array
QUEUE_CONNECTION=sync
```
### generowanie klucza sesji do env.testing

```
sail artisan key:generate --env=testing
```

## uruchominie środowiska testing

```
sail artisan test --env=testing
```

