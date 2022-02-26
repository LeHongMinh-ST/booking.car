## Requirements

- PHP >= 7.1.3

## Usage

1. Clone project.
  
2. Create .env file, copy content from .env.example to .env file and config your database in .env:
``` bash
	DB_CONNECTION=mysql
	DB_HOST=database_server_ip
	DB_PORT=3306
	DB_DATABASE=database_name
	DB_USERNAME=username
	DB_PASSWORD=password

	
	PASSWORD_USER = default password
	PASSWORD_ADMIN = default password
```
3. Run
``` bash
	$ composer install
	$ php artisan key:generate
	$ php artisan migrate
	$ php artisan db:seed --class=DatabaseSeeder
	$ php artisan db:seed --class=RoleSeederTable
	$ php artisan storage:link
	$ php artisan route:clear
	$ php artisan config:clear
```
4. Local development server
- Run
``` bash
	$ php artisan serve
```
- In your browser, go to [http://127.0.0.1:8000/admin/login](http://127.0.0.1:8000/admin/login) to run your project.
- Login with default admin acount email: superadmin@gmail.com and password: 123456789
