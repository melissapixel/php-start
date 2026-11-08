const div = document.querySelector('#userData');

async function renderUser() {
  const url = 'server.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    for (const key in data) {
      
      const p = document.createElement('p');
      let value = data[key];

      if (key === 'isVerified') {
        value = value ? '✓ Верифицирован' : '✗ Не верифицирован';
      }

      p.textContent = key + ': ' + value;
      div.append(p);
    }
  }
  catch (err) {
    console.log(err.message);
  }
}

renderUser();