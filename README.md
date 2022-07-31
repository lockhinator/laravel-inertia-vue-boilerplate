<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About this Repo

The purpose of this code base is to create a central location in which GTA5 FiveM plugins are hosted and their configs are stored. This code base acts as both the interface to configure plugins, the API to fetch plugin configs from and the authorization method for retrieving those plugins. In addition to this the code base also handles payments and subscriptions for the platform.

## Technology

- Docker
- PHP8 Language
- Laravel PHP Framework
- PostgreSQL Database
- VueJS 3 Frontend Framework
- Jest Frontend Testing Framework
- Inertia
- Redis Key Value Store

In addition to these the repository uses both **prettier**  and **php-cs-fixer** to ensure that the code that is pushed to this repository is readable and follows the same standards across the board. In order to create a better experience in the long run code coverage is also enforced within this repository via PHPUnit. *If you can't hit the coverage then you won't be able to merge in your changes.*

If you every have questions about how to do something in Laravel you can more than likely find the answers in the [Laravel Documentation](https://laravel.com/docs).

## Getting started

- Clone the repo
- Install prettier globally (node v16)
  - This is optional if you plan on using prettier outside of the Docker environment.
  - `npm install --location=global prettier @prettier/plugin-php`
- Install [Docker Desktop](https://www.docker.com/products/docker-desktop/) for your OS
- Start the containers
  - `docker-compose up -d`
- Run the migrations
  - `docker-compose run --rm fpm bash`
  - `php artisan migrate`

#### Container logs

You can find the container logs with `docker-compose logs <service>`. For example to view the main application logs you would execute `docker-compose logs app`. You can also add the `-f` flag to tail the logs `docker-compose logs -f <service>`.