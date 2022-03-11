# Basic Shop functionality
This was done as a Job interview challenge.

# Features

Products
Product categories
Product variants

# Requirements

Linux/Unix, WAMP/XAMP/Laragon or MacOS environment
PHP >= 8.0
MySQL >= 5.7.8, MariaDB >= 10.2.2
Web server (Apache, Nginx or integrated PHP web server for testing)
If required PHP extensions are missing, composer will tell you about the missing dependencies.

# Installation

To install this application, composer >= 2.1 is required. On the CLI, execute this command for a complete installation including a working setup:

<pre>Composer install</pre>

Create env file. In the .env file add your database credentials then generate an app_key

<pre>cp .env.example .env</pre>

Add database name/username/password inside your .env
<code>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
</code>

Generate APP_KEY 

<pre>php artisan key:generate</pre>

You will also need to install NPM dependencies for the frontend

<pre>npm install</pre>

Run migration to add tables into the database and seed entries into the database using the following command in your CLI

<pre>php artisan migrate --seed</pre>

Lastly run application

<pre>php artisan serve</pre>

You can log into the app using the following credentials:
<code>admin@admin.com</code>
<code>password</code>


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
