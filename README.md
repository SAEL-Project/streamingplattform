# Streaming Plattform

This project was created for a school project.
Technologies used:

-   Laravel
-   TailwindCSS
-   Vue
-   Laravel Valet
-   Docker

## Setup Guide

1. Get Source Code locally

### Backend

2. [Install Composer](https://getcomposer.org/)
3. Install backend dependencies by running `composer install` in the root directory
4. Create a MySQL database to which you have access to
5. If a `.env` file doesn't exist in the root directory already, copy `.env.example` and rename it to `.env`
6. Fill out the `DB_` fields in `.env` while setting `DB_CONNECTION=mysql`
7. Verify connection and generate DB by running `php artisan migrate` in the root directory
8. Seed DB with roles and permissions by running `php artisan db:seed --class=PermissionsAndRolesSeeder` in the root directory

### Frontend

9. [Install NodeJS](https://nodejs.org/)
10. Install frontend dependencies by running `npm install` in the root directory

## Getting things running

### Backend

ON WINDOWS AND LINUX: Run `php artisan serve` in the root directory and visit the URL being shown
ON MACOS: Use [Valet](https://laravel.com/docs/9.x/valet)

### Frontend

Compile frontend files: Run `npm run dev` in the root directory

## Conclusion

Now visit the site and you should be good to go!

## Common error messages

`Unable to locate file in Vite manifest: resources/scss/app.scss.`: This means you stopped running `npm run dev`. Run this command in the root directory again and keep it running while using the website.


`SQLSTATE[HY000] [2002] Connection refused`: This is an issue with your database. Reverify it is running and that the data entered into `.env`
 are correct!
