// No need for <script> tags in a .js file
    function showForm(formId) {
        // Get both forms by their IDs
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');

        // Hide both forms by removing the 'active' class
        loginForm.classList.remove('active');
        registerForm.classList.remove('active');

        // Show the selected form by adding the 'active' class
        const selectedForm = document.getElementById(formId);
        selectedForm.classList.add('active');
    }
// No need for closing <script> tag in a .js file