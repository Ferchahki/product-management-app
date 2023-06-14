# API Documentation
## Introduction

This API is designed to manage and track products. It provides endpoints for creating, retrieving, updating, and deleting products. The API allows users to authenticate using Laravel Sanctum for secure access to the protected routes.

Installation
To install and set up the API locally, follow these steps:

Clone the repository:

bash
Copy code
git clone [https://github.com/your-repo-url.git](https://github.com/Ferchahki/product-management-app.git)
Install the dependencies:

Copy code
composer install
Set up the database configuration in the .env file:

makefile
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
Run the database migrations:

Copy code
php artisan migrate
Generate an application key:

vbnet
Copy code
php artisan key:generate
Start the development server:

Copy code
php artisan serve
The API should now be accessible at http://localhost:8000.

Usage
Ensure you have a tool for sending HTTP requests (e.g., Postman or cURL) to interact with the API.
All requests must include the appropriate headers, such as Accept: application/json and Content-Type: application/json.
Authentication
To authenticate and obtain an access token, send a POST request to /api/login with your email and password. The response will contain the access token that needs to be included in subsequent requests using the Authorization header as Bearer <access_token>.

Endpoints
The API provides the following endpoints:

GET /api/products: Retrieve a list of all products.</br>
GET /api/products/{id}: Retrieve a specific product by ID.</br>
POST /api/products: Create a new product.</br>
PUT /api/products/{id}: Update an existing product.</br>
DELETE /api/products/{id}: Delete a product.</br>
For detailed documentation and examples of request and response formats, please refer to the API Documentation.

Error Handling
In case of errors, the API returns appropriate HTTP status codes along with error messages in the response body. Refer to the API documentation for a list of possible error codes and their meanings.

Security
This API utilizes Laravel Sanctum for authentication and access control. All requests to protected endpoints must include a valid access token. Ensure the access token is kept secure and not shared with unauthorized individuals.

Testing
To run the test suite, execute the following command:

bash
Copy code
php artisan test
Contributing
Contributions to the API are welcome. To contribute, follow these steps:

Fork the repository.
Create a new branch for your feature or bug fix.
Make your changes and commit them.
Push the branch to your forked repository.
Submit a pull request with a detailed description of your changes.
License
This API is open source and distributed under the MIT License.

Contact Information
For any questions or feedback, please contact:

Email: alawiabdo000@gmail.com
Website: (http://abdessamad-elferchakhi.com/)http://abdessamad-elferchakhi.com/
