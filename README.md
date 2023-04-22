## Booking API application - Laravel 7

Clone the Repository
To clone the repository, run the following command in your terminal:

`git clone https://github.com/your-username/laravel-7-project.git`

Replace your-username with your GitHub username. This will create a new directory called laravel-7-project containing the project files.

## Install Laravel
Before you can run the Laravel project, you need to install the necessary dependencies. To do this, make sure you have Composer installed on your machine, then run the following command in the project directory:

`composer install`

This will download and install all the required dependencies for the project.

## Set Up the Environment
Next, you need to set up your environment variables. Copy the .env.example file in the project directory to a new file called .env:

`cp .env.example .env`

Update DB credentials in .env file

Then, generate a new application key by running the following command:

`php artisan key:generate`

## Migrate the Database

`php artisan migrate`

## Add seeders

`php artisan db:seed`

## Serve the Application

`php artisan serve`

This will start a development server at http://localhost:8000. You can access the application by navigating to that URL in your web browser.

## Run Tests
To run tests for the Laravel project, make sure you have PHPUnit installed on your machine, then run the following command in the project directory:

`php artisan test`

**_Configure database connection for testing in phpunit.xml_** 

This will run all the tests in the tests directory of your Laravel project.


