<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

A simple blog application that allows you to create posts and comment on them.

## Technologies Applied

The frameworks and tech used on project.

- PHP 8
- Bootstrap 5
- Laravel 10

## Getting Started

What is needed for to run the project locally.
    
### Prerequisites

- composer
    - Needs to be globally installed

### Installation

1. Clone git repo
    - gh repo clone junadeduplessis/blog-app
2. Install composer in root directory. (You might have to enable some extensions in you php.ini file to install)
    - composer update
3. You must create an environment file from the example one given
    - cp .env.example .env
4. Run the following command to generate the application key
    - php artisan key:generate
5. Set your relevant DB details in your .env file to the same as your DB_DATABASE application details
6. Create a new database in your database application with the same name as your DB_DATABASE and import the DB export dump file
7. In root of project directory, run the following to launch project.
    - php artisan serve
    - npm run dev
# blog-app
