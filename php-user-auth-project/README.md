# php-user-auth-project

This project is a simple PHP web application that includes user registration and login functionality. It utilizes a MySQL database to store user information and employs PHP for server-side processing.

## Project Structure

```
php-user-auth-project
├── src
│   ├── css
│   │   └── styles.css
│   ├── js
│   │   └── scripts.js
│   ├── pages
│   │   ├── register.html
│   │   └── login.html
│   └── server
│       ├── db.php
│       ├── register.php
│       └── login.php
├── .gitignore
└── README.md
```

## Features

- User registration with username and password.
- User login with authentication.
- Client-side validation for forms.
- Responsive design for registration and login pages.

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Setup Instructions

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd php-user-auth-project
   ```

3. Set up the database:
   - Create a MySQL database and import the necessary SQL schema for user management.

4. Configure the database connection in `src/server/db.php`.

5. Open your browser and go to `http://localhost/php-user-auth-project/src/pages/register.html` to access the registration page.

## Usage

- Navigate to the registration page to create a new account.
- After registering, you can log in using your credentials on the login page.

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.

## License

This project is licensed under the MIT License.