window.addEventListener('load', async () => {
    try {
        const response = await fetch('php/profile.php');
        const profile = await response.json();

        if (profile.success) {
            document.getElementById('username').value = profile.data.username;
            document.getElementById('name').value = profile.data.name;
            document.getElementById('contact').value = profile.data.contact_number;
            document.getElementById('dob').value = profile.data.date_of_birth;
            document.getElementById('password').value = profile.data.password;
        } else {
            alert(profile.message);
            window.location.href = 'login.html';
        }
    } catch {
        alert('An error occurred. Please try again.');
        window.location.href = 'login.html';
    }
});

document.getElementById('editForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    try {
        const response = await fetch('php/edit.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data),
        });

        const result = await response.text();
        alert(result);
        if (result.includes('successfully')) {
            window.location.href = 'profile.html';
        }
    } catch {
        alert('An error occurred. Please try again.');
    }
});
