Init after the first installation:
```shell
cp ./vendor/vovanmix/phinx-laravel-style/src/phinx-settings.php ./phinx.php
```
Generate migration:
```php
php vendor/bin/phinx create --class=default MyNewMigration
```
