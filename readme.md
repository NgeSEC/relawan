Spesifikasi aplikasi:
1. php versi 7.x
2. mysql 5.x
3. composer
4. npm

Relawan merupakan aplikasi untuk kebutuhan berbagi monitoring bencana yang ada supaya mudah dalam berbagi

proses install :
1. git clone [url]
2. git submodule update --init --recursive
3. composer update
4. php artisan migrate
5. php artisan db:seed --class=FirstInstall
6. php artisan db:seed
7. npm run dev
8. php artisan serve
