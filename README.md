# Laravel CRUD and API kelurga budi

## Usage

untuk menggunakan project ini ikuti langkah di bawah:

1. Clone repository

    ```bash
    git clone https://github.com/NaufalHafizh/laravel-CRUDandAPI.git
    ```

2. Buat database baru
3. Setting .env

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=keluarga_budi // sesuaikan dengan database yang di buat
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. Migrasi dan Seeding

    ```bash
    php artisan migrate:fresh --seed
    ```

5. Development Server

    ```bash
    php artisan serve
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
