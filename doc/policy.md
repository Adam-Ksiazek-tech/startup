# policy ArticlePolicy

zabezpiecznie, iż tylko autor może edytować i usuwać artykuł

```
sail artisan make:policy ArticlePolicy --model=Article
```
- response

```
Policy [app/Policies/ArticlePolicy.php] created successfully.
```
## stworzenie policy

```
sail artisan make:provider AuthServiceProvider
```

[app/Providers/AuthServiceProvider.php] created successfully. 

```
sail artisan config:clear
sail artisan config:cache
```
