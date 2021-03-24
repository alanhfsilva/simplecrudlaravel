# SIMPLE CRUD Laravel

This is a simple CRUD example using Laravel. The project use the best practices of programming and a RESTful concept.

## Instalation

Basically, you will need a PHP and MySQL to test this code. For MySQL database you can use a local client ou just connect remotelly. Just remember to set the database variables on _.env.example_ and change it name to _.env_ file. You'll need:

- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySQL database (local or remote)

After installing all pre-requisites, make a clone for this project usgin:

```bash
git clone https://github.com/alanhfsilva/simplecrudlaravel.git
```

Enter in the directory _simplecrudlaravel_ and run:

```bash
composer update
composer install
php artisan migrate
```

Now, you can enter on _public_ folder and star the PHP server for testing purposes running:

```bash
php -S localhost:8000
```

Enjoy :)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
