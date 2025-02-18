function countPasswordLength(inputId, lengthDisplayId) {
    const passwordField = document.getElementById(inputId);
    const lengthDisplay = document.getElementById(lengthDisplayId);
    const passwordLength = passwordField.value.length;

    if (passwordLength < 5) {
        passwordField.style.color = 'red';
    } else if (passwordLength < 8) {
        passwordField.style.color = 'yellow';
    } else {
        passwordField.style.color = 'green';
    }

    lengthDisplay.textContent = passwordLength;
}

function togglePassword(inputId, eyeIconId, lengthDisplayId) {
    const passwordField = document.getElementById(inputId);
    const eyeIcon = document.getElementById(eyeIconId);
    const lengthDisplay = document.getElementById(lengthDisplayId);

    if (passwordField.type === "password") {
        passwordField.type = "text"; // Show password
        eyeIcon.setAttribute('stroke', 'green');
        lengthDisplay.style.display = "block"; // Show length
    } else {
        passwordField.type = "password"; // Hide password
        eyeIcon.setAttribute('stroke', 'currentColor');
        lengthDisplay.style.display = "none"; // Hide length
    }
}
