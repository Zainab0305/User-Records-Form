# User-Records-Form

A simple form (Name, Age, Submit button) that stores data in a database, displays it in a table on the same page, and lets you toggle each record's status between 0 and 1 instantly via JavaScript.

🔗 https://zai.free.je/index.html 

# Files

index.html:	The form page + empty table, filled in by JavaScript

in.php: Handles 3 requests: list records (JSON), insert a record, toggle a record's status

script.js: Loads the table on page load, submits the form via fetch, and handles toggling

style2.css:	Page styling

users.sql: Database export from phpMyAdmin

Note: config.php is not included in this repository because

it contains sensitive connection details (database username and password).

# How Toggle works

-Adding a record: submitting the form is intercepted by JavaScript (e.preventDefault()), which sends the data to in.php via fetch, then reloads the table.

-Toggling status: clicking Toggle sends the record's ID to in.php, which flips its status in the database and returns the new value (0 or 1). script.js updates just that cell.
