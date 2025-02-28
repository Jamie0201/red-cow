// filepath: /php-user-auth-project/php-user-auth-project/src/js/scripts.js

document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (username === '' || password === '' || confirmPassword === '') {
                alert('All fields are required.');
                event.preventDefault();
            } else if (password !== confirmPassword) {
                alert('Passwords do not match.');
                event.preventDefault();
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === '' || password === '') {
                alert('Both fields are required.');
                event.preventDefault();
            }
        });
    }
});