#!/usr/bin/env bash

cp -f ./tests/resources/stubs/artisan ./laravel-tests/
cp -f ./tests/resources/stubs/ComposerConfigCommand.php ./laravel-tests/app/
mkdir ./laravel-tests/zx-center
cp -rf ./config ./laravel-tests/zx-center
cp -rf ./database ./laravel-tests/zx-center
cp -rf ./resources ./laravel-tests/zx-center
cp -rf ./src ./laravel-tests/zx-center
cp -rf ./tests ./laravel-tests/zx-center
cp -rf ./composer.json ./laravel-tests/zx-center
rm -rf ./laravel-tests/tests
cp -rf ./tests ./laravel-tests/tests
cp -f ./phpunit.dusk.xml ./laravel-tests
cp -f ./.env.testing ./laravel-tests/.env
cd ./laravel-tests
php artisan admin:composer-config
composer require zx/laravel-admin:*@dev
composer require laravel/dusk --dev # --ignore-platform-reqs
