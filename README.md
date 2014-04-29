# Laravel example tutorial
This is a tutorial on how to run a laravel application that uses auth0 for authentication, we have it in two flavor, as a local application using apache, or in the cloud using heroku

## Clone the example

    git clone https://github.com/auth0/laravel-auth0-sample.git

## Local apache

### Update dependencies

Download composer and execute

    php composer.phar install

### Configure the database

If you want to use `mysql` for the example, create a `.env.php` file in the app root with your private information

    <?php
    return array(
            'DB_HOST' => 'localhost',
            'DB_NAME' => 'laravel-app',
            'DB_USER' => 'mysqluser',
            'DB_PASS' => 'secret'
    );

if you want to use another driver, modify `app/config/database.php` directly.

After the database is configured, apply the migrations

    php artisan migrate

### Configure Auth0

1. Edit the file `app/config/packages/auth0/login/config.php` with your auth0 domain, app id and secret.

2. Go to your auth0 dashboard and add `http://<ip-to-apache>/auth0/callback` to your authorized callbacks



## Heroku
### Configure your heroku account
In order to do this you need to have an heroku account and the [Heroku toolbelt](https://toolbelt.heroku.com/) installed.

Login to heroku

     heroku login

Next, we need to create an application from the local git repository. In your path to the repo execute

    heroku create --buildpack https://github.com/heroku/heroku-buildpack-php#beta

Now you have a remote called heroku and you can upload to it by executing

    git push heroku master

### Configure the database

Heroku uses postgresql by default, we can enable it by executing

    heroku addons:add heroku-postgresql:dev

Then apply the migrations by running the following command

    heroku run php /app/artisan migrate

## Configure Auth0


Note:
* The Procfile tells heroku how to invoke an apache instance that is compatible with laravel
* The `bootstrap/start.php` has a function that detects whether the enviroment is local or a heroku

