document.addEventListener('DOMContentLoaded', async function () {
    try {
        const response = await fetch('php/profile.php');
        const user = await response.json();

        if (user.success) {
            const profileDetails = document.getElementById('profileDetails');
            profileDetails.innerHTML = `
                <p>Username: ${user.data.username}</p>
                <p>Name: ${user.data.name}</p>
                <p>Age: ${user.data.age}</p>
                <p>Date of Birth: ${user.data.date_of_birth}</p>
                <p>Contact Number: ${user.data.contact_number}</p>
            `;
        } else {
            alert(user.message || 'Unable to load profile.');
            window.location.href = 'login.html'; // Redirect to login if session is invalid
        }
    } catch (error) {
        console.error('Profile load error:', error);
        alert('An error occurred. Please try again.');
    }

    // Logout functionality
    document.getElementById('logoutButton').addEventListener('click', async function () {
        await fetch('php/logout.php');
        window.location.href = 'login.html';
    });
});

