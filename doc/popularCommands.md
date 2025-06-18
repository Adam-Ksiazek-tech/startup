# Popularne komendy w Larevel

## Dockerowe środowisko developerskie

| Cel działania                        | Komenda                                           |
|-------------------------------------|---------------------------------------------------|
| Uruchomienie środowiska             | `sail up -d`                                      |
| Zatrzymanie środowiska              | `sail down`                                       |
| Wykonanie migracji                  | `sail artisan migrate`                            |
| Tworzenie modelu + migracji         | `sail artisan make:model Article -m`              |
| Tworzenie kontrolera                | `sail artisan make:controller ArticleController`  |
| Tworzenie kontrolera API            | `sail artisan make:controller Api/ArticleController --api` |
| Tworzenie testu                     | `sail artisan make:test ArticleTest`              |
| Uruchamianie testów PHPUnit         | `sail artisan test`                               |
| Uruchomienie tinker                 | `sail artisan tinker`                             |
| Instalacja pakietu przez Composer   | `sail composer require filament/filament`         |
| Instalacja Breeze (auth scaffolding)| `sail composer require laravel/breeze --dev`      |
| Instalacja NPM + kompilacja frontu  | `sail npm install && sail npm run dev`            |
| Sprawdzanie logów aplikacji         | `sail logs -f`                                    |
