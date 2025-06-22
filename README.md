# Zadanie rekrutacyjne

```
#ts1projects/rekrutacje
```

## 📰 Laravel + Filament: Articles

## ✅ Wymagania

- Docker + Docker Compose
- PHP nie jest wymagane lokalnie (używamy Sail)
- Laravel Sail

## 🚀 Jak uruchomić projekt lokalnie

### 1. Sklonuj repozytorium

```
git clone <adres-repo>
cd <folder-projektu>
```
### 2. Skonfiguruj .env

```
cp .env.example .env
```

### 3. Uruchom Sail

#### Jeśli pierwszy raz uruchamiasz Sail:

```
composer install
./vendor/bin/sail up
```

#### Uruchomienie
```
./vendor/bin/sail up
```

lub jeśli umieścisz sail w PATH

```
sail up
```

### 4. Migracje + seedery

Wykonaj migracje i załaduj testowe dane:

```
sail artisan migrate:fresh --seed
```

To:

Zresetuje bazę danych

Stworzy 35 losowych artykułów

Stworzy testowych użytkowników (w tym testowego admina)

👤 Domyślny użytkownik administracyjny

Seeder tworzy wbudowanego admina z dostępem do panelu Filament:

📛  Email:    admin@example.com
🔑  Hasło:    password

### 🔐 Logowanie do panelu Filament

Panel admina (Filament) dostępny jest pod adresem:

http://localhost/admin

## 🧪 Funkcjonalność testowa

- 35 losowych artykułów generowanych przez ArticleSeeder

- Przypisani autorzy (użytkownicy z UserSeeder)

- Wyszukiwanie po tytule i treści (body)

- Sortowanie i paginacja

- Uprawnienia do edycji/usuwania przypisane per użytkownik

## 🛠 Komendy pomocnicze

### Tinker

```
sail artisan tinker
```

### Ręczne uruchomienie seedera

```
sail artisan db:seed --class=ArticleSeeder
```

### Reset bazy i danych testowych

Uwaga: ta komenda usunie wszystkie dane z bazy!

```
sail artisan migrate:fresh --seed
```

## 📂 Struktura plików powiązanych z seederami

- database/seeders/DatabaseSeeder.php – główny seeder

- database/seeders/UserSeeder.php – tworzy użytkowników + admina

- database/seeders/ArticleSeeder.php – generuje testowe artykuły

- database/factories/ArticleFactory.php – losowe dane artykułów

## Linki
- [opis zadania rekrutacyjnego](doc/taskDescription.md)
- [HowTo CRUD](doc/LaravelCRUD.md)
- [Laravel Tutorial](doc/larevelTutorials.md)
- [step by step](doc/stapByStep.md)
- [sail](doc/popularCommands.md)
- 

