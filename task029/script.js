const result = document.querySelector('#result');

async function getGreeting () {
  const url = 'server.php';

  try {
    const response = await fetch(url);
    const data = await response.text();

    result.textContent = data;
  } catch (err) {
    console.log(err.message);
  }
}

getGreeting();