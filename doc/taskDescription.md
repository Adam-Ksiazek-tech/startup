# Laravel Developer Interview Task

## task code

ts1projects/rekrutacje

# Task Overview:

You are required to develop a simple content management system (CMS) with the following
functionalities using Laravel + filament. The CMS should allow users to manage articles. This task will
assess your ability to work with Laravel's MVC structure, filament, Eloquent ORM, authentication,
middleware, and RESTful APIs.
Requirements:

## 1. User Authentication:

* Implement user registration and login using Laravel's built-in authentication.
* Only authenticated users can create, edit, delete, and view articles.
  
##  2. Article Management:

* Each article should have a title, body, and publication date.
* Implement CRUD (Create, Read, Update, Delete) operations for articles.
* Ensure only the author of an article can edit or delete it.
  
##  3. RESTful API

* Create a RESTful API for the articles.
* The API should allow the following operations:
* Retrieve a list of all articles (public).
* Retrieve a single article by ID (public).
* Create a new article (authenticated users only).
* Update an existing article (only by the author).
* Delete an article (only by the author).
  
## 4.Validation:

* Ensure proper validation for all input fields in the article and user forms.
* Use Laravel's validation methods to enforce rules such as required fields, string lengths, and
  valid email format for user registration.

##  5. Middleware:

* Implement middleware to check if the user is authenticated before allowing access to the
  article management routes.
* Create custom middleware to ensure only the article author can edit or delete their articles.
  
##  6. Database:  

* Use Laravel migrations to create the necessary database tables.
* Create seeders to populate the database with some initial data for testing purposes.

##  7. Front-end:

* Use filament

##  8. Testing:

* Write unit and feature tests for the article management functionality.
* Ensure the tests cover all critical functionalities like article creation, updating, deletion, and
  viewing.

  ⠀Bonus Points:

  Implement pagination for the article list.
  Add search functionality to find articles by title or content.

⠀Submission:

  Submit your code in a GitHub repository with clear instructions on how to set up and run the
  project locally.
  Include a README file with an overview of your approach, any assumptions made, and any
  additional features or improvements you implemented.
  ⠀Evaluation Criteria:
  Code quality and organization.
  Adherence to Laravel best practices.
  Functionality and completeness of the implemented features.
  Proper use of Laravel's built-in features and components.
  Clear and concise documentation.
  Test coverage and quality.
  ⠀
  This task is designed to evaluate your practical skills in building a web application using Laravel, your
  understanding of its core components, and your ability to follow best practices. Good luck!
  
