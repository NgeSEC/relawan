# Bagaimana cara berkontribusi

Terimakasih telah menyempatkan waktu untuk membaca ini. Kami membutuhkan relawan untuk membantu proyek ini, dan kami sangat mengapresiasi atas bantuannya.

Dalam keikutsertaan dalam proyek ini tentu saja kami ingin memiliki standard yang sama dalam beberapa hal. Hal ini bertujuan agar kita lebih mudah dalam mengelola kode dari rekan-rekan.


## Commit message

Dalam penulisan commit message kita akan menggunakan standar penulisan, yaitu sebagai berikut:


### Commit message layout

Commit message dibagi menjadi 3 bagian, yaitu:

* _Summary Line_: Baris pertama dari commit message
* _Body_: Dapat berupa paragraf maupun item
* _Footer_: Tambahan informasi, seperti `Dibantu oleh: Adam Subarkah`, atau siapa yang ingin diberitahu (WTK) `WTK: @lantip`.

Pisahkan masing-masing bagian commit message dengan baris kosong, agar memudahkan dalam membacanya. 

Dalam menuliskan _Summary Line_, harus menyertakan bagian **categories** (wajib) dan **tags** (tidak wajib). 

**Categories** yang disepakati adalah: `[Added]`, `[Changed]`, `[Fixed]`, `[Improved]` dan `[Removed]`. Anda juga dapat mendefinisikan sendiri kategori yang digunakan, dengan mengikuti aturan berikut:

* Menggunakan kata kerja dalam bentuk lampau bahasa Inggris (Verb 2)
* Dijelaskan dalam item atau paragraf pada _body_

**Tags** mempermudah dalam pencarian. Contoh penulisan tags adalah sebagai berikut, `:API:`, `:Documentation:`, atau `:Feature A:`. Jika tags lebih dari satu, pisahkan dengan koma `,`.

### Contoh commit message
```
[Added] help on detail page.			| Summary line 
						| 
Bantuan ditambahkan agar pengguna mengerti 	| Body
fitur yang ada. Browser yang didukung untuk 	| - Paragraph
fitur bantuan ini adalah Chrome, Safari, dan 	|
Mozilla Firefox.				|
						|
- [Added] video helper				| - List
- [Fixed] some typo in helper :doc:		|
- [Changed] library video from A to B	        |
						|
WTK: @lantip @nobita @gitagut			| Footer
```

### Penting

* Pesan dalam setiap commit harus sejelas mungkin.
* Setiap commit harus berjalan dan tidak terjadi error.


## Pull request

* Format penulisan pesan pull request sama seperti pada commit message.
* Pesan pull request harus sejelas mungkin.
* Lakukan **pull rebase** dari remote branch `upstream master` sebelum melakukan pull request.
* Jika terjadi conflict segeralah diperbaiki dahulu, lalu push kembali perubahan kode yang ada. 
* Memperbaiki conflict adalah tanggung jawab penulis kode / programmer yang melakukan perubahan kode.
* Setiap memperbaiki conflict yang terjadi tanyakan dulu kepada rekan yang menulis kode sebelumnya, apa maksud dan tujuan kode tersebut dan diskusikan perubahannya. 
* Ketika memperbaiki conflict usahakan tidak menambah commit message.
* Diharapkan tidak mudah baper pada setiap komentar yang ada pada pull request. Komentar yang ada tidak bertujuan untuk menyerang atau mengolok-olok, tapi agar menjadi bahan diskusi dan peningkatan kualitas.


## Coding conventions

Standard kode yang kita gunakan mengikuti [laravel coding style](https://laravel.com/docs/master/contributions#coding-style). Silahkan baca juga [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standar dan [PSR-4]() autoloading standard.

--------

Terima kasih, matur nuwun, arigatou, xiexie.