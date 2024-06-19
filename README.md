# Laravel Zillow copy

Laravel Hotel is an open-source web application built with laravel 8.0, enchanced with laravel websockets features to have realtime notification experience.

Its now compatible with laravel 11

### Demo Link
https://ilmedovamahri.dev/property-reservation-system/

## Screenshots

-   Client
    ![alt text](https://github.com/ilmedova/property_reservation_system/blob/main/client.png?raw=true)

-   Dashboard
    ![alt text](https://github.com/ilmedova/property_reservation_system/blob/main/example-b.png?raw=true)


## Instalation

### Init DB

-   Create DB Name: hotel_app
    or via terminal

```
mysql -u root -p
```

enter your db credential

```
create database hotel_app;
exit;
```

### Init Commands:

```
cp .env.example .env // after that start filling credential at .env

composer install
npm install
npm run dev
php artisan migrate:fresh --seed
php artisan serv                => Terminal 1
php artisan reverb:start     => Terminal 2   //run the websocket server for realtime notification
```

### Development build

```
npm run dev
```

### Production Build

```
// run this on your terminal to generate production build
npm run build
```

### Login:

-   Email: admin@example.com
-   Password: admin


## Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
