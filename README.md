Task Management Application
---------------------

This project is a task management application where an admin can create tasks and assign them to non-admin users. The application also includes pages to list tasks and display user task statistics.

*Features*

Task Creation:
Admins can create tasks with the following details: 
- Title
- Description
- Assigned User
  
Task List:
Display a paginated list of tasks with details:
- Title
- Description
- Assigned User
- Admin Name

Statistics:
- Show statistics for users based on the number of tasks assigned to them.

---------------------

*Technologies Used*
- Laravel Framework
- MySQL Database
- PHP
- HTML/CSS
  
---------------------

*Components Used*

Jobs:
- This project utilizes Laravel Jobs for handling background tasks and asynchronous processing. Jobs are used for tasks such as updating user statistics and performing background operations.

Migrations:
- Database migrations are used to manage database schema changes and ensure consistency across different environments. Migrations are used to create and modify database tables for tasks, users, and statistics.

Seeds:
- Database seeding is used to populate the database with initial data. Seeders are used to create sample users and admins for testing purposes.

---------------------

*Setup and Installation*

1- Clone the repository:

        git clone https://github.com/NourAlllah/Convertedin--Task

2- Install dependencies:

        composer install

3- Configure the .env File:
  
      cp .env.example .env
      
4- update .env File:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_username
        DB_PASSWORD=your_database_password

5- Generate Application Key:

        php artisan key:generate
        
6- php artisan migrate:

        php artisan migrate

7- Seed the database:

        php artisan db:seed

8- Start the development server:

        php artisan serve

9- Ensure that queue workers are running to handle jobs:

        php artisan queue:work







