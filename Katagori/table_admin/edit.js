const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('password');

togglePassword.addEventListener('click', function() {
    // Toggle the password field type between 'password' and 'text'
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;

    // Toggle the eye icon (optional)
    this.innerHTML = type === 'password' ? '&#128065;' : '&#128064;';
   });
