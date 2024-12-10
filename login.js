document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault(); // Prevent default form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Ensure both fields are filled
    if (!username || !password) {
        document.getElementById('errorMessage').innerText = 'Please enter both username and password.';
        document.getElementById('errorMessage').style.display = 'block';
        return;
    }

    const data = { username, password };

    try {
        const response = await fetch('php/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data),
        });

        const result = await response.json();

        if (result.success) {
            // Redirect to the profile page on success
            window.location.href = 'profile.html';
        } else {
            // Display error message if login fails
            document.getElementById('errorMessage').innerText = result.message;
            document.getElementById('errorMessage').style.display = 'block';
        }
    } catch (error) {
        document.getElementById('errorMessage').innerText = 'An error occurred. Please try again.';
        document.getElementById('errorMessage').style.display = 'block';
    }
});
