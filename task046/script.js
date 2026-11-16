const form = document.querySelector('.auth-form');
const errorRow = document.querySelector('.error');

form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const url = 'register.php';

  const username = document.querySelector("#username").value;
  const email = document.querySelector("#email").value;
  const password = document.querySelector("#password").value;

  const formData = new FormData();
  formData.append('username', username);
  formData.append('email', email);
  formData.append('password', password);

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData
    })

    const data = await response.json();

    // Ловим только сетевые ошибки или жесткие ошибки сервера
    if (!response.ok) { 
      errorRow.textContent = data.error || "Неизвестная ошибка сервера";
      throw new Error(data.error || "Неизвестная ошибка сервера"); 
    }

    if (data.error) {
      errorRow.textContent = data.error;
      return;
    }
    errorRow.textContent = '';
    console.log(data);

  } catch (err) {
    console.log(err.message);
  }
})