Init after the first installation:
```shell
cp ./vendor/vovanmix/phinx-laravel-style/src/phinx-settings.php ./phinx.php
```
Generate migration:
```shell
php vendor/bin/phinx create --class=default MyNewMigration
```
Migrate:
```
php vendor/bin/phinx migrate
```
Rollback:
```
php vendor/bin/phinx rollback
```
