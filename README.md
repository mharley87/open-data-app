# PHP + MySQL

Uses PHP PDO to manipulate a MySQL database using SQL. Basic features are covered:

- `index.php` selects all items from a table
- `single.php` uses query strings to display a single item
- `delete.php` uses a query string to delete a single item from the database
- `add.php` uses forms and validation to add a new item to the database
- `edit.php` uses forms and validation, SQL SELECT, and query strings to edit a single item

## MySQL usernames and passwords

MySQL usernames and passwords are stored using environment variables because we don’t want sensitive information in our GitHub repository.

It’s simple to use `.htaccess` files to set up your environment variables.

### Sample .htaccess

*Remember, this file must be outside your Git repository.*

	# Holds configuration information for opening a connection to the database

	# WAMP's default user is 'root'
	# MAMP's default user is also 'root'
	SetEnv DB_USER root

	# WAMP's default password is nothing, an empty string, ''
	# MAMP's default password is 'root'
	SetEnv DB_PASS

	# Data Source Name: the location and the name of the database
	# `localhost`, means the database server is on the same computer as this PHP file
	SetEnv DB_DSN mysql:dbname=sample;host=localhost
