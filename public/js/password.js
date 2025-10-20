function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    
    let strength = 0;
    
    // Criterios de fortaleza
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/[^a-zA-Z\d]/.test(password)) strength++;
    
    // Actualizar barra y texto
    strengthBar.className = 'password-strength-bar';
    
    if (strength === 0 || password.length === 0) {
        strengthText.textContent = 'Ingresa una contraseña';
        strengthText.style.color = '#a0aec0';
    } else if (strength <= 2) {
        strengthBar.classList.add('password-strength-weak');
        strengthText.textContent = 'Contraseña débil';
        strengthText.style.color = '#f56565';
    } else if (strength <= 4) {
        strengthBar.classList.add('password-strength-medium');
        strengthText.textContent = 'Contraseña media';
        strengthText.style.color = '#ed8936';
    } else {
        strengthBar.classList.add('password-strength-strong');
        strengthText.textContent = 'Contraseña fuerte';
        strengthText.style.color = '#48bb78';
    }
}