document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = {
        username: document.getElementById('username').value,
        password: document.getElementById('password').value,
        name: document.getElementById('name').value,
        dob: document.getElementById('dob').value,
        contact: document.getElementById('contact').value,
    };

    try {
        const response = await fetch('php/register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData),
        });

        const result = await response.json();
        if (result.success) {
            alert('Registration successful!');
            window.location.href = 'login.html';
        } else {
            alert(result.message || 'Registration failed.');
        }
    } catch (error) {
        alert('An error occurred. Please try again.');
    }
});

