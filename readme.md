Aplikasi web untuk pemetaan lokasi posko, kebutuhan pengungsi dan koordinasi relawan

Requirement:
- PHP Composer
- NPM
- PHP - (min 7.0)
- MariaDB

Proses Instalasi :
1. git clone [url]
2. git submodule update --init --recursive
3. composer update
4. php artisan migrate
5. php artisan db:seed --class=FirstInstall
6. php artisan db:seed
7. npm run dev
8. php artisan serve
