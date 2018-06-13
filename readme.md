# Posko.id

Aplikasi web untuk pemetaan lokasi posko, kebutuhan pengungsi dan koordinasi relawan. 
Untuk ikut serta dalam proyek ini, silahkan baca dahulu [cara berkontribusi](docs/contributing.md). 

**Catatan: status development saat ini adalah _Pre-Alfa_**

## 1. LATAR BELAKANG

dari situs https://bnpb.go.id:
> Wilayah Indonesia merupakan gugusan kepulauan terbesar di dunia. Wilayah yang juga terletak di antara benua Asia dan Australia dan Lautan Hindia dan Pasifik ini memiliki **17.508 pulau**. Meskipun tersimpan kekayaan alam dan keindahan pulau-pulau yang luar biasa, bangsa Indonesia perlu menyadari bahwa wilayah nusantara ini memiliki **129 gunung api aktif**, atau dikenal dengan ring of fire, serta terletak **berada pada pertemuan tiga lempeng tektonik aktif dunia**?Lempeng Indo-Australia, Eurasia, dan Pasifik.

> **Ring of fire dan berada di pertemuan tiga lempeng tektonik menempatkan negara kepulauan ini berpotensi terhadap ancaman bencana alam**. Di sisi lain, posisi Indonesia yang berada di wilayah tropis serta kondisi hidrologis memicu terjadinya bencana alam lainnya, seperti **angin puting beliung, hujan ekstrim, banjir, tanah longsor, dan kekeringan. Tidak hanya bencana alam sebagai ancaman, tetapi juga bencana non alam sering melanda tanah air seperti kebakaran hutan dan lahan, konflik sosial, maupun kegagalan teknologi**.

**_secara singkat, Indonesia adalah salah satu negara yang paling rawan terhadap bencana._**
## 2. TUJUAN
Tujuan jangka panjang aplikasi ini adalah:
- Pemetaan lokasi posko/barak pengungsian menggunakan koordinat GPS
- Data pengungsi dan kebutuhannya di setiap posko/barak
- Koordinasi antar relawan, pengungsi, dan pemerintah untuk distribusi logistik


## 3. TEST CASE & MVP
### 3.1 TEST CASE
Kami menggunakan Gunung Merapi sebagai _test case_ dengan pertimbangan:
- Dikenal sebagai salah satu gunung berapi teraktif di dunia yang memiliki siklus erupsi berulang
- **Sejak tanggal 21 Mei 2018**, [BPPTKG](http://merapi.bgl.esdm.go.id/pub/page.php?idx=313) menaikkan status Merapi dari **Normal menjadi Waspada (Level 2)**


### 3.2 MVP
**Catatan: status development saat ini adalah _Pre-Alfa_**

    - [ ] Registrasi pengguna
        - [ ] melalui email
        - [ ] melalui sosial media
    - [ ] Menampilkan status Gunung Merapi (Normal/Waspada/Siaga/Awas)
    - [ ] Menampilkan lokasi posko pengungsi warga dan ternak pada peta
        - [ ] data posko yang didapat dari BPPTKG dan dinas terkait berupa file KMZ
        - [ ] Pengguna dapat menambahkan data posko
        - [ ] Status posko apakah saat ini aktif dihuni atau tidak
    - [ ] Menampilkan data di setiap posko:
        - [ ] Nama koordinator posko beserta nomer yang dapat dihubungi 
        - [ ] Jumlah Pengungsi dan data statistik lainnya (umur, jenis kelamin, )
        - [ ] Kebutuhan pengungsi yang belum tersedia (makanan, obat-obatan, ataupun kebutuhan lain)

## 4. UNDANGAN TERBUKA
:pray: :pray: :pray:

Dengan senang hati, kami mengundang rekan-rekan untuk turut berkontribusi dalam pengembangan aplikasi ini. Saat ini kami membutuhkan bantuan untuk bagian:
- Front End (UI/UX)
- Developer Laravel
## 5. DEVELOPMENT SETUP
Aplikasi ini dibuat menggunakan framework Laravel, sehingga secara umum memiliki kebutuhan sebagai berikut:
> - [PHP](http://php.net/downloads.php) >=7.0 dengan Extension sebagai berikut:
>   - OpenSSL PHP 
>   - PDO PHP 
>   - Mbstring PHP 
>   - Tokenizer PHP 
>   - XML PHP 
>   - Ctype PHP 
>   - JSON PHP 
> - [MariaDB](https://downloads.mariadb.org/) / [MySQL](https://www.mysql.com/downloads/) versi >=5.7
> - [PHP Composer](https://getcomposer.org/download/) versi >=1.6.5 
> - [NPM](https://nodejs.org/en/) >= 5.6

### 5.1 Windows Development Setup
Pada sistem operasi Windows, cara paling mudah adalah menggunakan [Laragon](https://laragon.org/)

## 6. HOW TO RUN
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
10. Akses melalui browser menggunakan alamat http://127.0.0.1:8000 

## 7. LISENSI

![license](https://img.shields.io/github/license/mashape/apistatus.svg)

Aplikasi ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT)

