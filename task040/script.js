const form = document.querySelector('form');
const result = document.querySelector('#result');

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  const params = new URLSearchParams();

  for (const [key, value] of formData) {
    params.append(key, value);
  }

  const response = await fetch('process.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: params.toString()
  });


  const answare = await response.text();

  result.textContent = answare;
})