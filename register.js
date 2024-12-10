document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const data = {
        username: document.getElementById('username').value,
        password: document.getElementById('password').value,
        name: document.getElementById('name').value,
        date_of_birth: document.getElementById('dob').value,
        contact_number: document.getElementById('contact').value,
    };
 
 
    const response = await fetch('php/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
    });
     alert(await response.text());
});
