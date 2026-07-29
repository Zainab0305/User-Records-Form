# User-Records-Form

A simple form (Name, Age, Submit button) that stores data in a database, displays it in a table, and lets you toggle each record's status between 0 and 1 instantly via JavaScript (fetch)

🔗 https://zai.free.je/index.html 

# Files

index.html:	The form page (Name, Age, Submit button)
in.php:	Receives the form data, inserts it into the database, displays the table, and handles toggle requests
script.js: Sends the toggle request via fetch and updates the status cell instantly without reloading
style2.css:	Page styling
users.sql: Database export from phpMyAdmin

Note: config.php is not included in this repository because

it contains sensitive connection details (database username and password).

# Setup on InfinityFree

1- Create a database from the InfinityFree control panel (MySQL Databases)
2- Open phpMyAdmin, select your database, and import users.sql from the Import tab 
3- Create config.php manually with your real credentials
4- Upload all files (index.html, in.php, script.js, style2.css, config.php) to the htdocs folder
5- Open index.html in your browser, enter a name and age, and click Submit

after click Submit, the table that contain the data will displays with the toggle button.

# How Toggle works

Clicking Toggle sends the record's ID to in.php, which flips its status in the database and sends back the new value (0 or 1). script.js then updates just that cell on the page, no reload needed.
