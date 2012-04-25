

# Open data App
Data-base to find Ottawa Baseball Diamonds.
phpfog link:<http://ottawa-baseball.phpfogapp.com/index.php>

#Version
1.0.0

#Author Info: 
Mike Harley. Web developer/ web designer.
mike.harley87@yahoo.com
mharley87@hotmail.com
Harley.mike25@gmail.com
Harl0011@algonquinlive.com

Copyright MMXI, Mike Harley, <mike.harley87@yahoo.com>

Dependencies: jQuery, HTML5 ,CSS, google maps

Versioned using Semantic Versioning, <http://semver.org/>

## Quick Start
 kml file from-http://ottawa.ca/online_services/opendata/info/museums_en.html.

 Include `general.css`, `locations.js`, in your HTML file. Also create a table with the name and location of the museums and code the sql query in the HTML file.
 table elements for locations;
 name
 address
 longitude
 latitude
 
 rate count
 rate total
 
 Include google maps, "http://schema.org/TouristAttraction" in your HTML file.

 Github link: git@github.com:mharley87/open-data-app.git

 phpfog link:<http://ottawa-baseball.phpfogapp.com/index.php>

## Installation Process
The application do not require any installation.


## License
Signature Pad is licensed under the [New BSD license].



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
