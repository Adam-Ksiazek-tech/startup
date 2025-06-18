# artisan

Proces migracji 

## przykład dodanie pola body i user_id

```
sail artisan make:migration add_body_and_user_id_to_articles_table --table=articles
```

## Run
```
sail artisan migrate
```

## Zmiana pola body z typu string na text

### tworzenie nowego pliku migracji
```
sail artisan make:migration change_body_column_type_in_articles_table --table=articles

```
### edycja pliku, dodanie up()

$table->text('body')->change();
### doanie down()

$table->string('body')->change();

### wykonanie migracji

sail artisan migrate
