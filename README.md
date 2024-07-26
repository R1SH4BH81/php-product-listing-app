## About Project

This simple product listing project was built with PHP's [laravel 10](https://laravel.com/docs/10.x) framework, tailwind CSS, and MySQL. It has the following features:
- Authentication flow built with [Laravel Breeze package](https://laravel.com/docs/10.x/starter-kits#laravel-breeze).
- Products listing page with pagination.
- Product detail page.
- Shopping cart flow (add and remove products from the shopping cart).
- Shopping cart page with pagination
- Checkout with [Paystack payment gateway](https://paystack.com/docs/payments/accept-payments).

## Project Setup
To set up this project locally, follow these steps:
- Clone this repository and cd into the project folder
- Create a .env file in the project's root folder and copy the contents of the .env.example file into the created env file.
- Run the "composer install" command to install composer dependencies.
- Head to your database management system and create an empty database with the name specified inside the .env DB_DATABASE variable as well as fill out the remaining database credentials listed in the .env file.
- Open an instance of your terminal and run the "php artisan migrate" command. This will set up your database tables.
- After this, run the "php artisan db:seed" command. This will seed all the necessary tables with dummy data. Note that the seeder also seeds a default user with email - test@user.com and password - password into the users table.
- Open an instance of your terminal and run the "npm run dev" command to compile assets and tailwind CSS
- Open another instance of your terminal and run the "php artisan serve" command.
- Go to http://127.0.0.1:{your-local-port}/products to view the products catalogue.
- Go to http://127.0.0.1:{your-local-port}/register and http://127.0.0.1:{your-local-port}/login register and login respectively.
- To test the password reset functionality, you will need to set up a mailer configuration inside the .evn file. It has been set to Mailhog by default and if you'd like to use it, you can download the Mailhog client and set it up on your local machine.

## Note
The payment process has been set up to verify a default transaction in a local environment since Paystack does not allow redirecting to non-https URLs. 
