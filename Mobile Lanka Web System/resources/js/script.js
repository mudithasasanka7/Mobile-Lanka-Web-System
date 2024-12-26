// login.js
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.login-form');
    const emailInput = document.querySelector('#email');
    const passwordInput = document.querySelector('#password');

    form.addEventListener('submit', function (event) {
        // Simple validation: Check if fields are empty
        if (emailInput.value === '' || passwordInput.value === '') {
            event.preventDefault();
            alert('Please fill in all fields');
        }
    });
});
