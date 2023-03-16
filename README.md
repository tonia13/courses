# Run project steps

To successfully run the project you need to follow these steps:

### 1. Run Migration Script to Create Table
First, you need to run the migration script that includes the necessary instructions to create the new table in your existing database. You will find the script in `dbMigration\script.sql`.

### 2. Run Composer Update
Next, you need to run `composer update` command in your project root folder to update all the dependencies in your project. This command will ensure that all the required packages are installed and up-to-date in your project.

### 3. Propel
Finally, you need to set your database credentials to `propel\generated-conf\config.php`.

Once you have completed these steps, your project should be ready to run.

# OpenAPI Documentation

To get started, please navigate to http://localhost/courses/documentation
and explore the http://localhost/courses/documentation/api.php.
You will be presented with a list of all available endpoints.
Click on any endpoint to view its documentation, including the HTTP method, URI path, and input/output parameters.