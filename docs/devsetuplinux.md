# Development Setup For Linux

## Linux
 1. [PHP](http://php.net/downloads.php) >=7.0 dengan Extension sebagai berikut:
 > - OpenSSL PHP 
 > - PDO PHP 
 > - Mbstring PHP 
 > - Tokenizer PHP 
 > - XML PHP 
 > - Ctype PHP 
 > - JSON PHP  
 2.  [MariaDB](https://downloads.mariadb.org/) / [MySQL](https://www.mysql.com/downloads/) versi >=5.7
 3.  [PHP Composer](https://getcomposer.org/download/) versi >=1.6.5
 4.  [NPM](https://nodejs.org/en/) >= 5.6

## Ubuntu / Debian
> - PHP
>   - ```sudo apt-get install php7.0 php7.0-mbstring php7.0-xml php7.0-json```  
> - MariaDB / MySQL
>   - ```sudo apt-get install mysql-server-5.7```
>   - ```sudo apt-get install mysql-client-5.7```
>- PHP Composer
>   - ```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"```
>   - ```php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"```
>   - ```php composer-setup.php```
>   - ```php -r "unlink('composer-setup.php');"```
> - NPM
>   - ```curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -```
>   - ```sudo apt-get install -y nodejs```

## Arch Linux
> - PHP
>   - ```sudo pacman -Syyu php```
> - MariaDB
>   - ```sudo pacman -S mariadb mariadb-clients libmariadbclient```
> - PHP Composer
>   - ```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"```
>   - ```php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"```
>   - ```php composer-setup.php```
>   - ```php -r "unlink('composer-setup.php');"```
> - NPM
>   - ```sudo pacman -S nodejs npm```
