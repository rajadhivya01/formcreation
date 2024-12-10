document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = {
        username: document.getElementById('username').value.trim(),
        password: document.getElementById('password').value.trim(),
    };

    if (!formData.username || !formData.password) {
        alert('Please fill in both username and password.');
        return;
    }

    try {
        const response = await fetch('php/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData),
        });

        const result = await response.json();

        if (result.success) {
            // Redirect to profile page upon successful login
            window.location.href = 'profile.html';
        } else {
            alert(result.message || 'Invalid credentials.');
        }
    } catch (error) {
        console.error('Login error:', error);
        alert('An error occurred. Please try again.');
    }
});
