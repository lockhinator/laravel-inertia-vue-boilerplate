<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About this Repo

Its a boilerplate. Enjoy!

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
  - `git clone https://github.com/lockhinator/fivem-plugin-manager`
- Install [Docker Desktop](https://www.docker.com/products/docker-desktop/) for your OS
- Start the containers
  - `docker-compose up -d`
- Copy the .env.example to be .env
  - `cp .env.example .env`
- Generate an encryption key for Laravel
  - `docker-compose run --rm fpm php artisan key:generate`
- Run the migrations
  - `docker-compose run --rm fpm php artisan migrate`
- View it in the browser
  - Open your browser and visit [http://localhost](http://localhost)

At this point you are good to start developing.

## Running the Github Actions Checks Locally

There are several checks that happen on each commit to the repository. These checks are:

- php-cs-fixer (formatting check)
- prettier/prettier-php (formatting check)
- PHPUnit Tests
- PHPUnit Test Coverage Check (85% coverage required)

If any of these checks fail then the build will fail. Branches are not able to be merged into main until the CI checks have passed.

In order to run these checks locally you can run the following:

- `docker-compose run --rm fpm composer fix-cs-check` to check for any php-cs-fixer issues
- `docker-compose run --rm fpm composer fix-cs` to attempt to fix any php-cs-fixer issues
- `docker-compose run --rm node yarn prettier:check` to check for any formatting issues prettier may have
- `docker-compose run --rm node yarn prettier:write` to fix any formatting issues prettier finds
- `docker-compose run --rm fpm php artisan test` will run the php tests
- `docker-compose run --rm fpm php artisan test --coverage --min=85` will run the tests with code coverage at the percent required by CI (85% coverage)

## Commits

In order to make commits better commitlint is a part of this repository. In order to run commitlints interactive prompts you must first install the packages by running the `yarn` command. After the packages are installed you can add your changes to git via `git add <files>` and then run `yarn commit` which will bring up the interactive prompt.

#### Container logs

You can find the container logs with `docker-compose logs <service>`. For example to view the main application logs you would execute `docker-compose logs app`. You can also add the `-f` flag to tail the logs `docker-compose logs -f <service>`.
