------------
#install app
composer create-project --prefer-dist laravel/laravel discografica

#vhost
<VirtualHost *:80>
  ServerName test.discografica.com
  DocumentRoot "C:/xampp/htdocs/discografica/public"
  <Directory "C:/xampp/htdocs/discografica/public">
  	AllowOverride all
	Options Indexes FollowSymLinks
    	Require local
  </Directory>
</VirtualHost>

#host
127.0.0.1 test.discografica.com

#database
CREATE SCHEMA `discografica` DEFAULT CHARACTER SET utf8;

#migrations
php artisan migrate:install
php artisan make:migration create_albumes_table
php artisan make:migration create_artistas_table
php artisan make:migration populate_tables
php artisan migrate

#controllers
php artisan make:controller Albumes
php artisan make:controller Artistas

#models
php artisan make:model Albumes
php artisan make:model Artistas