const form = document.querySelector('form');
const resultRow = document.querySelector('.result');

form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const username = document.querySelector('#username').value;
  const params = new URLSearchParams({
      username: username
  });
  const url = `check_username.php?${params.toString()}`;

  resultRow.textContent = '';

  try {
    const response = await fetch(url, {
        method: 'GET'
    });

    const data = await response.json();
    
    if (!data.success) {
      resultRow.textContent = data.error;
    }

    if (data.success) {
      resultRow.textContent = 'success';
    }


  } catch (err) {
    resultRow.textContent = "Error in Server";
    console.log(err.message);
  }

})