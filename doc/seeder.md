# Seeder

```
sail artisan make:seeder UserSeeder
sail artisan make:seeder ArticleSeeder
```

## tworzenie ArticleFactory

```
sail artisan make:factory ArticleFactory --model=Article
```

[database/factories/ArticleFactory.php] created successfully.  

## wdrożenie zmian

```
sail artisan migrate:fresh --seed
```

## workaround: dodanie trait 

use HasFactory;

```
Takie działanie zostało wprowadzone od Laravel 8 
```

## ponowne uruchomnienie

```
sail artisan migrate:fresh --seed
```
