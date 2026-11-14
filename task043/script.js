const block = document.querySelector('.quote');
const quote = document.querySelector('.quote_text');
const author = document.querySelector('.author');
const btn = document.querySelector('button');

async function printQuote() {
  const url = 'get_quote.php';

  try {
    const response = await fetch(url);
    const data = await response.json();

    author.textContent = data.author;
    quote.textContent = data.text;

  } catch (err) {
    console.log(err.message);
  }
}

document.addEventListener('DOMContentLoaded', () => {
    printQuote();
});