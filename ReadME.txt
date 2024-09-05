 Project Setup Instructions

1) Create Database and table:

     Open the create_db_and_table.php file.
     Set your MySQL root username and password.
     Navigate to the folder containing create_db_and_table.php.
     Run the following command to create the database and table: php create_db_and_table.php

2) Configure Database Connection:

    Change the default MySQL root username and password to your MySQL username and password in /app/Core/Database.php and /config/config.php files.

3) Start the Application:

     Navigate to the public folder in your project.
     Run the following command to start the server: php -S localhost:8000

 Open your browser and go to http://localhost:8000 to see the app.
