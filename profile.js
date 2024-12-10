window.onload = async function () {
    const response = await fetch('php/profile.php');
    const userData = await response.json();

    const profileDetails = document.getElementById('profileDetails');
    profileDetails.innerHTML = `
        <p>Name: ${userData.name}</p>
        <p>Age: ${userData.age}</p>
        <p>Date of Birth: ${userData.date_of_birth}</p>
        <p>Contact: ${userData.contact_number}</p>
    `;

    document.getElementById('logoutButton').addEventListener('click', async function () {
        await fetch('php/logout.php');
        window.location.href = 'index.html';
    });
};
