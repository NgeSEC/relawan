#Posko.id

Aplikasi web untuk pemetaan lokasi posko, kebutuhan pengungsi dan koordinasi relawan

**Kebutuhan:**
> - PHP >=7.0 (Modul PHP yang dibutuhkan bisa di lihat di bagian bawah)
> - MariaDB / MySQL versi >=3.7
> - Composer versi >=1.6.5 
> - NPM >= 5.6


**Proses Instalasi:**
1. Clone repositori melalui terminal
   ```
   git clone https://github.com/NgeSEC/relawan.git
   ```
2. Update Github submodule melalui terminal 
    ```
    git submodule update --init --recursive
    ```
3. Update Composer
    ```
    composer update
    ```
4. Konfigurasi database pada `.env` copy dari `.env.example`
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=NAMADATABASE
    DB_USERNAME=USER
    DB_PASSWORD=PASSWORD
    ```
5. Artisan Migrate
    ```
    php artisan migrate
    ```
6. DB SEED
    ```
    php artisan db:seed
    ```
7. NPM INSTALL (Hanya Untuk Pertama Kali)
    ```
    npm install
    ```
8. NPM RUN DEV
    ```
    npm run dev
    ```
9. Start Magic
    ```
    php artisan serve
    ```
 

**Troubleshoot**
 1. PHP Module
     ```
     OpenSSL PHP Extension
     PDO PHP Extension
     Mbstring PHP Extension
     Tokenizer PHP Extension
     XML PHP Extension
     Ctype PHP Extension
     JSON PHP Extension
     ```