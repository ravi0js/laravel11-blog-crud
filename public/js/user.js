function countPasswordLength(inputId, lengthDisplayId) {
    const passwordField = document.getElementById(inputId);
    const lengthDisplay = document.getElementById(lengthDisplayId);
    const passwordLength = passwordField.value.length;
    if(passwordLength < 5){
        passwordField.style.color = 'red';
    }
    else if(passwordLength < 8){
        passwordField.style.color='yellow';
    }
    else{
        passwordField.style.color='green';
    }
    lengthDisplay.textContent = passwordLength;
    
}
function togglePassword(inputId, eyeIconId, lengthDisplayId) {
    const passwordField = document.getElementById(inputId);
    const eyeIcon = document.getElementById(eyeIconId);
    const lengthDisplay = document.getElementById(lengthDisplayId);
    
    if (passwordField.type === "password") {
        // Show password
        passwordField.type = "text";
        eyeIcon.setAttribute('stroke', 'green');
        lengthDisplay.textContent = passwordField.value.length;
        lengthDisplay.style.display = "block"; // Show password length
    } else {
        // Hide password
        passwordField.type = "password";
        eyeIcon.setAttribute('stroke', 'currentColor');
        lengthDisplay.textContent = '';
        lengthDisplay.style.display = "none"; // Hide password length
    }
}

// is user Exist
function validateEmailFormat(email) {
    // Check if email is blank
    if (!email) {
        return { valid: false, message: 'Email cannot be blank.' };
    }

    // Check if email format is valid
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        return { valid: false, message: 'Please enter a valid email address.' };
    }

    return { valid: true, message: '' };
}

function isEmailExist() {
    const email = document.getElementById('email').value;
    const messageBox = document.getElementById('messageBox');
    messageBox.textContent = '';
    
    const validation = validateEmailFormat(email);
    
    if (!validation.valid) {
        messageBox.textContent = validation.message;
        messageBox.style.color = 'red';
        return;
    }

    messageBox.textContent = 'Checking email...';
    messageBox.style.color = 'gray';

    
    fetch(`/api/check-email?email=${encodeURIComponent(email)}`)
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                // Show error message if email already exists
                messageBox.textContent = data.message;
                messageBox.style.color = 'red';
            } else {
                // Show success message if email does not exist
                messageBox.textContent = data.message;
                messageBox.style.color = 'green';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            messageBox.textContent = 'An error occurred while checking the email.';
            messageBox.style.color = 'red';
        });
}

function isEmailNotExist() {
    const email = document.getElementById('email').value;
    const messageBox = document.getElementById('messageBox');
    messageBox.textContent = '';
    
    const validation = validateEmailFormat(email);
    
    if (!validation.valid) {
        messageBox.textContent = validation.message;
        messageBox.style.color = 'red';
        return;
    }

    messageBox.textContent = 'Checking email...';
    messageBox.style.color = 'gray';

    
    fetch(`/api/check-email?email=${encodeURIComponent(email)}`)
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                // Show error message if email already exists
                messageBox.textContent = data.message;
                messageBox.style.color = 'green';
               
            } else {
                messageBox.textContent = data.message;
                messageBox.style.color = 'red';
               
            }
        })
        .catch(error => {
            console.error('Error:', error);
            messageBox.textContent = 'An error occurred while checking the email.';
            messageBox.style.color = 'red';
        });
}