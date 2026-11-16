const form = document.querySelector('form');
const result = document.querySelector('.result');

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const amount = document.querySelector('#amount').value;
  const from_currency = document.querySelector('#from_currency').value;
  const to_currency = document.querySelector('#to_currency').value;

  const formData = new FormData();
  formData.append('amount', amount);
  formData.append('from_currency', from_currency);
  formData.append('to_currency', to_currency);

  const url = 'calc.php';

  try {
    const response = await fetch(url, {
      method: 'POST',
      body: formData
    })

    const data = await response.json();

    if (!data.success) {
      result.textContent = data.error;
    }

    if (data.success) {
      result.textContent = data.result;
    }

  } catch (err) {
    result.textContent = "Error in Server";
  }

})