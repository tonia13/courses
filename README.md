To successfully run the project you need to follow these steps:

1. Run Migration Script to Create Table
First, you need to run the migration script that includes the necessary instructions to create the new table in your existing database.


2. Run Composer Update
Next, you need to run `composer update` command in your project root folder to update all the dependencies in your project. This command will ensure that all the required packages are installed and up-to-date in your project.

3. Run Propel Build
Finally, you need to run `propel build` command in your project root folder to generate the necessary classes and configuration files for Propel, the ORM used in your project. This command will generate the PHP classes that correspond to your database schema and will also generate the necessary configuration files. Make sure that the Propel ORM is properly configured and that your project has access to the generated classes.

Once you have completed these steps, your project should be ready to run.

# OpenAPI Documentation

To get started, please navigate to http://localhost/CoursesProject/documentation
and explore the http://localhost/CoursesProject/documentation/api.php.
You will be presented with a list of all available endpoints. Click on any endpoint to view its documentation, including the HTTP method, URI path, and input/output parameters.