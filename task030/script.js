const quote = document.querySelector('#quote');

async function get_quote() {
  const url = 'server.php';

  try {
    const response = await fetch(url);
    const data = await response.text();

    quote.textContent = data;
  }
  catch (err) {
    quote.textContent = err.message;
  }
}

get_quote();      // Автозагрузка при старте