const result = document.querySelector('.result');
const products = document.querySelector('.products');
const form = document.querySelector('form');

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  const params = new URLSearchParams(formData);

  const url = `get_products.php?${params.toString()}`;

  try {
    const response = await fetch(url);
    const data = await response.json();

    if (!data.success) {
      result.textContent = data.error;
      return;
    }

    products.innerHTML = '';
    data.products.forEach(product => {
      const li = document.createElement('li');

      const name = document.createElement('p').textContent = product.name;
      const price = document.createElement('p').textContent = product.price;
      const category = document.createElement('p').textContent = product.category;
      const craete = document.createElement('p').textContent = product.created_at;

      li.append(name, category, price, craete);
      products.append(li);
    });

  } catch (err) {
    console.error('Request failed:', err);
  }
})