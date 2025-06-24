function openAuthModal() {
    document.getElementById('authModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeAuthModal() {
    document.getElementById('authModal').style.display = 'none';
    document.body.style.overflow = '';
}

function switchToLogin() {
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'flex';
    document.getElementById('authTitle').innerText = 'Вход';
    document.getElementById('regPasswordError').style.display = 'none';
}

function switchToRegister() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'flex';
    document.getElementById('authTitle').innerText = 'Регистрация';
    document.getElementById('loginPasswordError').style.display = 'none';
}

window.onclick = function(e) {
    const modal = document.getElementById('authModal');
    if (e.target === modal) {
        closeAuthModal();
    }
};

function togglePasswordVisibility(inputId, icon) {
    const input = document.getElementById(inputId);
    const svg = icon.querySelector('svg');
    
    if (input.type === 'password') {
        input.type = 'text';
        svg.innerHTML = `
            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
            <line x1="1" y1="1" x2="23" y2="23"></line>
        `;
    } else {
        input.type = 'password';
        svg.innerHTML = `
            <path d="M2 12s3-5.5 10-5.5S22 12 22 12"></path>
            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
        `;
    }
}

function validateRegisterForm() {
    const password = document.getElementById('regPassword').value;
    const errorElement = document.getElementById('regPasswordError');
    
    if (password.length > 20) {
        errorElement.textContent = 'Пароль не должен превышать 20 символов';
        errorElement.style.display = 'block';
        return false;
    } else {
        errorElement.style.display = 'none';
        return true;
    }
}

function validateLoginForm() {
    const password = document.getElementById('loginPassword').value;
    const errorElement = document.getElementById('loginPasswordError');
    
    if (password.length > 20) {
        errorElement.textContent = 'Пароль не должен превышать 20 символов';
        errorElement.style.display = 'block';
        return false;
    } else {
        errorElement.style.display = 'none';
        return true;
    }
};